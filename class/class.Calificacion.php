 <?php
	/*	UNIVERSIDAD SIMON BOLIVAR
		PERIODO:			ENE-MAR 2012
		MATERIA: 			SISTEMAS DE INFORMACION II
		NOMBRE DEL ARCHIVO:	class.Equipo.php
	*/
include_once "fBaseDeDatos.php";
class calificacion {
		private $id;
		private $idEntrega;
		private $correoUSB;
        private $nota;
		
		/*	Parametros de entrada:
		Parametros de salida: 
					Objeto del tipo calificacion
		Descripcion	: Constructor de la clase calificacion.					
		*/
   		function __construct($idEntrega, $correoUSB, $nota) {
			$this->idEntrega   = $idEntrega;
			$this->correoUSB   = $correoUSB;
            $this->nota         = $nota;
        }
			
		
	   	/*  Parametros de entrada:
						NINGUNO
		Parametros de salida: 
					0:  Si la inserción se realizó de forma exitosa
					1:  Si hubo un error durante la inserción
		Descripcion	: Función que permite la inserción de una solicitud en
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
					0:  Si la actualización se realizó de forma exitosa
					1:  Si hubo un error durante la actualización
		Descripcion	: Funcion que permite actualizar la información de un cliente ya existente 
					  en la base de datos.					
		*/
	  	public function actualizar($vjo) {	
			$fachaBD = fBaseDeDatos::getInstance();
			$insercion=$fachaBD->updateConVariosParametros($this,$vjo,'=');
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
			$fachaBD= fBaseDeDatos::getInstance();
			$del=$fachaBD->deleteConVariosParametros($this,"=");
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
            $atributos[0] = "id";   // Hay que tener cuidado ya que alrevelar el id
                                    // se acarrean problemas.
			$atributos[1] = "idEntrega";
			$atributos[2] = "correoUSB";
            $atributos[3] = "nota";
			return $atributos;
		}
		
		/* Parametros de entrada:
				NINGUNO
			Parametros de salida:
				Arreglo con los atributos de la clase
		*/
		public function getAtributos() {
			$atributos = array();
            $atributos[0] = "id";   // Hay que tener cuidado ya que alrevelar el id
                                    // se acarrean problemas.
			$atributos[1] = "idEntrega";
			$atributos[2] = "correoUSB";
            $atributos[3] = "nota";
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
			if ($this->get('correoUSB') != NULL && $this->get('idEntrega') != NULL) {
                $clavePrimaria = array ();
                $clavePrimaria[0] = "correoUSB";
                $clavePrimaria[1] = "idEntrega";
            }
            else if ($this->get('id') != NULL) {
                $clavePrimaria = array ();
                $clavePrimaria[0] = "id";
            }
            else return 1;
			$fachaBD= fBaseDeDatos::getInstance();
			return $fachaBD -> autocompletarObjeto($this,$clavePrimaria);
		}
		
		public function poseeIdPostizo() {
			 return true;
		}
}
?>
