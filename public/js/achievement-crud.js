document.write('<script src="../../../public/js/api.js"></script>');

function editFunction(id){
    document.getElementById("achievement-popup").style.display = "block";
    document.getElementById("overlay").style.display = "block";

    document.getElementById("save-achievement-popup").addEventListener("click", function() {
        console.log("save-achievement-popup clicked");
        document.getElementById("achievement-popup").style.display = "none";
        document.getElementById("overlay").style.display = "none";
        const name          = document.getElementById("achievement-name-input").value;
        const description   = document.getElementById("achievement-description-input").value;
        const threshold     = document.getElementById("achievement-threshold-input").value;
        const difficulty    = document.getElementById("achievement-difficulty-input").value;
        const type          = document.getElementById("achievement-type-input").value;

        console.log(name);
        console.log(description);
        console.log(threshold);
        console.log(difficulty);
        console.log(type);

        if (name || description || threshold) {
            console.log("name or description or threshold is not empty");
            var url = `${SERVER_PATH}achievement/edit.php`;
            const xhr = new XMLHttpRequest();
            xhr.open('PUT', url, true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    console.log(this.responseText);
                    // const response = JSON.parse(xhr.responseText);
                }
            }; 
            const data = `name=${encodeURIComponent(name)}&description=${encodeURIComponent(description)}&threshold=${encodeURIComponent(threshold)}&difficulty=${encodeURIComponent(difficulty)}&type=${encodeURIComponent(type)}&id=${encodeURIComponent(id)}`
            xhr.send(data);
        }

        document.getElementById("achievement-name-input").value = "";
        document.getElementById("achievement-description-input").value = "";
        document.getElementById("achievement-threshold-input").value = "";
    });

    document.getElementById("close-achievement-popup").addEventListener("click", function() {
        console.log("close-achievement-popup clicked");
        document.getElementById("achievement-popup").style.display = "none";
        document.getElementById("overlay").style.display = "none";
        document.getElementById("achievement-name-input").value = "";
        document.getElementById("achievement-description-input").value = "";
        document.getElementById("achievement-threshold-input").value = "";
    });
}

function deleteFunction(id) {
    console.log(`deleteFunction(${id}) called`);
    if (!confirm("Delete this achievement?")) {
        return;
    }
    var url = `${SERVER_PATH}achievement/delete.php/`;
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
    const data = `id=${encodeURIComponent(id)}`
    xhr.send(data);
}