<?php 
	/*	UNIVERSIDAD SIMON BOLIVAR
		PERIODO:			ENE-MAR 2012
		MATERIA: 			SISTEMAS DE INFORMACION II
		NOMBRE DEL ARCHIVO:	class.listaProyecto.php
	*/
include_once "fBaseDeDatos.php";
include_once "class.Proyecto.php";

class listaProyecto {

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
		public function listar(){
			$fachaBD= fBaseDeDatos::getInstance();
			$nombre = array ();
			$nombre[0] = "proyecto";
			$columnas = array();
			$columnas[0]= "*";
			$parametros= array ();
			$parametros[0] = "";
			$valores= array();
			$valores[0]= "";
			$Busqueda= new BusquedaSimple($nombre,$columnas,null);					
			$result = $fachaBD->search($Busqueda);
			$listarray = array();
			$i=0;
			
			while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {	
				//print "Hola";
				$actividad1 = new proyecto($row['nombre'],$row['numeroSolicitud'],$row['estado'],$row['idEtapa']);
				$listarray[$i] = $actividad1;
				$i++;
			}
			
			return $listarray;		
		}
		
		public function buscar($n,$p){
			$fachaBD= fBaseDeDatos::getInstance();
			$nombre = array ();
			$nombre[0] = "proyecto";
			$columnas = array();
			$columnas[0]= "*";
			$parametros= array ();
			$parametros[0] = $p;
			$valores= array();
			$valores[0]= $n;
			$Busqueda= new BusquedaSimple($nombre,$columnas,null);					
			$result = $fachaBD->search($Busqueda);
			$listarray = array();
			$i=0;
			while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {	
				//print "Hola";
				$actividad1 = new proyecto($row['nombre'],$row['numeroSolicitud'],$row['estado'],$row['idEtapa']);
				$listarray[$i] = $actividad1;
				$i++;
			}
			return $listarray;		
		}
        
        public function cargar($sigid,$sigord,$start,$limit) {
			$fachaBD= fBaseDeDatos::getInstance();
			$nombre = array ();
			$nombre[0] = "proyecto AS t1";
            $nombre[1] = "etapa AS t2";
			$columnas = array();
			$columnas[0]= "t1.nombre as nombre";
            $columnas[1]= "t1.numeroSolicitud as numeroSolicitud";
            $columnas[2]= "t1.estado as estado";
            $columnas[3]= "t2.nombre as etapaNombre";
			$parametros= array ();
			$parametros[0] = "t1.idEtapa";
			$valores= array();
			$valores[0]= "t2.id";
            $ord = array();
            $ord[0] = $sigord;
			$join = array();
            $join[0] = true;
			$Busqueda= new BusquedaCompleta($nombre,$columnas,$parametros,$valores,"=","",
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
        
        public function obtenerProyectoPorEtapa($idEtapa) {
			$fachaBD= fBaseDeDatos::getInstance();
			$nombre = array ();
			$nombre[0] = "proyecto";
            $columnas = array();
			$columnas[0]= "*";
            $parametros= array ();
			$parametros[0] = "idEtapa";
			$valores= array();
			$valores[0]= $idEtapa;
            $ord = array();
            $ord[0] = "nombre";
            $sigid = "ASC";
            $join = array();
            $join[0] = false;
			$Busqueda= new BusquedaCompleta($nombre,$columnas,$parametros,$valores,"=","",
                                            $ord,$sigid,null,null,$join);
			$c= $fachaBD->search($Busqueda);
			$listarray = array();
			$i=0;
			while($lista=mysql_fetch_array($c,MYSQL_ASSOC)) {
				$listarray[$i]= new proyecto (
                    $lista['nombre'], $lista['numeroSolicitud'],
                    $lista['numeroSolicitud'], $lista['estado'], $idEtapa
                );
				$i=$i+1;
			}
			return $listarray;		
		}
		
        public function obtenerProyectoPorAsociacion($correoUSB) {
			$fachaBD= fBaseDeDatos::getInstance();
			$nombre = array ();
			$nombre[0] = "proyecto";
            $nombre[1] = "seasocia";
            $columnas = array();
			$columnas[0]= "*";
            $parametros= array ();
			$parametros[0] = "correoUSBUsuario";
            $parametros[1] = "nombreProyecto";
			$valores= array();
			$valores[0]= $correoUSB;
            $valores[1]= "nombre";
            $ord = array();
            $ord[0] = "nombre";
            $sigid = "ASC";
            $join = array();
            $join[0] = false;
            $join[1] = true;
			$Busqueda= new BusquedaCompleta($nombre,$columnas,$parametros,$valores,"=","AND",
                                            $ord,$sigid,null,null,$join);
			$c= $fachaBD->search($Busqueda);
			$listarray = array();
			$i=0;
			while($lista=mysql_fetch_array($c,MYSQL_ASSOC)) {
				$listarray[$i]= new proyecto (
                    $lista['nombre'], $lista['numeroSolicitud'],
                    $lista['numeroSolicitud'], $lista['estado'], $lista['idEtapa']
                );
				$i=$i+1;
			}
			return $listarray;		
		}
}
?>