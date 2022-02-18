
<?php

include_once 'config/conn_ddbb.php';
$con = conectar(); 

if (isset($_REQUEST['modifyUser'])) {

    $email = mysqli_real_escape_string($con, $_REQUEST['email'] ?? '');
    $pass = password_hash(mysqli_real_escape_string($con, $_REQUEST['pass'] ?? ''), PASSWORD_DEFAULT, ['cost' => 7]);
    $nombre = mysqli_real_escape_string($con, $_REQUEST['nombre'] ?? '');
    $id = mysqli_real_escape_string($con, $_REQUEST['id'] ?? '');
    $rol = mysqli_real_escape_string($con, $_REQUEST['rol']);

    $query = "UPDATE `usuario` SET `Rol`='".$rol."', `Nombre`='".$nombre."', `Correo`='".$email."', `Password`= '".$pass."' WHERE `IdUsu`='".$id."';";

    $res = mysqli_query($con, $query);

    if ($res) {

        echo '<meta http-equiv="refresh" content="0; url=home.php?modulo=userList&mensaje=El usuarío '.$nombre.' fue editado exitosamente" />';
    } else {
?>
        <div class="alert alert-danger alert-dismissible fade show " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <p class="text-right font-weight-bold">Error modificando el Usuarío, Tipo de error: <?php echo mysqli_error($con); ?>.</p>

        </div>

<?php
    }
}
$idModify= mysqli_real_escape_string($con,$_REQUEST['idModify']??'');
$idDelete=mysqli_real_escape_string($con,$_REQUEST['idDelete']??'');

$con = conectar();
$query = 'SELECT Nombre,Correo,Rol,Password FROM usuario WHERE IdUsu="' . $idModify . '";';
$res = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($res);

?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Usuaríos</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="home.php?modulo=estadisticas">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="home.php?modulo=userList">Listar Usuaríos</a></li>
                        <li class="breadcrumb-item active">Edítar Usuarío</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card card-info">
            <div class="card-header">
                <h2 class="card-title">Edítar Usuaríor</h2>

            </div>
            <div class="card-body">
                <form action="home.php?modulo=userEdit" method="POST">
                    <div class="form-group">
                        <label for=""><?php echo ($rol==1)?'Administrador':'Cliente' ?></label>
                        
                    </div>
                    <div class="form-group">
                        <label for="">Nombre</label>
                        <input type="text" name="nombre" class="form-control" require value="<?php echo $row['Nombre'] ?>" >
                    </div>
                    <div class=" form-group">
                        <label for="">Correo</label>
                        <input type="email" name="email" class="form-control" require value="<?php echo $row['Correo'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="">Contraseña</label>
                        <input type="password" name="pass" class="form-control" require placeholder="Contraseña" ">
                        <br>
                    </div>

                    <div class=" form-group">
                        <input type="hidden" name="rol" value="<?php echo $rol ?>" >
                        <input type="hidden" name="id" value="<?php echo $idModify ?>" >
                        <button type="submit" class="btn btn-info" name="modifyUser">Modifícar Usuarío</button>
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