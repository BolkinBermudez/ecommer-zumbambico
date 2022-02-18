<?php
include_once 'config/conn_ddbb.php';
$con = conectar();

if (isset($_REQUEST['idDelete'])) {
	$idDelete = mysqli_real_escape_string($con, $_REQUEST['idDelete'] ?? '');
	$query = 'DELETE FROM usuario WHERE IdUsu ="' . $idDelete . '"; ';
	$res = mysqli_query($con, $query);
	if ($res) {
?>
		<div class="alert alert-warning alert-dismissible fade show " role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				<span class="sr-only">Close</span>
			</button>
			<p class="text-right font-weight-bold">Usuarío Borrado con exito.</p>
		</div>
	<?php
	} else {
	?>
		<div class="alert alert-danger alert-dismissible fade show " role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				<span class="sr-only">Close</span>
			</button>
			<p class="text-right font-weight-bold">Error al borrar el Usuarío, Tipo de error: <?php echo mysqli_error($con); ?>.</p>
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
					<h1>Usuaríos</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="home.php?modulo=estadisticas">Inicio</a></li>
						<li class="breadcrumb-item"><a href="home.php?modulo=users-email">Envíar Correo masivo</a></li>
						<li class="breadcrumb-item active"> Listar Usuaríos</li>
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
							<th>Rol</th>
							<th>Nombre</th>
							<th>Correo</th>
							<th>Estado</th>
							<th>Acciones
								<a href="home.php?modulo=createUser" style=" margin-left: 15px;" class="text-success"><i class="fas fa-plus nav-icon"></i></a>
							</th>
						</tr>
					</thead>
					<tbody>

						<?php

						$query = 'SELECT IdUsu,Rol,Nombre,Correo,EstadoUsu FROM usuario; ';
						$res = mysqli_query($con, $query);
						while ($row = mysqli_fetch_assoc($res)) {

						?>

							<tr>
								<td><?php echo ($row['Rol'] == 1) ? 'Administrador' : 'Cliente' ?></td>
								<td><?php echo $row['Nombre'] ?></td>
								<td><?php echo $row['Correo'] ?></td>
								<td><?php echo ($row['EstadoUsu'] == 1) ? 'Activo' : 'Inactivo' ?></td>
								<td>
									<?php if ($row['IdUsu'] <> $_SESSION['IdUsu']) {
									?>
										<a href="home.php?modulo=userEdit&idModify=<?php echo $row['IdUsu'] ?>" style="margin-right: 10px; margin-left: 5px;"><i class="fas fa-edit nav-icon"></i></a>
										<a href="home.php?modulo=userList&idDelete=<?php echo $row['IdUsu'] ?>" class="text-danger borrar"><i class=" fas fa-trash "></i></a>

									<?php
									}
									?>
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