<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '0');
    include_once("funciones.php");

    // Obtener el modelo de la moto desde la URL
    $modelo = urldecode($_GET['modelo'] ?? '');

    try {
        // Obtener la información de la moto seleccionada
        $moto_seleccionada = obtenerMotoSeleccionada($modelo);

        /// Verificar si la moto seleccionada existe ///    ABEL!
        if (!$moto_seleccionada) {
            echo '<script>';
            echo 'alert("No se encontró información para la moto seleccionada.");';
            echo '</script>';
        }
        
    
        // Obtener la ruta del archivo XML de la moto seleccionada
        $xml_file = "xml/info_" . str_replace(' ', '', $modelo) . ".xml";
    
        // Cargar y parsear el XML
        $xml = simplexml_load_file($xml_file);
        // var_dump($xml_file);
    
        // Obtener la ruta de la imagen principal desde el XML
        $ruta_imagen = "";
        if ($xml && isset($xml->imagen_cover)) {
            $ruta_imagen = htmlspecialchars($xml->imagen_cover);
        }
    } catch (Exception $e) {
        error_log("Error al obtener la información de la moto: " . $e->getMessage());
    }

        
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recuperar los datos del formulario
        $nombre = htmlspecialchars($_POST["nombre"] ?? '');
        $apellidos = htmlspecialchars($_POST["apellido"] ?? '');
        $email = htmlspecialchars($_POST["correo"] ?? '');
        $telefono = htmlspecialchars($_POST["telefono"] ?? '');
        $comentarios = htmlspecialchars($_POST["comentario"] ?? '');


        // Llamar a la función para insertar el usuario en la base de datos
        insertarUsuario($nombre, $apellidos, $email, $telefono, $comentarios);

    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bmw Motos</title>

    <!-- External Stylesheets -->
    <link rel="stylesheet" type="text/css" href="css/reset.css"/>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <link rel="stylesheet" type="text/css" href="css/header.css"/>
    <link rel="stylesheet" type="text/css" href="css/producto.css"/>
    <link rel="stylesheet" type="text/css" href="css/footer.css"/>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- FUENTES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;700;900&family=Rubik:wght@600&family=Roboto:wght@300;700&display=swap" rel="stylesheet">
