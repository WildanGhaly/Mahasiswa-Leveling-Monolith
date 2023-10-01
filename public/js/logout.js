document.write('<script src="../../../public/js/api.js"></script>');

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('logoutLink').addEventListener('click', function(event) {
        event.preventDefault();
        logout();
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