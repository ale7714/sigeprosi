<?php 
	/*	UNIVERSIDAD SIMON BOLIVAR
		PERIODO:			ABR-JUL 2012
		MATERIA: 			SISTEMAS DE INFORMACION III
		NOMBRE DEL ARCHIVO:	registrarEntregaPresentacion.php
	*/
    //$root = $_SERVER['DOCUMENT_ROOT']."/sigeprosi/";
	include_once "../class/class.EntregaPresentacion.php";
	include_once "../class/class.Evaluacion.php";
    require_once "../aspectos/Seguridad.php";
    $seguridad = Seguridad::getInstance();
    $seguridad->escapeSQL($_POST);
	$equipo =   $_POST['equipo'];
    $idEval =   $_POST['id'];
    $user   =   $_POST["correoUSB"];
    $entrega = new entregaPresentacion($user,0,0,0,0,0,0,"",$idEval,$equipo);
    $is = $entrega->autocompletar();
    $entrega->set('evaluacionPrevia',$_POST['evalPrev']);
    $entrega->set('funcionalidad',$_POST['func']);
    $entrega->set('interfaz',$_POST['inter']);
    $entrega->set('navegacion',$_POST['nav']);
    $entrega->set('conocimiento',$_POST['conoc']);
    $entrega->set('usoHerramientas',$_POST['usoHer']);
    $entrega->set('comentarios',$_POST['coment']);
    if ($is) $is = $entrega->insertar(); else $is = $entrega->salvar();
    if($is==0){
        echo '<script>';
        echo 'alert("Se registro su evaluacion exitosamente");';
        echo 'location.href="../principal.php?content=consultoEvaluacion&id='.$idEval.'"';
        echo '</script>';
    }else{
        echo '<script>';
        echo 'alert("Error: No se pudo registrar su evaluacion.");';
        echo 'location.href="../principal.php"';
        echo '</script>';
    }
?>