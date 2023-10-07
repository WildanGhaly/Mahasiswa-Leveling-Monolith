document.write('<script src="../../../public/js/api.js"></script>');

const xhr = new XMLHttpRequest();
var url_user = window.location.href;
var id = '';
var username_prev = '';

if (url_user.includes("edit")){
    var offset = getOffset(url_user);
    var url = 'http://localhost:8080/api/admin/getUser.php?offset=' + offset;
    
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            let response = JSON.parse(this.responseText);
            // console.log(this.responseText);
            response.forEach(function(data) {
                id = data[0];
                username_prev = data[1];
                document.getElementById("username").value = data[1];
                document.getElementById("name").value = data[2];
                document.getElementById("email").value = data[3];
                document.getElementById("password").value = data[4];
                document.getElementById("isAdmin").value = data[5];
                document.getElementById("image_path").value = data[6];
                document.getElementById("total_achievement").value = data[7];
                document.getElementById("total_quest").value = data[8];
                document.getElementById("level").value = data[9];
                document.getElementById("current_experience").value = data[10];
                document.getElementById("target_experience").value = data[11];
            });
        }
    };
    xhr.open("GET", url, true);
    xhr.send();
    // console.log(url);


}

document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("userForm");
    form.addEventListener("submit", function(event) {
        event.preventDefault(); 

        if(url_user.includes("edit")){
            if (document.getElementById("username").value == username_prev) {
                document.getElementById('username').style.borderColor = 'green';
            }
        }

        if (document.getElementById('username').style.borderColor == 'red'){
            console.log("1")
            return;
        }
        if (document.getElementById('password').style.borderColor == 'red'){
            console.log("2")
            return;
        }
        if (document.getElementById('email').style.borderColor == 'red'){
            console.log("3")
            return;
        }

        const userConfirmed = window.confirm("Klik ok untuk melanjutkan");
        if (!userConfirmed) {
            return;
        }
            
        
        const username = document.getElementById("username").value;
        const name = document.getElementById("name").value;
        const email = document.getElementById("email").value;
        const password = document.getElementById("password").value;
        const isAdmin = document.getElementById("isAdmin").value;
        const imagePath = document.getElementById("image_path").value;
        const totalAchievement = document.getElementById("total_achievement").value;
        const totalQuest = document.getElementById("total_quest").value;
        const level = document.getElementById("level").value;
        const currentExperience = document.getElementById("current_experience").value;
        const targetExperience = document.getElementById("target_experience").value;

        
        var formData = new FormData();
        

        formData.append('username', username);
        formData.append('email', email);
        formData.append('password', password);
        formData.append('name', name);
        formData.append('isAdmin', isAdmin);
        formData.append('image_path', imagePath);
        formData.append('total_achievement', totalAchievement);
        formData.append('total_quest', totalQuest);
        formData.append('level', level);
        formData.append('current_experience', currentExperience);
        formData.append('target_experience', targetExperience);

        if ((url_user).includes("add")){
            var url = `${SERVER_PATH}admin/addUser.php`;

            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var response = xhr.responseText.trim();
                    console.log(response);

                    if (response == "success") {
                        alert('berhasil mendaftar akun baru');
                    } else {
                        alert('Gagal mendaftar akun baru');
                    }
                }
            };
            xhr.open('POST', url); 
            xhr.send(formData);

        } 

        else if ((url_user).includes("edit")){
            var url = `${SERVER_PATH}admin/editUser.php`;

            formData.append('id', id);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var response = xhr.responseText.trim();
                    console.log(response);

                    if (response == "success") {
                        alert('berhasil mengedit akun');
                    } else {
                        alert('Gagal mengedit akun');
                    }
                }
            };
            xhr.open('POST', url); 
            xhr.send(formData);

        } 
        
    });
});

function getOffset(url){
    var regex = /[\?&]button=a_edit([^&#]+)/;
    var match = url.match(regex);

if (match) {
    var pageValue = match[1];  
    return pageValue;
} else {
    console.log("No a_edit parameter found in the URL.");
    return "";
}

}