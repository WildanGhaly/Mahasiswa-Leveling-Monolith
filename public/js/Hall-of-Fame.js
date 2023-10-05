document.write('<script src="../../../public/js/api.js"></script>');

document.addEventListener('DOMContentLoaded', function() {
    var debounceTimeout;
    document.getElementById('search_input').addEventListener('input', function() {
        var filterSelect = document.getElementById('Filter').value;
        var sortSelect = document.getElementById('Sort').value;
        var search_input = this.value;

        if (debounceTimeout) {
            clearTimeout(debounceTimeout);
        }
        
        debounceTimeout = setTimeout(function() {
            searchUser(filterSelect, sortSelect, search_input);
        }, 400);
        
    });

    document.getElementById('Filter').addEventListener('change', function () {

        var filterSelect = this.value;
        var sortSelect = document.getElementById('Sort').value;
        var search_input = document.getElementById('search_input').value;

        if (debounceTimeout) {
            clearTimeout(debounceTimeout);
        }
        
        debounceTimeout = setTimeout(function() {
            searchUser(filterSelect, sortSelect, search_input);
        }, 400);

        
    });

    document.getElementById('Sort').addEventListener('change', function () {
        var filterSelect = document.getElementById('Filter').value;
        var sortSelect = this.value;
        var search_input = document.getElementById('search_input').value;


        if (debounceTimeout) {
            clearTimeout(debounceTimeout);
        }
        
        debounceTimeout = setTimeout(function() {
            searchUser(filterSelect, sortSelect, search_input);
        }, 400);

        
    });

    document.getElementById('Next').addEventListener('click', function () {

        var filterSelect = document.getElementById('Filter').value;
        var sortSelect = document.getElementById('Sort').value;
        var search_input = document.getElementById('search_input').value;

        var currentURL = window.location.href;
        var page = getPage(currentURL);
        var intPage = parseInt(page);
        page = String(intPage + 1);
        window.location.search = '?page=' + page;


        if (debounceTimeout) {
            clearTimeout(debounceTimeout);
        }
        
        debounceTimeout = setTimeout(function() {
            // searchUser(filterSelect, sortSelect, search_input);
        }, 400);

        
    });


    document.getElementById('Previous').addEventListener('click', function () {

        var filterSelect = document.getElementById('Filter').value;
        var sortSelect = document.getElementById('Sort').value;
        var search_input = document.getElementById('search_input').value;

        var currentURL = window.location.href;
        var page = getPage(currentURL);
        if (page == '1'){
            return;
        }
        var intPage = parseInt(page);
        page = String(intPage - 1);
        window.location.search = '?page=' + page;
        // + '&user=' +search_input + '&sort=' +sortSelect + '&filter=' + filterSelect

        if (debounceTimeout) {
            clearTimeout(debounceTimeout);
        }
        
        debounceTimeout = setTimeout(function() {
            // searchUser(filterSelect, sortSelect, search_input);
        }, 400);

       
    });


    

});

function displayData(data, start_count) {
    var tableBody = document.querySelector('#data tbody');

    if (!Array.isArray(data)) {
        console.error('Data is not an array.');
        tableBody.innerHTML = '';
        return;
        
    }

    var count = start_count;
    var tableHTML = '';

    data.forEach(function(record) {
        if (record[2] === null) {
            return; 
        } else {
            count++;

            var rowHTML = '<tr>';
            rowHTML += '<td>' + count + '</td>';
            rowHTML += '<td>' + record[2] + '</td>';
            rowHTML += '<td>' + record[9] + '</td>';
            rowHTML += '<td>' + record[7] + '</td>';
            rowHTML += '<td>' + record[8] + '</td>';
            rowHTML += '</tr>';

            tableHTML += rowHTML;
        }
    });

    tableBody.innerHTML = tableHTML;
}


function getPage(url){
    var regex = /[\?&]page=([^&#]+)/;
    var match = url.match(regex);

if (match) {
    var pageValue = match[1]; // 
    // console.log(pageValue);  
    return pageValue;
} else {
    console.log("No 'page' parameter found in the URL.");
    return "";
}

}

function searchUser(filter, sort, input) {
    var php_path = `${SERVER_PATH}search/search.php?`;
    // var user_url = `http://localhost:8080/app/views/Hall-of-Fame/?`;

    var parameter = ''
    var currentURL = window.location.href;
    var page = getPage(currentURL);

    console.log(filter + " ini filter \n", sort + " ini sort \n", input + " ini input \n");

    try {
        if (input.length > 0) {
            parameter += "&user=" + input;
          }
          if (sort.length > 0) {
            parameter += "&sort=" + sort;
          }
          if (filter.length > 0) {
            parameter += "&filter=" + filter;
          }
          if (page.length > 0) {
            parameter = "page=" + page + parameter;
          } else {
            parameter = "page=1" + parameter;
          }
    } catch (e) {
        console.log(e);
    }

    const xhr = new XMLHttpRequest();

    url = php_path + parameter;


    xhr.open("GET", url, true);

    xhr.onload = function () {
        
        if (xhr.status === 200) {
            let response = JSON.parse(this.responseText);
            // console.log(this.responseText);
            displayData(response, (parseInt(page) - 1) * 10 );
            
            
        } else {
            console.error("Request failed with status: " + xhr.status);
        }
    };
    xhr.send();
    
}