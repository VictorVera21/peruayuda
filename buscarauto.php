<?php
 
include_once('functions/conexion.php');
 
$busqueda = $_GET['q'];
 
$resultado = $conexion->query("SELECT * FROM empresa WHERE nomempre LIKE '$busqueda%'");
 
$datos = array();
 
while ($row=$resultado->fetch_assoc()){
 
	$datos[] = $row['nomempre'];
}
 
echo json_encode($datos);