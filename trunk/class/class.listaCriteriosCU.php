<?php 
	/*	UNIVERSIDAD SIMON BOLIVAR
		PERIODO:			ENE-MAR 2012
		MATERIA: 			SISTEMAS DE INFORMACION II
		NOMBRE DEL ARCHIVO:	class.listaProyecto.php
	*/
include_once "fBaseDeDatos.php";
include_once "class.Iteracion.php";

class listaCriteriosCU {

		/*	Parametros de entrada:
					NINGUNO
		Parametros de salida: 
					Objeto del tipo listaSolicitud
		Descripcion	: Constructor de la clase listaSolicitud			
		*/
        function __construct() {
        }
		
		/*	Parametros de entrada:
					$n	: 	variable del tipo int que representa el num
		Parametros de salida: 
					cliente:	Instancia del tipo solicitud si la busqueda fue exitosa
					NULL: 		De lo contrario
		Descripcion	: 
					Funcion que	realiza la busqueda de una solicitud segun un parametro
		*/		
		// public function listar(){
			// $fachaBD= fBaseDeDatos::getInstance();
			// $nombre = array ();
			// $nombre[0] = "actividaditeracion";
			// $columnas = array();
			// $columnas[0]= "*";
			// $parametros= array ();
			// $parametros[0] = "";
			// $valores= array();
			// $valores[0]= "";
			// $Busqueda= new BusquedaSimple($nombre,$columnas,null);					
			// $result = $fachaBD->search($Busqueda);
			// $listarray = array();
			// $i=0;
			
			// while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {	
				// print "Hola";
				// $actividad1 = new ActividadIteracion($row['id'],$row['idIteracion'],$row['nombre'],$row['fechaInicio'],$row['fechaFin'],$row['descripcion']);
				// $listarray[$i] = $actividad1;
				// $i++;
			// }
			
			// return $listarray;		
		// }
		
		// public function buscar($n,$p){
			// $fachaBD= fBaseDeDatos::getInstance();
			// $nombre = array ();
			// $nombre[0] = "proyecto";
			// $columnas = array();
			// $columnas[0]= "*";
			// $parametros= array ();
			// $parametros[0] = $p;
			// $valores= array();
			// $valores[0]= $n;
			// $Busqueda= new BusquedaSimple($nombre,$columnas,null);					
			// $result = $fachaBD->search($Busqueda);
			// $listarray = array();
			// $i=0;
			// while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {	
				// $actividad1 = new proyecto($row['nombre'],$row['numeroSolicitud'],$row['estado'],$row['idEtapa']);
				// $listarray[$i] = $actividad1;
				// $i++;
			// }
			// return $listarray;		
		// }
        
        public function cargar($idCU,$sigid,$sigord,$start,$limit) {
			$fachaBD= fBaseDeDatos::getInstance();
			$nombre = array ();
			$nombre[0] = "criterioscasodeuso as t1";
			$columnas = array();
            $columnas[0]= "t1.criterios as criterios";
			$parametros= array ();
            $parametros[0] = "t1.idCasoDeUso";
			$valores= array();
            $valores[0]= $idCU;
            $ord = array();
            $ord[0] = "t1.idCasoDeUso";
			$join = array();
            $join[0] = false;
			$Busqueda= new BusquedaCompleta($nombre,$columnas,$parametros,$valores,"=","AND",
                                            $ord,$sigid,$start,$limit,$join);
			$c= $fachaBD->search($Busqueda);
			$listarray = array();
			$i=0;
			
			while ($row = mysql_fetch_array($c, MYSQL_ASSOC)) {	
				$listarray[$i] = $row;
				$i++;
			}
			
			return $listarray;		
		}
		
}
?>