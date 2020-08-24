<?php
 
include_once('functions/conexion.php');
 
$busqueda = $_GET['q'];
 
$resultado = $conexion->query("SELECT * FROM empresa WHERE nombre LIKE '$busqueda%'");
 
$datos = array();
 
while ($row=$resultado->fetch_assoc()){
 
	$datos[] = $row['nombre'];
}
 
echo json_encode($datos);