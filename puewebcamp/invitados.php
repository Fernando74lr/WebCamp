<?php include_once 'includes/templates/header.php'; ?>

  <section class="section contenedor">
    <h2>Invitados</h2>
    
    <?php
      try {
        require_once('includes/funciones/bd_conexion.php');
        $sql = "SELECT * FROM `invitados` ";
        $resultado = $conn->query($sql);
      } catch (\Exception $e) {
        echo $e->getMessage();
      }
    ?>

    <section class="invitados contenedor seccion">
        <ul class="lista-invitados clearfix">
        <?php while($invitados = $resultado->fetch_assoc()) { ?>
            <li>
                <div class="invitado">
                <img src="img/<?php echo $invitados['url_imagen']; ?>" alt="imagen invitado 1">
                <p><?php echo $invitados['nombre_invitado'] .''. $invitados['apellido_invitado']?></p>
                </div>
            </li>
        <?php } // Fin while ?>
        </ul>
    </section><!--.invitados-->

    <?php $conn->close(); // Se cierra conexión ?>

  </section>

<?php include_once 'includes/templates/footer.php'; ?>