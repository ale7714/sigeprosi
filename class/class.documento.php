 <?php
	/*	UNIVERSIDAD SIMON BOLIVAR
		PERIODO:			ENE-MAR 2012
		MATERIA: 			SISTEMAS DE INFORMACION
		NOMBRE DEL ARCHIVO:	class.Documento.php
	*/
include_once "fBaseDeDatos.php";

class documento {
		private $nombreEquipo;
		private $nombre;
    private $ruta;
		private static $_instance;
		
		/*	Parametros de entrada:
		Parametros de salida: 
					Objeto del tipo solicitud
		Descripcion	: Constructor de la clase solicitud.					
		*/
   		function __construct($nomE,$nom,$route) {
				$this->nombreEquipo = $nomE;
				$this->nombre				= $nom;
				$this->ruta 				= $route;
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

		//--------------------------------------------------------------------------FALTA MODIFICAR!!!
	  	public function actualizar($claveAntigua) {			
			$fachaBD= fBaseDeDatos::getInstance();
			//$insercion=$fachaBD->updateConVariosParametros($obj,$this,$sim);
			$insercion=$fachaBD->update($this,'nombre',$claveAntigua,'=');
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
		//--------------------------------------------------------------------------FALTA MODIFICAR!!!
		public function eliminar() {
			$parametro= "nombre";
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
			$atributos[1] = "nombre";
			$atributos[2] = "ruta";
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
			$atributos[1] = "nombre";
			$atributos[2] = "ruta";
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
		
			/* Parametros de entrada:
		
			   Parametros de salida:
					0 si fue exitosa, 1 caso contrario*/
		//--------------------------------------------------------------------------FALTA MODIFICAR!!!
		public function autocompletar() {
			if ($this->get('nombre') == NULL)	return 1;
			$clavePrimaria = array ();
			$clavePrimaria[0] = "nombre";
			$fachaBD= fBaseDeDatos::getInstance();
			return $fachaBD -> autocompletarObjeto($this,$clavePrimaria);
		}
		public function poseeIdPostizo() {
			 return true;
		}
}
?>
