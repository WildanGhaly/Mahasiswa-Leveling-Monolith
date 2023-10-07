document.write('<script src="../../../public/js/api.js"></script>');

document.addEventListener('DOMContentLoaded', function () {
    const achievementList = document.getElementById('achievement-list');
    const paginationButtons = document.getElementById('pagination-buttons');
    var urlParams = new URLSearchParams(window.location.search);
    let timeout;

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

    var achievementSearchAttributeCookie = document.cookie.split('; ').find(cookie => cookie.startsWith('achievement-search-type='));
    var searchType = achievementSearchAttributeCookie ? achievementSearchAttributeCookie.split('=')[1] : "a.name";
    document.getElementById('search-attribute').value = searchType;

    var achievementSortCookie = document.cookie.split('; ').find(cookie => cookie.startsWith('achievement-sort='));
    var sort = achievementSortCookie ? achievementSortCookie.split('=')[1] : "default";
    document.getElementById('sort-by').value = sort;

    var achievementOrderCookie = document.cookie.split('; ').find(cookie => cookie.startsWith('achievement-order='));
    var order = achievementOrderCookie ? achievementOrderCookie.split('=')[1] : "asc";
    document.getElementById('sort-type').value = order;

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
                if (response.isAdmin === "0" || response.isAdmin === 0 || response.isAdmin === false || response.isAdmin === "false" || response.isAdmin === null || response.isAdmin === "null" || response.isAdmin === undefined || response.isAdmin === "undefined") {
                    document.getElementById("btn-admin").style.display = "none";
                }
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
        clearTimeout(timeout); 

        if (!search || search === "null" || search === "undefined") {
            search = "";
        }

        timeout = setTimeout(function () {
            document.cookie = `achievement-search=${search}; path=/`;
            loadAchievementPage(1);
        },500);
    });

    document.getElementById("search-attribute").addEventListener("change", function () {
        searchType = this.value;
        if (!searchType || searchType === "null" || searchType === "undefined") {
            searchType = "a.name";
        }
        document.cookie = `achievement-search-type=${searchType}; path=/`
        loadAchievementPage(1);
    });

    document.getElementById("sort-by").addEventListener("change", function () {
        sort = this.value;
        if (!sort || sort === "null" || sort === "undefined" || sort === "default") {
            sort = "";
        }
        document.cookie = `achievement-sort=${sort}; path=/`
        loadAchievementPage(1);
    });

    document.getElementById("sort-type").addEventListener("change", function () {
        order = this.value;
        if (!order || order === "null" || order === "undefined" || order === "default") {
            order = "";
        }
        document.cookie = `achievement-order=${order}; path=/`
        loadAchievementPage(1);
    });

    loadAchievementPage(page);
    
});


