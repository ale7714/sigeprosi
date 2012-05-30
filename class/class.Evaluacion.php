 <?php
	/*	UNIVERSIDAD SIMON BOLIVAR
		PERIODO:			ENE-MAR 2012
		MATERIA: 			SISTEMAS DE INFORMACION II
		NOMBRE DEL ARCHIVO:	class.EsEvaluado.php
	*/
include_once "fBaseDeDatos.php";

class evaluacion {
		private $id;
		private $nombre;
        private $idEtapa;
		private $notaMax;
		private $esPresentacion;
		
		/*	Parametros de entrada:
		Parametros de salida: 
					Objeto del tipo esevaluado
		Descripcion	: Constructor de la clase evaluacion.  	
		*/
   		function __construct($nom,$idEtapa,$nota,$espre) {
			$this->nombre           = $nom;
            $this->idEtapa          = $idEtapa;
			$this->notaMax 	        = $nota;
			$this->esPresentacion 	= $espre;
        }
			
		
	   	/*  Parametros de entrada:
						NINGUNO
		Parametros de salida: 
					0:  Si la inserción se realizó de forma exitosa
					1:  Si hubo un error durante la inserción
		Descripcion	: Función que permite la inserción de un esevaluado en
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
					0:  Si la actualización se realizó de forma exitosa
					1:  Si hubo un error durante la actualización
		Descripcion	: Funcion que permite actualizar la información de un cliente ya existente 
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
		Descripcion	: Función que permite eliminar una solicitud ya existente en
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
			$atributos[0] = "nombre";
            $atributos[1] = "idEtapa";
			$atributos[2] = "notaMax";
			$atributos[3] = "esPresentacion";
			return $atributos;
		}
		
		/* Parametros de entrada:
				NINGUNO
			Parametros de salida:
				Arreglo con los atributos de la clase
		*/
		public function getAtributos() {
			$atributos = array();
			$atributos[0] = "nombre";
            $atributos[1] = "idEtapa";
			$atributos[2] = "notaMax";
			$atributos[3] = "esPresentacion";
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
            else if ($this->get('nombre') != NULL && $this->get('idEtapa') != NULL) {
                $clavePrimaria = array ();
                $clavePrimaria[0] = "nombre";
                $clavePrimaria[1] = "idEtapa";
            }
			$fachaBD= fBaseDeDatos::getInstance();
			return $fachaBD -> autocompletarObjeto($this,$clavePrimaria);
		}
}
?>