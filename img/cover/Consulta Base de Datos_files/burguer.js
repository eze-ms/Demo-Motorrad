document.addEventListener("DOMContentLoaded", function() {
    // Get the hamburger icon and menu elements
    var hamburger = document.getElementById("hamburger");
    var menu = document.getElementById("menu");

    // Add click event listener to the hamburger icon
    hamburger.addEventListener("click", function() {
        // Toggle the 'active' class on the menu to control visibility
        menu.classList.toggle("active");
    });
    
});


