<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    session_start();
    require_once("funciones.php"); 
    

    class NuevoUsuario {
        public $nombre;
        public $apellido;
        public $fecha_nacimiento;
        public $correo;
        public $password;
        public $telefono; 
        public $comentario; 


        // Constructor
        public function __construct($nombre, $apellido, $fecha_nacimiento, $correo, $password, $telefono, $comentario) {
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->fecha_nacimiento = $fecha_nacimiento;
            $this->correo = $correo;
            $this->password = $password;
            $this->telefono = $telefono;
            $this->comentario = $comentario;
        }

        // Método mágico __get para acceder a propiedades si se necesitara
        public function __get($propiedad) {
            if (property_exists($this, $propiedad)) {
                return $this->$propiedad;
            } else {
                return null; 
            }
        }
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Obtener datos del formulario
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $fecha_nacimiento = $_POST["fecha_nacimiento"];
        $correo = $_POST["correo"];
        $contrasenya = $_POST["contrasenya"];
        $telefono = isset($_POST["telefono"]) ? trim($_POST["telefono"]) : '';
        $comentario = isset($_POST["comentario"]) ? trim($_POST["comentario"]) : '';
        
        
    
        // Crear objeto NuevoUsuario con los datos del formulario
        $nuevoUsuario = new NuevoUsuario($nombre, $apellido, $fecha_nacimiento, $correo, $contrasenya, $telefono, $comentario);
    
        // Insertar usuario en la base de datos
        insertarUsuario($nuevoUsuario);
    }
    
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de registro</title>

    <!-- External Stylesheets -->
    <link rel="stylesheet" type="text/css" href="css/reset.css"/>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <link rel="stylesheet" type="text/css" href="css/nuevo_usuario.css"/>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- FUENTES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;600;800;900&family=Roboto:wght@700&display=swap" rel="stylesheet">
    
</head>
<body>
    <main>
        <section id="nuevo">
            <div class="form_and_img">
                <div class="content_form">
                    <div class="module_logo">
                        <a href="index.php"><img src="img/cover/bmw_motorrad_logo.svg" alt="logo-motorrad"></a>
                    </div>
                    <h1>FORMULARIO <br>DE REGISTRO ID</h1>
                    <p>¿Ya tiene tu id de BMW? Inicia la sesión <a href="#">aquí</a>.</p>
                    <form action="nuevo_usuario.php" method="post" onsubmit="return validar(event)">
                        <div class="custom_container">
                            <label for="nombre">Nombre:</label>
                            <input type="text" id="nombre" class="custom_input" name="nombre" onblur="nombreValido(this)">
                            <div id="nombre-error" class="error-container">
                                <img src="img/formulario/message-error.svg" alt="imagen_alerta">
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="custom_container">
                            <label for="apellido">Apellidos</label>
                            <input type="text" id="apellido" class="custom_input" name="apellido" onblur="apellidoValido(this)">
                            <div id="apellido-error" class="error-container">
                                <img src="img/formulario/message-error.svg" alt="imagen_alerta">
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="custom_container">
                            <label for="fecha-nacimiento">Fecha de Nacimiento</label>
                            <input type="date" name="fecha_nacimiento" id="fecha" class="custom_input" onblur="validarFechaNacimiento(this)">

                            <div id="fecha-nacimiento-error" class="error-container">
                                <img src="img/formulario/message-error.svg" alt="imagen_alerta">
                                <span class="error"></span>
                            </div>
                        </div>

                        <div class="custom_container">
                            <label for="correo">Correo electrónico</label>
                            <input type="text" id="correo" class="custom_input" name="correo" onblur="correoValido(this)">
                            <div id="correo-error" class="error-container">
                                <img src="img/formulario/message-error.svg" alt="imagen_alerta">
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="custom_container">
                            <label for="contrasenya">Contraseña</label>
                            <input type="password" id="contrasenya" class="custom_input" name="contrasenya" onblur="passwordValido(this)">
                            <div id="contrasenya-error" class="error-container">
                                <img src="img/formulario/message-error.svg" alt="imagen_alerta">
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="boton_registro">
                        <button type="submit" class="registro">Registrarse</button>
                        </div>
                    </form>
                </div>
                <div class="imagen_form"></div>
            </div>
        </section>
    </main>
    <script src="scripts/validar_formulario.js"></script>
</body>
</html>