<?php
  // Este script sesiones.php tiene una redirección, por lo tanto, no debe de haber nada antes de esa redirección.
  include_once 'funciones/sesiones.php';
  include_once 'funciones/funciones.php';
  include_once 'templates/header.php';
  include_once 'templates/barra.php';
  include_once 'templates/navegacion.php';
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Crear Administrador</h1>
            <small>Llena el formulario para crear un administrador</small>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <div class="row">
      <div class="col-md-4"></div>
        <!-- Main content -->
        <section class="content">
          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Crear Admin</h3>
            </div>
            <div class="card-body">
              <form role="form" name="crear-admin" id="crear-admin" method="post" action="insertar-admin.php">
                <div class="card-body">
                  <div class="form-group">
                    <label for="nombre">Usuario:</label>
                    <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario">
                  </div>
                  <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Tu nombre completo">
                  </div>
                  <div class="form-group">
                    <label for="password">Password: </label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password para loguearse">
                  </div>
                </div> <!-- /.card-body -->
                <div class="card-footer">
                  <input type="hidden" name="agregar-admin" value="1">
                  <button type="submit" class="btn btn-primary">Añadir</button>
                </div>
              </form>
            </div> <!-- /.card-body -->
          </div> <!-- /.card -->
        </section><!-- /.content -->
      </div>
  </div>
  <!-- /.content-wrapper -->

  <?php 
    include_once 'templates/footer.php';
  ?>


</body>
</html>
