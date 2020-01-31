<?php

    if(isset($_POST['submit'])): 
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $regalo = $_POST['regalo'];
    $total = $_POST['total_pedido'];
    $fecha = date('Y-m-d h:i:s');
    // Pedidos
    $boletos = $_POST['boletos'];
    $camisas = $_POST['pedido_camisas'];
    $etiquetas = $_POST['pedido_etiquetas'];
    include_once 'includes/funciones/funciones.php';
    $pedido = productos_json($boletos, $camisas, $etiquetas);
    // eventos
    $eventos = $_POST['registro'];
    $registro = eventos_json($eventos);
    try {
        require_once('includes/funciones/bd_conexion.php');
        # Le dice a MySQL que se prepare porque va a haber una inserción a la BD
        # statement
        $stmt = $conn->prepare("INSERT INTO registrados (nombre_registrado, apellido_registrado, email_registrado, fecha_registro, pases_articulos, talleres_registrados, regalo, total_pagado) VALUES (?,?,?,?,?,?,?,?)");
        /*
            bind_param() es usada para enlazar variables para los marcadores de parámetros en la sentencia SQL que fue pasada a prepare(). La cadena types contiene uno o más caracteres los cuales especifican los tipos para las variables enlazadas correspondientes. En este caso son: s->string, i->int.
        */
        $stmt->bind_param("ssssssis", $nombre, $apellido, $email, $fecha, $pedido, $registro, $regalo, $total);
        $stmt->execute();
        $stmt->close();
        $conn->close();
        # Con esto nos aseguramos que no se reinserten los datos en la BD al momento de recargar la página.
        # Como si los datos, una vez que se enviaron a la BD, ya no exitieran más.
        header('Location: validar_registro.php?exitoso=1');
    } catch (\Exception $e) {
        echo $e->getMessage();
    }  
    ?>
<?php endif; ?>

<?php include_once 'includes/templates/header.php'; ?>
    <section class="seccion contenedor">
        <h2>Resumen registro</h2>
        
        <?php if(isset($_GET['exitoso'])): ?>
            <?php if ($_GET['exitoso'] == 1) { ?>
                <h1 style="color:green;">Registro exitoso</h1>
            <?php } ?>
        <?php endif; ?>

    </section>
<?php include_once 'includes/templates/footer.php'; ?>