 <?php
	/*	UNIVERSIDAD SIMON BOLIVAR
		PERIODO:			ENE-MAR 2012
		MATERIA: 			SISTEMAS DE INFORMACION II
		NOMBRE DEL ARCHIVO:	class.Desarrolla.php
	*/
include_once "fBaseDeDatos.php";

class desarrolla {
		
		private $nombreEquipo;
		private $nombreProyecto;
        private $idEtapa;
		private static $_instance;
		
		/*	Parametros de entrada:
		Parametros de salida: 
					Objeto del tipo desarrolla
		Descripcion	: Constructor de la clase desarrolla.					
		*/
   		function __construct($nombre,$nomProy,$idTrim) {
			$this->nombreEquipo     = $nombre;
			$this->nombreProyecto 	= $nomProy;
			$this->idEtapa   		= $idTrim;
        }
			
		
	   	/*  Parametros de entrada:
						NINGUNO
		Parametros de salida: 
					0:  Si la inserción se realizó de forma exitosa
					1:  Si hubo un error durante la inserción
		Descripcion	: Función que permite la inserción de un desarrolla en
                      la tabla desarrolla		
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
			$parametro= "nombreEquipo";
			$fachaBD= fBaseDeDatos::getInstance();
			$insercion=$fachaBD->update($this,$parametro,$nombre_viejo,'=');
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
			$atributos[0] = "nombreEquipo";
			$atributos[1] = "nombreProyecto";
			$atributos[2] = "idEtapa";
			return $atributos;
		}
		
		/* Parametros de entrada:
				NINGUNO
			Parametros de salida:
				Arreglo con los atributos de la clase
		*/
		public function getAtributos() {
			$atributos = array();
			$atributos[0] = "nombreEquipo";
			$atributos[1] = "nombreProyecto";
			$atributos[2] = "idEtapa";
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
			$clavePrimaria = array ();
            $clavePrimaria[0] = 'nombreEquipo';
            // $i = 0;
            // foreach ($this->getAtributos() as $atributo){
                // if ($this->get($atributo) != NULL) {
                    // $clavePrimaria[$i] = $atributo;
                    // $i++;
                // }
            // }
			$fachaBD= fBaseDeDatos::getInstance();
			return $fachaBD -> autocompletarObjeto($this,$clavePrimaria);
		}
		public function poseeIdPostizo() {
			 return false;
		}
 
}
?>