<?php
    // conn - conexión
    $conn = new mysqli('localhost', 'root', '123456', 'puewebcamp');

    if ($conn->connect_error) {
        echo $error -> $conn->connect_error;
    }
?>