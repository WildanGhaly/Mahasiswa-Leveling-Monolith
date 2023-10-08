document.write('<script src="../../../public/js/api.js"></script>');

document.addEventListener('DOMContentLoaded', function() {
    var debounceTimeout;
    var xhr = new XMLHttpRequest();

    xhr.open("GET", `${SERVER_PATH}search/isAdmin.php`, true);
    
    xhr.onload = function () {

        if (xhr.status === 200) {

            var isAdmin = this.responseText;

            document.getElementById('search_input').addEventListener('input', function() {
                var filterSelect = document.getElementById('Filter').value;
                var sortSelect = document.getElementById('Sort').value;
                var search_input = this.value;

                if (debounceTimeout) {
                    clearTimeout(debounceTimeout);
                }
                
                debounceTimeout = setTimeout(function() {
                    searchUser(filterSelect, sortSelect, search_input, isAdmin);
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
                    searchUser(filterSelect, sortSelect, search_input, isAdmin);
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
                    searchUser(filterSelect, sortSelect, search_input, isAdmin);
                }, 400);

                
            });

            document.getElementById('Next').addEventListener('click', function () {
                var currentURL = window.location.href;
                var page = getPage(currentURL);
                var intPage = parseInt(page);
                page = String(intPage + 1);
                window.location.search = '?page=' + page;


                if (debounceTimeout) {
                    clearTimeout(debounceTimeout);
                }
                
                debounceTimeout = setTimeout(function() {
                }, 400);

                
            });
        }   
    }
    xhr.send();


    document.getElementById('Previous').addEventListener('click', function () {
        var currentURL = window.location.href;
        var page = getPage(currentURL);
        if (page == '1'){
            return;
        }
        var intPage = parseInt(page);
        page = String(intPage - 1);
        window.location.search = '?page=' + page;

        if (debounceTimeout) {
            clearTimeout(debounceTimeout);
        }
        
        debounceTimeout = setTimeout(function() {
        }, 400);

       
    });

    document.getElementById('deleteSessionButton').addEventListener('click', function() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', `${SERVER_PATH}search/delete_session.php`, true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                console.log("Success")
                location.reload();
            } else {
                console.error('failed');
            }
        };
        xhr.send();
    });


    

});

function displayData(data, start_count, isAdmin) {
    var tableBody = document.querySelector('#data tbody');

    if (!Array.isArray(data)) {
        console.error('Data is not an array.');
        tableBody.innerHTML = '';
        return;
        
    }

    var count = start_count;
    var tableHTML = '';

    data.forEach(function(record) {
        if (record[2] === null && !isAdmin) {
            return; 
        } else {
            count++;

            var rowHTML = '<tr>';
            rowHTML += '<td>' + count + '</td>';
            if (parseInt(isAdmin)){
                rowHTML += '<td>' + record[1] + '</td>';
            }
            rowHTML += '<td>' + record[2] + '</td>';
            rowHTML += '<td>' + record[9] + '</td>';
            rowHTML += '<td>' + record[7] + '</td>';
            rowHTML += '<td>' + record[8] + '</td>';

            if (parseInt(isAdmin)){
                rowHTML += '<td><button id ="a_edit' + count + '"> Edit </button></td>';
                rowHTML += '<td><button id ="a_delete' + count + '"> Delete </button></td>';
            }

            rowHTML += '</tr>';

            tableHTML += rowHTML;
        }
    });
    // console.log(tableHTML);

    tableBody.innerHTML = tableHTML;
    // console.log(document.body.innerHTML);
}


function getPage(url){
    var regex = /[\?&]page=([^&#]+)/;
    var match = url.match(regex);

if (match) {
    var pageValue = match[1];  
    return pageValue;
} else {
    console.log("No 'page' parameter found in the URL.");
    return "";
}

}

function searchUser(filter, sort, input, isAdmin) {
    var php_path = `${SERVER_PATH}search/search.php?`;
    
    var filterSelect = document.getElementById('Filter');
    var sortSelect = document.getElementById('Sort');
    var search_input = document.getElementById('search_input');

    if (filter != filterSelect.value && filter != ''){
        filterSelect.value = filter;
    }

    if (sortSelect.value != sort && sort != ''){
        sortSelect.value = sort;
    }

    if (search_input.value != input){
        search_input.value = input;
    }

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
            displayData(response, (parseInt(page) - 1) * 10, isAdmin);
            
            
        } else {
            console.error("Request failed with status: " + xhr.status);
        }
    };
    xhr.send();
    
}