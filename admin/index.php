<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Zumbambico| Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="Admin/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="Admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="Admin/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="Admin/index2.html"><b>Bienvenido</b> Administrador </a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Inicia sesión</p>

        <!-- Validamos login-->
        <?php
        if (isset($_REQUEST['login'])) {

          session_start();

          $email = $_REQUEST['email'] ?? '';
          $password = $_REQUEST['pass'] ?? '';

          //Así se encripta el password.
          //$hash = password_hash($password, PASSWORD_DEFAULT, ['cost' => 7]);


          include_once 'config/conn_ddbb.php';
          $con = conectar();
          $query = 'SELECT IdUsu,Nombre,Correo,Rol,Password FROM usuario WHERE Correo="' . $email . '";';
          $res = mysqli_query($con, $query);
          $row = mysqli_fetch_assoc($res);


          //Almacenamos en variables de sessión los datos del query.
          $_SESSION['IdUsu'] = $row['IdUsu'];
          $_SESSION['Nombre'] = $row['Nombre'];
          $_SESSION['Correo'] = $row['Correo'];
          $_SESSION['Rol'] = $row['Rol'];

          //Verificamos la contraseña del input y la ddbb.
          if (password_verify($password, $row['Password'])) {


            //Sí el rol de usuario es 1 lo direccionamos al home.
            if ($_SESSION['Rol'] == 1) {
              header('location: home.php');
            }

            //Sí el rol de usuario es 2 lo direccionamos a productos.
            if ($_SESSION['Rol'] == 2) {
              header('location: ../Products.php');
            }
          } else {
        ?>

            <div class="alert alert-danger" role="alert">
              <strong>Error de Login.</strong>
            </div>

        <?php
          }
        }
        ?>

        <form method="post">
          <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="pass" class="form-control" placeholder="Contraseña">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Recuérdame
                </label>
              </div>
            </div>
          </div></br>
          <div class="row">
            <div class="col-12">
              <button type="submit" name="login" class="btn btn-info btn-block">Iniciar sesión</button>
            </div>
          </div>
        </form></br>
        <p class="mb-1">
          <a href="forgot-password.html">Olvidé mi contraseña</a>
        </p>

      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="Admin/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="Admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="Admin/dist/js/adminlte.min.js"></script>
</body>

</html>