 <?php
	/*	UNIVERSIDAD SIMON BOLIVAR
		PERIODO:			ENE-MAR 2012
		MATERIA: 			SISTEMAS DE INFORMACION II
		NOMBRE DEL ARCHIVO:	class.Equipo.php
	*/
include_once "fBaseDeDatos.php";
class elemento {
		private $id;
		private $idCatalogo;
		private $nombre;
        private $registro;
        private $columna;
        private $desabilitado;
		private static $_instance;
		
		/*	Parametros de entrada:
		Parametros de salida: 
					Objeto del tipo estudiante
		Descripcion	: Constructor de la clase estudiante.					
		*/
   		function __construct($idCatalogo, $nombre, $registro, $columna, $desabilitado) {
			$this->idCatalogo   = $idCatalogo;
			$this->nombre       = $nombre;
            $this->registro     = $registro;
            $this->columna      = $columna;
            $this->desabilitado = $desabilitado;
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
			$atributos[1] = "idCatalogo";
			$atributos[2] = "nombre";
            $atributos[3] = "registro";
            $atributos[4] = "columna";
            $atributos[5] = "desabilitado";
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
			$atributos[1] = "idCatalogo";
			$atributos[2] = "nombre";
            $atributos[3] = "registro";
            $atributos[4] = "columna";
            $atributos[5] = "desabilitado";
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
			if ($this->get('nombre') != NULL && $this->get('idCatalogo') != NULL) {
                $clavePrimaria = array ();
                $clavePrimaria[0] = "nombre";
                $clavePrimaria[1] = "idCatalogo";
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
