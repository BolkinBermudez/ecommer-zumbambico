<?php
function conectar() {
    $host='localhost';
    $user='root';
    $pass='';
    $db='zumbambico';
    $pt='3308';

    $con=mysqli_connect($host,$user,$pass,$db,$pt);

    mysqli_select_db($con,$db);
    
    return $con;
}
?>