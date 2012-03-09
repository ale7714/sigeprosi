<?php 
include "../class/class.fachadainterfaz.php";
$idcu = $_POST["idcu"];
$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];
$completitud = $_POST["completitud"];

if (isset($idcu)) {
	$cu = new ($idcu,$nombre,$descripcion,$completitud);
    $cu->actualizar($idcu);
	
	//$cu -> actualizar($cu->get('correoUSB'));
	echo '<script>';
	echo 'alert("Se modificó satisfactoriamente el Caso de Uso.");';
	echo 'location.href="../principal.php"';
	echo '</script>';
} 
?>
