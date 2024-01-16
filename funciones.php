<?php
    function conectarBBDD() {
        $ddbb_server = "localhost";
        $ddbb_login = "root";
        $ddbb_pass = "";
        $ddbb_name = "motorrad";
    
        $conexion = new mysqli($ddbb_server, $ddbb_login, $ddbb_pass);
    
        // Verificar errores de conexión
        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }
    
        // Crear la base de datos si no existe
        if (!$conexion->query("CREATE DATABASE IF NOT EXISTS $ddbb_name")) {
            die("Error al crear la base de datos: " . $conexion->error);
        }
    
        // Seleccionar la base de datos
        if (!$conexion->select_db($ddbb_name)) {
            die("Error al seleccionar la base de datos: " . $conexion->error);
        }
    
        return $conexion;
    }
    
    function obtenerListaCompleta($tipo_de_moto) {
        $conexion = conectarBBDD();

        // Preparar la consulta para obtener la lista completa
        $consulta = "SELECT * FROM motos WHERE tipo LIKE '$tipo_de_moto';";
        $resultados = $conexion->query($consulta);

        // Verificar si la ejecución de la consulta fue exitosa
        $lista_completa = array();
        if ($resultados !== false) {
            // Obtener resultados
            while ($row = $resultados->fetch_assoc()) {
                $lista_completa[] = $row;
            }
        } else {
            // Mostrar mensaje de error
            echo "Error al ejecutar la consulta: " . $conexion->error;
        }

        // Cerrar la conexión
        $conexion->close();

        // Devolver la lista completa
        return $lista_completa;
    }

    function filtrarPorModelo($lista, $modelo) {
        $html = "";

        // Filtrar la lista por modelo
        $lista_filtrada = array_filter($lista, function ($motocicleta) use ($modelo) {
            return trim($motocicleta['tipo']) === trim($modelo);
        });

        // Mostrar resultados
        if (!empty($lista_filtrada)) {
            $html .= "<ul>";
            foreach ($lista_filtrada as $row) {
                $html .= "<ul>";
                $html .= "<li>Modelo: {$row['modelo']}</li>";
                $html .= "<li>Potencia: {$row['potencia']} CV</li>";
                $html .= "<li>Cilindrada: {$row['cilindrada']} cc</li>";
                $html .= "<li>Tipo: {$row['tipo']}</li>";
                $html .= "<li>Precio: {$row['precio']} €</li>";
                $html .= "<li><img src='{$row['imagen']}' alt='Imagen de la motocicleta'></li>";
                $html .= "</ul>";
            }
            $html .= "</ul>";
        }

        return $html;
    }

    function obtenerMotoSeleccionada($modelo) {
        $conexion = conectarBBDD();

        // Escapar los caracteres especiales en el valor del parámetro `$modelo`
        $modelo = mysqli_real_escape_string($conexion, $modelo);
    
        //** Preparar la consulta utilizando una declaración preparada **//

        $consulta = $conexion->prepare("SELECT año, modelo, potencia, cilindrada, tipo, precio FROM `motos` WHERE modelo LIKE ?");
        $modelo_parametro = "%$modelo%";
        $consulta->bind_param("s", $modelo_parametro);
    
        // Ejecutar la consulta
        $consulta->execute();
    
        // Vincular los resultados a variables
        $consulta->bind_result($anio, $modelo_bd, $potencia, $cilindrada, $tipo, $precio);
    
        // Obtener resultados
        $resultados = array();
    
        while ($consulta->fetch()) {
            $resultados[] = array(
                'año' => $anio,
                'modelo' => $modelo_bd,
                'potencia' => $potencia,
                'cilindrada' => $cilindrada,
                'tipo' => $tipo,
                'precio' => $precio
            );
        }
    
        // Cerrar la consulta
        $consulta->close();
    
        // Cerrar la conexión
        $conexion->close();
    
        // Devolver el resultado o NULL si no hay información
        return $resultados ? $resultados : NULL;
    }

    function insertarUsuario(NuevoUsuario $usuario) {
        $conexion = conectarBBDD();
    
        $nombre = $conexion->real_escape_string(isset($usuario->nombre) ? trim($usuario->nombre) : '');
        $apellido = $conexion->real_escape_string(isset($usuario->apellido) ? trim($usuario->apellido) : '');
        $fecha_nacimiento = $conexion->real_escape_string(isset($usuario->fecha_nacimiento) ? trim($usuario->fecha_nacimiento) : '');
        $correo = $conexion->real_escape_string(isset($usuario->correo) ? trim($usuario->correo) : '');
        $telefono = $conexion->real_escape_string(isset($usuario->telefono) ? trim($usuario->telefono) : '');
        $comentario = $conexion->real_escape_string(isset($usuario->comentario) ? trim($usuario->comentario) : '');
        $contrasenya = password_hash(isset($usuario->password) ? trim($usuario->password) : '', PASSWORD_DEFAULT);

    
        // Evitar la inyección de SQL usando sentencias preparadas
        $sql = "INSERT INTO usuarios (nombre, apellido, fecha_nacimiento, correo, telefono, contrasenya, comentario) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql);
    
        // Verificar la preparación de la consulta
        if ($stmt === false) {
            die("Error al preparar la consulta: " . $conexion->error);
        }
    
        // Vincular los parámetros
        $stmt->bind_param("sssssss", $nombre, $apellido, $fecha_nacimiento, $correo, $telefono, $contrasenya, $comentario);
    
        // Ejecutar la consulta
        $stmt->execute();
    
        // Verificar errores durante la ejecución
        if ($stmt->error) {
            die("Error al ejecutar la consulta: " . $stmt->error);
        }
    
        // Cerrar la consulta y la conexión
        $stmt->close();
        $conexion->close();
    }
    
    function loginUsuario($correo, $password) {
        $conexion = conectarBBDD();
    
        $correo = $conexion->real_escape_string(trim($correo));
    
        // Obtener la información del usuario por correo
        $sql = "SELECT correo, password FROM usuarios WHERE correo = ?";
        $stmt = $conexion->prepare($sql);
    
        // Verificar la preparación de la consulta
        if ($stmt === false) {
            throw new Exception("Error al preparar la consulta: " . $conexion->error);
        }
    
        // Vincular el parámetro
        $stmt->bind_param("s", $correo);
    
        // Ejecutar la consulta
        $stmt->execute();
    
        // Vincular los resultados a variables
        $stmt->bind_result($correo_bd, $password_bd);
    
        // Obtener resultados
        $stmt->fetch();
    
        $stmt->close();
    
        $conexion->close();
    
        // Verificar si el correo existe y la contraseña es correcta
        if ($correo_bd === $correo && password_verify($password, $password_bd)) {
            return true;
        } else {
            return false;
        }
    }
?>