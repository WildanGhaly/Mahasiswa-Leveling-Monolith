document.write('<script src="../../../public/js/api.js"></script>');

document.addEventListener('DOMContentLoaded', function() {
    const uploadButton = document.getElementById('uploadButton');
    const status = document.getElementById('status');
    var url = `${SERVER_PATH}collection/upload.php`;
  
    uploadButton.addEventListener('click', function() {
      const formData = new FormData();
      const fileInput = document.querySelector('input[type="file"]');
      const file = fileInput.files[0];
  
      if (file) {
        formData.append('audioFile', file);
  
        fetch(url, {
          method: 'POST',
          body: formData,
        })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            status.innerHTML = 'Audio file uploaded successfully!';
            uploadAudio();
          } else {
            status.innerHTML = 'Error uploading audio file.';
          }
        })
        .catch(error => {
          console.error('Error:', error);
        });
      }
    });

  });

  function uploadAudio(){
    console.log("uploadAudio() called");
    var fileInput = document.getElementById('audioInput');
    fileInput.click();
  }