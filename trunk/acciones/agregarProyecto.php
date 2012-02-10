<?php
include_once "../class/class.fachadainterfaz.php";
	$fachada = fachadaInterfaz::getInstance();
	if(($fachada->agregarProyecto($_POST["nombreProy"],$_POST["etapa"],$_POST["solicitud"],$_POST["nombre"],$_POST["apellido"],$_POST["email"],$_POST["codigo"],$_POST["tlf"],$_POST["rol"],$_POST["usbid"]))==0){
	   echo '<script>';
		echo 'alert("El proyecto fue creado exitosamente");';
	   echo '</script>';
	   header("Location: ../principal.php?content=proyectos");
	}else{
		 echo '<script>';
		echo 'alert("Error en la creacion de la planificacion");';
	   echo '</script>';
	}


?>