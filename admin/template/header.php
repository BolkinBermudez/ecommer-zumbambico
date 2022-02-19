<!DOCTYPE html>
<html lang="es">
<?php
session_start();
session_regenerate_id(true);
if (isset($_REQUEST['sesion']) && $_REQUEST['sesion'] == 'cerrar') {
    session_destroy();
    header('location: index.php');
}
if ($_SESSION['IdUsu'] == false or $_SESSION['Rol'] <> 1) {
    header('location: index.php');
}

$modulo = $_REQUEST['modulo'] ?? '';
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Zumbambico/Admin</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="Admin/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="Admin/dist/css/adminlte.min.css">

    <!-- DataTables 
        <link rel="stylesheet" href="Admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="Admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
        <link rel="stylesheet" href="Admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    -->

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.4/css/select.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.1.1/css/dataTables.dateTime.min.css">
    <link rel="stylesheet" href="Admin/css/editor.dataTables.min.css">

</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="home.php?modulo=estadisticas" class="nav-link">Home</a>
                </li>

            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>
                <!-- User Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                        <a href="home.php?modulo=userEdit&idModify=<?php echo $_SESSION['IdUsu']; ?>" class="dropdown-item text-info">
                            <i class="fas fa-edit  nav-icon  "></i>
                            Editar Perfil
                        </a>
                        <div class="dropdown-divider">


                        </div>
                        <a href="#" class="dropdown-item">

                        </a>

                        <div class="dropdown-divider"></div>

                        <a href="home.php?modulo=&sesion=cerrar" class="dropdown-item dropdown-footer text-danger"> <i class="fa fa-sign-out-alt nav-icon " aria-hidden="true"></i>Cerrar Sessión</a>
                    </div>
                </li>

            </ul>
        </nav>
        <!-- /.navbar -->