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
            <h1>Crear evento</h1>
            <small>Llena el formulario para crear un evento</small>
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
              <h3 class="card-title">Crear evento</h3>
            </div>
            <div class="card-body">
              <form role="form" name="guardar-registro" id="guardar-registro" method="post" action="modelo-evento.php">
                <div class="card-body">
                  <!-- Título del evento -->
                  <div class="form-group">
                    <label for="nombre">Titulo evento:</label>
                    <input type="text" class="form-control" id="titulo_evento" name="titulo_evento" placeholder="Título del evento">
                  </div>
                  
                  <!-- Categoría del evento -->
                  <div class="form-group">
                    <label for="nombre">Categoría:</label>
                    <select name="categoria_evento" class="form-control seleccionar">
                        <option value="0"> -- Seleccione -- </option>
                        <?php
                            try {
                                $sql = "SELECT * FROM categoria_evento ";
                                $resultado = $conn->query($sql);
                                while ($cat_evento = $resultado->fetch_assoc()) { ?>
                                    <option value="<?php echo $cat_evento['id_categoria']; ?>">
                                        <?php echo $cat_evento['cat_evento']; ?>
                                    </option>
                                <?php }
                            } catch (Exception $e) {
                                echo "Error: " . $e->getMessage();
                            }
                        ?>
                    </select>
                  </div>

                  <!-- Fecha del evento -->
                  <div class="form-group">
                    <label>Fecha evento:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                        </div>
                        <input type="text" placeholder="dd/mm/yyyy" name="fecha_evento" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                    </div>
                  </div>

                  <!-- Hora del evento -->
                  <div class="bootstrap-timepicker">
                    <div class="form-group">
                        <label>Hora:</label>
                        <div class="input-group date" id="timepicker" data-target-input="nearest">
                            <input type="text" name="hora_evento" class="form-control datetimepicker-input" data-target="#timepicker"/>
                            <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="far fa-clock"></i></div>
                            </div>
                        </div>
                        <small>Formato HH:MM AM/PM</small>
                    </div>
                  </div>

                  <!-- H -->
                  <div class="form-group">
                    <label for="nombre">Invitado o Ponente:</label>
                    <select name="invitado" class="form-control seleccionar">
                        <option value="0"> -- Seleccione -- </option>
                        <?php
                            try {
                                $sql = "SELECT invitado_id, nombre_invitado, apellido_invitado FROM invitados ";
                                $resultado = $conn->query($sql);
                                while ($invitados = $resultado->fetch_assoc()) { ?>
                                    <option value="<?php echo $invitados['invitado_id']; ?>">
                                        <?php echo $invitados['nombre_invitado'] . ' ' . $invitados['apellido_invitado']?>
                                    </option>
                                <?php }
                            } catch (Exception $e) {
                                echo "Error: " . $e->getMessage();
                            }
                        ?>
                    </select>
                  </div>
                  <div class="card-footer">
                    <input type="hidden" name="registro" value="nuevo">
                    <input type="hidden" name="pagina_actual" value="<?php echo obtenerPaginaActual() ?>">
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
