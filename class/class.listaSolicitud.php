<?php 
	/*	UNIVERSIDAD SIMON BOLIVAR
		PERIODO:			ENE-MAR 2012
		MATERIA: 			SISTEMAS DE INFORMACION II
		NOMBRE DEL ARCHIVO:	class.listaSolicitud.php
	*/
include_once "fBaseDeDatos.php";
include_once "class.Solicitud.php";

class listaSolicitud extends solicitud {

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
		public function buscar($n,$p){
			$fachaBD= fBaseDeDatos::getInstance();
			$nombre = array ();
			$nombre[0] = "solicitud";
			$columnas = array();
			$columnas[0]= "*";
			$parametros= array ();
			$parametros[0] = $p;
			$valores= array();
			$valores[0]= $n;
			$Busqueda= new BusquedaConCondicion($nombre,$columnas,$parametros,$valores,"=","");
			$c= $fachaBD->search($Busqueda);
			if($lista=mysql_fetch_array($c,MYSQL_ASSOC)) {
				$newc = new solicitud($lista['nro'],null,null,null,null,null,null,null,null);
			}
			else {
				$newc= null;
			}
			return $newc;		
		}
		
}
?>