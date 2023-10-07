document.write('<script src="../../../public/js/api.js"></script>');

const table = document.querySelector("table");

table.addEventListener("click", function(event) {
    if (event.target.tagName === "BUTTON") {
        
        const buttonId = event.target.id;
        var xhr = new XMLHttpRequest();

        if (buttonId.includes('edit')){
            window.location.href = '../admin-Hall-of-Fame?button=' + buttonId; 
        } else {

            const userConfirmed = window.confirm("Klik ok untuk melanjutkan");

            if (!userConfirmed) {
                return;
            }

            console.log(buttonId);
            var offset = getOffset(buttonId);
            var url = 'http://localhost:8080/api/admin/getUser.php?offset=' + offset;

            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    let response = JSON.parse(this.responseText);
                    var formData = new FormData();
                    response.forEach(function(data) {
                        formData.append('id', data[0]);
                        console.log(data[0]);
                    });
                    url = 'http://localhost:8080/api/admin/deleteUser.php';

                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === 4 && xhr.status === 200) {
                            var response = xhr.responseText.trim();
                            console.log(response);
                            if (response == "success") {
                                alert('berhasil menghapus akun');
                                location.reload();
                            } else {
                                alert('Gagal menghapus akun');
                            }
                        }
                    };
                    xhr.open('POST', url); 
                    xhr.send(formData);

                }

            };


            xhr.open("GET", url, true);
            xhr.send();
        }

    }
});

function getOffset(url){
    var regex = /a_delete([^&#]+)/;
    var match = url.match(regex);

if (match) {
    var pageValue = match[1];  
    return pageValue;
} else {
    console.log("No a_delete parameter found in the URL.");
    return "";
}

}