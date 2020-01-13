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
        $sql = "SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, nombre_invitado, apellido_invitado ";
        $sql .= " FROM eventos ";
        $sql .= " INNER JOIN categoria_evento ";
        $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
        $sql .= " INNER JOIN invitados ";
        $sql .= " ON eventos.id_inv = invitados.invitado_id ";
        $sql .= " ORDER BY evento_id ";
        $resultado = $conn->query($sql);
      } catch (\Exception $e) {
        echo $e->getMessage();
      }
    ?>

    <div class="calendario">
      <?php
      // 4.- Imprimir resultados.
      // Imprimir todos los eventos - Forma deseada de hacerlo (while).
        $calendario = array();
        while($eventos = $resultado->fetch_assoc()) { 

          // Obtiene la fecha del evento
          $fecha = $eventos['fecha_evento'];

          $evento = array(
            'titulo' => $eventos['nombre_evento'],
            'fecha' => $eventos['fecha_evento'],
            'hora' => $eventos['hora_evento'],
            'categoria' => $eventos['cat_evento'],
            'eventos' => $eventos['nombre_invitado'] . ' ' . $eventos['apellido_invitado']
          );
          $calendario[$fecha][] = $evento;
          ?>
       <?php } ?>

       <pre>
          <?php var_dump($calendario); ?>
        </pre>
    </div>

    <?php
      // 5.- Aquí se cierra la conexión a la Base de Datos.
      $conn->close();
    ?>

  </section>

<?php include_once 'includes/templates/footer.php'; ?>