<?php
	/*	UNIVERSIDAD SIMON BOLIVAR
		PERIODO:			ENE-MAR 2012
		MATERIA: 			SISTEMAS DE INFORMACION II
		NOMBRE DEL ARCHIVO:	class.listaSolicitud.php
	*/
include_once "fBaseDeDatos.php";

class BusquedaConCondicion extends Busqueda{
		
		/* Una BusquedaConCondicion posee un arreglo de parametros, un arreglo de valores correspondientes
		a cada parametro, un simbolo sobre el cual comparar las parametros con sus valores, y un concatenador de expresiones, 
		tales como AND u OR*/
        protected $parametros; //esto es un arreglo
        protected $valorParametros; //es el arreglo correspondiente al valor de cada parametro
		protected $simbolo; //por lo general es "=" pero puede ser cualquier operador valido
		protected $concatenador; //se usa para concatenar expresiones, por lo general es "AND"
		private static $_instance;
		
		/*Parametros de entrada:
			$nombre: variable de tipo array que indica el nombre de la(s) tabla(s) sobre la(s) cual(es) buscar
			$columnas: variable de tipo array que indica la(s) columna(s) a seleccionar en la busqueda
			$parametros: variable de tipo array que indica el(los) parametro(s) para realizar la busqueda
			$valores: variable de tipo array que indica el(los) valor(es) de el(los) parametro(s) para buscar 
			$simbolo: variable de tipo string que indica el simbolo que se usa para comparar las parametros con los valores
						en la busqueda
			$concat: variable de tipo string que indica el concatenador de expresiones en el fragmento del where
		Parametros de salida: 
			Objeto del tipo BusquedaConCondicion
		Descripcion	: Constructor de la clase BusquedaConCondicion.	*/
   		function __construct($nombre,$columnas,$parametros,$valores,$simbolo,$concat,$objeto=NULL) {
			parent::setNombre($nombre); //arreglo
			parent::setColumnas($columnas); //arreglo
			parent::setObjeto($objeto); 
			$this->parametros = $parametros; //arreglo
			$this->valorParametros = $valores; //arreglo
			$this->simbolo = $simbolo;
			$this->concatenador= $concat;
        }
		
		/*Parametros de entrada:
			ninguno
		Parametros de salida:
			$string: contiene la consulta a realizar en la base de datos, como estamos en BusquedaConCondicion sera del 
					estilo "select (...) from (...) where (...)"
		Descripcion:
			devuelve el string con el que se consultara a la base de datos 
		*/
		// esta funcion esta deseñada suponiendo que no existen 2 o mas atributos que se llamen igual en las tablas que se consultan
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
			//parte de construir el where y asi tener al final "select c1,c2,... from t1,t2,... where ..."
			$N= sizeof($this->parametros);
			$string= $string." where ";
			$parametros= $this->parametros;
			$valorParametros= $this->valorParametros;
			for ($i=0; $i<$N; $i++) {
				$atributo= $parametros[$i]; 
				$valor= $valorParametros[$i];
				if ($i != $N-1) {	
					$string= $string."$atributo"."$this->simbolo"."'$valor' "."$this->concatenador ";
					//print $string;
				}
				else {
					//print $string;
					//var_dump($atributo);
					//var_dump($valor);
					$string= $string."$atributo"."$this->simbolo"."'$valor'";
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