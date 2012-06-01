 <?php
	/*	UNIVERSIDAD SIMON BOLIVAR
		PERIODO:			ENE-MAR 2012
		MATERIA: 			SISTEMAS DE INFORMACION II
		NOMBRE DEL ARCHIVO:	class.EsEvaluado.php
	*/
include_once "fBaseDeDatos.php";

class entregaPresentacion {
        private $id;
		private $correoUSB;
		private $evaluacionPrevia;
		private $funcionalidad;
        private $interfaz;
        private $navegacion;
        private $conocimiento;
        private $usoHerramientas;
        private $comentarios;
        private $idEvaluacion;
        private $nombreEquipo;
		
		/*	Parametros de entrada:
		Parametros de salida: 
					Objeto del tipo esevaluado
		Descripcion	: Constructor de la clase evaluacion.  	
		*/
   		function __construct(   $correoUSB, $evaluacionPrevia, $funcionalidad,
                                $interfaz, $navegacion, $conocimiento, $usoHerramientas, 
                                $comentarios, $idEvaluacion, $nombreEquipo ) {
			$this->correoUSB        = $correoUSB;
			$this->evaluacionPrevia = $evaluacionPrevia;
			$this->funcionalidad    = $funcionalidad;
            $this->interfaz         = $interfaz;
            $this->navegacion       = $navegacion;
            $this->conocimiento     = $conocimiento;
            $this->usoHerramientas  = $usoHerramientas;
            $this->comentarios      = $comentarios;
            $this->idEvaluacion     = $idEvaluacion;
            $this->nombreEquipo     = $nombreEquipo;
        }

	   	/*  Parametros de entrada:
						NINGUNO
		Parametros de salida: 
					0:  Si la inserci�n se realiz� de forma exitosa
					1:  Si hubo un error durante la inserci�n
		Descripcion	: Funci�n que permite la inserci�n de un esevaluado en
                      la tabla esevaluado		
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
	  	public function actualizar($nombre_viejo) {			
			$parametro= "id";
			$fachaBD= fBaseDeDatos::getInstance();
			$insercion=$fachaBD->update($this,$parametro,$nombre_viejo,"=");
			return $insercion;		
		}
        
        public function salvar() {	
			$fachaBD = fBaseDeDatos::getInstance();
			$insercion=$fachaBD->update($this,"id",$this->id,'=');
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
			$parametro= "correoUSB";
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
			$atributos[0] = "correoUSB";
			$atributos[1] = "evaluacionPrevia";
			$atributos[2] = "funcionalidad";
            $atributos[3] = "interfaz";
            $atributos[4] = "navegacion";
            $atributos[5] = "conocimiento";
            $atributos[6] = "usoHerramientas";
            $atributos[7] = "comentarios";
            $atributos[8] = "idEvaluacion";
            $atributos[9] = "nombreEquipo";
			return $atributos;
		}
		
		/* Parametros de entrada:
				NINGUNO
			Parametros de salida:
				Arreglo con los atributos de la clase
		*/
		public function getAtributos() {
			$atributos = array();
			$atributos[0] = "correoUSB";
			$atributos[1] = "evaluacionPrevia";
			$atributos[2] = "funcionalidad";
            $atributos[3] = "interfaz";
            $atributos[4] = "navegacion";
            $atributos[5] = "conocimiento";
            $atributos[6] = "usoHerramientas";
            $atributos[7] = "comentarios";
            $atributos[8] = "idEvaluacion";
            $atributos[9] = "nombreEquipo";
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

 		public function poseeIdPostizo() {
			 return true;
		}
 
 		public function autocompletar() {
            if ($this->get('id') != NULL) {
                $clavePrimaria = array ();
                $clavePrimaria[0] = "id";
            }
            else if (    $this->get('correoUSB') != NULL 
                &&  $this->get('idEvaluacion') != NULL
                &&  $this->get('nombreEquipo') != NULL ) {
                $clavePrimaria = array ();
                $clavePrimaria[0] = "correoUSB";
                $clavePrimaria[1] = "idEvaluacion";
                $clavePrimaria[2] = "nombreEquipo";
            }
			$fachaBD= fBaseDeDatos::getInstance();
			return $fachaBD -> autocompletarObjeto($this,$clavePrimaria);
		}
}
?>