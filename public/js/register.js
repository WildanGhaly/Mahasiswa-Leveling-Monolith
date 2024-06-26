document.write('<script src="../../../public/js/api.js"></script>');

$isUsernameValid    = false;
$isPasswordValid    = false;
$isEmailValid       = false;

document.addEventListener('DOMContentLoaded', function() {
    let timeout;

    document.getElementById('username').addEventListener('input', function() {
        var username = this.value;
        clearTimeout(timeout);
        timeout = setTimeout(function() {
            checkUsername(username);
        }, 500);
    });

    document.getElementById('email').addEventListener('input', function() {
        var email = this.value;
        clearTimeout(timeout);
        timeout = setTimeout(function() {
            checkEmail(email);
        }, 500);
    });

    document.getElementById('password').addEventListener('input', function() {
        var password = this.value;
        clearTimeout(timeout);
        timeout = setTimeout(function() {
            checkPassword(password);
        }, 500);
    });

    document.getElementById('registerForm').addEventListener('submit', function(event) {
        event.preventDefault();
        var username = document.getElementById('username').value;
        var email = document.getElementById('email').value;
        var password = document.getElementById('password').value;

        registerUser(username, email, password);
    });
});
  
function checkUsername(username) {
    const usernameRegex = /^[a-zA-Z0-9_]{5,20}$/;

    if (!usernameRegex.test(username)) {
        document.getElementById('username').style.borderColor = 'red';
        document.getElementById('usernameError').textContent = 'Invalid username';
        document.getElementById('usernameError2').textContent = 'Username must be 5-20 characters long and only contain alphanumeric characters and underscore';
        $isUsernameValid = false;
        return;
    }

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            var response = this.responseText.trim();
            if (response === 'unique') {
                document.getElementById('username').style.borderColor = 'green';
                document.getElementById('usernameError').textContent = '';
                document.getElementById('usernameError2').textContent = '';
                $isUsernameValid = true;
            } else {
                document.getElementById('username').style.borderColor = 'red';
                document.getElementById('usernameError').textContent = 'Username is taken';
                document.getElementById('usernameError2').textContent = '';
                $isUsernameValid = false;
            }
        }
    };
    xhr.open('POST', `${SERVER_PATH}auth/CheckUsername.php`, true); 
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send('username=' + encodeURIComponent(username));
}

function checkEmail(email) {
    var emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

    if (emailRegex.test(email)) {
        document.getElementById('email').style.borderColor = 'green';
        document.getElementById('emailError').textContent = '';
        $isEmailValid = true;
    } else {
        document.getElementById('email').style.borderColor = 'red';
        document.getElementById('emailError').textContent = 'Invalid email';
        $isEmailValid = false;
    }
}

function checkPassword(password) {
    if (password.length < 8) {
        document.getElementById('password').style.borderColor = 'red';
        document.getElementById('passwordError').textContent = 'Password minimum 8 character';
        $isPasswordValid = false;
    } else {
        document.getElementById('password').style.borderColor = 'green';
        document.getElementById('passwordError').textContent = '';
        $isPasswordValid = true;
    }
}
  
function registerUser(username, email, password) {
    if (!$isUsernameValid) {
        alert('Username tidak valid');
        return;
    }

    if (!$isEmailValid) {
        alert('Email tidak valid');
        return;
    }

    if (!$isPasswordValid) {
        alert('Password tidak valid');
        return;
    }

    var xhr = new XMLHttpRequest();
    var url = `${SERVER_PATH}auth/Register.php`;
    var formData = new FormData();

    formData.append('username', username);
    formData.append('email', email);
    formData.append('password', password);

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = xhr.responseText.trim();
            console.log(response);

            if (response == "success") {
                window.location.href = '../challenge/'; 
            } else {
                alert('Gagal mendaftar akun baru');
            }
        }
    };
    xhr.open('POST', url); 
    xhr.send(formData);
}

  