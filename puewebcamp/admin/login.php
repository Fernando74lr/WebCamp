<?php
  include_once 'funciones/funciones.php';
  include_once 'templates/header.php';
?>
<body class="hold-transition login-page">

<div class="login-box">
  <div class="login-logo">
    <a href="../index.php"><b>PUE</b>WEBCAMP</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Inicia sesión aquí</p>

      <form name="login-admin-form" id="login-admin" method="post" action="insertar-admin.php">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="usuario" placeholder="Usuario">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fa fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Contraseña">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12">
            <input type="hidden" name="login-admin" value="1">
            <button type="submit" name="login-admin" id="login" class="btn btn-primary btn-block btn-flat">Login</button>
          </div>
        </div>
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>

<?php 
  include_once 'templates/footer.php';
?>