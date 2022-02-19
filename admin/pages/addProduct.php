<?php
include_once 'config/conn_ddbb.php';
$con = conectar();

?>
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
						<li class="breadcrumb-item"><a href="home.php?modulo=addCategory">Categorías</a></li>
						<li class="breadcrumb-item active">Productos</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>
	<!-- Main content -->
	<section class="content">

		<div class="card">

			<div class="card-body">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Id</th>
							<th>Nombre</th>
							<th>Precio</th>
							<th>Nombre</th>
							<th>Categoría</th>
							<th>Cantidad</th>
						</tr>
					</thead>
					<tbody>

						<?php

						$query = 'SELECT IdProducto,Precio,Nombre,IdLinea,Inventario FROM producto; ';
						$res = mysqli_query($con, $query);
						while ($row = mysqli_fetch_assoc($res)) {

						?>

							<tr>
								<td><?php echo $row['IdProducto'] ?></td>
								<td><?php echo $row['Precio'] ?></td>
								<td><?php echo $row['Nombre'] ?></td>
								<td><?php echo $row['IdLinea'] ?></td>
								<td><?php echo $row['Inventario'] ?></td>

							</tr>

						<?php
						};

						?>
					</tbody>

				</table>
			</div>
			<!-- /.card-body -->
		</div>

	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->