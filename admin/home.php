<?php

include('template/header.php');
include('template/sidebar.php');

//echo ('<h1 class="breadcrumb float-sm-right">'. $modulo.'</h1>');
if (isset($_REQUEST['mensaje'])) {
?>
	<div class="alert alert-success alert-dismissible fade show " role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			<span class="sr-only">Close</span>
		</button>
		<p class="text-right font-weight-bold"><?php echo $_REQUEST['mensaje'] ?>.</p>
	</div>
<?php
}

if ($modulo == 'estadisticas' || $modulo == ' ') {
	include('pages/statistic.php');
}

if ($modulo == 'addCategory') {
	include('pages/addCategory.php');
}

if ($modulo == 'addProduct') {
	include('pages/addProduct.php');
}

if ($modulo == 'orderList') {
	include('pages/orderList.php');
}

if ($modulo == 'userList') {
	include('pages/userList.php');
}

if ($modulo == 'users-email') {
	include('pages/users-email.php');
}

if ($modulo == 'createUser') {
	include('pages/createUser.php');
}

if ($modulo == 'userEdit') {
	include('pages/userEdit.php');
}

include('template/footer.php');

?>