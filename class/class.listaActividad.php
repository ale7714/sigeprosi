<?php 
	/*	UNIVERSIDAD SIMON BOLIVAR
		PERIODO:			ENE-MAR 2012
		MATERIA: 			SISTEMAS DE INFORMACION II
		NOMBRE DEL ARCHIVO:	class.listaSolicitud.php
	*/
include_once "fBaseDeDatos.php";
include_once "class.Actividad.php";

class listaActividad extends actividad {
		
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
			$nombre[0] = "actividad";
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
				$actividad1 = new actividad($row['semana'],$row['fecha'],$row['descripcion'],$row['puntos'],$row['idEtapa'],$row['idEtapa']);
				$listarray[$i] = $actividad1;
				$i++;
			}
			
			return $listarray;		
		}		

		public function buscar($n){
			$fachaBD= fBaseDeDatos::getInstance();
			$nombre = array ();
			$nombre[0] = "actividad";
			$columnas = array();
			$columnas[0]= "*";
			$parametros= array ();
			$parametros[0] = "idEtapa";
			$valores= array();
			$valores[0]= $n;
			$Busqueda= new BusquedaConCondicion($nombre,$columnas,$parametros,$valores,"=","");
			$c= $fachaBD->search($Busqueda);
			$listarray = array();
			$listarray= null;
			$i=0;
			while($lista=mysql_fetch_array($c,MYSQL_ASSOC)) {
				$newc = new actividad($lista['semana'],$lista['fecha'],$lista['descripcion'],$lista['puntos'],$lista['idEtapa'],$lista['nombre']);
				$newc->set("id",$lista['id']);
				$listarray[$i]=$newc;
				$i=$i+1;
			}
			return $listarray;		
		}
        
        public function buscar2($n){
			$fachaBD= fBaseDeDatos::getInstance();
			$nombre = array ();
			$nombre[0] = "actividad";
			$columnas = array();
			$columnas[0]= "*";
			$parametros= array ();
			$parametros[0] = "idEtapa";
			$valores= array();
			$valores[0]= $n;
			$Busqueda= new BusquedaConCondicion($nombre,$columnas,$parametros,$valores,"=","");
			$c= $fachaBD->search($Busqueda);
			$listarray = array();
			$listarray= null;
			$i=0;
			while($lista=mysql_fetch_array($c,MYSQL_ASSOC)) {
				$listarray[$i]=$lista;
				$i=$i+1;
			}
			return $listarray;		
		}
}
?>