<?php
$servidor = "localhost";
$user = "root";
$password = "";
$database = "empresa";

$conexion = mysqli_connect($servidor, $user, $password) or die(mysqli_error($conexion));
mysqli_select_db($conexion, $database) or die(mysqli_error($conexion));
?>