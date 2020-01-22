<?php include_once 'includes/templates/header.php'; ?>
    <section class="seccion contenedor">
        <h2>Resumen registro</h2>
        <?php if(isset($_POST['submit'])): 
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
            
            ?>
            <pre>
                <?php var_dump($pedido); ?>
            </pre>
            <pre>
                <?php var_dump($registro); ?>
            </pre>
        <?php endif; ?>
    </section>
<?php include_once 'includes/templates/footer.php'; ?>