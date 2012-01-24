<?php 
	/*	UNIVERSIDAD SIMON BOLIVAR
		PERIODO:			ENE-MAR 2012
		MATERIA: 			SISTEMAS DE INFORMACION II
		NOMBRE DEL ARCHIVO:	class.listaTelefonoSolicitud.php
	*/
include_once "fBaseDeDatos.php";
include_once "class.TelefonoSolicitud.php";

class listaTelefonoSolicitud extends telefonosolicitud {

		/*	Parametros de entrada:
					NINGUNO
		Parametros de salida: 
					Objeto del tipo listaSolicitud
		Descripcion	: Constructor de la clase listaSolicitud			
		*/
        function __construct() {
        }
		
		/*	Parametros de entrada:
					$n	 : 	variable del tipo int que representa el num de solicitud
		Parametros de salida: 
					telefonoSolicitud:	Instancia del tipo telefonosolicitud si la busqueda fue exitosa
					NULL: 		De lo contrario
		Descripcion	: 
					Funcion que	realiza la busqueda de un telefonosolicitud segun un parametro
		*/		
		public function buscarLista($n,$p1){
			$fachaBD= fBaseDeDatos::getInstance();
			$nombre = array ();
			$nombre[0] = "telefonosolicitud";
			$columnas = array();
			$columnas[0]= "*";
			$parametros= array ();
			$parametros[0] = $p1;
			$valores= array();
			$valores[0]= $n;
			$Busqueda= new BusquedaConCondicion($nombre,$columnas,$parametros,$valores,"=","");
			$c= $fachaBD->search($Busqueda);
			$newc = array();
			$i = 0;
			while(($lista=mysql_fetch_array($c,MYSQL_ASSOC)) != null) {			
				$newc[$i] = new telefonosolicitud($lista['nroSolicitud'],$lista['telefono']);
				$i++;
			}
			return $newc;		
		}
		
}
?>