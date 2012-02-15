<?php 
	include_once "../class/class.fachadainterfaz.php";
	$fachada = fachadaInterfaz::getInstance();
	$cod=$_POST["codigo"];
	$num=$_POST["tlf"];
	$telefonos=array();
	$i=0;
	foreach ($cod as $codigo){
		$telefonos[$i]=$cod[$i]."".$num[$i];
		$i++;
	}
	if(($fachada->agregarProyecto($_POST["nombreProy"],$_POST["etapa"],$_POST["solicitud"],$_POST["nombre"],$_POST["apellido"],$_POST["email"],$telefonos,$_POST["rol"],$_POST["usbid"]))!=0){
		echo '<script>';
		echo 'alert("El proyecto fue creada exitosamente");';
		echo 'location.href="../principal.php?content=proyectos"';
		echo '</script>';
	}else{
		echo '<script>';
		echo 'alert("Error: Ya existia un proyecto con el nombre introducido.");';
		echo 'location.href="../principal.php?content=registroProyecto"';
		echo '</script>';
	}
?>