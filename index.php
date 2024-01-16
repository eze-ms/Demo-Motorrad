<?php 
    session_start();
    
    // Verificar si la cookie ya existe
    // if (isset($_COOKIE['ultima_visita'])) {
    //     $ultimaVisita = $_COOKIE['ultima_visita'];
    //     echo "Última visita: $ultimaVisita";
    // } else {
    //     echo "Es tu primera visita. ¡Bienvenido!";
    // }

    // // Establecer la cookie con la fecha y hora actual (válida por 30 días)
    // $fechaHoraActual = date("Y-m-d H:i:s");
    // setcookie('ultima_visita', $fechaHoraActual, time() + (30 * 24 * 60 * 60));    
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
    <link rel="stylesheet" type="text/css" href="css/section.css"/>
    <link rel="stylesheet" type="text/css" href="css/footer.css"/>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- FUENTES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;600;800;900&family=Roboto:wght@700&display=swap" rel="stylesheet">
    
</head>
<body>
    <header>
        <?php include 'header.php'; ?>
    </header>

    <main>
        <section id="gallery">
            <?php include 'section_0.php'; ?>  
        </section>
        <section id="section">
            <?php include 'section_1.php'; ?> 
        </section>
        
        <footer id="pageFooter">
            <?php include 'footer.php'; ?>
        </footer>
    </main>
    <script src="scripts/show_text.js"></script>

    <script src="scripts/burguer.js"></script>
    <!-- <script src="scripts/scroll_reveal.js"></script> -->
    <script src="scripts/slideDown.js"></script>
    <script src="scripts/slider.js"></script>
    <script src="scripts/show.js"></script>
    <script src="scripts/validar_formulario.js"></script>
    <script src="scripts/cookie_front.js"></script>


</body>
</html>
