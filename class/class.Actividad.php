 <?php
	/*	UNIVERSIDAD SIMON BOLIVAR
		PERIODO:			ENE-MAR 2012
		MATERIA: 			SISTEMAS DE INFORMACION II
		NOMBRE DEL ARCHIVO:	class.Solicitud.php
	*/
include_once "fBaseDeDatos.php";

class actividad {
		
		private $semana;
		private $nombre;
		private $fecha;
        private $descripcion;
        private $puntos;
		private $idEtapa;
		private $id;
		private static $_instance;		
		/*	Parametros de entrada:
		Parametros de salida: 
					Objeto del tipo solicitud
		Descripcion	: Constructor de la clase solicitud.					
		*/
   		function __construct($semana1,$fecha1,$descripcion1,$puntos1,$idEtapa1,$nombre1) {
			$this->semana           = $semana1;
			$this->fecha = $fecha1;
			$this->descripcion = $descripcion1;
			$this->puntos        = $puntos1;
			$this->idEtapa        = $idEtapa1;
			$this->nombre        = $nombre1;
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
	  	public function actualizar($id) {			
			$fachaBD= fBaseDeDatos::getInstance();
			$actualizacion=$fachaBD->update($this,"id",$id,"=");
			return $actualizacion;		
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
			$atributos[0] = "semana";
			$atributos[1] = "fecha";
			$atributos[2] = "descripcion";
			$atributos[3] = "puntos";
			$atributos[4] = "idEtapa";	
			$atributos[5] = "nombre";	
				
			return $atributos;
		}
				
		/* Parametros de entrada:
				NINGUNO
			Parametros de salida:
				Arreglo con los atributos de la clase
		*/
		public function getAtributos() {
			$atributos = array();
			$atributos[0] = "semana";
			$atributos[1] = "fecha";
			$atributos[2] = "descripcion";
			$atributos[3] = "puntos";
			$atributos[4] = "idEtapa";	
			$atributos[5] = "nombre";			
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
			if (($this->get('nombre') == NULL || $this->get('fecha') == NULL) && ($this->get('id') == NULL))	return 1;
			$clavePrimaria = array ();
			if ($this->get('fecha') != NULL)	$clavePrimaria[0] = "id";
			else{
				$clavePrimaria[0] = "nombre";
				$clavePrimaria[1] = "fecha";
			}
			$fachaBD= fBaseDeDatos::getInstance();
			return $fachaBD -> autocompletarObjeto($this,$clavePrimaria);
		}
		public function poseeIdPostizo() {
			 return true;
		}
}
?>
