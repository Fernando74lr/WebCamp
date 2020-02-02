<?php include_once 'includes/templates/header.php'; 

    /*
      Rest nos permite conectarnos al servidor de PayPal en este script,
      pasarle nuestras credenciales para que sepa que somo un usuario, le
      pasamos el paymentID, payerID y con eso identifica el pago. Con esto
      comprobamos que el pago se haya hecho correctamente, validado por 
      PayPal. Es mucho más seguro.
    */
    use PayPal\Rest\ApiContext;
    use PayPal\Api\PaymentExecution;
    use PayPal\Api\Payment;

    require 'includes/paypal.php';
?>
  <section class="seccion contenedor">
    <h2>Resumen registro</h2> 
    <?php
      $paymentId = $_GET['paymentId'];
      # ID que leemos de la URL, este es el que se inserta en la BD cuando se "registra un usuario".
      $id_pago = $_GET['id_pago'];

      // Petición a REST API.

      // PASO 1.
        # Primer Parámetro: Le pasamos por parámetro qué ID (el que nos retorna PayPal en la URL posterior al pago) queremos revisar.
        # Segundo Parámetro: usamos nuestras credenciales que están en el Context para iniciar sesión en el servidor de PayPal, éste se encuentra en PayPal.php (es donde ponemos todas las credenciales).
      $pago = Payment::get($paymentId, $apiContext); # No se necesita instanciar la clase porque podemos acceder de forma estática a sus métodos.

      // PASO 2.
        # Ahora instanciamos de la clase PaymentExecution.
      $execution = new PaymentExecution ();
        # Aquí le decimos qué PayerId es el que queremos comprobar (el que nos retorna PayPal en la URL posterior al pago).
      $execution->setPayerId($_GET['PayerID']);

      // PASO 3. IMPORTANTE.
        # Primer Parámetro: la ejecución.
        # Segundo Parámetro: el context.
        # El resultado tiene la información de la transacción.
      $resultado = $pago->execute($execution, $apiContext); # Esto ya realiza la consulta en el servidor.
      $respuesta = $resultado->transactions[0]->related_resources[0]->sale->state;
/*
      echo "<pre>";
        var_dump($respuesta);
      echo "</pre>";
*/      
      if ($respuesta == "completed") {
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