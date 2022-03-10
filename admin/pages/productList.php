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
				<table id="UserTable" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Id</th>
							<th>Imagen</th>
							<th>Precio</th>
							<th>Nombre</th>
							<th>Categoría</th>
							<th>Cantidad</th>
							<th>Estado</th>
							<th>
								<a href="home.php?modulo=createProduct" style=" margin-left: 15px;" class="text-success" aria-label="Agregar producto"><i class="fas fa-plus nav-icon" aria-label="Agregar producto."></i></a>
							</th>
						</tr>
					</thead>
					<tbody>

						<?php

						$query = 'SELECT IdProducto,Precio,Nombre,IdLinea,Inventario,IdEstado FROM producto; ';
						$res = mysqli_query($con, $query);
						while ($row = mysqli_fetch_assoc($res)) {

						?>

							<tr>
								<td><?php echo $row['IdProducto'] ?></td>
								<td></td>
								<td><?php echo $row['Precio'] ?></td>
								<td><?php echo $row['Nombre'] ?></td>
								<td><?php echo $row['IdLinea'] ?></td>
								<td><?php echo $row['Inventario'] ?></td>
								<td><?php echo $row['IdEstado'] ?></td>
								<td>
									<a href="home.php?modulo=productEdit&idModify=<?php echo $row['IdProducto'] ?>" style="margin-right: 10px; margin-left: 5px;"><i class="fas fa-edit nav-icon"></i></a>
									<a href="home.php?modulo=productList&idDelete=<?php echo $row['IdProducto'] ?>" class="text-danger borrar"><i class=" fas fa-trash "></i></a>
								</td>

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