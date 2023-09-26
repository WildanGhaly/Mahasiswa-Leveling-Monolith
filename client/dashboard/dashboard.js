document.write('<script src="../api/api.js"></script>');

document.addEventListener('DOMContentLoaded', function() {
    var username = getUsernameFromCookie(); 
    console.log(username + " If this is shown then username must be right");
    document.getElementById('username').textContent = username;

    document.getElementById('logoutLink').addEventListener('click', function(event) {
        event.preventDefault();
        logout();
    });
});

function getUsernameFromCookie() {
    const cookies = document.cookie.split('; ');
    for (const cookie of cookies) {
        const [name, value] = cookie.split('=');
        if (name === 'username') {
            return decodeURIComponent(value);
        }
    }
    return null; // No username cookie found
}

function logout() {
    var xhr = new XMLHttpRequest();
    var logoutUrl = `${SERVER_PATH}logout/Logout.php`;

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
