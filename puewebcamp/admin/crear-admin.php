<?php 
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
              <form role="form" name="crear-id" id="crear-id" method="post" action="insertar-admin.php">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Usuario:</label>
                    <input type="email" class="form-control" id="usuario" name="usuario" placeholder="Usuario">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nombre:</label>
                    <input type="email" class="form-control" id="nombre" name="nombre" placeholder="Tu nombre completo">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password: </label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password para loguearse">
                  </div>
                </div> <!-- /.card-body -->
                <div class="card-footer">
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
