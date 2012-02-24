<?php 
	include_once "../class/class.fachadainterfaz.php";
	$fachada = fachadaInterfaz::getInstance();
	if(($fachada->registrarEquipo(1,$_POST["nombreE"],$_POST["etapa"],$_POST["proyecto"],$_POST["nombre"],$_POST["apellido"],$_POST["email"],$_POST["carne"],$_POST["estudiantes"]))==0){
		echo '<script>';
		echo 'alert("El equipo fue creada exitosamente");';
		echo 'location.href="../principal.php?content=gestionarEquipo"';
		echo '</script>';
	}else{
		echo '<script>';
		echo 'alert("Error: Ya existia un proyecto con el nombre introducido.");';
		echo 'location.href="../principal.php?content=registroEquipo"';
		echo '</script>';
	}
?>