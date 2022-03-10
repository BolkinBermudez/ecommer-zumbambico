
<?php

include_once 'config/conn_ddbb.php';
$con = conectar(); 

if (isset($_REQUEST['modifyProduct'])) {

    if($_FILES["archivo"]["error"]>0){
     echo  "Error al cargar el Archivo";
    }else{
        $permitido= array( "image/gif","image/png", "image/bmp", "image/jpg", "image/tif");
        $LimiteKb = 100;

        if(in_array($_FILES["archivo"]["type"],$permitido) && $_FILES["archivo"]["size"]<= $LimiteKb * 1024){

            $ruta = "files/".$idModify."/";
            $archivo = $ruta.$_FILES["archivo"]["name"];

            if(!file_exists($ruta)){
                mkdir($ruta);
            }
            if(!file_exists($archivo)){
                $resultado =@move_uploaded_file($_FILES["archivo"]["tmp_name"], $archivo);

                if ($resultado) {
                    echo "Archivo Guardado.";
                } else {
                    echo "Error al guardar archivo.";
                }
                
            }else {
                echo "El archivo ya existe.";
            }

        }else{
            echo "Archivo no permitido o exede el tamaño.";
        };

    };
    $precio = mysqli_real_escape_string($con, $_REQUEST['precio'] ?? '');
    $img= mysqli_real_escape_string($con, $_REQUEST['img'] ?? '');
    $nombre = mysqli_real_escape_string($con, $_REQUEST['nombre'] ?? '');
    $id = mysqli_real_escape_string($con, $_REQUEST['id'] ?? '');
    $linea = mysqli_real_escape_string($con, $_REQUEST['linea']);
    $estado = mysqli_real_escape_string($con, $_REQUEST['estado']);
    $inventario = mysqli_real_escape_string($con, $_REQUEST['inventario']);

    $query = "UPDATE `producto` SET `Precio`='".$precio."', `Nombre`='".$nombre."', `Imagen`='".$img."', `IdLinea`= '".$linea."', `IdEstado`='".$estado."', `Inventario`= '".$inventario."' WHERE `IdProducto`='".$id."';";

    $res = mysqli_query($con, $query);

    if ($res) {

        echo '<meta http-equiv="refresh" content="0; url=home.php?modulo=productList&mensaje=El producto '.$nombre.' fue editado exitosamente" />';
    } else {
?>
        <div class="alert alert-danger alert-dismissible fade show " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <p class="text-right font-weight-bold">Error modificando el Producto, Tipo de error: <?php echo mysqli_error($con); ?>.</p>

        </div>

<?php
    }
}
$idModify= mysqli_real_escape_string($con,$_REQUEST['idModify']??'');
$idDelete=mysqli_real_escape_string($con,$_REQUEST['idDelete']??'');

$con = conectar();
$query = 'SELECT Nombre,Precio,Imagen,IdLinea,IdEstado,Inventario FROM producto WHERE IdProducto="' . $idModify . '";';
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
                    <h1>Productos</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="home.php?modulo=estadisticas">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="home.php?modulo=productList">Listar Productos</a></li>
                        <li class="breadcrumb-item active">Edítar Producto</li>
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
                <h2 class="card-title">Edítar Producto</h2>

            </div>
            <div class="card-body">
                <form action="home.php?modulo=productEdit" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">ID:<?php echo ($idModify) ?></label>
                    </div>
                    <div class="form-group">
                        <label for="">Imagen</label>
                        <input type="file" name="archivo" class="form-control" required accept="img/*" >
                    </div>
                    <div class="form-group">
                        <label for="">Nombre</label>
                        <input type="text" name="nombre" class="form-control" required value="<?php echo $row['Nombre'] ?>" >
                    </div>
                    <div class=" form-group">
                        <label for="">Precio</label>
                        <input type="text" name="precio" class="form-control" required value="<?php echo $row['Precio'] ?>">
                    </div>
                    <div class=" form-group">
                        <label for="">Linea</label>
                        <input type="text" name="linea" class="form-control" required value="<?php echo $row['IdLinea'] ?>">
                    </div>
                    <div class=" form-group">
                        <label for="">Estado</label>
                        <input type="text" name="email" class="form-control" required value="<?php echo $row['IdEstado'] ?>">
                    </div>
                    <div class=" form-group">
                        <label for="">Cantidad</label>
                        <input type="text" name="email" class="form-control" required value="<?php echo $row['Inventario'] ?>">
                    </div>
                    <div class=" form-group">
                        
                        <button type="submit" class="btn btn-info" name="modifyProduct">Modifícar Producto</button>
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