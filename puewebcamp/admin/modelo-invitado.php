<?php
    include_once 'funciones/funciones.php';
    $nombre = $_POST['nombre_invitado'];
    $apellido = $_POST['apellido_invitado'];
    $biografia = $_POST['biografia_invitado'];
    $id_registro = $_POST['id_registro'];

    if ($_POST['registro'] == 'nuevo') {
        /*$respuesta = array(
            'post' => $_POST,
            'file' => $_FILES
        );
        die(json_encode($respuesta));
        */

        $directorio = "../img/invitados/"; // Importante poner una '/' al final.

        if (!is_dir($directorio)) { // is_dir() verifica que un directorio exista.
            // Dirección para crear el directorio nuevo, 0755 es un permiso y true es que será recursivo.
            // Que sea recursivo significa que le dará los permisos de ahora a todos los archivos nuevos, sino, tendríamos que asignarlos uno por uno
            mkdir($directorio, 0755, true); // crea un directorio.
        }

        // RECOMENDACIÓN: ALMACENAR ARCHIVOS EN SERVIDOR Y SÓLO NOMBRES DE ARCHIVOS EN BASE DE DATOS.
        // move_uploaded_file($path, $new_path) Mueve los archivos desde una ubicación temporal a la ubicación final.
        /*
            file:
                archivo_imagen:
                    * name: "2.jpg"
                    type: "image/jpeg"
                    * tmp_name: "C:\Bitnami\wampstack-7.2.26-0\php\tmp\phpB025.tmp"
                    [...]

        */
        if (move_uploaded_file($_FILES['archivo_imagen']['tmp_name'], $directorio . $_FILES['archivo_imagen']['name'])) {
            $imagen_url = $_FILES['archivo_imagen']['name'];
            $imagen_resultado = "Se subió correctamente";
        } else {
            $respuesta = array(
                'respuesta' => error_get_last() // Obtiene el último error registrado al intentar subir el archivo.
            );
        }
        try {
            $stmt = $conn->prepare("INSERT INTO invitados (nombre_invitado, apellido_invitado, descripcion, url_imagen) VALUES (?,?,?,?)");
            $stmt->bind_param('ssss', $nombre, $apellido, $biografia, $imagen_url);
            $stmt->execute();
            $id_insertado = $stmt->insert_id;
            if ($stmt->affected_rows > 0) {
                $respuesta = array(
                    'respuesta' => 'exito',
                    'id_insertado' => $id_insertado,
                    'resultado_imagen' => $imagen_resultado
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

        die(json_encode($respuesta));
    }

    if ($_POST['registro'] == 'actualizar') {
        $directorio = "../img/invitados/"; // Importante poner una '/' al final.

        if (!is_dir($directorio)) {
            mkdir($directorio, 0755, true); // crea un directorio.
        }

        if (move_uploaded_file($_FILES['archivo_imagen']['tmp_name'], $directorio . $_FILES['archivo_imagen']['name'])) {
            $imagen_url = $_FILES['archivo_imagen']['name'];
            $imagen_resultado = "Se subió correctamente";
        } else {
            $respuesta = array(
                'respuesta' => error_get_last() // Obtiene el último error registrado al intentar subir el archivo.
            );
        }

        try {
            if ($_FILES['archivo_imagen']['size'] > 0) {
                $stmt = $conn->prepare("UPDATE invitados SET nombre_invitado = ?, apellido_invitado = ?, descripcion = ?, url_imagen = ? WHERE invitado_id = ?");
                $stmt->bind_param('ssssi', $nombre, $apellido, $biografia, $imagen_url, $id_registro);
            } else {
                $stmt = $conn->prepare("UPDATE invitados SET nombre_invitado = ?, apellido_invitado = ?, descripcion = ? WHERE invitado_id = ?");
                $stmt->bind_param('sssi', $nombre, $apellido, $biografia, $id_registro);
            }
            $estado = $stmt->execute();
            if ($estado) {
                $respuesta = array(
                    'respuesta' => 'exito',
                    'id_actualizado' => $id_registro,
                    'actualizado' => 'actualizado'
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

        die(json_encode($respuesta));
    }

    if ($_POST['registro'] == 'eliminar') {

        $id_borrar = $_POST['id'];
        
        try {
            $stmt = $conn->prepare("DELETE FROM categoria_evento WHERE id_categoria = ?");
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