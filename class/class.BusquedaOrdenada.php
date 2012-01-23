<?php
	/*	UNIVERSIDAD SIMON BOLIVAR
		PERIODO:			ENE-MAR 2012
		MATERIA: 			SISTEMAS DE INFORMACION II
		NOMBRE DEL ARCHIVO:	class.listaSolicitud.php
	*/
include_once "fBaseDeDatos.php";

class BusquedaOrdenada extends Busqueda{
		
		protected $parametros; //esto es un arreglo
        protected $valorParametros; //es el arreglo correspondiente al valor de cada parametro
		protected $simbolo; //por lo general es "=" pero puede ser cualquier operador valido
		protected $concatenador; //se usa para concatenar expresiones, por lo general es "AND"
		protected $order;
		private static $_instance;
		
		function __construct(){
			return ($this);
        }
		
		public function set($atributo,$valor){
			$this->$atributo = $valor;
			return($this);
		}
		
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
				}
				else {
					$string= $string."$atributo"."$this->simbolo"."'$valor' order by '".($this->order)."'";
				}
			}
			return $string;
		}
}
?>