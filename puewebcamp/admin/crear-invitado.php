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
            <h1>Crear Invitados</h1>
            <small>Llena el formulario para crear un invitado</small>
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
              <h3 class="card-title">Crear Invitados</h3>
            </div>
            <div class="card-body">
              <form role="form" name="guardar-registro" id="guardar-registro" method="post" action="modelo-categoria.php">
                <div class="card-body">
                    <!-- Nombre -->
                  <div class="form-group">
                    <label for="nombre_invitado">Nombre:</label>
                    <input type="text" class="form-control" id="nombre_invitado" name="nombre_invitado" placeholder="Nombre">
                  </div>

                  <!-- Apellido -->
                  <div class="form-group">
                    <label for="apellido_invitado">Apellido:</label>
                    <input type="text" class="form-control" id="apellido_invitado" name="apellido_invitado" placeholder="Apellido">
                  </div>

                  <!-- Apellido -->
                  <div class="form-group">
                    <label for="biografia_invitado">Apellido:</label>
                    <textarea class="form-control" name="biografia_invitado" id="biografia_invitado" rows="8" placeholder="Biografía"></textarea>
                  </div>

                  <!-- Imagen -->
                  <div class="form-group">
                    <label for="imagen_invitado">Imagen</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="archivo_imagen" class="custom-file-input" id="imagen_invitado">
                        <label class="custom-file-label" for="imagen_invitado">Elegir imagen</label>
                      </div>
                    </div>
                  </div>
                </div> <!-- /.card-body -->
                <div class="card-footer">
                  <input type="hidden" name="registro" value="nuevo">
                  <input type="hidden" name="pagina_actual" value="<?php echo obtenerPaginaActual() ?>">
                  <button type="submit" class="btn btn-primary" id="crear_registro">Añadir</button>
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
