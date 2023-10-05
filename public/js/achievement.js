document.write('<script src="../../../public/js/api.js"></script>');

document.addEventListener('DOMContentLoaded', function () {
    const achievementList = document.getElementById('achievement-list');
    const paginationButtons = document.getElementById('pagination-buttons');
    var urlParams = new URLSearchParams(window.location.search);

    var page = urlParams.get("page");
    
    var achievementLimitCookie = document.cookie.split('; ').find(cookie => cookie.startsWith('achievement-limit='));
    var limit = achievementLimitCookie ? achievementLimitCookie.split('=')[1] : 5;
    document.getElementById('page-limit').value = limit;

    var achievementDifficultyCookie = document.cookie.split('; ').find(cookie => cookie.startsWith('achievement-difficulty='));
    var difficulty = achievementDifficultyCookie ? achievementDifficultyCookie.split('=')[1] : "semua";
    document.getElementById('filter-difficulty').value = difficulty;

    var achievementTypeCookie = document.cookie.split('; ').find(cookie => cookie.startsWith('achievement-type='));
    var type = achievementTypeCookie ? achievementTypeCookie.split('=')[1] : 0;
    document.getElementById('filter-type').value = type;

    var achievementSearchCookie = document.cookie.split('; ').find(cookie => cookie.startsWith('achievement-search='));
    var search = achievementSearchCookie ? achievementSearchCookie.split('=')[1] : "";
    document.getElementById('searchInput').value = search;

    console.log(limit);
    console.log(difficulty);
    console.log(type);

    page = page ? page : 1;


    function loadAchievementPage(page) {
        var url = `${SERVER_PATH}achievement/achievement.php?page=${page}`;
        if (limit && limit !== "null" && limit !== "undefined") {
            url += `&limit=${limit}`;
        }
        console.log(url);
        const xhr = new XMLHttpRequest();
        xhr.open('GET', url, true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log(this.responseText);
                const response = JSON.parse(xhr.responseText);
                achievementList.innerHTML = response.achievementList;
                paginationButtons.innerHTML = response.paginationButtons;
            }
        };
        xhr.send();
    }

    document.getElementById("page-limit").addEventListener("change", function () {
        limit = this.value;
        if (!limit || limit === "null" || limit === "undefined") {
            limit = 5;
        }
        document.cookie = `achievement-limit=${limit}; path=/`
        loadAchievementPage(1);
    });

    document.getElementById("filter-difficulty").addEventListener("change", function () {
        difficulty = this.value;
        if (!difficulty || difficulty === "null" || difficulty === "undefined") {
            difficulty = "semua";
        }
        document.cookie = `achievement-difficulty=${difficulty}; path=/`
        loadAchievementPage(1);
    });

    document.getElementById("filter-type").addEventListener("change", function () {
        type = this.value;
        if (!type || type === "null" || type === "undefined") {
            type = 0;
        }
        document.cookie = `achievement-type=${type}; path=/`
        loadAchievementPage(1);
    });

    document.getElementById("searchInput").addEventListener("keyup", function () {
        search = this.value;
        if (!search || search === "null" || search === "undefined") {
            search = "";
        }
        document.cookie = `achievement-search=${search}; path=/`
        loadAchievementPage(1);
    });

    loadAchievementPage(page);
    
});


