function changeImage(className) {
    // Ocultar todas las imágenes excepto la correspondiente al color "black"
    const allImages = document.querySelectorAll('.box_image img');
    allImages.forEach(img => {
        img.className = 'hidden';
       
    });
    // Agregar la clase "active" a la imagen correspondiente al color seleccionado
    const selectedImage = document.querySelector('.box_image [data-color="' + className + '"]');
    if (selectedImage) {
        selectedImage.className = 'active';
    }
}
