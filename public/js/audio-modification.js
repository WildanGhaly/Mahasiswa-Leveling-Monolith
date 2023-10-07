document.write('<script src="../../../public/js/api.js"></script>');

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById("close-audio-popup").addEventListener("click", function() {
        console.log("close-audio-popup clicked");
        document.getElementById("audio-popup").style.display = "none";
        document.getElementById("overlay").style.display = "none";
    });

    document.getElementById("save-audio-popup").addEventListener("click", function() {
        console.log("save-audio-popup clicked");
        document.getElementById("audio-popup").style.display = "none";
        document.getElementById("overlay").style.display = "none";
    });
});

function editFunction(id){
    console.log(`editFunction(${id}) called`);
    var url = `${SERVER_PATH}collection/edit.php?id=${id}`;
    document.getElementById("audio-popup").style.display = "block";
    document.getElementById("overlay").style.display = "block";
}