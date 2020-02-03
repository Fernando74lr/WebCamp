<?php
    include_once 'funciones/funciones.php';
    /* # Forma de comprobrar que sí se conectó a la Base de Datos.
        if ($conn->ping()) {
            echo "Conectado.";
        } else {
            echo "No estás conectado.";
        }
    */
    if (isset($_POST['agregar-admin'])) {
        $usuario = $_POST['usuario'];
        $nombre = $_POST['nombre'];
        $password = $_POST['password'];

        $opciones = array(
            /*
                Mientras el costo sea mayor, el password haseado será más difícil de hackear, 
                pero toma más iteraciones para encriptar y eso es más tiempo y recursos en el servidor.
            */
            'cost' => 12
        );

        $password_hassed = password_hash($password, PASSWORD_BCRYPT, $opciones);
    }

?>