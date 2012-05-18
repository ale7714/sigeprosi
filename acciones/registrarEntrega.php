<?php 
	/*	UNIVERSIDAD SIMON BOLIVAR
		PERIODO:			ENE-MAR 2012
		MATERIA: 			SISTEMAS DE INFORMACION II
		NOMBRE DEL ARCHIVO:	registrarCasoUso.php
	*/
    //$root = $_SERVER['DOCUMENT_ROOT']."/sigeprosi/";
	include_once "../class/class.Evaluacion.php";
	include_once "../class/class.Entrega.php";
	include_once "../class/class.listaParticipa.php";
    require_once "../aspectos/Seguridad.php";
    $seguridad = Seguridad::getInstance();
    $seguridad->escapeSQL($_POST);
	$nombreE = $_POST["idEvaluacion"];
    $nombre = $_POST["nombreEvaluacion"];
    $nota = $_POST["notaEvaluacion"];
	$completitud = 0;
	$eval = new evaluacion($nombreE,null,null);
	$eval->autocompletar();
    $entrega = new entrega($nombre,$nota,$nombreE);
    $j=$entrega->insertar();
	/*$N = sizeof($equipos);
	$j = 0;
	for ($i=0; $i<$N; $i++){
		$esevaluado = new esevaluado($equipos[$i],$eval->get('id'));
		$j = $j + ($esevaluado->insertar());
	}*/
	if($j==0){
		echo '<script>';
		echo 'alert("La Entrega fue creada exitosamente");';
		echo 'location.href="../principal.php?content=consultoEvaluacion&nombre='.$nombreE.'"';
		echo '</script>';
	}else{
		echo '<script>';
		echo 'alert("Error: Ya existia una evaluacion con el nombre introducido.");';
		echo 'location.href="../principal.php?content=registroEvaluacion"';
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