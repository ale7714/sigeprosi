 <?php
	/*	UNIVERSIDAD SIMON BOLIVAR
		PERIODO:			ENE-MAR 2012
		MATERIA: 			SISTEMAS DE INFORMACION II
		NOMBRE DEL ARCHIVO:	class.Solicitud.php
	*/
include_once "fBaseDeDatos.php";

class solicitud {
		private $nro;
		private $planteamiento;
        private $justificacion;
        private $email;
		private $tiempo;
		private $tecnologia;
		private $nroAfectados;
		private $nombreUnidadAdministrativa;
		private $estado;
		private static $_instance;
		
		/*	Parametros de entrada:
		Parametros de salida: 
					Objeto del tipo solicitud
		Descripcion	: Constructor de la clase solicitud.					
		*/
   		function __construct($n,$plan,$just,$e,$tiem,$tec,$numA,$nUniAd,$est) {
			$this->nro           = $n;
			$this->planteamiento = $plan;
			$this->justificacion = $just;
			$this->email         = $e;
			$this->tiempo        = $tiem;
			$this->tecnologia    = $tec;
			$this->nroAfectados  = $numA;
			$this->nombreUnidadAdministrativa = $nUniAd;
			$this->estado        = $est;
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
	  	public function actualizar($obj,$sim) {			
			$fachaBD= fachadaBaseDeDatos::getInstance();
			$insercion=$fachaBD->updateConVariosParametros($obj,$this,$sim);
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
			$atributos[0] = "nro";
			$atributos[1] = "planteamiento";
			$atributos[2] = "justificacion";
			$atributos[3] = "email";
			$atributos[4] = "tiempo";
			$atributos[5] = "tecnologia";
			$atributos[6] = "nroAfectados";
			$atributos[7] = "nombreUnidadAdministrativa";
			$atributos[8] = "estado";
			return $atributos;
		}
		
		/* Parametros de entrada:
				NINGUNO
			Parametros de salida:
				Arreglo con los atributos de la clase
		*/
		public function getAtributos() {
			$atributos = array();
			$atributos[0] = "nro";
			$atributos[1] = "planteamiento";
			$atributos[2] = "justificacion";
			$atributos[3] = "email";
			$atributos[4] = "tiempo";
			$atributos[5] = "tecnologia";
			$atributos[6] = "nroAfectados";
			$atributos[7] = "nombreUnidadAdministrativa";
			$atributos[8] = "estado";
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
		public function autocompletar() {
			if ($this->get('nro') == NULL)	return 1;
			$fachaBD= fBaseDeDatos::getInstance();
			$nombre = array ();
			$nombre[0] = "solicitud";
			$columnas = array();
			$columnas[0]= "*";
			$parametros= array ();
			$parametros[0] = "nro";
			$valores= array();
			$valores[0]= $this->get("nro");
			$Busqueda= new BusquedaConCondicion($nombre,$columnas,$parametros,$valores,"=","");
			$c= $fachaBD->search($Busqueda);
			$listarray = array();
			$listarray= null;
			if ($lista=mysql_fetch_array($c,MYSQL_ASSOC)){		
				$this->set('planteamiento',$lista['planteamiento']);
				$this->set('justificacion',$lista['justificacion']);
				$this->set('email',$lista['email']);
				$this->set('tiempo',$lista['tiempo']);
				$this->set('tecnologia',$lista['tecnologia']);
				$this->set('nroAfectados',$lista['nroAfectados']);
				$this->set('nombreUnidadAdministrativa',$lista['nombreUnidadAdministrativa']);
				$this->set('estado',$lista['estado']);
				return 0;
			}else
				return 1;
		}
}
?>