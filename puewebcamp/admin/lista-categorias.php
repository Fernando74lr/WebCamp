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
            <h1>Listado de Categorías de Eventos</h1>
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
              <h3 class="card-title">Manega las categorías de eventos en esta sección</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="registros" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Icono</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    try {
                      $sql = "SELECT * FROM categoria_evento";
                      $resultado = $conn->query($sql);
                    } catch (Exception $e) {
                      echo 'Error: ' . $e->getMessage();
                    }
                    

                    while ($categoria = $resultado->fetch_assoc()) { ?>
                      <tr>
                        <td><?php echo $categoria['cat_evento']; ?></td>
                        <td><i class="fa <?php echo $categoria['icono']; ?>" style="font-size:1.5em;"></i></td>
                        <td>
                            <a 
                              href="editar-categoria.php?id=<?php echo $categoria['id_categoria'] ?>"
                              class="btn bg-orange btn-flat margin">
                              <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a 
                              href="#"
                              data-id="<?php echo $categoria['id_categoria'] ?>"
                              data-tipo="categoria"
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
                  <th>Icono</th>
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
