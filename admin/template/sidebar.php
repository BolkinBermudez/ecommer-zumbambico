<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="home.php?modulo=estadisticas" class="brand-link">
		<img src="../img/icon.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
		<span class="brand-text font-weight-light">Administrador</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">

			<div class="info">
				<a href="#" class="d-block"><?php echo $_SESSION['Nombre'] ?></a>
			</div>
		</div>

		<!-- SidebarSearch Form -->
		<div class="form-inline">
			<div class="input-group" data-widget="sidebar-search">
				<input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
				<div class="input-group-append">
					<button class="btn btn-sidebar">
						<i class="fas fa-search fa-fw"></i>
					</button>
				</div>
			</div>
		</div>

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
				<li class="nav-item ">
					<a href="#" class="nav-link  ">
						<i class="nav-icon fas fa-th "></i>
						<p>
							Mi Inventarío
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item ">
							<a href="home.php?modulo=addProduct" class="nav-link ">
								<i class="fa fa-barcode nav-icon" aria-hidden="true"></i>
								<p>Productos</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="home.php?modulo=addCategory" class="nav-link ">
								<i class="far fa-copy nav-icon"></i>
								<p>Categorías</p>
							</a>
						</li>

					</ul>
				</li>
				<li class="nav-item ">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-users"></i>
						<p>
							Usuaríos
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="home.php?modulo=userList" class="nav-link ">
								<i class="fa fa-list nav-icon" aria-hidden="true"></i>
								<p>Listar Usuarios</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="home.php?modulo=users-email" class="nav-link ">
								<i class="far fa-envelope nav-icon"></i>
								<p>Envíar Correo Masivo</p>
							</a>
						</li>

					</ul>
				</li>
				<li class="nav-item ">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-truck"></i>
						<p>
							Pédidos
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="home.php?modulo=orderList" class="nav-link ">
								<i class="fas fa-clipboard-check nav-icon " aria-hidden="true"></i>
								<p>Listar Pédidos</p>
							</a>
						</li>
					</ul>
				</li>

			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>