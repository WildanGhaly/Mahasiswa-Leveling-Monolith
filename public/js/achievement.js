document.write('<script src="../../../public/js/api.js"></script>');

// script.js
document.addEventListener('DOMContentLoaded', function () {
    const achievementList = document.getElementById('achievement-list');
    const paginationButtons = document.getElementById('pagination-buttons');

    function loadAchievementPage(page, search) {
        var url = `${SERVER_PATH}achievement/achievement.php`;
        if (page) {
            url += `?page=${page}`;
        }
        if (search) {
            url += `&search=${search}`;
        }
        const xhr = new XMLHttpRequest();
        xhr.open('GET', url, true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log(this.responseText.get);
                const response = JSON.parse(xhr.responseText);
                achievementList.innerHTML = response.achievementList;
                paginationButtons.innerHTML = response.paginationButtons;
            }
        };
        xhr.send();
    }

    var urlParams = new URLSearchParams(window.location.search);

    // Mendapatkan nilai dari parameter dengan nama tertentu
    var pageGet = urlParams.get('page');
    var searchGet = urlParams.get('search');

    // Menggunakan nilai parameter
    console.log(pageGet);
    console.log(searchGet);

    loadAchievementPage(pageGet, searchGet);

    console.log(`loadAchievementPage(${pageGet}, ${searchGet})`);
    // Menggunakan event delegation untuk menangani klik tombol pagination
    paginationButtons.addEventListener('click', function (e) {
        if (e.target.classList.contains('pagination-link')) {
            const page = e.target.dataset.page;
            loadAchievementPage(page);
        }
    });

    document.getElementById('searchInput').addEventListener('keyup', function () {
        const search = this.value;
        console.log("hello: ", search);

        const xhr = new XMLHttpRequest();
        xhr.open('GET', `${SERVER_PATH}achievement/achievement.php?search=${search}`, true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log(this.responseText);
                const response = JSON.parse(xhr.responseText);
                achievementList.innerHTML = response.achievementList;
                paginationButtons.innerHTML = response.paginationButtons;
            }
        };
        xhr.send();
    });
});


