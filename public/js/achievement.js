document.write('<script src="../../../public/js/api.js"></script>');

// script.js
document.addEventListener('DOMContentLoaded', function () {
    const achievementList = document.getElementById('achievement-list');
    const paginationButtons = document.getElementById('pagination-buttons');

    function loadAchievementPage(page) {
        const xhr = new XMLHttpRequest();
        xhr.open('GET', `${SERVER_PATH}achievement/achievement.php?page=${page}`, true);
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
    var nilaiParameter = urlParams.get('page');

    // Menggunakan nilai parameter
    console.log(nilaiParameter);

    nilaiParameter ? loadAchievementPage(nilaiParameter) : loadAchievementPage(1);

    console.log(`loadAchievementPage(${nilaiParameter})`);
    // Menggunakan event delegation untuk menangani klik tombol pagination
    paginationButtons.addEventListener('click', function (e) {
        if (e.target.classList.contains('pagination-link')) {
            const page = e.target.dataset.page;
            loadAchievementPage(page);
        }
    });
});