</head>
<body>
    
    <!-- HEADER -->
   <header>
        <?php include 'header.php'; ?>
    </header>
    
    <main>
        <div class="titulo">
            <span>GAMA OFICIAL BMW MOTORRAD</span>
        </div>
        <div class="gama_general">
            <div class="wrapper">
                <ul class="lista_gama">
                <li><a href="form_motos.php">Todos los modelos</a></li>
                    <li><a href="form_motos.php?tipo=Adventure">Adventure</a></li>
                    <li><a href="form_motos.php?tipo=Heritage">Heritage</a></li>
                    <li><a href="form_motos.php?tipo=Touring">Touring</a></li>
                    <li><a href="form_motos.php?tipo=Scooter">Urban Mobility</a></li>
                    <li><a href="form_motos.php?tipo=Roadster">Roadster</a></li>
                    <li><a href="form_motos.php?tipo=Sport">Sport</a></li>
                </ul>
            </div>
        </div>

        <div class="module-desktop">
            <?php
                // Verificar si hay información de la moto seleccionada
                if ($moto_seleccionada && isset($moto_seleccionada[0]['modelo'])) {
                    $modelo = ($moto_seleccionada[0]['modelo']);
                    echo "<ul>";
                    echo "<li class='modelo'>{$modelo}</li>";
                    echo "<li class='datos'><a href='enlace_datos.php'>Datos y equipamiento</a></li>";
                    echo "<li class='personalizacion'><a href='enlace_personalizacion.php'>Personalización</a></li>";
                    echo "</ul>";
                } else {
                    // Mensaje si no se encuentra información
                    echo "<p>No se encontró información para la moto seleccionada.</p>";
                }
            ?>
        </div>
     
        <section class="gallery">
            <div class="content_imagen">
                <?php
                    echo '<img src="' . htmlspecialchars($xml->imagen_cover) . '" alt="imagen_cover">';
                ?>
            </div>
        </section>
       
        <section class="moto-details">
            <div class="wrapper">
                <div class="introduction_modelo">
                    <div class="content_modelo">
                        <h1 class="titulo_modelo"><?php 
                        echo $xml->titulo_modelo; ?></h1>
                        <h2><?php echo $xml->subTitulo_modelo; ?></h2>
                    </div>
                    <div class="content_imagen_1">
                        <?php
                            echo '<div class="texto_modelo">' . $xml->texto_modelo . '</div>';
                            echo '<img src="' . $xml->imagen_principal . '" alt="imagen_principal">';
                        ?>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="moto-disenyo">
            <div class="wrapper">
            <div class="content_disenyo">
                    <h2><?php echo $xml->titulo_disenyo; ?></h2>
                    <div class="box_image">
                        <?php
                            // Iterar sobre los colores
                            foreach ($xml->colores->color as $color) {
                                $imagen_color = (string) $color;
                                $imagen_col = (string) $color['col'];
                                $clase_color = (string) $color['clase'];
                                $color_name = (string) $color['nombre'];
                            ?>
                                <img data-color="<?php echo $color_name; ?>" data-image="<?php echo $imagen_col; ?>" class="<?php echo $clase_color; ?>" src="<?php echo $imagen_color; ?>" alt="<?php echo $imagen_col; ?>">
                            <?php
                        }
                        ?>
                    </div>
                    <div class="box_colores">
                        <ul class="lista_colores">
                            <?php
                                // Iterar sobre los colores para generar enlaces
                                foreach ($xml->colores->color as $color) {
                                    $imagen_col = (string) $color['col'];
                                    $color_name = (string) $color['nombre'];
                            ?>
                                <li>
                                    <a onclick="changeImage('<?php echo $color_name; ?>')">
                                        <img src="<?php echo $imagen_col; ?>" alt="<?php echo $color_name; ?>">
                                    </a>
                                </li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section class="moto-form">
            <div class="wrapper">
                <div class="content-img_form">
                    <div class="imagen_form">
                        <?php
                            echo '<img src="' .htmlspecialchars($xml->imagen_form) . '" alt="imagen_formulario">';
                        ?>
                    </div>
                    <div class="content_form">
                        <div class="box_contacto">
                            <h3>¿Necesitas información?</h3>
                            <p>Déjanos tus datos de contacto y nos pondremos en contacto contigo lo antes posible.</p>
                        </div>
                        <form action="producto.php" method="post" onsubmit="return validar(event)">
                            <div class="custom_container">
                                <input type="text" id="nombre" class="custom_input" name="nombre" placeholder="Nombre" onblur="nombreValido(this)">
                                <div id="nombre-error" class="error-container">
                                    <img src="img/formulario/message-error.svg" alt="imagen_alerta">
                                    <span class="error"></span>
                                </div>
                            </div>
                            <div class="custom_container">
                                <input type="text" id="apellido" class="custom_input" name="apellido" placeholder="Apellido" onblur="apellidoValido(this)">
                                <div id="apellido-error" class="error-container">
                                    <img src="img/formulario/message-error.svg" alt="imagen_alerta">
                                    <span class="error"></span>
                                </div>
                            </div>
                            <div class="custom_container">
                                <input type="password" id="contrasenya" class="custom_input" placeholder="Contraseña "name="contrasenya"  aria-label="password" onblur="passwordValido(this)">
                                <div id="contrasenya-error" class="error-container">
                                    <img src="img/formulario/message-error.svg" alt="imagen_alerta">
                                    <span class="error"></span>
                                </div>
                            </div>
                            <div class="custom_container">
                                <input type="tel" id="telefono" class="custom_input" name="telefono" placeholder="Teléfono" onblur="telefonoValido(this)">
                                <div id="telefono-error" class="error-container">
                                    <img src="img/formulario/message-error.svg" alt="imagen_alerta">
                                    <span class="error"></span>
                                </div>
                            </div>
                            <div class="custom_container">
                                <textarea type="text" id="comentario" name="comentario" placeholder="Comentario" onblur="comentarioValido(this)"></textarea>
                                <div id="comentario-error" class="error-container">
                                    <img src="img/formulario/message-error.svg" alt="imagen_alerta">
                                    <span class="error"></span>
                                </div>
                            </div>

                            <input type="submit" value="Enviar">
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <fotter class="footernavigation">
            <div class="content_footer">
                <div class="box_mail_left">
                    <div class="bloc_letter">
                        <p>Suscríbete a la newsletter MOTORRAD</p>
                        <div class="content_box_letter">
                            <a href="#"><i class="fa-regular fa-envelope"></i>
                            <span class="info">MANTENTE INFORMADO</span></a>
                        </div>
                    </div>
                    <ul>
                        <li class="rrss">
                            <i class="fa-brands fa-facebook"></i>
                            <a href="#">Facebook</a>
                        </li>
                        <li class="rrss">
                            <i class="fa-brands fa-twitter"></i>
                            <a href="#">Twitter</a>
                        </li>
                        <li class="rrss">
                            <i class="fa-brands fa-youtube"></i>
                            <a href="#">Youtube</a>
                        </li>    
                        <li class="rrss">
                            <i class="fa-brands fa-instagram"></i>
                            <a href="#">Instagram</a>
                        </li>
                    </ul>
                </div>
                <div class="box_list_right">
                    <div class="box_categorias_left">
                        <a href="#"><p>BMW Motorrad</p></a>
                        <a href="#"><p>BMW Automóviles</p></a>
                        <a href="#"><p>MINI</p></a>
                        <a href="#"><p>Grupo BMW</p></a>
                        <a href="#"><p>Vehículos de autoridades</p></a>
                        <a href="#"><p>Contacto</p></a>
                        <a href="#"><p>FAQs</p></a>
                    </div>
                    <div class="box_categorias_right">
                        <a href="#"><p>Cookies</p></a>
                        <a href="#"><p> Aviso legal</p></a>
                        <a href="#"><p>Listado de categorías</p></a>
                        <a href="#"><p>Política de Privacidad</p></a>
                    </div>
                </div>
            </div>
        </fotter>
    </main>
    <script src="scripts/burguer.js"></script>
    <script src="scripts/ocultarImgMoto.js"></script>
    <script src="scripts/validar_formulario.js"></script>
</body>
</html>

