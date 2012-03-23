<?php 
	/*	UNIVERSIDAD SIMON BOLIVAR
		PERIODO:			ENE-MAR 2012
		MATERIA: 			SISTEMAS DE INFORMACION II
		NOMBRE DEL ARCHIVO:	class.listaProyecto.php
	*/
include_once "fBaseDeDatos.php";
include_once "class.CasoDeUso.php";

class listaCasoUsoIteracion extends casodeuso {

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
        
        public function cargar($idIter,$sigid,$sigord,$start,$limit) {
			$fachaBD= fBaseDeDatos::getInstance();
			$nombre = array ();
            $nombre[0] = "casodeuso AS t1";
            $nombre[1] = "pertenceiteracion AS t2";
			$columnas = array();
            $columnas[0]= "t1.id as id";
			$columnas[1]= "t1.nombre as nombre";
            $columnas[2]= "t1.completitud as completitud";
			$parametros= array ();
			$parametros[0] = "t1.id";
            $parametros[1] = "t2.idIteracion";
			$valores= array();
			$valores[0]= "t2.idCasoDeUso";
            $valores[1]= $idIter;
            $ord = array();
            $ord[0] = $sigord;
			$join = array();
            $join[0] = true;
            $join[1] = false;
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