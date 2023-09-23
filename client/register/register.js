document.write('<script src="../api/api.js"></script>');

$isUsernameValid    = false;
$isPasswordValid    = false;
$isEmailValid       = false;

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('username').addEventListener('input', function() {
        var username = this.value;
        checkUsername(username);
    });

    document.getElementById('email').addEventListener('input', function() {
        var email = this.value;
        checkEmail(email);
    });

    document.getElementById('password').addEventListener('input', function() {
        var password = this.value;
        checkPassword(password);
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
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            var response = this.responseText.trim();
            if (response === 'unique') {
                document.getElementById('username').style.borderColor = 'green';
                document.getElementById('usernameError').textContent = '';
                $isUsernameValid = true;
            } else {
                document.getElementById('username').style.borderColor = 'red';
                document.getElementById('usernameError').textContent = 'Username sudah digunakan';
                $isUsernameValid = false;
            }
        }
    };
    xhr.open('POST', `${SERVER_PATH}registration/CheckUsername.php`, true); 
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
        document.getElementById('emailError').textContent = 'Alamat email tidak valid';
        $isEmailValid = false;
    }
}

function checkPassword(password) {
    if (password.length < 8) {
        document.getElementById('password').style.borderColor = 'red';
        document.getElementById('passwordError').textContent = 'Password harus lebih dari 8 karakter';
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
    var url = `${SERVER_PATH}registration/Register.php`;
    var formData = new FormData();

    formData.append('username', username);
    formData.append('email', email);
    formData.append('password', password);

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = xhr.responseText.trim();
            console.log(response);

            if (response == "success") {
                window.location.href = '../dashboard/dashboard.html'; 
            } else {
                alert('Gagal mendaftar akun baru');
            }
        }
    };
    xhr.open('POST', url); 
    xhr.send(formData);
}

  