<?php
  // Este script sesiones.php tiene una redirección, por lo tanto, no debe de haber nada antes de esa redirección.
  include_once 'funciones/sesiones.php';
  include_once 'funciones/funciones.php';

  // Verificar que sólo pongan ID's y no palabras o símbolos
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
            <h1>Editar Categorías de Eventos</h1>
            <small>Llena el formulario para editar una categoría</small>
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
              <h3 class="card-title">Editar Categorías de Eventos</h3>
            </div>

            <?php
                $sql = "SELECT * FROM categoria_evento WHERE id_categoria = $id";
                $resultado = $conn->query($sql);
                $categoria = $resultado->fetch_assoc();
            ?>
            <div class="card-body">
              <form role="form" name="guardar-registro" id="guardar-registro" method="post" action="modelo-categoria.php">
                <div class="card-body">
                  <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" id="nombre_categoria" name="nombre_categoria" placeholder="Categoría" value="<?php echo $categoria['cat_evento'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="">Icono:</label>
                        <input type="text" id="icono" name="icono" class="form-control pull-right" placeholder="fa-icon" value="<?php echo $categoria['icono'] ?>">
                  </div>
                </div> <!-- /.card-body -->
                <div class="card-footer">
                  <input type="hidden" name="registro" value="actualizar">
                  <input type="hidden" name="id_registro" value="<?php echo $id ?>">
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
