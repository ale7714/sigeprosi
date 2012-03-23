<?php
	/*	UNIVERSIDAD SIMON BOLIVAR
		PERIODO:			ENE-MAR 2012
		MATERIA: 			SISTEMAS DE INFORMACION II
		NOMBRE DEL ARCHIVO:	fBaseDeDatos.php
	*/
include_once "class.Busqueda.php";
include_once "class.BusquedaSimple.php";
include_once "class.BusquedaConCondicion.php";
include_once "class.BusquedaCompleta.php";


class fBaseDeDatos {	
	
	
	private static $f_instance; 
	
	//Constructor de la clase 
	function __construct(){
        
	}		
	
	/*	Parametros de entrada:
					  NINGUNO
		Parametros de salida: 
					  Objeto del tipo fachadaBaseDeDatos
		Descripcion	: Patrón singleton, solo crea un nuevo objeto fachadaBaseDedDatos si ya no 
					  existe una instancia del mismo.					
	*/	
	public static function getInstance(){ 
		if (!(self::$f_instance instanceof self)){ 
			self::$f_instance=new self(); 
		} 
		return self::$f_instance; 
	}
	
	/*	Parametros de entrada:
					  $id: Variable del tipo string que representa el usuario
					  $pass: Variable del tipo string que representa la contraseña
		Parametros de salida: 
					  $conexion: Si la conexion es exitosa
					  FALSE:	 Si hay un error durante la conexion	
	*/
	public function connect($id,$pass){
		$conexion= mysql_connect("localhost","root","");
		if($conexion!=FALSE){
		mysql_select_db("sigeprosi",$conexion);}
		return($conexion);
	}
	
	//funcion utilizada para dada una conexion a la base de datos, cerrarla
	public function disconnect($conexion){
		mysql_close($conexion);
	}
	
	/*	Parametros de entrada:
			    $id  	  : variable del tipo string que representa el usuario
				$password : variable del tipo string que representa la contraseña
		Parametros de salida: 
				0		  : Si la creacion del usuario fue exitosa
				1		  : Si no se realizo la creacion del usuario
		Descripcion	: Metodo que permite crear un usuario en la base de datos.					
	*/
	public function createUser($id,$password) {
		$conexion= $this->connect("root","");
		$sql = "CREATE USER '$id'@'localhost' IDENTIFIED BY '$password';";
		$consulta= mysql_query($sql,$conexion);
		if(!mysql_error()) {
			$sql = "GRANT SELECT,INSERT,UPDATE,DELETE ON sigeprosi.* TO '$id'@'localhost' IDENTIFIED BY '$password';";
			$consulta= mysql_query($sql,$conexion);
			print mysql_error();
				if(!mysql_error()) {
						$this->disconnect($conexion);
						return(0);
				}else {
					$this->disconnect($conexion);
					return(1);
				}				 
		} else {
			$this->disconnect($conexion);
			return(1);
		}
	}
	
