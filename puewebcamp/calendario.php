<?php include_once 'includes/templates/header.php'; ?>

  <section class="section contenedor">
    <h2>Calendario de Eventos</h2>
    
    <?php
      /* Todo el código que escribas de SQL puede ser puesto 
        dentro del PHP, MySql va a hacer que las consultas funcionen
        y PHP se encarga de imprimir los resultados.
      */

      /*
        Pasos para hacer una consulta a la Base de Datos.

        1.- ABRIR conexión a la Base de Datos.
        2.- Escribir la consulta que deseas hacer.
        3.- Realizar la consulta.
        4.- Imprimir resultados con la función fetch_assoc().
        5.- CERRAR la conexión a la Base de Datos.
            |
            |--> ${NombreVariableConexión}->close();
      */
      try {
        // require_once(), al igual que include_once(), es otra forma de incluir un archivo.
        // 1.- Aquí se abre la conexión a la Base de Datos.
        require_once('includes/funciones/bd_conexion.php');
        // 2.- Consulta a la Base de Datos.
        $sql = "SELECT * FROM eventos";
        $resultado = $conn->query($sql);
      } catch (\Exception $e) {
        echo $e->getMessage();
      }
    ?>

    <div class="calendario">
      <?php
      // 4.- Imprimir resultados.
        $eventos = $resultado->fetch_assoc();
      ?>
      <pre>
        <?php
          var_dump($eventos);
        ?>
      </pre>
    </div>

    <?php
      // 5.- Aquí se cierra la conexión a la Base de Datos.
      $conn->close();
    ?>

  </section>

<?php include_once 'includes/templates/footer.php'; ?>