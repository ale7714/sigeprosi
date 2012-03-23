 <?php
	/*	UNIVERSIDAD SIMON BOLIVAR
		PERIODO:			ENE-MAR 2012
		MATERIA: 			SISTEMAS DE INFORMACION II
		NOMBRE DEL ARCHIVO:	class.productoextraiteracion.php
	*/
include_once "fBaseDeDatos.php";

class productoextraiteracion {
		private $id;
		private $idIteracion;
		private $nombre;
		private $descripcion;
        private static $_instance;
		
		/*	Parametros de entrada:
		Parametros de salida: 
					Objeto del tipo usuario
		Descripcion	: Constructor de la clase casodeuso.					
		*/
   		function __construct($idIteracion,$nombre,$descripcion) {
			$this->idIteracion 	= $idIteracion;
			$this->nombre 	= $nombre;
			$this->descripcion 	= $descripcion;
        }
			
		
	   	/*  Parametros de entrada:
						NINGUNO
		Parametros de salida: 
					0:  Si la inserción se realizó de forma exitosa
					1:  Si hubo un error durante la inserción
		Descripcion	: Función que permite la inserción de un casodeuso en
                      la tabla casodeuso		
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
	  	/*public function actualizar($etapa,$etapaV) {			
			$fachaBD= fBaseDeDatos::getInstance();
			$actualizacion=$fachaBD->updateConVariosParametros($etapa,$etapaV,"=");
			return $actualizacion;		
		}*/
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
		Descripcion	: Función que permite eliminar un casodeuso ya existente en
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
		public function getAtributos() {
			$atributos = array();
			$atributos[0] = "idIteracion";
			$atributos[1] = "nombre";
			$atributos[2] = "descripcion";
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
			if ((($this->get('nombre') == NULL  || $this->get('idIteracion') == NULL)) && ($this->get('id')==null))	return 1;
			$clavePrimaria = array ();
			if ($this->get('id') != NULL)	$clavePrimaria[0] = "id";
			else{
				$clavePrimaria[0] = "nombre";
				$clavePrimaria[1] = "idIteracion";
			}
			$fachaBD= fBaseDeDatos::getInstance();
			return $fachaBD -> autocompletarObjeto($this,$clavePrimaria);
		}
		public function poseeIdPostizo() {
			 return true;
		}
}
?>
