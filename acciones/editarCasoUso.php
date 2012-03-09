<?php 
include "../class/class.CasoUso.php";
$idcu = $_POST["idcu"];
$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];
$completitud = $_POST["completitud"];

if (isset($idcu)) {
	$cu = new casodeuso($nombre,$descripcion,$completitud);
    if (($cu->actualizar($idcu)) == 0){
		echo "por que ando por aki?";
		echo "mi CU es: </br>";
		echo "nombre: ".$cu->get("nombre");
		echo "mi CU es de:";
		
		/* echo '<script>';
		echo 'alert("Se modificó satisfactoriamente el Caso de Uso.");';
		echo 'location.href="../principal.php"';
		echo '</script>'; */
	}else{
		echo '<script>';
		echo 'alert("Error: No se pudo modificar nada del CU.");';
		echo 'location.href="../principal.php?content=registroPlanificacion"';
		echo '</script>';
	}
	
	//$cu -> actualizar($cu->get('correoUSB'));
	
} 
?>
