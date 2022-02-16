<?php
if (isset($_REQUEST['crearUsuario'])) {

    include_once 'config/conn_ddbb.php';
    $con = conectar();


    $email = mysqli_real_escape_string($con, $_REQUEST['email'] ?? '');
    $pass = password_hash(mysqli_real_escape_string($con, $_REQUEST['pass'] ?? ''), PASSWORD_DEFAULT, ['cost' => 7]);
    $nombre = mysqli_real_escape_string($con, $_REQUEST['nombre'] ?? '');

    $query = "INSERT INTO `usuario` (`Rol`, `IdUsu`, `Nombre`, `Correo`, `Password`, `EstadoUsu`) VALUES 
                                        ('1', NULL, '" . $nombre . "', '" . $email . "', '" . $pass . "', '0');";

    $res = mysqli_query($con, $query);

    if ($res) {

        echo '<meta http-equiv="refresh" content="0; url=home.php?modulo=userList&mensaje=Usuario creado exitosamente" />';
    } else {
?>
        <div class="alert alert-danger alert-dismissible fade show " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <p class="text-right font-weight-bold">Error creando el Usuarío Administrador, Tipo de error: <?php echo mysqli_error($con); ?>.</p>

        </div>

<?php
    }
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pédidos</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="home.php?modulo=estadisticas">Inicio</a></li>
                        <li class="breadcrumb-item active">Listar Pédidos</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Crear Usuarío Administrador</h3>

            </div>
            <div class="card-body">
                <form action="home.php?modulo=createUser" method="POST">
                    <div class="form-group">
                        <label for="">Nombre</label>
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre" ">
                    </div>
                    <div class=" form-group">
                        <label for="">Correo</label>
                        <input type="email" name="email" class="form-control" placeholder="Correo">
                    </div>
                    <div class="form-group">
                        <label for="">Contraseña</label>
                        <input type="password" name="pass" class="form-control" placeholder="Contraseña" ">
                        <br>
                    </div>
                    <div class=" form-group">
                        <button type="submit" class="btn btn-success" name="crearUsuario">Crear Usuario</button>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->

        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->