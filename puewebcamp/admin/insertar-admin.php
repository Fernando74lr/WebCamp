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

?>