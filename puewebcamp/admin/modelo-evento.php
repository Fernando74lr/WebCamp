<?php
    include 'funciones/funciones.php';
    if ($_POST['registro'] == 'nuevo') {
        die(json_encode($_POST));
        $opciones = array(
            'cost' => 12
        );

        try {
            require_once('funciones/funciones.php');
            $hashed_password = password_hash($password, PASSWORD_BCRYPT, $opciones);
            # Los prepare stmts son más seguros para evitar inyección SQL., editado = NOW()
            $stmt = $conn->prepare("INSERT INTO `admins` (usuario, nombre, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $usuario, $nombre, $hashed_password);
            $stmt->execute();
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
            $respuesta = array(
                'respuesta' => 'error2'
            );
        }

        echo json_encode($respuesta);
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