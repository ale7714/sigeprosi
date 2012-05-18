<?php 
	/*	UNIVERSIDAD SIMON BOLIVAR
		PERIODO:			ENE-MAR 2012
		MATERIA: 			SISTEMAS DE INFORMACION II
		NOMBRE DEL ARCHIVO:	class.listaProyecto.php
	*/
include_once "fBaseDeDatos.php";
include_once "class.Iteracion.php";

class listaIteracion {

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
        
        public function cargar($idEquipo,$sigid,$sigord,$start,$limit) {
			$fachaBD= fBaseDeDatos::getInstance();
			$nombre = array ();
			$nombre[0] = "iteracion";
			$columnas = array();
            $columnas[0]= "id";
			$columnas[1]= "nombre";
            $columnas[2]= "tipo";
            $columnas[3]= "estado";
			if ($idEquipo!=null){
				$parametros= array ();
				$parametros[0] = "idEquipo";
				$valores= array();
				$valores[0]= $idEquipo;
			}
            $ord = array();
            $ord[0] = $sigord;
			$join = array();
            $join[0] = false;
			if ($idEquipo!=null)	$Busqueda= new BusquedaCompleta($nombre,$columnas,$parametros,$valores,"=","",
                                            $ord,$sigid,$start,$limit,$join);
			else	$Busqueda= new BusquedaCompleta($nombre,$columnas,null,null,"=","",
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