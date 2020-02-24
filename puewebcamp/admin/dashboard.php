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
            <h1>Dashboard</h1>
            <small>Información sobre el evento</small>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- Primer Widget -->
        <div class="col-lg-3 col-6">
          <?php
            $sql = "SELECT COUNT(ID_Registrado) AS registros FROM registrados ";
            $resultado = $conn->query($sql);
            $registrados = $resultado->fetch_assoc();          
          ?>
          <!-- Registrados -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?php echo $registrados['registros']; ?></h3>

              <p>Total registrados</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a href="#" class="small-box-footer">
              Más información <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

        <!-- Segundo Widget -->
        <div class="col-lg-3 col-6">
          <?php
            $sql = "SELECT COUNT(ID_Registrado) AS registros FROM registrados WHERE pagado = 1";
            $resultado = $conn->query($sql);
            $registrados = $resultado->fetch_assoc();          
          ?>
          <!-- small card -->
          <div class="small-box bg-info bg-yellow">
            <div class="inner">
              <h3><?php echo $registrados['registros']; ?></h3>

              <p>Total pagados</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="#" class="small-box-footer">
              Más información <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

        <!-- Tercer Widget -->
        <div class="col-lg-3 col-6">
          <?php
            $sql = "SELECT COUNT(ID_Registrado) AS registros FROM registrados WHERE pagado = 0";
            $resultado = $conn->query($sql);
            $registrados = $resultado->fetch_assoc();          
          ?>
          <!-- small card -->
          <div class="small-box bg-info bg-red">
            <div class="inner">
              <h3><?php echo $registrados['registros']; ?></h3>

              <p>Total sin pagar</p>
            </div>
            <div class="icon">
              <i class="fa fa-user-times"></i>
            </div>
            <a href="#" class="small-box-footer">
              Más información <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

        <!-- Segundo Widget -->
        <div class="col-lg-3 col-6">
          <?php
            $sql = "SELECT SUM(total_pagado) AS ganancias FROM registrados WHERE pagado = 1";
            $resultado = $conn->query($sql);
            $registrados = $resultado->fetch_assoc();          
          ?>
          <!-- small card -->
          <div class="small-box bg-info bg-green">
            <div class="inner">
              <h3>$ <?php echo $registrados['ganancias']; ?></h3>

              <p>Ganancias totales</p>
            </div>
            <div class="icon">
              <i class="fa fa-dollar-sign"></i>
            </div>
            <a href="#" class="small-box-footer">
              Más información <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
      </div>

      <h3>Regalos</h3>
      <br>

      <div class="row">
        <!-- Pulseras Widget -->
        <div class="col-lg-3 col-6">
            <?php
              $sql = "SELECT COUNT(total_pagado) AS pulseras FROM registrados WHERE pagado = 1";
              $resultado = $conn->query($sql);
              $regalo = $resultado->fetch_assoc();          
            ?>
            <!-- small card -->
            <div class="small-box bg-info bg-teal">
              <div class="inner">
                <h3><?php echo $regalo['pulseras']; ?></h3>

                <p>Pulseras</p>
              </div>
              <div class="icon">
                <i class="fa fa-gift"></i>
              </div>
              <a href="#" class="small-box-footer">
                Más información <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
        </div>

        <!-- Etiquetas Widget -->
        <div class="col-lg-3 col-6">
            <?php
              $sql = "SELECT COUNT(total_pagado) AS etiquetas FROM registrados WHERE pagado = 2";
              $resultado = $conn->query($sql);
              $regalo = $resultado->fetch_assoc();          
            ?>
            <!-- small card -->
            <div class="small-box bg-info bg-maroon">
              <div class="inner">
                <h3><?php echo $regalo['etiquetas']; ?></h3>

                <p>Etiquetas</p>
              </div>
              <div class="icon">
                <i class="fa fa-gift"></i>
              </div>
              <a href="#" class="small-box-footer">
                Más información <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
        </div>

        <!-- Plumas Widget -->
        <div class="col-lg-3 col-6">
            <?php
              $sql = "SELECT COUNT(total_pagado) AS plumas FROM registrados WHERE pagado = 3";
              $resultado = $conn->query($sql);
              $regalo = $resultado->fetch_assoc();          
            ?>
            <!-- small card -->
            <div class="small-box bg-info bg-purple-active">
              <div class="inner">
                <h3><?php echo $regalo['plumas']; ?></h3>

                <p>Plumas</p>
              </div>
              <div class="icon">
                <i class="fa fa-gift"></i>
              </div>
              <a href="#" class="small-box-footer">
                Más información <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
        </div>
      </div>
        
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php 
    include_once 'templates/footer.php';
  ?>


</body>
</html>
