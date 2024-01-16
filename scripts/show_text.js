function changetext(className) {
    console.log('Entro a changetext con className:', className);

    // Ocultar todos los textos excepto la correspondiente a la imagen
    const allTexts = document.querySelectorAll('.texto-slider');
    allTexts.forEach(text => {
        text.classList.add('hidden');
    });

    // Mostrar el texto asociado a la imagen actual
    const textoSeleccionado = document.querySelector('#' + className);
    if (textoSeleccionado) {
        textoSeleccionado.classList.remove('hidden');
        console.log('Texto mostrado:', className);
    } else {
        console.log('No se encontró ningún texto con el atributo data-texto:', className);
    }
}

