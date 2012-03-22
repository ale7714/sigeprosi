<?php 
	include_once "../class/class.iteracion.php";
	include_once "../class/class.ActividadIteracion.php";
	include_once "../class/class.EsRecurso.php";
	$registro = new iteracion($_POST["nombreIter"],$_POST["tipoIteracion"],$_POST["objetivos"],$_POST["equipo"],0);
	if($registro->insertar()==0){
		$registro->autocompletar();
		$idIteracion=$registro->get('id');
		$descripciones=$_POST["descripcion"];
		$fechasInicio=$_POST["fechaInicio"];
		$fechasFin=$_POST["fechaFin"];
		$nombre=$_POST["nombreAct"];
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
				echo '\n'.$estudiantes[$k];
				$k++;
			}
			$i++;
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