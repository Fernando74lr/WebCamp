<?php
    include_once 'funciones/funciones.php';
    $titulo = $_POST['titulo_evento'];
    $categoria_id = $_POST['categoria_evento'];
    $invitado_id = $_POST['invitado'];

    // Obtener la fecha
    $fecha = $_POST['fecha_evento'];
    $fecha_separada = explode("/", $fecha);
    $fecha_formateada = $fecha_separada[2] . '-' . $fecha_separada[1] . '-' . $fecha_separada[0];

    // Hora y ID
    $hora = $_POST['hora_evento'];
    $id_registro = $_POST['id_registro'];

    if ($_POST['registro'] == 'nuevo') {
        try {
            $stmt = $conn->prepare("INSERT INTO eventos (nombre_evento, fecha_evento, hora_evento, id_cat_evento, id_inv) VALUES (?,?,?,?,?) ");
            $stmt->bind_param('sssii', $titulo, $fecha_formateada, $hora, $categoria_id, $invitado_id);
            $stmt->execute();
            $id_insertado = $stmt->insert_id;
            if ($stmt->affected_rows > 0) {
                $respuesta = array(
                    'respuesta' => 'exito',
                    'id_insertado' => $id_insertado
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

        try {
            $stmt = $conn->prepare("UPDATE eventos SET nombre_evento = ?, fecha_evento = ?, hora_evento = ?, id_cat_evento = ?, id_inv = ?, editado = NOW() WHERE evento_id = ?");
            $stmt->bind_param('sssiii', $titulo, $fecha_formateada, $hora, $categoria_id, $invitado_id, $id_registro);
            $stmt->execute();
            if ($stmt->affected_rows) {
                $respuesta = array(
                    'respuesta' => 'exito',
                    'id_actualizado' => $id_registro
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