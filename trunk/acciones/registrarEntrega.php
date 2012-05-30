<?php 
	/*	UNIVERSIDAD SIMON BOLIVAR
		PERIODO:			ENE-MAR 2012
		MATERIA: 			SISTEMAS DE INFORMACION II
		NOMBRE DEL ARCHIVO:	registrarCasoUso.php
	*/
    //$root = $_SERVER['DOCUMENT_ROOT']."/sigeprosi/";
	include_once "../class/class.Entrega.php";
	include_once "../class/class.Calificacion.php";
	include_once "../class/class.listaesevaluado.php";
	include_once "../class/class.listaParticipa.php";
    require_once "../aspectos/Seguridad.php";
    $seguridad = Seguridad::getInstance();
    $seguridad->escapeSQL($_POST);
	$id = $_POST["id"];
    $nombre = $_POST["nombreEntrega"];
    $nota = $_POST["notaEntrega"];
    $entrega = new entrega($nombre,$nota,$id);
	$j=$entrega->insertar();
    if ($j != 0)
    {
		echo '<script>';
		echo 'alert("Error: Ya existia una evaluacion con el nombre introducido.");';
		echo 'location.href="../principal.php?content=registroEvaluacion"';
		echo '</script>';
	}
    else {
        $entrega->autocompletar();
        $list = new listaesevaluado();
        $equipos = $list->buscar($id,'idEvaluacion');
        $N = sizeof($equipos);
        for ($i=0; $i<$N; $i++) {
            $miembros = new listaParticipa();
            $lista = $miembros->buscar($equipos[$i]->get('nombreEquipo'),'nombreEquipo');
            $N2 = sizeof($lista);
            for ($m=0; $m<$N2; $m++){
                $calificacion = new calificacion($entrega->get('id'),$lista[$m]->get('correoUSBUsuario'),null);
                $calificacion->insertar();
            }		 
        }
        if($j==0){
            echo '<script>';
            echo 'alert("La Entrega fue creada exitosamente");';
            echo 'location.href="../principal.php?content=consultoEvaluacion&id='.$id.'"';
            echo '</script>';
        }else{
            echo '<script>';
            echo 'alert("Error: Ya existia una evaluacion con el nombre introducido.");';
            echo 'location.href="../principal.php?content=registroEvaluacion"';
            echo '</script>';
        }
	}
?>