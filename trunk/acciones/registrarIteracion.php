<?php 
	include_once "../class/class.iteracion.php";
	include_once "../class/class.ActividadIteracion.php";
	include_once "../class/class.EsRecurso.php";
	include_once "../class/class.perteneceIteracion.php";
	include_once "../class/class.casoDeUso.php";
	include_once "../class/class.productoextraiteracion.php";
	include_once "../class/class.criteriosPEI.php";
	include_once "../class/class.criterioscasodeuso.php";
	$registro = new iteracion($_POST["nombreIter"],$_POST["tipoIteracion"],$_POST["objetivos"],$_POST["equipo"],0);
	if($registro->insertar()==0){
		$registro->autocompletar();
		$idIteracion=$registro->get('id');
		$descripciones=$_POST["descripcion"];
		$fechasInicio=$_POST["fechaInicio"];
		$fechasFin=$_POST["fechaFin"];
		$nombre=$_POST["nombreAct"];
		if (isset($_POST["criteriosPE"])) $cpei=$_POST["criteriosPE"];
		$i = 0;
		$j = sizeof($descripciones);
		while( $i < $j) {
			$actividad = new ActividadIteracion($idIteracion,$nombre[$i],$descripciones[$i],$fechasInicio[$i],$fechasFin[$i]);
			if($actividad->insertar() != 0) {
				echo 'Error al agregar actividad';
			}
			$actividad->autocompletar();
			$idActividad=$actividad->get('id');
			$postName="estudiantes-".($i+1);
			$estudiantes=$_POST[$postName];
			$nEstudiantes= sizeof($estudiantes);
			$k=0;
			while( $k < $nEstudiantes){
				$e=new EsRecurso($estudiantes[$k],$idActividad);
				if($e->insertar() != 0){
					echo 'Error al agregar EsRecurso';
				}
				$k++;
			}
			$i++;
		}
		if (isset($_POST["CU"])){			
			$casosDeUso=$_POST["CU"];
			$criterios=$_POST["criterios"];
			$i = 0;
			$j = sizeof($casosDeUso);
			while( $i < $j) {
				$casoDeUso= new casoDeUso($casosDeUso[$i],null,null,$_POST["equipo"]);
				$casoDeUso->autocompletar();
				$idCasoDeUso=$casoDeUso->get('id');
				//echo '['.$idCasoDeUso.','.$idIteracion.']';
				$p = new perteneceIteracion($idCasoDeUso,$idIteracion);
				if($p->insertar() != 0) {
					echo 'Error al agregar CU';
				}
				$criterio= new criterioscasodeuso($idCasoDeUso,$criterios[$i]);
				if($criterio->insertar() != 0) {
					echo 'Error al agregar Criterio CU';
				}
				$i++;
			}
		}
		if (isset($_POST["criteriosPE"])){
			$PE=$_POST["PE"];
			$i = 0;
			$j = sizeof($PE);
			$textPE=$_POST["textPE"];
			while( $i < $j) {
				$pe= new productoextraiteracion($idIteracion,$PE[$i],$textPE[$i]);
				if($pe->insertar() != 0) {
					echo 'Error al agregar PE';
				}
				$pe->autocompletar();
				$idPE=$pe->get('id');
				$cri=new criteriosPEI($idPE,$ccu[$i]);
				if($cri->insertar() != 0) {
					echo 'Error al agregar Criterio PE';
				}
				$i++;
			}
		}
		/*
		$i = 0;
		$j = sizeof($descripciones);
		while( $i < $j) {
			$actividad = new ActividadIteracion($idIteracion,$nombre[$i],$descripciones[$i],$fechasInicio[$i],$fechasFin[$i]);
			if($actividad->insertar() != 0) {
				echo 'Error al agregar actividad';
			}
			$i++;
		}
		*/
	}
	/*
	if(($fachada->registrarPlanificacion($_POST["planificacion_name"],$_POST["numPlanif"],$_POST["semana"],$_POST["fecha"],$_POST["puntos"],$_POST["descripcion"],$_POST["nombreAct"]))==0){
		echo '<script>';
		echo 'alert("La planificacion fue creada exitosamente");';
		echo 'location.href="../principal.php?content=registroPlanificacion"';
		echo '</script>';
	}else{
		echo '<script>';
		echo 'alert("Error: Ya existia una planificacion con el nombre y numero introducido.");';
		echo 'location.href="../principal.php?content=registroPlanificacion"';
		echo '</script>';
	}*/
?>