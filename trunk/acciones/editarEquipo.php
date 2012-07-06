<?php 
	include_once "../class/class.fachadainterfaz.php";
	require_once "../aspectos/Seguridad.php";
	$seguridad = Seguridad::getInstance();
	$seguridad->escapeSQL($_POST);
	$root = $_SERVER['DOCUMENT_ROOT']."/sigeprosi/";
	$fachada = fachadaInterfaz::getInstance();
	$estudiantes = null;
	if (isset($_POST["estudiantes"])) $estudiantes = $_POST["estudiantes"];
	
	//echo 'Nombre del equipo '.$_POST["nombreEq"];
	
	if(($fachada->editarEquipo($_POST["estadoEq"],$_POST["nombreEq"],$_POST["etapa"],$_POST["proyecto"],$_POST["nombre"],$_POST["apellido"],$_POST["email"],$_POST["carne"],$estudiantes))==0){

		// $doc = $root.'documentos/'.$_POST["nombreE"];
		// mkdir($doc,0777,true);
		echo '<script>';
		if ($_POST["estadoEq"]==1){
			echo 'alert("Los datos del equipo '.$_POST["nombreEq"].' fueron modificados exitosamente.\n Si lo desea, seleccione un nuevo coordinador para el equipo.");';
			echo 'location.href="../principal.php?content=coordinadorEquipo&nombre='.$_POST["nombreEq"].'&continuar=activo"';
		}else{
			echo 'alert("Los datos del equipo '.$_POST["nombreEq"].' fueron modificados exitosamente.");';
			echo 'location.href="../principal.php?content=gestionarEquipo"';
		}
//		echo 'return false;';
		echo '</script>';
	}else{
		echo '<script>';
		echo 'alert("Error: No se pudieron modificar los datos para el equipo '.$_POST["nombreEq"].'.");';
		echo 'location.href="../principal.php?content=editaEquipo&nombre='.$_POST["nombreEq"].'"';
		echo '</script>';
	}
?>
