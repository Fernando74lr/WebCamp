<?php
  $id = $_GET['id'];
  if (!filter_var($id, FILTER_VALIDATE_INT)) {
    die("Error");
  } else {
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
            <h1>Editar evento</h1>
            <small>Llena el formulario para editar un evento</small>
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
              <h3 class="card-title">Editar evento</h3>
            </div>
            <div class="card-body">
              <?php
                $sql = "SELECT * FROM eventos WHERE evento_id = $id";
                $resultado = $conn->query($sql);
                $evento = $resultado->fetch_assoc();
              ?>
              <form role="form" name="guardar-registro" id="guardar-registro" method="post" action="modelo-evento.php">
                <div class="card-body">
                  <!-- Título del evento -->
                  <div class="form-group">
                    <label for="nombre">Titulo evento:</label>
                    <input type="text" class="form-control" id="titulo_evento" name="titulo_evento" placeholder="Título del evento" value="<?php echo $evento['nombre_evento']; ?>">
                  </div>
                  
                  <!-- Categoría del evento -->
                  <div class="form-group">
                    <label for="nombre">Categoría:</label>
                    <select name="categoria_evento" class="form-control seleccionar">
                        <option value="0"> -- Seleccione -- </option>
                        <?php
                            try {
                              $categoria_actual = $evento['id_cat_evento'];
                                $sql = "SELECT * FROM categoria_evento ";
                                $resultado = $conn->query($sql);
                                while ($cat_evento = $resultado->fetch_assoc()) { 
                                  if ($cat_evento['id_categoria'] == $categoria_actual) { ?>
                                    <option value="<?php echo $cat_evento['id_categoria']; ?>" selected>
                                        <?php echo $cat_evento['cat_evento']; ?>
                                    </option>
                                <?php } else { ?>
                                    <option value="<?php echo $cat_evento['id_categoria']; ?>">
                                    <?php echo $cat_evento['cat_evento']; ?>
                                    </option>
                                <?php  }
                                }
                            } catch (Exception $e) {
                                echo "Error: " . $e->getMessage();
                            }
                        ?>
                    </select>
                  </div>

                  <!-- Fecha del evento -->
                  <div class="form-group">
                    <label>Fecha evento:</label>
                    <?php
                      // Obtener la fecha
                      $fecha = $evento['fecha_evento'];
                      $fecha_separada = explode("-", $fecha);
                      $fecha_formateada = $fecha_separada[2] . '/' . $fecha_separada[1] . '/' . $fecha_separada[0];
                    ?>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                        </div>
                        <input type="text" placeholder="dd/mm/yyyy" name="fecha_evento" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask value="<?php echo $fecha_formateada; ?>">
                    </div>
                  </div>

                  <!-- Hora del evento -->
                  <div class="bootstrap-timepicker">
                    <div class="form-group">
                        <label>Hora:</label>
                        <?php
                          // Obtener la hora
                          $hora = $evento['hora_evento'];
                          $hora_formato = date('h:i a', strtotime($hora));

                          // Otra forma de hacerlo sin la función date() ni strtotime()
                          /*$hora_separada = explode(":", $hora);
                          if ((int) $hora_separada[0] < 12) {
                            $hora_formateada = $hora_separada[0] . ':' . $hora_separada[1] . ' AM';
                          } else {
                            $hora_formateada = $hora_separada[0] . ':' . $hora_separada[1] . ' PM';
                          }*/
                        ?>
                        <div class="input-group date" id="timepicker" data-target-input="nearest">
                            <input type="text" name="hora_evento" class="form-control datetimepicker-input" data-target="#timepicker" value="<?php echo $hora_formato; ?>"/>
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
                              $invitado_actual = $evento['id_inv'];
                              $sql = "SELECT invitado_id, nombre_invitado, apellido_invitado FROM invitados ";
                              $resultado = $conn->query($sql);
                              while ($invitados = $resultado->fetch_assoc()) {
                                if ($invitados['invitado_id'] == $invitado_actual) { ?>
                                  <option value="<?php echo $invitados['invitado_id']; ?>" selected>
                                    <?php echo $invitados['nombre_invitado'] . ' ' . $invitados['apellido_invitado']?>
                                  </option>
                                <?php } else { ?>
                                  <option value="<?php echo $invitados['invitado_id']; ?>">
                                    <?php echo $invitados['nombre_invitado'] . ' ' . $invitados['apellido_invitado']?>
                                  </option>
                                <?php } // Fin del if
                              } // Fin del while
                            } catch (Exception $e) {
                              echo "Error: " . $e->getMessage();
                            }
                        ?>
                    </select>
                  </div>
                  <div class="card-footer">
                    <input type="hidden" name="registro" value="actualizar">
                    <input type="hidden" name="id_registro" value="<?php echo $id; ?>">
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
    }
  ?>


</body>
</html>
