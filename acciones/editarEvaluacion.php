<?php 
	/*	UNIVERSIDAD SIMON BOLIVAR
		PERIODO:			ENE-MAR 2012
		MATERIA: 			SISTEMAS DE INFORMACION II
		NOMBRE DEL ARCHIVO:	registrarCasoUso.php
	*/
    //$root = $_SERVER['DOCUMENT_ROOT']."/sigeprosi/";
	include_once "../class/class.Evaluacion.php";
	include_once "../class/class.EsEvaluado.php";
    //include_once "../class/class.listaCasoUso.php";
	include_once "../class/class.listaParticipa.php";
    require_once "../aspectos/Seguridad.php";
    $seguridad = Seguridad::getInstance();
    $seguridad->escapeSQL($_POST);
	$id = $_POST["id"];
   	$espre = 0;
	//var_dump($_POST["presentacion"]);
	if(isset($_POST["presentacion"])) $espre = 1;
	$eval_viejo = new evaluacion( $_POST["nombreEvaluacion"], null, null , null);
    $eval_viejo->set('id',$id);
	$j = $eval_viejo->salvar();
	if ($j==0) {
		echo '<script>';
		echo 'alert("La evaluacion fue actualizada exitosamente");';
		echo 'location.href="../principal.php?content=gestionarEvaluacion"';
		echo '</script>';
	}
	/*	$equipos = $_POST["equipos"];
	$N = sizeof($equipos);	
	for ($i=0; $i<$N; $i++){
		$equipo = new listaParticipa();
		$result = $equipo->buscar($equipos[$i],'nombreEquipo');
		$M = sizeof($result);
		for($j=0; $j<$M; $j++){
			$esevaluado = new esevaluado($eval->autocompletar,$result['correoUSBUsuario'])
			$esevaluado->insertar();
		} 
	}*/ 
	//$registro = new casodeuso($nombre,$descripcion,$completitud,$idEquipo);
?>