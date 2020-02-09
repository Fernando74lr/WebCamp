<?php

if (isset($_POST['login-admin'])) {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    try {
        include_once 'funciones/funciones.php';
        $stmt = $conn->prepare("SELECT * FROM admins WHERE usuario = ?");
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        // bind_result(). Se utiliza cuando haces una consulta a la BD y te retorna en variables nuevas
        // las variables que quieres ocupar.
        $stmt->bind_result($id_admin, $usuario_admin, $nombre_admin, $password_admin, $editado, $nivel);
        if ($stmt->affected_rows) {
            // El fetch() es el que ya imprime los resultados.
            $existe = $stmt->fetch();
            if ($existe) {
                /* 
                    password_verify(). Comprueba que el hash proporcionado coincida con la contraseña facilitada. Devuelve TRUE si la contraseña y el hash coinciden, o FALSE de lo contrario.
                */
                /* 
                    Parámetros. 
                    password: la contraseña del usuario.
                    hash: un hash creado por password_hash().
                */
                if (password_verify($password, $password_admin)) {
                    session_start();
                    $_SESSION['usuario'] = $usuario_admin;
                    $_SESSION['nombre'] = $nombre_admin;
                    $_SESSION['nivel'] = $nivel;
                    $respuesta = array(
                        'respuesta' => 'exito',
                        'usuario' => $nombre_admin
                    );
                } else {
                    $respuesta = array(
                        'respuesta' => 'password_incorrecto'
                    );
                }
            } else {
                $respuesta = array(
                    'respuesta' => 'no_existe'
                );
            }
        }
        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        echo "Error " . $e->getMessage();
    }

    echo json_encode($respuesta);
}

?>