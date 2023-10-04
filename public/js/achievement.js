document.write('<script src="../../../public/js/api.js"></script>');

// script.js
document.addEventListener('DOMContentLoaded', function () {
    const achievementList = document.getElementById('achievement-list');
    const paginationButtons = document.getElementById('pagination-buttons');

    function loadAchievementPage(page, search, limit) {
        var url = `${SERVER_PATH}achievement/achievement.php`;
        if (page) {
            url += `?page=${page}`;
        }
        if (search) {
            url += `&search=${search}`;
        }
        if (limit) {
            url += `&limit=${limit}`;
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
    var limitGet = urlParams.get('limit');

    // Menggunakan nilai parameter
    console.log(pageGet);
    console.log(searchGet);

    loadAchievementPage(pageGet, searchGet, limitGet);

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
        const limit = document.getElementById('page-limit').value;
        console.log("hello: ", search);

        const xhr = new XMLHttpRequest();
        xhr.open('GET', `${SERVER_PATH}achievement/achievement.php?search=${search}&limit=${limit}`, true);
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

    document.getElementById('page-limit').addEventListener('change', function () {
        const limit = this.value;
        const search = document.getElementById('searchInput').value;
        loadAchievementPage(1, search, limit);

        
    });
});


