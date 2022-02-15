<?php

include('template/header.php');
include('template/sidebar.php');

 //echo ('<h1 class="breadcrumb float-sm-right">'. $modulo.'</h1>');

if($modulo=='estadisticas' || $modulo==' '){
	include('pages/statistic.php');
}

if($modulo=='addCategory' ){
	include('pages/addCategory.php');
}

if($modulo=='addProduct' ){
	include('pages/addProduct.php');
}

if($modulo=='orderList' ){
	include('pages/orderList.php');
}

if($modulo=='userList' ){
	include('pages/userList.php');
}

if($modulo=='users-email' ){
	include('pages/users-email.php');
}

if($modulo=='createUser' ){
	include('pages/createUser.php');
}

if($modulo=='userEdit' ){
	include('pages/userEdit.php');
}

include('template/footer.php');

?>