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
        console.log(name);
        console.log(description);

        if (name || description) {
            console.log("name or description is not empty");
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
            xhr.send(`name=${encodeURIComponent(name)}&description=${encodeURIComponent(description)}&id=${encodeURIComponent(id)}`);
        
        }

        document.getElementById("achievement-name-input").value = "";
        document.getElementById("achievement-description-input").value = "";
    });
}
