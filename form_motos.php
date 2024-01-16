<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    include_once("funciones.php");
    include_once("categorias.php");

    $filtro = "%";

    if ($_SERVER["REQUEST_METHOD"] === "GET") {
        $filtro = isset($_GET['tipo']) ? trim($_GET['tipo']) : '%';
    }

    $lista_filtrada = obtenerListaCompleta($filtro);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta Base de Datos</title>
    <!-- External Stylesheets -->
    <link rel="stylesheet" type="text/css" href="css/reset.css"/>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <link rel="stylesheet" type="text/css" href="css/header.css"/>
    <link rel="stylesheet" type="text/css" href="css/form_motos.css"/>
    <link rel="stylesheet" type="text/css" href="css/footer.css"/>

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- FUENTES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;600;800;900&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
    <header>
        <?php include 'header.php'; ?>
    </header>

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

    <div class="content-section">
        <div class="wrapper">
            <div class="content-form">
            <div class="content-tittle"> 
                <?php
                    $category = isset($_GET['tipo']) ? $_GET['tipo'] : '';
                    if (!$category) {
                        echo "<h1>TODOS LOS MODELOS</h1>";  
                        echo "<h2>GAMA OFICIAL BMW MOTORRAD</h2>";
                                  
                    } else {
                        echo "<h1>Gama $category</h1>";
                    }
                    
                ?>
            </div>
                <div class="content-lista">
                    <?php
                        if (!$category) {
                            mostrarTodosLosModelos($lista_filtrada);
                        } else {
                            mostrarPorGama($lista_filtrada, $currentCategory);
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <section class="footernavigation">
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
    </section>
    
<script src="scripts/burguer.js"></script>
</body>
</html>

