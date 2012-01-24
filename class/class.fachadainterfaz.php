<?php
	/*	UNIVERSIDAD SIMON BOLIVAR
		PERIODO:			SEP-DIC 2010
		CATEDRA: 			INGENIERIA DE SOFTWARE
		COMPANIA: 			HEALTHY SOLUTIONS
		NOMBRE DEL ARCHIVO:	CLASS.FACHADAINTERFAZ.PHP
		DESCRIPCION:
	*/
include_once "class.Usuario.php";
include_once "class.Trimestre.php";
include_once "class.Actividad.php"; 
include_once "../class/class.BusquedaConCondicion.php";
include_once "../class/fBaseDeDatos.php";
class fachadainterfaz {	
	
	private static $f_instance; 
	
	//Constructor de la fachada
	private function __construct(){
    
	}		
	

	/*	Parametros de entrada:
					  NINGUNO
		Parametros de salida: 
					  Objeto del tipo fachadainterfaz.
		Descripcion	: Patrón singleton, solo crea un nuevo objeto fachadainterfaz si ya no 
					  existe una instancia del mismo.					
	*/	
	public static function getInstance(){ 
		if (!(self::$f_instance instanceof self)){ 
			self::$f_instance=new self(); 
		} 
		return self::$f_instance; 
	}
	function registrarUsuario($email){
	 $numero = rand().rand();
		$codigo = dechex($numero);
		$registro = new Usuario(null,null,$email,$codigo,null, 1);
		if($registro->insertar()==0){
			return 0;
		}else return 1;
		
	}
	function registrarActividad($nombreAct,$fecha,$descripcion,$puntos){
		$anio=substr($fecha,0,4);
		$mes=substr($fecha,5,2);
		$mesInt=(int)$mes;
		$meses=array('xxx','Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
		if($mesInt < 4){	
			$mesInt=1;
			$mesFinInt=3;
		}else	if($mesInt < 8){ 
					$mesInt=4;	
					$mesFinInt=7;
				}else{ 
					$mesInt=9;	
					$mesFinInt=12;
				}
		$nombre[0] = "trimestre";
		$columnas[0] = "id";
		$parametros[0] = "anio";
		$valores[0] = $anio;
		$parametros[1] = "mesInicio";
		$valores[1] = $meses[$mesInt];
		$parametros[2] = "mesFin";
		$valores[2] = $meses[$mesFinInt];;
		$simbolo = "=";
		
		$idTrimestreC = new BusquedaConCondicion ($nombre, $columnas, $parametros, $valores, $simbolo, "AND", NULL);
		$bd = new fBaseDeDatos();
		$consulta = $bd->search($idTrimestreC);
		$id=mysql_fetch_array($consulta);
		if($id != NULL) $idTrimestre=$id["id"];
		else{	
			$trimestre = new trimestre($valores[0],$valores[1],$valores[2]);
			//$trimestre = new trimestre(2012,'Enero','Marzo');
			if($trimestre->insertar()==0){
				$consulta = $bd->search($idTrimestreC);
				$id=mysql_fetch_array($consulta);
				$idTrimestre=$id["id"];
				$registro = new actividad($nombreAct,$fecha,$descripcion,$puntos,$idTrimestre);
				//$registro = new actividad('a','2012-01-12','...',10,$idTrimestre);
				if($registro->insertar()==0){
					return 0;
				}else	return 1;	
			}else return 1;	

		}
		
		
	}
}
?>
