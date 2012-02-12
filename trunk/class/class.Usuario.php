 <?php
	/*	UNIVERSIDAD SIMON BOLIVAR
		PERIODO:			ENE-MAR 2012
		MATERIA: 			SISTEMAS DE INFORMACION II
		NOMBRE DEL ARCHIVO:	class.Usuario.php
	*/
include_once "fBaseDeDatos.php";

class usuario {
		
		private $nombre;
		private $telefono;
		private $apellido;
        private $correoUSB;
        private $password;
		private $correoOpcional;
		private $activo;
		private $rol;   //0 admin, 1 profesor, 2 cliente, 3 estudiante
		private $carnetOCedula;
		private static $_instance;
		
		/*	Parametros de entrada:
		Parametros de salida: 
					Objeto del tipo usuario
		Descripcion	: Constructor de la clase usuario.					
		*/
   		function __construct($nom,$apell,$correo,$pass,$correoOp,$acti,$rol1,$carnetOCedula1,$telefono1) {
			$this->nombre       = $nom;
			$this->apellido 	= $apell;
			$this->correoUSB 	= $correo;
			$this->password     = $pass;
			$this->correoOpcional = $correoOp;
			$this->activo    	= $acti;
			$this->rol = $rol1;
			$this->carnetOCedula    	= $carnetOCedula1;
			$this->telefono    	= $telefono1;
        }
			
		
	   	/*  Parametros de entrada:
						NINGUNO
		Parametros de salida: 
					0:  Si la inserci�n se realiz� de forma exitosa
					1:  Si hubo un error durante la inserci�n
		Descripcion	: Funci�n que permite la inserci�n de un usuario en
                      la tabla usuario		
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
	  	public function actualizar($emailViejo) {			
			$parametro= "correoUSB";
			$fachaBD= fBaseDeDatos::getInstance();
			$insercion=$fachaBD->update($this,$parametro,$emailViejo,"=");
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
			$atributos[0] = "nombre";
			$atributos[1] = "apellido";
			$atributos[2] = "correoUSB";
			$atributos[3] = "password";
			$atributos[4] = "correoOpcional";
			$atributos[5] = "activo";
			$atributos[6] = "rol";
			$atributos[7] = "carnetOCedula";
			$atributos[8] = "telefono";
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
			$atributos[1] = "apellido";
			$atributos[2] = "correoUSB";
			$atributos[3] = "password";
			$atributos[4] = "correoOpcional";
			$atributos[5] = "activo";
			$atributos[6] = "rol";
			$atributos[7] = "carnetOCedula";
			$atributos[8] = "telefono";
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
			if ($this->get('correoUSB') == NULL)	return 1;
			$clavePrimaria = array ();
			$clavePrimaria[0] = "correoUSB";
			$fachaBD= fBaseDeDatos::getInstance();
			return $fachaBD -> autocompletarObjeto($this,$clavePrimaria);
		}
		public function poseeIdPostizo() {
			 return false;
		}
}
?>
