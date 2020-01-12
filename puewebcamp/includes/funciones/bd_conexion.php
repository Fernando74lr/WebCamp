<?php
    // conn - conexión
    $conn = new mysqli('localhost', 'root', '', 'puewebcamp');

    if ($conn->connect_error) {
        echo $error -> $conn->connect_error;
    }
?>