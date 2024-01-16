document.addEventListener("DOMContentLoaded", function() {
    var ultimaVisita = getCookie('ultima_visita');
    if (ultimaVisita) {
        console.log("Última visita: " + ultimaVisita);
    }

    // Actualizar la cookie con la fecha y hora actual
    var fechaActual = new Date();
    var fechaFormateada = fechaActual.toISOString();
    document.cookie = "ultima_visita=" + fechaFormateada + "; expires=" + new Date(fechaActual.getTime() + 30 * 24 * 60 * 60 * 1000).toUTCString() + "; path=/";

    // Función para obtener el valor de una cookie por su nombre
    function getCookie(cookieName) {
        var name = cookieName + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var cookieArray = decodedCookie.split(';');
        for(var i = 0; i < cookieArray.length; i++) {
            var cookie = cookieArray[i];
            while (cookie.charAt(0) === ' ') {
                cookie = cookie.substring(1);
            }
            if (cookie.indexOf(name) === 0) {
                return cookie.substring(name.length, cookie.length);
            }
        }
        return null;
    }
});
