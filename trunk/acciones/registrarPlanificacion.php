<?php 
include_once "../class/class.fachadainterfaz.php";
	$fachada = fachadaInterfaz::getInstance();
	if(($fachada->registrarPlanificacion($_POST["planificacion_name"],$_POST["numPlanif"],$_POST["semana"],$_POST["fecha"],$_POST["puntos"],$_POST["descripcion"]))==0)
	   echo '<script>';
		echo 'alert("La planificacion fue creada exitosamente");';
	   echo '</script>';
	   header("Location: ../principal.php?content=registroPlanificacion");
?>