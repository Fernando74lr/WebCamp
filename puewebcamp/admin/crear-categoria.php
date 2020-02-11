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
            <h1>Crear Categorías de Eventos</h1>
            <small>Llena el formulario para crear una categoría</small>
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
              <h3 class="card-title">Crear Categorías de Eventos</h3>
            </div>
            <div class="card-body">
              <form role="form" name="guardar-registro" id="guardar-registro" method="post" action="modelo-categoria.php">
                <div class="card-body">
                  <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" id="nombre_categoria" name="nombre_categoria" placeholder="Categoría">
                  </div>
                  <div class="form-group">
                    <label for="">Icono:</label>
                        <input type="text" id="icono" name="icono" class="form-control pull-right" placeholder="fa-icon">
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
