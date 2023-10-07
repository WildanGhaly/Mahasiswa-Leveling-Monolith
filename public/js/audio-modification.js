document.write('<script src="../../../public/js/api.js"></script>');

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById("close-audio-popup").addEventListener("click", function() {
        console.log("close-audio-popup clicked");
        document.getElementById("audio-popup").style.display = "none";
        document.getElementById("overlay").style.display = "none";
        document.getElementById("audio-name-input").value = "";
        document.getElementById("audio-description-input").value = "";
    });
});

function editFunction(id){
    document.getElementById("audio-popup").style.display = "block";
    document.getElementById("overlay").style.display = "block";

    document.getElementById("save-audio-popup").addEventListener("click", function() {
        console.log("save-audio-popup clicked");
        document.getElementById("audio-popup").style.display = "none";
        document.getElementById("overlay").style.display = "none";
        const name          = document.getElementById("audio-name-input").value;
        const description   = document.getElementById("audio-description-input").value;
        console.log(name);
        console.log(description);

        if (name || description) {
            console.log("name or description is not empty");
            var url = `${SERVER_PATH}collection/edit.php`;
            const xhr = new XMLHttpRequest();
            xhr.open('PUT', url, true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    console.log(this.responseText);
                    // const response = JSON.parse(xhr.responseText);
                }
            }; 
            xhr.send(`name=${encodeURIComponent(name)}&description=${encodeURIComponent(description)}&id=${encodeURIComponent(id)}`);
        
        }

        document.getElementById("audio-name-input").value = "";
        document.getElementById("audio-description-input").value = "";
    });
}

function deleteFunction(id) {
    console.log(`deleteFunction(${id}) called`);
    if (!confirm("Delete this audio?")) {
        return;
    }
    var url = `${SERVER_PATH}collection/delete.php/`;
    const xhr = new XMLHttpRequest();
    xhr.open('DELETE', url, true);
    xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(this.responseText);
            window.location.reload();
            // const response = JSON.parse(xhr.responseText);
        }
    };

    const data = `id=${encodeURIComponent(id)}`;
    xhr.send(data);
}