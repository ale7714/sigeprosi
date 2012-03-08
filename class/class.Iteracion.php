<?php
	/*	UNIVERSIDAD SIMON BOLIVAR
		PERIODO:			ENE-MAR 2012
		MATERIA: 			SISTEMAS DE INFORMACION II
		NOMBRE DEL ARCHIVO:	class.Iteracion.php
	*/
include_once "fBaseDeDatos.php";

class iteracion {
		
		private $id;
		private $nombre;
		private $tipo; /// 1-> Incepcion, 2-> Elaboracion, 3-> Construccion, 4-> Transicion
		private $artefactos;
		private $objetivos;
		private $productos;
		private $criterios;
		
		private static $_instance;
		/*	Parametros de entrada:
		Parametros de salida: 
					Objeto del tipo solicitud
		Descripcion	: Constructor de la clase solicitud.					
		*/
   		function __construct($ident,$name,$t,$artefact,$objs,$products,$criterias) {
			$this->id 		= $ident;
			$this->nombre   = $name;
			$this->tipo = $t;
			$this->artefactos = $artefact;
			$this->objetivos = $objs;
			$this->productos = $products;
			$this->criterios = $criterias;
        }
			
	   	/*  Parametros de entrada:
						NINGUNO
		Parametros de salida: 
					0:  Si la inserci�n se realiz� de forma exitosa
					1:  Si hubo un error durante la inserci�n
		Descripcion	: Funci�n que permite la inserci�n de una solicitud en
                      la tabla solicitud		
		*/
       public function insertar() {
			$fachaBD = fBaseDeDatos::getInstance();
   		    $insercion=$fachaBD->insert($this);
			return $insercion;
	   	}
		
		
		/*	Parametros de entrada:
		$email_viejo	: variable del tipo string que indica el email del cliente a actualizar
		Parametros de salida: 
					0:  Si la actualizaci�n se realiz� de forma exitosa
					1:  Si hubo un error durante la actualizaci�n
		Descripcion	: Funcion que permite actualizar la informaci�n de un cliente ya existente 
					  en la base de datos.					
		*/
	  	public function actualizar($clave) {			
			$parametro= "id";
			$fachaBD = fBaseDeDatos::getInstance();
			$insercion=$fachaBD->update($this,'id',$clave,'=');
			return $insercion;			
		}
		
		/*  Parametros de entrada:
						NINGUNO
		Parametros de salida: 
					0:  Si se elimino de forma exitosa 
					1:  Si hubo un error durante la eliminacion
		Descripcion	: Funci�n que permite eliminar una solicitud ya existente en
					  la base de datos.					
		*/
		public function eliminar() {
			$parametro= "id";
			$fachaBD= fBaseDeDatos::getInstance();
			$del=$fachaBD->delete($this,$parametro);
			return $del;
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
		
		/* Parametros de entrada:
				NINGUNO
			Parametros de salida:
				Arreglo con los atributos de la clase
		*/
		public function getAtributosP() {
			$atributos = array();
			$atributos[0] = "id";
			$atributos[1] = "nombre";
			$atributos[2] = "tipo";
			$atributos[3] = "artefactos";
			$atributos[4] = "objetivos";
			$atributos[5] = "productos";
			$atributos[6] = "criterios";
			return $atributos;
		}
		
		/* Parametros de entrada:
				NINGUNO
			Parametros de salida:
				Arreglo con los atributos de la clase
		*/
		public function getAtributos() {

			$atributos = array();
			$atributos[0] = "id";
			$atributos[1] = "nombre";
			$atributos[2] = "tipo";
			$atributos[3] = "artefactos";
			$atributos[4] = "objetivos";
			$atributos[5] = "productos";
			$atributos[6] = "criterios";
			return $atributos;
		}
		
		/* Parametros de entrada:
				$atributo: indica el atributo al que se desea 
				           dar el valor
				$valor:    la informacion
			Parametros de salida:
			               NINGUNO*/
		public function set($atributo, $valor) {
			 $this->$atributo = $valor;
		}
		public function autocompletar() {
			if ($this->get('id') == NULL)	return 1;
			$clavePrimaria = array ();
			$clavePrimaria[0] = "id";
			$fachaBD= fBaseDeDatos::getInstance();
			return $fachaBD -> autocompletarObjeto($this,$clavePrimaria);
		}
 		public function poseeIdPostizo() {
			 return false;
		}
}
?>