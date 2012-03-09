<?php 
	include_once "../class/class.fachadainterfaz.php";
	$fachada = fachadaInterfaz::getInstance();
	if(($fachada->registrarEquipo(1,$_POST["nombreE"],$_POST["etapa"],$_POST["proyecto"],$_POST["nombre"],$_POST["apellido"],$_POST["email"],$_POST["carne"],$_POST["estudiantes"]))==0){
		print "entre";
		echo '<script>';
		echo 'alert("El equipo fue creado exitosamente.\n Ahora debe seleccionar un coordinador para el equipo.");';
		echo 'location.href="../principal.php?content=coordinadorEquipo&nombre='.$_POST["nombreE"];
		echo '</script>';
	}else{
		echo '<script>';
		echo 'alert("Error: Ya existía un equipo con el nombre introducido.");';
		echo 'location.href="../principal.php?content=registroEquipo';
		echo '</script>';
	}
?>