 <?php
	/*	UNIVERSIDAD SIMON BOLIVAR
		PERIODO:			ENE-MAR 2012
		MATERIA: 			SISTEMAS DE INFORMACION II
		NOMBRE DEL ARCHIVO:	class.Usuario.php
	*/
include_once "fBaseDeDatos.php";

class usuario {
		
		private $nombre;
		private $apellido;
    private $correoUSB;
    private $password;
		private $correoOpcional;
		private $activo;
		private static $_instance;
		
		/*	Parametros de entrada:
		Parametros de salida: 
					Objeto del tipo usuario
		Descripcion	: Constructor de la clase usuario.					
		*/
   		function __construct($nom,$apell,$correo,$pass,$correoOp,$acti) {
			$this->nombre       = $nom;
			$this->apellido 	= $apell;
			$this->correoUSB 	= $correo;
			$this->password     = $pass;
			$this->correoOpcional = $correoOp;
			$this->activo    	= $acti;
        }
			
		
	   	/*  Parametros de entrada:
						NINGUNO
		Parametros de salida: 
					0:  Si la inserción se realizó de forma exitosa
					1:  Si hubo un error durante la inserción
		Descripcion	: Función que permite la inserción de un usuario en
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
					0:  Si la actualización se realizó de forma exitosa
					1:  Si hubo un error durante la actualización
		Descripcion	: Funcion que permite actualizar la información de un cliente ya existente 
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
			$atributos[0] = "nombre";
			$atributos[1] = "apellido";
			$atributos[2] = "correoUSB";
			$atributos[3] = "password";
			$atributos[4] = "correoOpcional";
			$atributos[5] = "activo";
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
}
?>
