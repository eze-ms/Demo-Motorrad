function validar(event) {
    var nombreValido = nombreValido();
    var apellidoValido = apellidoValido();
    var correoValido = correoValido();
    var telefonoValido = telefonoValido();
    var comentarioValido = comentarioValido();
    var passwordValido = passwordValido();
    var validarFechaNacimiento = validarFechaNacimiento();
    var usuarioValido = validarUsuario();

    // Verificar si algún campo no es válido
    if (!nombreValido || !apellidoValido || !correoValido || !telefonoValido || !comentarioValido || !passwordValido || !validarFechaNacimiento || !usuarioValido) {
        event.preventDefault();
        return false; // Evitar el envío del formulario
    }

    return true; // Permitir el envío del formulario si todos los campos son válidos
}

function nombreValido(nombreInput) {
    var nombreInput = document.querySelector('input[name="nombre"]');
    var error = document.querySelector('#'+nombreInput.id+'-error');
    var imagenError = error.querySelector('img');

    if (nombreInput.value === "") {
        error.querySelector('.error').innerText = "El campo no puede estar vacío.";

        error.style.display = 'flex';
        error.style.alignItems = 'center';
        imagenError.style.display = 'inline';

        return false; //no se envía si no se pone nada
    } else {
        error.style.display = 'none';
        imagenError.style.display = 'none';
        
        error.querySelector('.error').innerText = "";
        return true;
    }
}

function apellidoValido(apellidoInput) {

    var apellidoInput = document.querySelector('input[name="apellido"]');
    var error = document.querySelector('#'+apellidoInput.id+'-error');
    var imagenError = error.querySelector('img');

    if (apellidoInput.value === "") {
        error.querySelector('.error').innerHTML = "El campo no puede estar vacío.";
        // Mostrar el elemento de error y la imagen
        error.style.display = 'flex';
        error.style.alignItems = 'center';
        imagenError.style.display = 'inline';
        return false; // No se envía si no se pone nada
    } else {
        // Ocultar el elemento de error y la imagen si no hay error
        error.style.display = 'none';
        imagenError.style.display = 'none';
        
        error.querySelector('.error').innerText = "";
        return true;
    }
}

function correoValido(correoInput) {
    var correoInput = document.querySelector('input[name="correo"]');
    var error = document.querySelector('#'+correoInput.id+'-error');
    var imagenError = error.querySelector('img');

    
    if (correoInput.value === "") {
        error.querySelector('.error').innerText = "El campo no puede estar vacío.";

        error.style.display = 'flex';
        error.style.alignItems = 'center';
        imagenError.style.display = 'inline';

        return false;
    } else {
        var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (re.test(correoInput.value)) {

            error.style.display = 'none';
            imagenError.style.display = 'none';

            error.querySelector('.error').innerText = "";
            return true;
        } else {
            error.innerText = "Correo no válido";
            error.style.display = 'flex';
            error.style.alignItems = 'center';
            imagenError.style.display = 'inline';
            return false;
        }
    }
}

function passwordValido(passwordInput) {
    console.log("Entró a validarPassword");
    console.log("ID del elemento: " + passwordInput.id);

    var error = document.querySelector('#' + passwordInput.id + '-error');
    var imagenError = error.querySelector('img');

    if (passwordInput.value === "") {
        error.querySelector('.error').innerText = "El campo no puede estar vacío.";
        error.style.display = 'flex';
        error.style.alignItems = 'center';
        imagenError.style.display = 'inline';
        return false;
    } else {
        var re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/;

        if (re.test(passwordInput.value)) {
            // La contraseña cumple con los requisitos
            console.log("Contraseña válida");

            error.style.display = 'none';
            imagenError.style.display = 'none';
            error.querySelector('.error').innerText = "";
            return true;
        } else {
            // La contraseña no cumple con los requisitos
            console.log("Contraseña no válida");

            error.querySelector('.error').innerText = "La contraseña no cumple con los requisitos";
            error.style.display = 'flex';
            error.style.alignItems = 'center';
            imagenError.style.display = 'inline';
            return false;
        }
    }
}

function telefonoValido(telefonoInput) {
    var telefonoInput = document.querySelector('input[name="telefono"]');
    var error = document.querySelector('#'+telefonoInput.id+'-error');
    var imagenError = error.querySelector('img');


    if (telefonoInput.value === "") {
        error.querySelector('.error').innerText = "El campo no puede estar vacío.";
        
        error.style.display = 'flex';
        error.style.alignItems = 'center';
        imagenError.style.display = 'inline';

        return false;
    } else {
        var re = /^\d{9}$/; // asumiendo que un número de teléfono tiene 9 dígitos

        if (re.test(telefonoInput.value)) {
            error.innerText = "";
            return true;
        } else {
            error.style.display = 'flex';
            error.style.alignItems = 'center';
            imagenError.style.display = 'inline';
            error.innerText = "El número de teléfono no es válido";

            return false;
        }
    }
}

function comentarioValido(comentarioInput) {
    var error = document.querySelector('#'+comentarioInput.id+'-error');
    var imagenError = error.querySelector('img');

    if (comentarioInput.value === "") {
        error.querySelector('.error').innerText = "El campo no puede estar vacío.";
        
        error.style.display = 'flex';
        error.style.alignItems = 'center';
        imagenError.style.display = 'inline';

        return false;

    } else if (comentarioInput.value.length > 2000) {
        error.innerText = "- El comentario no puede superar los 2000 caracteres.";

        error.style.display = 'flex';
        error.style.alignItems = 'center';
        imagenError.style.display = 'inline';

        return false;
    } else {
        error.innerHTML = "";
        return true;
    }
}

function validarFechaNacimiento(fechaInput) {
    var fecha = document.getElementById('fecha').value;
    

    var error = document.querySelector('#fecha-nacimiento-error');

    if (fecha === "") {
        error.innerText = "Selecciona todos los campos de la fecha de nacimiento.";
        return false;
    } 
}
