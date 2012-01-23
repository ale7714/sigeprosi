<?php
	/*	UNIVERSIDAD SIMON BOLIVAR
		PERIODO:			ENE-MAR 2012
		MATERIA: 			SISTEMAS DE INFORMACION II
		NOMBRE DEL ARCHIVO:	class.listaSolicitud.php
	*/
include_once "fBaseDeDatos.php";

class Busqueda {
		
		// Toda Busqueda tiene una tabla y unos atributos de dicha tabla asociados
		protected $nombreTabla; //es un arreglo por si se desea realizar busquedas en varias tablas
		protected $columnas; //es un arreglo por si se desea seleccionar varias columnas de la(s) tabla(s)
		protected $objeto;
		private static $_instance;
		
		/*	Parametros de entrada:
			$nombre: variable de tipo string que indica el nombre de la tabla en la cual se buscara
			$columnas: variable de tipo string que indica la(s) columnas(s) que mostrara la busqueda
						EN CASO DE QUE SEA "select * from ..." ENTONCES columnas[0]= "*" <-- IMPORTANTE
		Parametros de salida: 
			Objeto del tipo Busqueda
		Descripcion	: Constructor de la clase Busqueda*/
   		function __construct($nombre,$columnas,$objeto=NULL) {
			$this->nombreTabla = $nombre;
			$this->columnas = $columnas;
			$this->objeto = $objeto;
        }
			
			
		/* Parametros de entrada:
			$atributo: indica el atributo que
				se desea obtener de una
				instancia de la clase
			Parametros de salida:
				El valor actual del atributo
				de la instancia de la clase*/
		public function get($atributo) {
			return $this->$atributo;
		}
		
		/*Parametros de entrada:
			$nombre: variable de tipo array que indica el nombre de la tablas 
		Parametros de salida:
			NINGUNO
		Descripcion:
			Funcion que pueden usar las clases que heradan los metodos 
			de la clase Busqueda para asignar un arreglo de tablas sobre la 
			cual buscar*/		
		protected function setNombre($nombre) { 
			$this->nombreTabla = $nombre; 
		}
		
		/*Parametros de entrada:
			$columnas: variable de tipo array que indica el nombre de los atributos 
		Parametros de salida:
			NINGUNO
		Descripcion:
			Funcion que pueden usar las clases que heradan los metodos 
			de la clase Busqueda para asignar las columnas a seleccionar en la
			busqueda*/		
		protected function setColumnas($columnas) {
			$this->columnas = $columnas;
		}

		/*Parametros de entrada:
			$columnas: variable del tipo objeto
		Parametros de salida:
			NINGUNO
		Descripcion:
			Funcion que pueden usar las clases que heradan los metodos 
			de la clase Busqueda para asignar las columnas a seleccionar en la
			busqueda*/		
		protected function setObjeto($objeto) {
			$this->objeto = $objeto;
		}
		
		/*Parametros de entrada:
			ninguno
		Parametros de salida:
			para las clases que heredan de esta, un string que contiene la consulta a
			realizar en la base de datos
		Descripcion:
			esta funcion la sobreescriban BusquedaSimple y BusquedaConCondicion que son
			las que extienden esta clase abstracta, consulta() devuelve el string con el
			que se consultara a la base de datos, BusquedaSimple devolvera algo del estilo
			"select * from tabla" o "select atr1,atr2 from tabla1,tabla2", es decir, una
			consulta sin where, mientras que BusquedaConCondicion si devolvera consultas con
			where incluido*/
		public function consulta() {
		
		}

}
?>