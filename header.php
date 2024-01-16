<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '0');
    include_once("funciones.php");

    session_start();
    $_SESSION['login'] = 'Este es el login que se pasa a la página login.';

    // Obtener el MODELO de la moto desde la URL
    $modelo = urldecode($_GET['modelo'] ?? '');
    $usuario = urldecode($_GET['contrasenya'] ?? '');

    // LOGIN //
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recuperar los datos del formulario
        $email = trim(htmlspecialchars($_POST["correo"] ?? ''));
        $password = trim(htmlspecialchars($_POST["contrasenya"] ?? ''));
        // $alert = "Este usuario es incorrecto, compruebe sus credenciales";
    
        // Intentar autenticar al usuario después de login
        $autenticado = loginUsuario($email, $password);
        if ($autenticado) {
            // Usuario autenticado, realiza acciones adicionales si es necesario
            // Puedes redirigir al usuario a otra página o mostrar un mensaje de éxito.
            echo "¡Autenticación correcta!";
        } else {
            // La autenticación falló
            $error_message = "error";
        }
    }
?>

<div class="content-header">
    <div class="content-burguer">
        <div class="hamburger" id="hamburger">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
        <span>Menu</span>
        <div class="my_account">
                <a href="#" title="Iniciar sesión / Registrarse" aria-label="Iniciar sesion / Registrarse">
                    <i class="fa-regular fa-user"></i>
                </a>
            </label>
            <div class="my_account_component">
               <form id="register" method="post" action="nuevo_usuario.php" onsubmit="return validar(event)">
                    <span class="title_form_h1">BIENVENIDO</span>
                    <span class="title_form_h2">EXPLORA EL MUNDO MY BMW MOTORRAD</span>
                    <div class="custom_container">
                            <input type="text" id="correo" class="custom_input" placeholder="Correo" name="correo" aria-label="correo" onblur="correoValido(this)">
                            <div id="correo-error" class="error-container">
                                <img src="img/formulario/message-error.svg" alt="imagen_alerta">
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="custom_container">
                            <input type="password" id="contrasenya2" class="custom_input" placeholder="Contraseña "name="contrasenya"  aria-label="contrasenya" onblur="passwordValido(this)">
                            <div id="contrasenya2-error" class="error-container">
                                <img src="img/formulario/message-error.svg" alt="imagen_alerta">
                                <span class="error"></span>
                            </div>
                        </div>
                    <div class="remember">
                        <a href="#">¿HAS OLVIDADO LA CONTRASEÑA?</a>
                    </div>
                    
                    <div class="boton_inicio_sesion">
                        <a href="index.php"><input type="submit" class="login" value="">Login</a>
                    </div>


                    <div class="boton_registro">
                        <a href="nuevo_usuario.php">Registro</a>
                    </div>
                </form>
            </div>
        </div>
        <nav class="menu" id="menu">
            <ul class="nav_items">
                <li class="nav_item"><a href="#">Modelos</a>
                    <div class="container_box">
                        <ul class="modelos-column">
                            <li><a href="form_motos.php">Todos los modelos</a></li>
                            <li><a href="form_motos.php?tipo=Adventure">Adventure</a></li>
                            <li><a href="form_motos.php?tipo=Heritage">Heritage</a></li>
                            <li><a href="form_motos.php?tipo=Touring">Touring</a></li>
                            <li><a href="form_motos.php?tipo=Scooter">Urban Mobility</a></li>
                            <li><a href="form_motos.php?tipo=Roadster">Roadster</a></li>
                            <li><a href="form_motos.php?tipo=Sport">Sport</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav_item-search"><a href="#">Buscar</a></li>
                <li class="nav_item"><a href="#">Personalización</a>
                    <div class="container_box">
                        <ul class="modelos-column">
                            <li><a href="#">Recambios</a></li>
                            <li><a href="#">Productos Care</a></li>
                            <li><a href="#">Accesorios Originales</a></li>
                            <li><a href="#">Accesorios Finder</a></li>
                            <li><a href="#">M Performance</a></li>
                            <li><a href="#">GS Recambios</a></li>
                            <li><a href="#">Configuración</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav_item"><a href="#">Postventa</a>
                    <div class="container_box_2">
                        <ul class="modelos-column_2">
                            <li><a href="#">Semi Nuevo</a></li>
                            <li><a href="#">Ocasión</a></li>
                            <li><a href="#">Renting</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav_item"><a href="#">Comunidad</a>
                    <div class="container_box_2">
                        <ul class="modelos-column_2">
                            <li><a href="#">Eventos</a></li>
                            <li><a href="#">Historias</a></li>
                            <li><a href="#">Newsletter</a></li>
                            <li><a href="#">100 años BMW Motorrad</a></li>
                            <li><a href="#">Escuela de conducción</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav_item"><a href="#">Servicios</a>
                    <div class="container_box">
                        <ul class="modelos-column">
                            <li><a href="#">Solicitud de contactos</a></li>
                            <li><a href="#">Cita Online Taller</a></li>
                            <li><a href="#">Consejos</a></li>
                            <li><a href="#">Manuales</a></li>
                            <li><a href="#">Servicios Financiero</a></li>
                            <li><a href="#">Renting</a></li>
                            <li><a href="#">Otros Servicios</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav_item"><a href="#">Noticias</a></li>
            </ul>
        </nav>
    </div>
    <div class="module_logo"> 
        <a href="index.php"><img src="img/cover/bmw_motorrad_logo.svg" alt="logo-motorrad"></a>
    </div>
</div>

