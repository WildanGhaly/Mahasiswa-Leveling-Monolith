document.write('<script src="../../../public/js/api.js"></script>');

document.addEventListener('DOMContentLoaded', function() {

    document.getElementById('logoutLink').addEventListener('click', function(event) {
        event.preventDefault();
        confirm("Logout from the system?") ? logout() : console.log("Logout cancelled");
        
    });

    const toggleButton = document.getElementById("toggle-sidebar");
    const sidebar = document.querySelector(".sidebar");

    toggleButton.addEventListener("click", function() {
        sidebar.classList.toggle("open");
    });

    const closeButtons = document.getElementById("close-sidebar");
    closeButtons.addEventListener("click", function() {
        sidebar.classList.toggle("open");
    });
    
});

function logout() {
    var xhr = new XMLHttpRequest();
    var logoutUrl = `${SERVER_PATH}auth/Logout.php`;

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) { // Request completed
            if (xhr.status === 200) { // HTTP OK
                var response = xhr.responseText;
                console.log(response);

                if (response === 'success') {
                    redirectToLogin();
                }
            } else {
                console.error('Error:', xhr.status);
            }
        }   
    };

    xhr.open('GET', logoutUrl, true);
    xhr.send();
}

function redirectToLogin() {
    // Redirect to the login page
    window.location.href = '../login';
}
