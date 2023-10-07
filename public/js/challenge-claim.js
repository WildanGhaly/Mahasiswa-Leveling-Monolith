document.write('<script src="../../../public/js/api.js"></script>');

function claimFunction(user_id, quest_id){
    console.log("claimFunction() called");
    var url = `${SERVER_PATH}challenge/claim.php`;
    const xhr = new XMLHttpRequest();
    xhr.open('POST', url, true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(this.responseText);
            // const response = JSON.parse(xhr.responseText);
        }
    }; 
    const data = `user_id=${encodeURIComponent(user_id)}&quest_id=${encodeURIComponent(quest_id)}`
    xhr.send(data);
}

function unclaimFunction(user_id, quest_id){
    console.log("unclaimFunction() called");
    var url = `${SERVER_PATH}challenge/unclaim.php`;
    const xhr = new XMLHttpRequest();
    xhr.open('POST', url, true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(this.responseText);
            // const response = JSON.parse(xhr.responseText);
        }
    }; 
    const data = `user_id=${encodeURIComponent(user_id)}&quest_id=${encodeURIComponent(quest_id)}`
    xhr.send(data);
}