<?PHP
    require_once "../aspectos/Seguridad.php";
    $seguridad = Seguridad::getInstance();
    $seguridad->escapeSQL($_GET);
    /** Cosas que necesitamos:
	  * '''''''''''''''''''''
	  *	- Entrega (Numero de la evaluacion, ej. quiz 1, quiz 2)
	  * - Evaluacion (Tipo, ejemplo quices)
	  * - Calificacion
	  * - Usuarios
	  */
	
	require_once "../class/class.Entrega.php";
	require_once "../class/class.Evaluacion.php";
	require_once "../class/class.Calificacion.php";
	require_once "../class/class.listaUsuarios.php";
    require_once "../class/class.listaEntrega.php";
    require_once "../class/class.listaCalificacion.php";
	
	$eval = new Evaluacion(null,null,null,null);
	$eval->set('id',$_GET['id']);
	$eval->autocompletar();
	
	$baseAct = new listaEntrega();
    $result = $baseAct->buscar($_GET['id'],'idEvaluacion');
	
	$contenido = array();
	$entregas = array("Nombre" => "Nombre","Apellido" =>"Apellido");
	foreach($result as $entrega){ //Obtenemos los estudiantes por cada entrega.
		$a = 0;
		$entregas = $entregas + array($entrega->get('nombre') => $entrega->get('nombre'));
		
		$id = $entrega->get('id');
		$baseAct2 = new listaCalificacion();
		$result2 = $baseAct2->cargarEstudiantesId($id,'nombre',$id);
		if ($contenido != null){
			foreach($result2 as $estudiante){
				$contenido[$a] = $contenido[$a] + $estudiante;
				$a++;
			}
		}
		else {$contenido = $result2;}
	}
	// calculamos promedio de cada estudiante.
	foreach($contenido as &$a){
		$prom = promedio($a);
		$a = $a + array('Promedio' => $prom);
	}
	
	//print_r($contenido);
	
	// Enviamos los encabezados de hoja de calculo
	header("Content-type: application/vnd.ms-excel");
	header("Content-Disposition: attachment; filename=excel.xls");
	 
	// Creamos la tabla
	$entregas = $entregas + array("Promedio" => "Promedio");
	echo "<table border =1>";
	
	echo "<tr>";//Imprimimos el titulo de la tabla
		echo "<th colspan=".sizeof($entregas)."><h2>".$eval->get('nombre')."</h2></th>";
	echo "</tr>";
	echo "<tr>";
	foreach ($entregas as $e){//Imprimimos encabezados
		echo "<th>".$e."</th>";
	}
	echo "</tr>";
	foreach ($contenido as $a){//Imprimimos el contenido de la tabla
		echo "<tr>";
		foreach ($a as $b){
			echo "<td>".$b."</td>";
		}
		echo "</tr>";
	}
	echo "</table>";
	
	/**
	 * Funcion para calcular el promedio de las notas de las entregas de un Estudiante.
	 *
	 * @param 	$array: arreglo que contiene las evaluaciones del estudiante.
	 * @return 	$promedio: promedio de notas de las evaluaciones.
	 */
	function promedio($array){
		$suma = 0;
		$total = sizeof($array);
		foreach($array as $a)	if (is_numeric($a)) $suma=$suma+$a;
			
		$promedio = $suma/($total - 3);
		return $promedio;
	}
	
?>