document.write('<script src="../../../public/js/api.js"></script>');

document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("loginForm").addEventListener("submit", function(event) {
        event.preventDefault(); // Prevent the form from submitting normally
    
        var xhr = new XMLHttpRequest();
        var url = `${SERVER_PATH}auth/Login.php`;
        var formData = new FormData();
    
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;
    
        formData.append("username", username);
        formData.append("password", password);

    
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4) { // Request completed
                if (xhr.status === 200) { // HTTP OK
                    var response = xhr.responseText.trim();
                    console.log(response);
                    console.log(response.length)
                    if (response === "success") {
                        window.location.href = "../dashboard";
                    } else if (response === "error") {
                        alert("Invalid username or password");
                    } else {
                        alert("An error occurred. Please try again later.");
                    }
                } else {
                    alert("An error occurred. Please try again later.");
                }
            }
        };
    
        xhr.open("POST", url, true);
        xhr.send(formData);
    });
  });
  