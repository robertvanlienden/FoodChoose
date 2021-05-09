// Look for .hamburger
// On click
document.addEventListener('DOMContentLoaded', init, false);

function init(){
    var hamburger = document.querySelector(".hamburger");
    hamburger.addEventListener("click", function() {
        // Toggle class "is-active"
        hamburger.classList.toggle("is-active");
        // Do something else, like open/close menu
    });
}