	/*	Parametros de entrada:
			    $obj	  : Variable del tipo obj
		Parametros de salida: 
				0		  : Si la insercion del obj fue exitosa
				1		  : Si no se realizo la insercion del obj
		Descripcion	: Metodo que permite insertar los valores de los atributos de 
					  obj en la tabla de obj en la base de datos
		Importante: Para el correcto funcionamiento del metodo la clase del 
					objeto a pasar como parametro de entrada deben tener 
					implementado el metodo get(atributo) y el metodo 
					getAtributos()
	*/
	public function insert($obj) {
		$nombreTabla= get_class($obj);
		$conexion= $this->connect("root","");
		$string= "insert into $nombreTabla (";
		$string2= "values ('";
		$atributos = $obj->getAtributos();
		$N= sizeof($atributos);
		for ($i = 0; $i < $N; $i++) {
			$atributo= $atributos[$i];
			if ($i != $N-1) {
				$string= $string.$atributo.",";
				$string2= $string2.$obj->get($atributo)."','";
			}
			else {
				$string= $string.$atributo.") ";
				$string2= $string2.$obj->get($atributo)."')";
			}	
		}
		$string= $string.$string2;
        //echo $string;
		$consulta= mysql_query($string,$conexion);
		//echo mysql_error($conexion).":".mysql_errno($conexion);
		if(!mysql_error()) {
			$this->disconnect($conexion);
			return(0);
		} else {
			$this->disconnect($conexion);
			return(1);
		}
		
	}
	
	
	/*	Parametros de entrada:
			    $obj	  : Variable del tipo obj que es de una subclase
		Parametros de salida: 
				0		  : Si la insercion del obj fue exitosa
				1		  : Si no se realizo la insercion del obj
		Descripcion	: Metodo que permite insertar los valores de los atributos de 
					  obj en la tabla de obj en la base de datos y en la tabla de la
					  clase padre de obj
	*/
	public function insertSubclass($obj) {
		$nombreTabla= get_class($obj);
		$conexion= $this->connect("root","");
		$string= "insert into $nombreTabla (";
		$string2= "values ('";
		$atributos = $obj->getAtributos();
		$N= sizeof($atributos);
		for ($i = 0; $i < $N; $i++) {
			$atributo= $atributos[$i];
			if ($i != $N-1) {
				$string= $string.$atributo.",";
				$string2= $string2.$obj->get($atributo)."','";
			}
			else {
				$string= $string.$atributo.") ";
				$string2= $string2.$obj->get($atributo)."')";
			}	
		}
		$string= $string.$string2;
		$consulta= mysql_query($string,$conexion);
		print mysql_error();
		if(!mysql_error()) {
			$nombreTabla= get_parent_class($obj);
			$string= "insert into $nombreTabla (";
			$string2= "values ('";
			$atributos = $obj->getAtributosP();
			$N= sizeof($atributos);
			for ($i = 0; $i < $N; $i++) {
			$atributo= $atributos[$i];
				if ($i != $N-1) {
				$string= $string.$atributo.",";
				$string2= $string2.$obj->get($atributo)."','";
				}
				else {
				$string= $string.$atributo.") ";
				$string2= $string2.$obj->get($atributo)."')";
				}	
			}
			$string= $string.$string2;
			$consulta= mysql_query($string,$conexion);
			print mysql_error();
			if(!mysql_error()) {
			  $this->disconnect($conexion);
			  return(0);
			} else {
			  $this->disconnect($conexion);
			  return(1);
			}
		} else {
			$this->disconnect($conexion);
			return(1);
		}
		
	}
	
	
	/*Parametros de entrada:
		$Busqueda: variable de tipo Busqueda que contiene el string para consultar la base de datos	
	Parametros de salida: 
			$result: Tupla(s) resultado de la busqueda 
	Descripcion	: Metodo que permite realizar una busqueda en la base de datos*/
	public function search ($Busqueda) {
		$conexion= $this->connect("root","");
		// $string contiene el string de la consulta
		$string= $Busqueda->consulta();
		//print $string;
		$result = mysql_query($string, $conexion);
		$this->disconnect($conexion);
		return $result;
	}
	
