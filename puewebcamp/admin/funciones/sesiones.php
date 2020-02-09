<?php

    function usuario_autenticado() {
        // Si no hay usuario, que lo mande a loguearse.
        if (!revisar_usuario()) {
            header('Location:login.php');
            exit(); // Siempre debe de ir cuando ocupes header.
        }
    }

    function revisar_usuario() {
        // true si hay usuario, false si no hay usuario.
        // Es una forma de saber si se logueó o no. Hay muchas formas de hacerlo.
        return isset($_SESSION['usuario']);
    }

    // Iniciamos la sesión.
    session_start();
    // Revisemos que esté logueado.
    usuario_autenticado();