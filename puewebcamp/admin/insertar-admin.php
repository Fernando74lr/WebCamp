<?php
    include 'funciones/funciones.php';

    if (isset($_POST['agregar-admin'])) {
        /*
            die().
            Se utiliza para imprimir mensajes y salir del script php actual.
            Es equivalente a la función exit () en PHP. Parámetros: esta función 
            acepta solo un parámetro y no es obligatorio pasar.

            die(json_encode($_POST));
        */
        $registro = obtenerUsuarios();
        $usuario = $_POST['usuario'];
        $nombre = $_POST['nombre'];
        $password = $_POST['password'];
        $repetido = 0;

        $usuarios = array();
        /*
            fetch_assoc() nos permite imprimir los resultados o manipularlos
            después de haber hecho una consulta a la Base de Datos.
        */
        while ($user = $registro->fetch_assoc()) {
            if ($user['usuario'] === $usuario) {
                $repetido = 1;
            }
        }
        
        if ($repetido > 0) {
            // No se repiten nombres de usuarios.
            $respuesta = array(
                'respuesta' => 'repetido'
            );
    
            echo json_encode($respuesta);
    
        } else {
            // Se repite un nombre de usuario.
            $opciones = array(
                /*
                    Mientras el costo sea mayor, el password haseado será más difícil de hackear, 
                    pero toma más iteraciones para encriptar y eso es más tiempo y recursos en el servidor.
                */
                'cost' => 12
            );
    
            $hashed_password = password_hash($password, PASSWORD_BCRYPT, $opciones);
    
            try {
                include_once 'funciones/funciones.php';
                /* # Forma de comprobrar que sí se conectó a la Base de Datos.
                    if ($conn->ping()) {
                        echo "Conectado.";
                    } else {
                        echo "No estás conectado.";
                    }
                */
                # Los prepare stmts son más seguros para evitar inyección SQL.
                $stmt = $conn->prepare("INSERT INTO admins (usuario, nombre, password) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $usuario, $nombre, $hashed_password);
                $stmt->execute();
                // Este if se puede cambiar por ($stmt->inser_id > 0) y no agrega el registro (sirvió para el usuario repetido)
                if ($stmt->affected_rows) {
                    $respuesta = array(
                        'respuesta' => 'exito',
                        'id_admin' => $stmt->insert_id
                    );
                } else {
                    $respuesta = array(
                        'respuesta' => 'error'
                    );
                }
                $stmt->close();
                $conn->close();
            } catch (Exception $e) {
                echo "Error " . $e->getMessage();
            }
    
            echo json_encode($respuesta);
        }
    }

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
            $stmt->bind_result($id_admin, $usuario_admin, $nombre_admin, $password_admin);
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
                        $respuesta = array(
                            'respuesta' => 'exitoso',
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