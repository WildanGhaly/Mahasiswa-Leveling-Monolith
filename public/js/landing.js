const openPopupButton = document.getElementById("openPopup");
const closePopupButton = document.getElementById("closePopup");
const popup = document.getElementById("popup");
const texts = document.getElementById("text");

function openPopup() {
    popup.style.display = "block";
    texts.style.display = "none";
    
}

// Function to close the popup
function closePopup() {
    popup.style.display = "none";
    texts.style.display = "block";
}

openPopupButton.addEventListener("click", openPopup);
closePopupButton.addEventListener("click", closePopup);

window.addEventListener("click", (e) => {
    if (e.target === popup) {
        closePopup();
    }
});
