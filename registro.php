<!-- header.php -->
<div class="content-header">
    <div class="content-burguer">
        <div class="hamburger" id="hamburger">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
        <span>Menu</span>
        <div class="my_account">
            <label for="my_account_checkbox" class="my_account_label">
                <a href="#" title="Iniciar sesión / Registrarse" aria-label="Iniciar sesion / Registrarse">
                    <i class="fa-regular fa-user"></i>
                </a>
            </label>
            <input type="checkbox" id="my_account_checkbox" class="my_account_checkbox">
            <div class="my_account_component">
                <!-- Formulario aquí -->
                <form id="register" method="post" action="contacto.php" onsubmit="return validar(event)">
                    <span class="title_form_h1">BIENVENIDO</span>
                    <span class="title_form_h2">EXPLORA EL MUNDO MY BMW MOTORRAD</span>
                    <div class="box_mail">
                        <label for="mail" class="name"><span class="red"></span>CORREO ELECTRÓNICO</label>
                        <input type="text" id="mail" name="mail" class="bordermail" onblur="correo(this, '#error01A')">
                        <div id="error01A"></div>
                    </div>
                    <div class="box_password">
                        <label for="password" class="name"><span class="red"></span>CONTRASEÑA</label>
                        <input type="text" id="password" name="password" class="bordermail" onblur="passwordValido(this)">
                        <div id="error02A"></div>
                    </div>
                    <div class="remember">
                        <a href="#">¿HAS OLVIDADO LA CONTRASEÑA?</a>
                    </div>
                    <div class="boton_inicio_sesion">
                        <a href="#"><button class="login">Iniciar sesión</button></a>
                    </div>
                    <div class="boton_registro">
                        <a href="#"><button class="registro">Registro</button></a>
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
                            <li><a href="form_motos.php?tipo=Urban Mobility">Urban Mobility</a></li>
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
        <a href="#"><img src="img/cover/bmw_motorrad_logo.svg" alt="logo-motorrad"></a>
    </div>
</div>

<section>
    <form action="procesar_formulario.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" class="bordermail" required>

        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" class="bordermail" required>

        <label for="fecha-nacimiento">Fecha de Nacimiento:</label>
        <input type="date" id="fecha" name="fecha_nacimiento" class="bordermail" required>

        <label for="correo">Correo:</label>
        <input type="email" id="correo" name="correo" class="bordermail" required>

        <div class="remember">
            <a href="#">¿Has olvidado la contraseña?</a>
        </div>

        <div class="boton_registro">
            <button type="submit" class="registro">Registrarse</button>
        </div>
    </form>
</section>

