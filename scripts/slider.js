document.addEventListener('DOMContentLoaded', () => {
    // Inicializa la primera imagen como visible
	    document.querySelector('.gallery-item').classList.add('active');
	});

	let currentIndex = 0;

	// Eventos para los botones de navegación
	document.querySelector('.prev-button').addEventListener('click', () => {
	    navigate(-1);
	});

	document.querySelector('.next-button').addEventListener('click', () => {
	    navigate(1);
	});

	function navigate(direction) {
	    const items = document.querySelectorAll('.gallery-item');
	    const totalImages = items.length;

	    // Remueve la clase 'active' de la imagen actual
	    items[currentIndex].classList.remove('active');

	    // Calcula el nuevo índice
	    currentIndex = (currentIndex + direction + totalImages) % totalImages;

	    // Añade la clase 'active' a la nueva imagen
	    items[currentIndex].classList.add('active');

		// cambiamos el texto
		changetext(items[currentIndex].getAttribute("data-texto"));
	}

	//AUTOPLAY
	let autoplayInterval = null;

	function startAutoplay(interval) {
	    // stopAutoplay();  // activa eso para para el autoplay.
	    autoplayInterval = setInterval(() => {
	        navigate(1);  // Navega a la siguiente imagen cada intervalo de tiempo.
	    }, interval);
	}

	function stopAutoplay() {
	    clearInterval(autoplayInterval);
	}

	// Iniciar autoplay con un intervalo de 3 segundos.
	startAutoplay(4000);

	// Opcional: Detener autoplay cuando el usuario interactúa con los botones de navegación.
	document.querySelectorAll('.nav-button').forEach(button => {
	    button.addEventListener('click', stopAutoplay);
	});
