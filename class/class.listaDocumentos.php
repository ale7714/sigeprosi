<?php 
	/*	UNIVERSIDAD SIMON BOLIVAR
		PERIODO:			ENE-MAR 2012
		MATERIA: 			SISTEMAS DE INFORMACION II
		NOMBRE DEL ARCHIVO:	class.listaProyecto.php
	*/
include_once "fBaseDeDatos.php";
include_once "class.documento.php";

class listaDocumentos extends documento {

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
			$nombre[0] = "documento";
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
				$etapa = new documento($row['nombreEquipo'],$row['nombre'],$row['ruta']);
				$listarray[$i] = $etapa;
				$i++;
			}
			return $listarray;		
		}
		
		public function filtrar($n,$p){
			$fachaBD= fBaseDeDatos::getInstance();
			$nombre = array ();
			$nombre[0] = "documento";
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
				$actividad1 = new documento($row['nombre']);
				$listarray[$i] = $actividad1;
				$i++;
			}
			return $listarray;		
		}
        
    public function cargar($catalog,$sigid,$sigord,$start,$limit) {
			$fachaBD= fBaseDeDatos::getInstance();
			$nombre = array ();
			$nombre[0] = "documento";
      $columnas = array();
			$columnas[0]= "*";
			$parametros= array ();
			$parametros[0] = "nombreEquipo";
			$valores= array();
			$valores[0]= $catalog;
      $ord = array();
      $ord[0] = $sigord;
      $join = array();
      $join[0] = false;
			$Busqueda= new BusquedaCompleta($nombre,$columnas,$parametros,$valores,"=","",
                                            $ord,$sigid,$start,$limit,$join);
			$c= $fachaBD->search($Busqueda);
			$listarray = array();
			$i=0;
			while($lista=mysql_fetch_array($c,MYSQL_ASSOC)) {
				$newc = new documento($lista['nombreEquipo'],$lista['nombre'],$lista['ruta']);
				$listarray[$i]=$newc;
				$i=$i+1;
			}
			return $listarray;		
		}

		public function buscar($parametros,$valores,$sigid,$sigord,$start,$limit){
			$fachaBD= fBaseDeDatos::getInstance();
			$nombre = array ();
			$nombre[0] = "documento";
			$columnas = array();
			$columnas[0]= "*";
            $ord = array();
            $ord[0] = $sigord;
            $join = array();
            $join[0] = false;
			$Busqueda= new BusquedaCompleta($nombre,$columnas,$parametros,$valores,"=","",
                                            $ord,$sigid,$start,$limit,$join);
			$c= $fachaBD->search($Busqueda);
			$listarray = array();
			$i=0;
			while($lista=mysql_fetch_array($c,MYSQL_ASSOC)) {
				$listarray[$i]=$lista;
				$i=$i+1;
			}
			return $listarray;		
		}
		
}
?>
