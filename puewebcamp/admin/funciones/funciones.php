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
?>