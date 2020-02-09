<?php
    include 'funciones/funciones.php';
    $usuario = $_POST['usuario'];
    $nombre = $_POST['nombre'];
    $password = $_POST['password'];
    $id_registro = $_POST['id_registro'];
    $pagina_actual = $_POST['pagina_actual'];

    if ($_POST['registro'] == 'nuevo') {
        /*
            die().
            Se utiliza para imprimir mensajes y salir del script php actual.
            Es equivalente a la función exit () en PHP. Parámetros: esta función 
            acepta solo un parámetro y no es obligatorio pasar.

            die(json_encode($_POST));
        */
        $registro = obtenerUsuarios();
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
            $admin = array(
                'respuesta' => $user['usuario']
            );
        }
        $usuarios = $admin;
        
    
        /*if ($repetido > 0) {
            // No se repiten nombres de usuarios.
            $respuesta = array(
                'respuesta' => 'repetido'
            );
    
            echo json_encode($respuesta);
    
        } else {*/
            // Se repite un nombre de usuario.
            $opciones = array(
                /*
                    Mientras el costo sea mayor, el password haseado será más difícil de hackear, 
                    pero toma más iteraciones para encriptar y eso es más tiempo y recursos en el servidor.
                */
                'cost' => 12
            );
    
            
            try {
                require_once('funciones/funciones.php');
                /* # Forma de comprobrar que sí se conectó a la Base de Datos.*/
                    /*if ($conn->ping()) {
                        $respuesta = array(
                            'respuesta' => 'conectado'
                        );
                    } else {
                        $respuesta = array(
                            'respuesta' => 'NO conectado'
                        );
                    }*/
                        
                // die(json_encode($respuesta));
                $hashed_password = password_hash($password, PASSWORD_BCRYPT, $opciones);
                # Los prepare stmts son más seguros para evitar inyección SQL., editado = NOW()
                $stmt = $conn->prepare("INSERT INTO `admins` (usuario, nombre, password) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $usuario, $nombre, $hashed_password);
                $stmt->execute();
                // Este if se puede cambiar por ($stmt->insert_id > 0) y no agrega el registro (sirvió para el usuario repetido)
                if ($stmt->affected_rows > 0) {
                    $respuesta = array(
                        'respuesta' => 'exito'
                    );
                } else {
                    $respuesta = array(
                        'respuesta' => 'error1'
                    );
                }
                $stmt->close();
                $conn->close();
            } catch (Exception $e) {
                // echo "Error " . $e->getMessage();
                $respuesta = array(
                    'respuesta' => 'error2'
                );
            }
    
            echo json_encode($respuesta);
        //}
    }

    if ($_POST['registro'] == 'actualizar') {
        $opciones = array(
            'cost' => 12
        );
        try {
            $hash_password = password_hash($password, PASSWORD_BCRYPT, $opciones);

            if ($pagina_actual == 'editar-admin' && $password == '') {
                // Pensar siempre de dónde se toma la hora ¿BD o SERVER?/¿MySQL o PHP?
                $sql = "UPDATE admins SET usuario = ?, nombre = ?, editado = NOW() WHERE id_admin = ?";
            } else {
                $sql = "UPDATE admins SET usuario = ?, nombre = ?, password = ?, editado = NOW() WHERE id_admin = ?";
            }
            $stmt = $conn->prepare($sql);
            if ($password == '') {
                $stmt->bind_param("ssi", $usuario, $nombre, $id_registro);
            } else {
                $stmt->bind_param("sssi", $usuario, $nombre, $hash_password, $id_registro);
            }
            $stmt->execute();
            if ($stmt->affected_rows) {
                $respuesta = array(
                    'respuesta' => 'exito',
                    'id_actualizado' => $stmt->insert_id
                );
            } else {
                $respuesta = array(
                    'respuesta' => 'error'
                ); 
            }
            $stmt->close();
            $conn->close();
        } catch (Exception $e) {
            $respuesta = array(
                'respuesta' => $e->getMessage()
            );
        }

        echo json_encode($respuesta);
    }

    if ($_POST['registro'] == 'eliminar') {
        $id_borrar = $_POST['id'];
        
        try {
            $stmt = $conn->prepare("DELETE FROM admins WHERE id_admin = ?");
            $stmt->bind_param("i", $id_borrar);
            $stmt->execute();
            if ($stmt->affected_rows) {
                $respuesta = array(
                    'respuesta' => 'exito',
                    'id_eliminado' => $id_borrar
                );
            } else {
                $respuesta = array(
                    'respuesta' => 'error'
                );
            }
            $stmt->close();
            $conn->close();
            } catch (Exception $e) {
                $respuesta = array(
                    'respuesta' => $e->getMessage()
                );
            }
    
            echo json_encode($respuesta);
    }
?>