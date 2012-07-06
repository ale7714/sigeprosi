 <?php
	/*	UNIVERSIDAD SIMON BOLIVAR
		PERIODO:			ENE-MAR 2012
		MATERIA: 			SISTEMAS DE INFORMACION II
		NOMBRE DEL ARCHIVO:	class.criterioscadodeuso.php
	*/
include_once "fBaseDeDatos.php";
include_once "class.Elemento.php";
class catalogo {
		private $id;
		private $nombre;
        private $idCategoria;
		private $elementos;
        private static $_instance;
		
		/*	Parametros de entrada:
		Parametros de salida: 
					Objeto del tipo usuario
		Descripcion	: Constructor de la clase casodeuso.					
		*/
   		function __construct($nombre, $idCategoria) {
			$this->nombre 	= $nombre;
            $this->idCategoria 	= $idCategoria;
			$this->elementos=array();
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
			$del=$fachaBD->delete($this,$parametro,"=");
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
			$atributos[0] = "nombre";
            $atributos[1] = "idCategoria";
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
            $fachaBD= fBaseDeDatos::getInstance();
            if ($this->get('nombre') != NULL) {
                $clavePrimaria = array ();
                $clavePrimaria[0] = "nombre";
            }
            else {
                if ($this->get('id') != NULL) {
                    $clavePrimaria = array ();
                    $clavePrimaria[0] = "id";
                }
                else return 1;
            }
			$fachaBD= fBaseDeDatos::getInstance();
			$in = $fachaBD -> autocompletarObjeto($this,$clavePrimaria);
            if ($in == 1) return 1;
			$nombre = array ();
			$nombre[0] = "elemento";
			$columnas = array();
			$columnas[0]= "*";
			$parametros= array ();
			$parametros[0] = "idCatalogo";
			$valores= array();
			$valores[0]= $this->id;
			$Busqueda= new BusquedaConCondicion($nombre,$columnas,$parametros,$valores,"=","");
			$c= $fachaBD->search($Busqueda);
			$this-> elementos=null;
			$i=0;
			while($lista=mysql_fetch_array($c,MYSQL_ASSOC)) {
				//$newc = new elemento($lista['nombreCatalogo'],$lista['nombre']);
                $elem = $lista['registro'];
                $col = $lista['columna'];
                $elemento = new elemento($lista['idCatalogo'],$lista['nombre'],$elem,$col,$lista['desabilitado']);
                $elemento->set("id",$lista['id']);
				if (!ISSET($this-> elementos[$elem])) $this-> elementos[$elem] = array ();
                $this-> elementos[$elem][$col] = $elemento;
				$i=$i+1;
			}
			return 0;
		}
		public function poseeIdPostizo() {
			 return true;
		}
}
?>
