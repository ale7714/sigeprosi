<?php 
	include_once "../class/class.iteracion.php";
	include_once "../class/class.ActividadIteracion.php";
	include_once "../class/class.EsRecurso.php";
	include_once "../class/class.perteneceIteracion.php";
	include_once "../class/class.casoDeUso.php";
	include_once "../class/class.productoextraiteracion.php";
	include_once "../class/class.criteriosPEI.php";
	include_once "../class/class.criterioscasodeuso.php";
	include_once "../class/class.artefactosIteracion.php";
    require_once "../aspectos/Seguridad.php";
    $seguridad = Seguridad::getInstance();
    $seguridad->escapeSQL($_POST);
	$estatus=0;
	if(isset($_POST["estatus"])){
		$estatus=$_POST["estatus"];
		if ($estatus == "Planificada")	$estatus=0;
		else	if ($estatus == "Aprobada")	$estatus=1;
		else	$estatus=2;
	}
	$registro = new iteracion($_POST["nombreIter"],$_POST["tipoIteracion"],$_POST["objetivos"],$_POST["equipo"],$estatus);
	if($registro->actualizar($_POST["idIteracion"])==0){
		echo '<script>';
		echo 'alert("La iteracion fue aprobada exitosamente");';
		echo 'location.href="../principal.php"';
		echo '</script>';
	}else{
		echo '<script>';
		echo 'alert("Error: Ya existia una iteracion con el nombre  introducido.");';
		echo 'history.back();';
		echo '</script>';
	}
?>