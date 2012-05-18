 <?php
	/*	UNIVERSIDAD SIMON BOLIVAR
		PERIODO:			ENE-MAR 2012
		MATERIA: 			SISTEMAS DE INFORMACION II
		NOMBRE DEL ARCHIVO:	class.Equipo.php
	*/
include_once "fBaseDeDatos.php";

$root = $_SERVER['DOCUMENT_ROOT']."/sigeprosi";
include_once $root."/class/class.Usuario.php";
class equipo {
		
		private $nombre;
		private $estado;
		private $elementos;
		private static $_instance;
		
		/*	Parametros de entrada:
		Parametros de salida: 
					Objeto del tipo estudiante
		Descripcion	: Constructor de la clase estudiante.					
		*/
   		function __construct($nombre1,$estado1) {
			$this->estado     = $estado1;
			$this->nombre = $nombre1;
			$this->elementos = array();
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
	  	public function actualizar($clave) {			
			$parametro= "estado";
			$fachaBD = fBaseDeDatos::getInstance();
			$insercion=$fachaBD->update($this,$parametro,$clave,'=');
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
			$atributos[0] = "nombre";
			$atributos[1] = "estado";
			$atributos[1] = "elementos";
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
			$atributos[1] = "estado";			
			$atributos[1] = "elementos";
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
			if ($this->get('nombre') == NULL)	return 1;
			$clavePrimaria = array ();
			$clavePrimaria[0] = "nombre";
			$fachaBD= fBaseDeDatos::getInstance();
			return $fachaBD -> autocompletarObjeto($this,$clavePrimaria);
		}
		public function casosDeUsoGrid($sigid,$sigord,$start,$limit) {
		
			$fachaBD= fBaseDeDatos::getInstance();
			$nombre = array ();
			$nombre[0] = "casodeuso";
            $columnas = array();
			$columnas[0]= "*";
			$parametro = array ();
			$parametro[0] = "idEquipo";
			$valores = array ();
			$valores[0] = $this->nombre;
            $ord = array();
            $ord[0] = $sigord;
            $join = array();
            $join[0] = false;
			$Busqueda= new BusquedaCompleta($nombre,$columnas,$parametro,$valores,"=","",
                                            $ord,$sigid,$start,$limit,$join);
			$c= $fachaBD->search($Busqueda);
			$listarray = array();
			$i=0;
			while($lista=mysql_fetch_array($c,MYSQL_ASSOC)) {
				$listarray[$i]=$lista;
				$i=$i+1;
			}
			
			return $listarray;	
		}
		public function EstudiantesGrid($sigid,$sigord,$start,$limit) {
			$fachaBD= fBaseDeDatos::getInstance();
			$nombre = array ();
			$nombre[0] = "participa";
            $columnas = array();
			$columnas[0]= "*";
			$parametro = array ();
			$parametro[0] = "nombreEquipo";
			$valores = array ();
			$valores[0] = $this->nombre;
            $ord = array();
            $ord[0] = $sigord;
            $join = array();
            $join[0] = false;
			$Busqueda= new BusquedaCompleta($nombre,$columnas,$parametro,$valores,"=","",
                                            $ord,$sigid,$start,$limit,$join);
			$c= $fachaBD->search($Busqueda);
			var_dump($Busqueda);
			$listarray = array();
			$i=0;
			while($lista=mysql_fetch_array($c,MYSQL_ASSOC)) {
				$u= new Usuario(null,null,$lista['correoUSBUsuario'],null,null,null,null,null);
				$u -> autocompletar();
				$atributos = $u->getAtributos();
				$retorno =array();
				foreach ($atributos as $atributo)	$retorno[$atributo] = $u->get($atributo);
				$listarray[$i]=$retorno;
				$i=$i+1;
			}
			
			return $listarray;	
		}
		public function poseeIdPostizo() {
			 return false;
		}
}
?>
