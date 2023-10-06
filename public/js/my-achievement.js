document.write('<script src="../../../public/js/api.js"></script>');

document.addEventListener('DOMContentLoaded', function () {
    const achievementList = document.getElementById('achievement-list');
    const paginationButtons = document.getElementById('pagination-buttons');
    var urlParams = new URLSearchParams(window.location.search);
    let timeout;

    var page = urlParams.get("page");
    
    var achievementLimitCookie = document.cookie.split('; ').find(cookie => cookie.startsWith('my-achievement-limit='));
    var limit = achievementLimitCookie ? achievementLimitCookie.split('=')[1] : 5;
    document.getElementById('page-limit').value = limit;

    var achievementSearchCookie = document.cookie.split('; ').find(cookie => cookie.startsWith('my-achievement-search='));
    var search = achievementSearchCookie ? achievementSearchCookie.split('=')[1] : "";
    document.getElementById('searchInput').value = search;

    var achievementSearchAttributeCookie = document.cookie.split('; ').find(cookie => cookie.startsWith('my-achievement-search-type='));
    var searchType = achievementSearchAttributeCookie ? achievementSearchAttributeCookie.split('=')[1] : "a.name";
    document.getElementById('search-attribute').value = searchType;

    var achievementSortCookie = document.cookie.split('; ').find(cookie => cookie.startsWith('my-achievement-sort='));
    var sort = achievementSortCookie ? achievementSortCookie.split('=')[1] : "default";
    document.getElementById('sort-by').value = sort;

    var achievementOrderCookie = document.cookie.split('; ').find(cookie => cookie.startsWith('my-achievement-order='));
    var order = achievementOrderCookie ? achievementOrderCookie.split('=')[1] : "asc";
    document.getElementById('sort-type').value = order;

    var achievementYearCookie = document.cookie.split('; ').find(cookie => cookie.startsWith('my-achievement-year='));
    var year = achievementYearCookie ? achievementYearCookie.split('=')[1] : 0;
    document.getElementById('filter-year').value = year;

    var achievementSemesterCookie = document.cookie.split('; ').find(cookie => cookie.startsWith('my-achievement-month='));
    var semester = achievementSemesterCookie ? achievementSemesterCookie.split('=')[1] : 0;
    document.getElementById('filter-month').value = semester;

    console.log(limit);

    page = page ? page : 1;


    function loadAchievementPage(page) {
        var url = `${SERVER_PATH}achievement/my-achievement.php?page=${page}`;
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
        document.cookie = `my-achievement-limit=${limit}; path=/`
        loadAchievementPage(1);
    });

    document.getElementById("searchInput").addEventListener("keyup", function () {
        search = this.value;
        clearTimeout(timeout);

        if (!search || search === "null" || search === "undefined") {
            search = "";
        }

        timeout = setTimeout(function () {
            document.cookie = `my-achievement-search=${search}; path=/`
            loadAchievementPage(1);
        }, 500);
    });

    document.getElementById("search-attribute").addEventListener("change", function () {
        searchType = this.value;
        if (!searchType || searchType === "null" || searchType === "undefined") {
            searchType = "a.name";
        }
        document.cookie = `my-achievement-search-type=${searchType}; path=/`
        loadAchievementPage(1);
    });

    document.getElementById("sort-by").addEventListener("change", function () {
        sort = this.value;
        if (!sort || sort === "null" || sort === "undefined" || sort === "default") {
            sort = "default";
        }
        document.cookie = `my-achievement-sort=${sort}; path=/`
        loadAchievementPage(1);
    });

    document.getElementById("sort-type").addEventListener("change", function () {
        order = this.value;
        if (!order || order === "null" || order === "undefined" || order === "default") {
            order = "default";
        }
        document.cookie = `my-achievement-order=${order}; path=/`
        loadAchievementPage(1);
    });

    document.getElementById("filter-year").addEventListener("change", function () {
        year = this.value;
        if (!year || year === "null" || year === "undefined") {
            year = 0;
        }
        document.cookie = `my-achievement-year=${year}; path=/`
        loadAchievementPage(1);
    });

    document.getElementById("filter-month").addEventListener("change", function () {
        semester = this.value;
        if (!semester || semester === "null" || semester === "undefined") {
            semester = 0;
        }
        document.cookie = `my-achievement-month=${semester}; path=/`
        loadAchievementPage(1);
    });

    loadAchievementPage(page);
    
});