	/*	Parametros de entrada:
			    $obj	  : Variable del tipo obj que es de una subclase
				$parametro: Nombre del parametro clave para modificar el objeto.
				$v_viejo  : Valor de la clave del objeto antes de realizar la modificacion.
		Parametros de salida: 
				0		  : Si la actualizacion del obj fue exitosa
				1		  : Si no se realizo la actualizacion del obj
		Descripcion	: Metodo que permite actualizar los valores de los atributos de 
					  obj en la tabla de obj en la base de datos y en la tabla de la
					  clase padre de obj
	*/
	public function updateSubclass($obj,$parametro,$v_viejo) {
		$nombreTabla= get_class($obj);
		$conexion= $this->connect("root","");
		$string= "update $nombreTabla set ";
		$atributos = $obj->getAtributos();
		$N= sizeof($atributos);
		for ($i = 0; $i < $N; $i++) {
			$atributo= $atributos[$i];
			if ($i != $N-1) {
				$string= $string.$atributo."='".$obj->get($atributo)."', ";
			}
			else {
				$string= $string.$atributo."='".$obj->get($atributo)."' ";
				
			}	
		}
		$string= $string."where $parametro='".$v_viejo."';";
		$consulta= mysql_query($string,$conexion);
		if(!mysql_error()) {
			$nombreTabla= get_parent_class($obj);
			$string= "update $nombreTabla set ";
			$atributos = $obj->getAtributosP();
			$N= sizeof($atributos);
			for ($i = 0; $i < $N; $i++) {
			$atributo= $atributos[$i];
				if ($i != $N-1) {
				$string= $string.$atributo."='".$obj->get($atributo)."', ";
				}
				else {
				$string= $string.$atributo."='".$obj->get($atributo)."' ";
				}	
			}
			
			$string= $string."where $parametro='".$v_viejo."'";
			$consulta= mysql_query($string,$conexion);
			if(!mysql_error()) {
			  $this->disconnect($conexion);
			  return(0);
			} else {
			  $this->disconnect($conexion);
			  return(1);
			}
		} else {
			$this->disconnect($conexion);
			return(1);
		}
		
	}
	
	/*	Parametros de entrada:
			    $obj	  : Variable del tipo obj que es de una subclase
				$parametro: Nombre del parametro clave para modificar el objeto.
				$v_viejo  : Valor de la clave del objeto antes de realizar la modificacion.
				$simbolo  : Variable del tipo string que representa el operador 
							para comparar el parametro y v_viejo
		Parametros de salida: 
				0		  : Si la actualizacion del obj fue exitosa
				1		  : Si no se realizo la actualizacion del obj
		Descripcion	: Metodo que permite actualizar los valores de los atributos de 
					  obj en la tabla de obj en la base de datos 
    */
	public function update($obj,$parametro,$v_viejo,$simbolo) {
		$nombreTabla= get_class($obj);
		$conexion= $this ->connect("root","");
		$string= "update $nombreTabla set ";
		$atributos = $obj->getAtributos();
		$N= sizeof($atributos);
		for ($i = 0; $i < $N; $i++) {
			$atributo= $atributos[$i];
			if ($i != $N-1) {
				$string= $string.$atributo."='".$obj->get($atributo)."',";
			}
			else {
				$string= $string.$atributo."='".$obj->get($atributo)."' ";
			}	
		}
		$string= $string."where $parametro"."$simbolo"."'$v_viejo'";
		//echo $string;
		$consulta= mysql_query($string,$conexion);
		if(!mysql_error()) {
		    $this->disconnect($conexion);
			return(0);
		} else {
			$this->disconnect($conexion);
			return(1);
		}		
	}
    

	
	/*	Parametros de entrada:
			    $obj	  : Variable del tipo obj que es de una subclase
				$parametro: Nombre del parametro clave para modificar el objeto.
				$simbolo  : Variable del tipo string que representa el operador 
							para comparar el parametro y el valor del atributo a
							eliminar
		Parametros de salida: 
				0		  : Si se elimina el obj de forma exitosa de la tabla
				1		  : Si no se eliminar el obj de la tabla
		Descripcion	: Metodo que permite eliminar la tupla de obj de la tabla 
					  del tipo obj
    */
	public function delete ($obj,$parametro,$simbolo) {
		$nombreTabla= get_class($obj);
		$conexion= $this->connect("root","");
		$aEliminar= $obj->get($parametro);
		$sql="delete from $nombreTabla where $parametro"."$simbolo"."'$aEliminar'";
		$consulta= mysql_query($sql,$conexion);
		if(!mysql_error()) {
			$this->disconnect($conexion);
			return(0);
		} else {
			$this->disconnect($conexion);
			return(1);
		}
	}
	
