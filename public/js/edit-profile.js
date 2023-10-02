document.write('<script src="../../../public/js/api.js"></script>');

document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("updateForm").addEventListener("submit", function(event) {
        event.preventDefault(); // Prevent the form from submitting normally
    
        var xhr = new XMLHttpRequest();
        var url = `${SERVER_PATH}edit-profile/update-profile.php`;
        var formData = new FormData();
    
        var name            = document.getElementById("name").value;
        var email           = document.getElementById("email").value;
        var old_password    = document.getElementById("old-password").value;
        var new_password    = document.getElementById("new-password").value;

        formData.append("name", name);
        formData.append("email", email);
        formData.append("old-pw", old_password);
        formData.append("new-pw", new_password);

    
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4) { 
                if (xhr.status === 200) { 
                    var response = xhr.responseText.trim();
                    console.log(response);
                    console.log(response.length)
                    if (response === "success") {
                        window.location.href = "../user-profile";
                    } else if (response === "error") {
                        alert("Unable to update profile. Please try again later.");
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

function selectImage() {
    console.log("selectImage() called");
    var fileInput = document.getElementById('gambarInput');
    fileInput.click();

}

function uploadImage() {
    console.log("uploadImage() called");
}
