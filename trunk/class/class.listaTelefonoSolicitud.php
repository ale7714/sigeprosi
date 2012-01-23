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
					$tel : 	variable del tipo int que representa el num de solicitud
		Parametros de salida: 
					cliente:	Instancia del tipo telefonosolicitud si la busqueda fue exitosa
					NULL: 		De lo contrario
		Descripcion	: 
					Funcion que	realiza la busqueda de un telefonosolicitud segun un parametro
		*/		
		public function buscar($n,$p1,$tel,$p2){
			$fachaBD= fBaseDeDatos::getInstance();
			$nombre = array ();
			$nombre[0] = "telefonosolicitud";
			$columnas = array();
			$columnas[0]= "*";
			$parametros= array ();
			$parametros[0] = $p1;
			$parametros[1] = $p2;
			$valores= array();
			$valores[0]= $n;
			$valores[1]= $tel;
			$Busqueda= new BusquedaConCondicion($nombre,$columnas,$parametros,$valores,"=","");
			$c= $fachaBD->search($Busqueda);
			if($lista=mysql_fetch_array($c,MYSQL_ASSOC)) {
				$newc = new telefonosolicitud($lista['nroSolicitud'],$lista['telefono']);
			}
			else {
				$newc= null;
			}
			return $newc;		
		}
		
}
?>