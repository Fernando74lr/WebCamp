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
            <h1>Administradores</h1>
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
              <h3 class="card-title">DataTable with default features</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Usuario</th>
                  <th>Nombre</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    try {
                      $sql = "SELECT id_admin, usuario, nombre FROM admins";
                      $resultado = $conn->query($sql);
                    } catch (Exception $e) {
                      echo 'Error: ' . $e->getMessage();
                    }
                    

                    while ($admin = $resultado->fetch_assoc()) { ?>
                      <tr>
                        <td><?php echo $admin['usuario']; ?></td>
                        <td><?php echo $admin['nombre']; ?></td>
                        <td>
                            <a 
                              href="editar-admin.php?id=<?php echo $admin['usuario'] ?>"
                              class="btn bg-orange btn-flat margin">
                              <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a 
                              href="#"
                              data-id="<?php echo $admin['id_admin'] ?>"
                              data-tipo="admin"
                              class="btn bg-maroon btn-flat margin borrar_registro">
                              <i class="fas fa-trash"></i>
                            </a>
                        </td>
                      </tr>
                    <?php } // Fin del While ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Usuario</th>
                  <th>Nombre</th>
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
