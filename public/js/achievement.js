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
                const response = JSON.parse(xhr.responseText);
                // achievementList.innerHTML = response.achievementList;
                paginationButtons.innerHTML = response.paginationButtons;
            }
        };
        xhr.send();
    }

    loadAchievementPage(1); // Load halaman pertama saat halaman dimuat
    console.log("loadAchievementPage(1) called");
    // Menggunakan event delegation untuk menangani klik tombol pagination
    paginationButtons.addEventListener('click', function (e) {
        if (e.target.classList.contains('pagination-link')) {
            const page = e.target.dataset.page;
            loadAchievementPage(page);
        }
    });
});


