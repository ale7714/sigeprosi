 <?php
	/*	UNIVERSIDAD SIMON BOLIVAR
		PERIODO:			ENE-MAR 2012
		MATERIA: 			SISTEMAS DE INFORMACION II
		NOMBRE DEL ARCHIVO:	class.Solicitud.php
	*/
include_once "fBaseDeDatos.php";

class avance {
		
		private $nombreProyecto;
		private $numero;
        private $artefactos;
        private $iteracion;
		private $porcentaje;
		private $tecnologia;
		private $idActividad;		
		private static $_instance;
		
		/*	Parametros de entrada:
		Parametros de salida: 
					Objeto del tipo solicitud
		Descripcion	: Constructor de la clase solicitud.					
		*/
   		function __construct($nombreProy1,$numero1,$artefactos1,$iteracion1,$porcentaje1,$tecnologia1,$idActividad1) {
			$this->nombreProyecto= $nombreProy1;
			$this->numero = $numero1;
			$this->artfactos = $artefactos1;
			$this->iteracion = $iteracion1;
			$this->porcentaje = $porcentaje1;
			$this->tecnologia = $tecnologia1;
			$this->idActividad = $idActividad1;
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
	  	public function actualizar($email_viejo) {			
			/*$parametro= "email";
			$fachaBD= fachadaBaseDeDatos::getInstance();
			$insercion=$fachaBD->update($this,$parametro,$email_viejo);
			return $insercion;*/			
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
			$parametro= "nro";
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
			$atributos[0] = "nombreProyecto";
			$atributos[1] = "numero";
			$atributos[2] = "artefactos";
			$atributos[3] = "iteracion";
			$atributos[4] = "porcentaje";
			$atributos[5] = "tecnologia";
			$atributos[6] = "idActividad";	
			
			return $atributos;
		}
		
		/* Parametros de entrada:
				NINGUNO
			Parametros de salida:
				Arreglo con los atributos de la clase
		*/
		public function getAtributos() {
			$atributos = array();
			$atributos[0] = "nobmreProyecto";
			$atributos[1] = "numero";
			$atributos[2] = "artefactos";
			$atributos[3] = "iteracion";
			$atributos[4] = "porcentaje";
			$atributos[5] = "tecnologia";
			$atributos[6] = "idActividad";
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
 
}
?>