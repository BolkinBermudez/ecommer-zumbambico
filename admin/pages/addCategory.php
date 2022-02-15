
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Mi Inventarío</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="home.php?modulo=estadisticas">Inicio</a></li>
						<li class="breadcrumb-item"><a href="home.php?modulo=addProduct">Productos</a></li>
						<li class="breadcrumb-item active">Categorías</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<?php
		if(isset($_REQUEST['registrarCategoria'])){
			$nombreCate = $_REQUEST['nombreCategoria'];
			$DesCate = $_REQUEST['DescripcionCategoria'];

			
			include_once 'config/conn_ddbb.php';
			$con = conectar();
			$query = "INSERT INTO `linea` (`IdLinea`, `NombreLinea`, `DescripcionCategoria`) VALUES (NULL,'" .$nombreCate."', '".$DesCate."');";
			$res = mysqli_query($con, $query);
			$row = mysqli_fetch_assoc($res);
		}
	
	?>

	<!-- Main content -->
	<section class="content">
		<!-- Form Element sizes -->
		<div class="card card-info">
			<div class="card-header">
				<h3 class="card-title">Agregar Categoría.</h3>
			</div>
			<div class="card-body">
				<form action="post">
					<input class="form-control" name="nombreCategoria" type="text" placeholder="Nombre de la categoría.">
					<br>
					<textarea class="form-control" name="DescripcionCategoria" rows="2" placeholder="Descripción de la Categoría" maxlength="150"></textarea>
					<br>
					<div class="col-4">
						<button type="submit" name="registrarCategoria" class="btn btn-info btn-block">Registrar Categoría</button>
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
