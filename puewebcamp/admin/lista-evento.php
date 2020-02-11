<?php
  // Este script sesiones.php tiene una redirección, por lo tanto, no debe de haber nada antes de esa redirección.
  include_once 'funciones/sesiones.php';
  include_once 'funciones/funciones.php';
  include_once 'templates/header.php';
  include_once 'templates/barra.php';
  include_once 'templates/navegacion.php';
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Listado de Eventos</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Manega los eventos en esta sección</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="registros" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Fecha</th>
                  <th>Hora</th>
                  <th>Categoría</th>
                  <th>Invitado</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    try {
                      $sql = "SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, nombre_invitado, apellido_invitado ";
                      $sql .= " FROM eventos ";
                      // Unir tabla categoria_evento
                      $sql .= " INNER JOIN categoria_evento ";
                      // En qué columnas (mapear columnas a tabla actual 'eventos')
                      $sql .= " ON eventos.id_cat_evento=categoria_evento.id_categoria ";
                      // Unir tabla invitados
                      $sql .= " INNER JOIN invitados ";
                      // En qué columnas (mapear columnas a tabla actual 'eventos')
                      $sql .= " ON eventos.id_inv=invitados.invitado_id ";
                      $sql .= " ORDER BY evento_id ";
                      $resultado = $conn->query($sql);
                    } catch (Exception $e) {
                      echo 'Error: ' . $e->getMessage();
                    }
                    

                    while ($eventos = $resultado->fetch_assoc()) { ?>
                      <tr>
                        <td><?php echo $eventos['nombre_evento']; ?></td>
                        <td><?php echo $eventos['fecha_evento']; ?></td>
                        <td><?php echo $eventos['hora_evento']; ?></td>
                        <td><?php echo $eventos['cat_evento']; ?></td>
                        <td><?php echo $eventos['nombre_invitado'] . ' ' . $eventos['apellido_invitado']; ?></td>
                        <td>
                            <a 
                              href="editar-evento.php?id=<?php echo $eventos['evento_id'] ?>"
                              class="btn bg-orange btn-flat margin">
                              <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a 
                              href="#"
                              data-id="<?php echo $eventos['evento_id'] ?>"
                              data-tipo="evento"
                              class="btn bg-maroon btn-flat margin borrar_registro">
                              <i class="fas fa-trash"></i>
                            </a>
                        </td>
                      </tr>
                    <?php } // Fin del While ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Nombre</th>
                  <th>Fecha</th>
                  <th>Hora</th>
                  <th>Categoría</th>
                  <th>Invitado</th>
                  <th>Acciones</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  </div>

  <?php 
    include_once 'templates/footer.php';
  ?>


</body>
</html>
