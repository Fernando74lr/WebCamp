<?php
    require_once('../includes/funciones/bd_conexion.php');

    /* Obtiene todos los usuarios */
    function obtenerUsuarios() {
        include '../includes/funciones/bd_conexion.php';
        try {
            return $conn->query('SELECT usuario FROM admins');
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            return false;  
        }
    }

    // Esta función obtiene el nombre del archivo donde se está llamando.
    function obtenerPaginaActual() {
        # basename: nos regresará el nombre del archivo seleccionado.
        # SERVER: accede a los archivos donde está hospedado.
        # PHP_SELF: nos regresa el archivo actual.
        $archivo = basename($_SERVER['PHP_SELF']);
        # Reemplaza el '.php' por nada.
        $pagina = str_replace(".php", "", $archivo);

        return $pagina;
    }
?>