<?php
  // Este script sesiones.php tiene una redirección, por lo tanto, no debe de haber nada antes de esa redirección.
  include_once 'funciones/sesiones.php';
  include_once 'funciones/funciones.php';
  $id = $_GET['id'];

  // filter_var().
  // Parámetro 1:lo que quieres comprobar
  // Parámetro 2: qué es lo que quieres validar.
  if (!filter_var($id, FILTER_VALIDATE_INT)) {
    die("Error");
  }

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
            <h1>Editar Administrador</h1>
            <small>Llena el formulario para editar el administrador</small>
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
              <h3 class="card-title">Editar Admin</h3>
            </div>
            <div class="card-body">
              <?php
                $sql = "SELECT * FROM admins WHERE id_admin = $id";
                $resultado = $conn->query($sql);
                $admin = $resultado->fetch_assoc();
              ?>
              <form role="form" name="guardar-registro" id="guardar-registro" method="post" action="modelo-admin.php">
                <div class="card-body">
                  <div class="form-group">
                    <label for="nombre">Usuario:</label>
                    <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario" value="<?php echo $admin['usuario']?>">
                  </div>
                  <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Tu nombre completo" value="<?php echo $admin['nombre']?>">
                  </div>
                  <div class="form-group">
                    <label for="password">Password: </label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Escribe para cambiar tu contraseña">
                    <small>Deja el campo en blanco si no quieres cambiar la contraseña</small>
                  </div>
                </div> <!-- /.card-body -->
                <div class="card-footer">
                <input type="hidden" name="registro" value="actualizar">
                  <input type="hidden" name="id_registro" value="<?php echo $id ?>">
                  <input type="hidden" name="pagina_actual" value="<?php echo obtenerPaginaActual() ?>">
                  <button type="submit" class="btn btn-primary">Guardar</button>
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
