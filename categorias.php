<?php
    function mostrarTodosLosModelos($lista_filtrada) {
        $shownCategories = array();
        echo "<ul class='lista_motos'>";
        foreach ($lista_filtrada as $motocicleta) {
        // Comprueba si el modelo ha cambiado
            if ($currentModel !== $motocicleta['modelo']) {
                echo "<li>";
                echo "<ul class='modelo'>";
                echo "<li>";
                echo "<li><img src='{$motocicleta['imagen']}' alt='Imagen de la motocicleta'></li>";
                echo "<li class='anyo'>{$motocicleta['año']}</li>"; // Nueva línea para el año
                echo "<li class='titulo_moto'>{$motocicleta['modelo']}</li>";
                echo "<li class='precio'>Desde <strong>{$motocicleta['precio']} €</strong></li>";
                $pagina_ficha = "{$motocicleta['modelo']}.php";
                echo "<li><a href='producto.php?modelo=" . urlencode($motocicleta['modelo']) . "'><button class='ficha'>Ver ficha</button></a></li>";
                echo "</ul>";
                echo "</li>";
                $currentModel = $motocicleta['modelo'];
            }
        }
        echo "</ul>";
    }

    function mostrarPorGama($lista_filtrada, $currentCategory) {
        usort($lista_filtrada, function ($a, $b) {
            return strcmp($a['tipo'], $b['tipo']);
        });

        $currentCategory = null;
        foreach ($lista_filtrada as $motocicleta) {
            // Comprueba si la categoría ha cambiado
            if ($currentCategory !== $motocicleta['tipo']) {
                // Si es una nueva categoría, cierra la anterior y comienza una nueva
                if ($currentCategory !== null) {
                    echo "</ul></li>"; // Cierra la lista y el elemento de lista
                }
                echo "<li>";
                // echo "<h3>{$motocicleta['tipo']}</h3>";
                echo "<ul class='lista_motos'>";
                $currentCategory = $motocicleta['tipo'];
            }
            echo "<li>";
            echo "<ul class='modelo'>";
            echo "<li><img src='{$motocicleta['imagen']}' alt='Imagen de la motocicleta'></li>";
            echo "<li class='anyo'>{$motocicleta['año']}</li>"; // Nueva línea para el año
            echo "<li class='titulo_moto'>{$motocicleta['modelo']}</li>";
            echo "<li class='precio'>Desde <strong>{$motocicleta['precio']} €</strong></li>";
            $pagina_ficha = "{$motocicleta['modelo']}.php";
            echo "<li><a href='producto.php?modelo=" . urlencode($motocicleta['modelo']) . "'><button class='ficha'>Ver ficha</button></a></li>";
            echo "</ul>";
            echo "</li>";
        }
    }
?>
