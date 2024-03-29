<?php
	/*	UNIVERSIDAD SIMON BOLIVAR
		PERIODO:			ENE-MAR 2012
		MATERIA: 			SISTEMAS DE INFORMACION II
		NOMBRE DEL ARCHIVO:	class.Iteracion.php
	*/
include_once "fBaseDeDatos.php";

class iteracion {
		
		private $id;
		private $nombre;
		private $tipo; /// 1-> Incepcion, 2-> Elaboracion, 3-> Construccion, 4-> Transicion
		private $objetivos;
		private $idEquipo;
		private $estado;
		
		private static $_instance;
		/*	Parametros de entrada:
		Parametros de salida: 
					Objeto del tipo solicitud
		Descripcion	: Constructor de la clase solicitud.					
		*/
   		function __construct($nombre,$tipo,$objetivos,$idEquipo,$estado) {
			$this->nombre   = $nombre;
			$this->tipo = $tipo;
			$this->objetivos = $objetivos;
			$this->idEquipo = $idEquipo;
			$this->estado = $estado;
        }
			
	   	/*  Parametros de entrada:
						NINGUNO
		Parametros de salida: 
					0:  Si la inserci�n se realiz� de forma exitosa
					1:  Si hubo un error durante la inserci�n
		Descripcion	: Funci�n que permite la inserci�n de una solicitud en
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
					0:  Si la actualizaci�n se realiz� de forma exitosa
					1:  Si hubo un error durante la actualizaci�n
		Descripcion	: Funcion que permite actualizar la informaci�n de un cliente ya existente 
					  en la base de datos.					
		*/
	  	public function actualizar($clave) {			
			$parametro= "id";
			$fachaBD = fBaseDeDatos::getInstance();
			$insercion=$fachaBD->update($this,'id',$clave,'=');
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
			$atributos[1] = "tipo";
			$atributos[2] = "objetivos";
			$atributos[3] = "idEquipo";
			$atributos[4] = "estado";
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
			$atributos[1] = "tipo";
			$atributos[2] = "objetivos";
			$atributos[3] = "idEquipo";
			$atributos[4] = "estado";
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
		public function obtenerArtefactos() {
			if (($this->get('id') == NULL))	return 1;
			$fachaBD= fBaseDeDatos::getInstance();
			$nombre = array ();
			$nombre[0] = "artefactosIteracion";
			$columnas = array();
			$columnas[0]= "*";
			$parametros= array ();
			$parametros[0] = "idIteracion";
			$valores= array();
			$valores[0]= $this->get('id');
			$Busqueda= new BusquedaConCondicion($nombre,$columnas,$parametros,$valores,"=","");
			$c= $fachaBD->search($Busqueda);
			$i=0;
			$retorno=array();
			while($lista=mysql_fetch_array($c,MYSQL_ASSOC)) {
				//$newc = new elemento($lista['nombreCatalogo'],$lista['nombre']);
				$retorno[$i]=$lista['artefactos'];
				$i=$i+1;
			}
			return $retorno;	
		}
		public function obtenerActividades() {
			if (($this->get('id') == NULL))	return 1;
			$fachaBD= fBaseDeDatos::getInstance();
			$nombre = array ();
			$nombre[0] = "actividaditeracion";
			$columnas = array();
			$columnas[0]= "*";
			$parametros= array ();
			$parametros[0] = "idIteracion";
			$valores= array();
			$valores[0]= $this->get('id');
			$Busqueda= new BusquedaConCondicion($nombre,$columnas,$parametros,$valores,"=","");
			$c= $fachaBD->search($Busqueda);
			$i=0;
			$retorno=array();
			while($lista=mysql_fetch_array($c,MYSQL_ASSOC)) {
				//$newc = new elemento($lista['nombreCatalogo'],$lista['nombre']);
				$retorno[$i]=$lista;
				$i=$i+1;
			}
			return $retorno;	
		}
		public function autocompletar() {
			if (($this->get('nombre') == NULL) && ($this->get('id') == NULL))	return 1;
			$clavePrimaria = array ();
			if ($this->get('id') != NULL)	$clavePrimaria[0] = "id";
			else{
				$clavePrimaria[0] = "nombre";
			}
			$fachaBD= fBaseDeDatos::getInstance();
			return $fachaBD -> autocompletarObjeto($this,$clavePrimaria);
		}
 		public function poseeIdPostizo() {
			 return true;
		}
}
?>