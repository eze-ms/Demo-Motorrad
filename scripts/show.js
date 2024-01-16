document.addEventListener("DOMContentLoaded", function() {
    var button = document.getElementById("button");
    var menu = document.querySelector(".box_news_section_two");

    button.addEventListener("click", function() {
        menu.classList.toggle("active");
        if (menu.classList.contains("active")) {
            // Hacer scroll al contenedor de las nuevas noticias
            menu.scrollIntoView({ behavior: "smooth" });
            
            // Ocultar el botón (button)
            if (button) {
                button.style.display = "none";
            }
        }
    });
});