	/*	Parametros de entrada:
			    $obj	  : Variable del tipo obj que es de una subclase
				$parametro: Nombre del parametro clave para modificar el objeto.
				$simbolo  : Variable del tipo string que representa el operador 
							para comparar el parametro y el valor del atributo a
							eliminar
		Parametros de salida: 
				0		  : Si se elimina el obj de forma exitosa de la tabla
				1		  : Si no se eliminar el obj de la tabla
		Descripcion	: Metodo que permite eliminar la tupla de obj de la tabla 
					  del tipo obj.
		Recomendacion: Usar este metodo cuando deseamos eliminar obj que sus claves
					   son compuestas
    */
	public function deleteConVariosParametros ($obj,$simbolo) {
		$nombreTabla= get_class($obj);
		$conexion= $this->connect("root","");
		$atributos = $obj->getAtributos();
		$N= sizeof($atributos);
		$string= "delete from $nombreTabla where ";
		for ($i=0; $i<$N; $i++) {
			$atributo= $atributos[$i];
			$valor= $obj->get($atributo);
			if ($i != $N-1) {	
				$string= $string."$atributo"."$simbolo"."'$valor' "."AND ";
			}
			else {
				$string= $string."$atributo"."$simbolo"."'$valor'";
			}
		}
		$consulta= mysql_query($string,$conexion);
		if(!mysql_error()) {
			$this->disconnect($conexion);
			return(0);
		} else {
			$this->disconnect($conexion);
			return(1);
		}
		
	}
	
	public function updateConVariosParametros ($obj,$obj_viejo,$simbolo) {
		$nombreTabla= get_class($obj);
		$conexion= $this ->connect("root","");
		$string= "update $nombreTabla set ";
		$atributos = $obj->getAtributos();
		$N= sizeof($atributos);
		for ($i = 0; $i < $N; $i++) {
			$atributo= $atributos[$i];
			if ($i != $N-1) {
				$string= $string.$atributo."='".$obj->get($atributo)."',";
			}
			else {
				$string= $string.$atributo."='".$obj->get($atributo)."' ";
				
			}	
		}
		$string= $string."where ";
		$atributos= $obj_viejo->getAtributos();
		$N= sizeof($atributos);
		for ($i=0; $i<$N; $i++) {
			$atributo= $atributos[$i];
			$valor= $obj_viejo->get($atributo);
			if ($i != $N-1) {	
				$string= $string."$atributo"."$simbolo"."'$valor' "."AND ";
			}
			else {
				$string= $string."$atributo"."$simbolo"."'$valor'";
			}
		}
		//echo '<script>';
		//echo 'alert("'.$string.'");';
		//echo '</script>';
		$consulta= mysql_query($string,$conexion);
		if(!mysql_error()) {
		    $this->disconnect($conexion);
			return(0);
		} else {
			$this->disconnect($conexion);
			return(1);
		}

	}
	public function autocompletarObjeto($obj,$clavePrimaria) {
		//$nombreTabla= get_class($obj);
		foreach ($clavePrimaria as $parteClave) if ($obj->get($parteClave) == NULL)	return 1;
		$nombre = array ();
		$nombre[0] = get_class($obj);
		$columnas = array();
		$columnas[0]= "*";
		//$parametros= array ();
		$valores= array();
		$i=0;
		foreach ($clavePrimaria as $parteClave){	
			$valores[$i]= $obj->get($parteClave);
			$i=$i+1;
		}	
		$Busqueda= new BusquedaConCondicion($nombre,$columnas,$clavePrimaria,$valores,"=","AND");
		$c= $this->search($Busqueda);
		$listarray = array();
		$listarray= null;
		if ($lista=mysql_fetch_array($c,MYSQL_ASSOC)){		
			$atributos=$obj->getAtributos();
			foreach ($atributos as $atributo)	$obj->set($atributo,$lista[$atributo]);
			//para clases que poseen id's postizos
			if($obj->poseeIdPostizo()){	$obj->set('id',$lista['id']);}	
			return 0;
		}else
			return 1;
	}
    
    public function contar($obj) {
		$nombreTabla= get_class($obj);
		$conexion= $this->connect("root","");
		$sql="select COUNT(*) from $nombreTabla";
		$consulta= mysql_query($sql,$conexion);
		if(!mysql_error()) {
			$this->disconnect($conexion);
			return $consulta[0];
		} else {
			$this->disconnect($conexion);
			return 0;
		}
	}
}