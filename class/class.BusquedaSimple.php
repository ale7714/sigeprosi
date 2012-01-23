<?php
	/*	UNIVERSIDAD SIMON BOLIVAR
		PERIODO:			ENE-MAR 2012
		MATERIA: 			SISTEMAS DE INFORMACION II
		NOMBRE DEL ARCHIVO:	class.listaSolicitud.php
	*/
include_once "fBaseDeDatos.php";

class BusquedaSimple extends Busqueda {
		
		private static $_instance;
		
		/*Parametros de entrada:
			$nombre: variable de tipo array que indica el nombre de la(s) tabla(s) sobre la(s) cual(es) buscar
			$columnas: variable de tipo array que indica la(s) columna(s) a seleccionar en la busqueda
			$objeto:  variable del tipo objeto del cual se esta buscando
		Parametros de salida: 
			Objeto del tipo BusquedaSimple
		Descripcion	: Constructor de la clase BusquedaSimple*/
   		function __construct($nombre,$columnas,$objeto=NULL) {
			parent::setNombre($nombre); //arreglo
			parent::setColumnas($columnas); //arreglo
			parent::setObjeto($objeto); 
        }
		
		/*Parametros de entrada:
			ninguno
		Parametros de salida:
			$string: contiene la consulta a realizar en la base de datos, como estamos en BusquedaSimple sera del 
					estilo "select (...) from (...)"
		Descripcion:
			devuelve el string con el que se consultara a la base de datos 
		*/
		// esta funcion esta deseniada suponiendo que no existen 2 o mas atributos que se llamen igual en las tablas que se consultan
		// si se quiere realizar la busqueda mas basica que es select * entonces el "columnas" debe ser "*"
		public function consulta() {
			$string= "select ";
			$N= sizeof($this->columnas);
			// parte de construir "select c1,c2,... from"
			$columnas= $this->columnas;
			for ($i=0; $i<$N; $i++) {
				if ($i != $N-1) {	
					$string= $string."$columnas[$i],";
				}
				else {
					$string= $string."$columnas[$i] from ";
				}
			}
			// ya con "select c1,c2... from" construido ahora se construye "select c1,c2,... from t1,t2..." 
			$N= sizeof($this->nombreTabla);
			$nombreTabla= $this->nombreTabla;
			for ($i=0; $i<$N; $i++) {
				if ($i != $N-1) {	
					$string= $string."$nombreTabla[$i],";
				}
				else {
					$string= $string."$nombreTabla[$i]";
				}
			}
			return $string;
		}
		
		/* Parametros de entrada:
				$atributo: variable de tipo string que indica el nombre del atributo de esta clase
							al cual se le devolvera su correspondiente valor
			Parametros de salida:
				el valor correspondiente del atributo $atributo en esta clase*/
		public function get($atributo) {
			return $this->$atributo;
		}
				 
}
?>