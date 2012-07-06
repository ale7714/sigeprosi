<?php 
	include_once "../class/class.fachadainterfaz.php";
	require_once "../aspectos/Seguridad.php";
	$seguridad = Seguridad::getInstance();
	$seguridad->escapeSQL($_POST);
	$root = $_SERVER['DOCUMENT_ROOT']."/sigeprosi/";
	$fachada = fachadaInterfaz::getInstance();
	
	//echo 'Nombre del equipo '.$_POST["nombreEq"];
	
	if(($fachada->editarEquipo(1,$_POST["nombreEq"],$_POST["etapa"],$_POST["proyecto"],$_POST["nombre"],$_POST["apellido"],$_POST["email"],$_POST["carne"],$_POST["estudiantes"]))==0){

		// $doc = $root.'documentos/'.$_POST["nombreE"];
		// mkdir($doc,0777,true);

		echo '<script>';
		echo 'alert("El equipo fue creado exitosamente.\n Ahora debe seleccionar un coordinador para el equipo.");';

		echo 'location.href="../principal.php?content=coordinadorEquipo&nombre='.$_POST["nombreEq"].'&continuar=activo"';
//		echo 'return false;';
		echo '</script>';
	}else{
		echo '<script>';
		echo 'alert("Error: No se pudieron modificar los datos para el equipo '.$_POST["nombreEq"].'.");';
		echo 'location.href="../principal.php?content=registroEquipo"';
		echo '</script>';
	}
?>
