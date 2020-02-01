<?php include_once 'includes/templates/header.php'; 

?>
  <section class="seccion contenedor">
    <h2>Resumen registro</h2> 
    <?php
      $resultado = $_GET['exito'];
      $paymentId = $_GET['paymentId'];
      # ID que leemos de la URL, este es el que se inserta en la BD cuando se "registra un usuario".
      $id_pago = $_GET['id_pago']; 
      
      if ($resultado == "true") {
        echo "<div class='resultado correcto'>";
        echo "El pago se realizó correctamente.<br>";
        echo "El ID es {$paymentId}";
        echo "</div>";
        require_once('includes/funciones/bd_conexion.php');
        $stmt = $conn->prepare("UPDATE registrados SET pagado = ? WHERE ID_registrado = ?");
        $pagado = 1;
        $stmt->bind_param('ii', $pagado, $id_pago);
        $stmt->execute();
        $stmt->close();
        $conn->close(); // MySql automáticamente cierra la conexión, pero nosotros lo hacemos de por sí.
      } else {
        echo "<div class='resultado error'>";
        echo "El pago no se realizó.";
        echo "</div>";
      }
    ?>
  </section>
<?php include_once 'includes/templates/footer.php'; ?>