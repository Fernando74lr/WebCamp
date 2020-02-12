<?php
$id = $_GET['id'];

if (!filter_var($id, FILTER_VALIDATE_INT)) {
    die("Error");
}
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
            <h1>Editar Invitados</h1>
            <small>Llena el formulario para editar un invitado</small>
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
              <h3 class="card-title">Editar Invitados</h3>
            </div>
            <?php
                $sql = "SELECT * FROM invitados WHERE invitado_id = $id";
                $resultado = $conn->query($sql);
                $invitado = $resultado->fetch_assoc();
            ?>
            <div class="card-body">
                <!-- Se utiliza siempre que se quieran subir archivos o imágenes: enctype="multipart/form-data" -->
              <form role="form" name="guardar-registro" id="guardar-registro-archivo" method="post" action="modelo-invitado.php" enctype="multipart/form-data">
                <div class="card-body">
                    <!-- Nombre -->
                  <div class="form-group">
                    <label for="nombre_invitado">Nombre:</label>
                    <input type="text" class="form-control" id="nombre_invitado" name="nombre_invitado" placeholder="Nombre" value="<?php echo $invitado['nombre_invitado'];?>">
                  </div>

                  <!-- Apellido -->
                  <div class="form-group">
                    <label for="apellido_invitado">Apellido:</label>
                    <input type="text" class="form-control" id="apellido_invitado" name="apellido_invitado" placeholder="Apellido"value="<?php echo $invitado['apellido_invitado'];?>">
                  </div>

                  <!-- Apellido -->
                  <div class="form-group">
                    <label for="biografia_invitado">Biografía:</label>
                    <textarea class="form-control" name="biografia_invitado" id="biografia_invitado" rows="5" placeholder="Biografía"><?php echo $invitado['descripcion'];?></textarea>
                  </div>

                  <!-- Imagen -->
                  <div class="form-group imagen_actual">
                      <label for="imagen_actual">Imagen Actual:</label>
                      <br>
                      <img
                       src="../img/invitados/<?php echo $invitado['url_imagen']; ?>"
                       width="200"
                       style="border-radius: 5px; -webkit-box-shadow: 0px 5px 5px 0px rgba(0,0,0,0.75);-moz-box-shadow: 0px 5px 5px 0px rgba(0,0,0,0.75);box-shadow: 0px 5px 5px 0px rgba(0,0,0,0.75);">
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
                  <input type="hidden" name="registro" value="actualizar">
                  <input type="hidden" name="id_registro" value="<?php echo $invitado['invitado_id']; ?>">
                  <input type="hidden" name="pagina_actual" value="<?php echo obtenerPaginaActual() ?>">
                  <button type="submit" class="btn btn-primary" id="crear_registro">Guardar</button>
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
