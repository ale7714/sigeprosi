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
include_once "class.listaActividad.php"; 
//include_once "class.BusquedaConCondicion.php";
//include_once "class.fBaseDeDatos.php";
include_once "class.Solicitud.php";
include_once "class.listaSolicitud.php";
include_once "class.TelefonoSolicitud.php";
include_once "class.listaTelefonoSolicitud.php";
include_once "class.BusquedaConCondicion.php";
//include_once "fBaseDeDatos.php";
include_once "class.Solicitud.php";
include_once "class.listaSolicitud.php";
include_once "class.TelefonoSolicitud.php";
include_once "class.listaTelefonoSolicitud.php";

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
	function iniciarSesion($email,$password){
		$u = new Usuario(null,null,$email,$password,null,null);
		if ($u->autocompletar() != 0)	return 1;
		if ($u->get('password') != $password)	return 1;
		//session_start();
		//$_SESSION["nombre"] = $u->get('nombre');
		//$_SESSION["apellido"] = $u->get('apellido');
		//$_SESSION["correoUSB"] = $u->get('correoUSB');
		//$_SESSION["privilegio"] = 1;
		//$_SESSION["autenticado"] = "SI";
		return 0;
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
		$trimestre = new trimestre($anio,$meses[$mesInt],$meses[$mesFinInt]);
		if($trimestre-> autocompletar() != 0){ 
			if($trimestre->insertar() != 0)	return 1;
			if($trimestre-> autocompletar() != 0)	return 1;			
		}
		$idTrimestre=$trimestre->get('id');
		echo 'id = '.$idTrimestre;
		$registro = new actividad($nombreAct,$fecha,$descripcion,$puntos,$idTrimestre);	
		if($registro->insertar()==0){
			
			return 0;
		}else	return 1;	
	}
	
	
	function actualizarSolicitud($numero,$planteaminto,$justificacion,$email, $tiempolibre, $recursos,$personas,$unidadUSB, $status,$tel,$area,$telviejos){
		
		$sol_nueva = new solicitud($numero,$planteaminto,$justificacion,$email, $tiempolibre, $recursos,$personas,$unidadUSB, $status);
		if(($sol_nueva->actualizar($numero))==0){
			$i = 0;
			$j = sizeof($tel);
			while( $i < $j) {
			    $telsolviejo = new telefonosolicitud($numero,$telviejos[$i]);
				$telsol      = new telefonosolicitud($numero,$area[$i].$tel[$i]);
				if(($telsol->actualizar($telsolviejo)) != 0) {
					return 1;
				}
				$i++;
			}
			return 0;
		}else return 1;
	}
	/* 	Parametros de entrada:
		 $nro: Numero de solicitud a verfificar
		Parametros de salida:
			0 si existe, 1 caso contrario
	*/
	function exiteSolicitud($nro){
		$solicitud = new solicitud($nro,null,null,null,null,null,null,null,null);
		return $solicitud -> autocompletar();
	}
	function generarCodigoSolicitud(){
		$numero = rand().rand();
		$codigo = dechex($numero);
		$numero = substr('00000000', 0, (8-strlen($codigo))).$codigo;  
		return $numero;
	}
	function registrarSolicitud($numero,$planteaminto,$justificacion,$email, $tiempolibre, $recursos,$personas,$unidadUSB, $status,$tel,$area){
		$registro = new solicitud($numero,$planteaminto,$justificacion,$email, $tiempolibre, $recursos,$personas,$unidadUSB, $status);
		if($registro->insertar()==0){
			$i = 0;
			$j = sizeof($tel);
			while( $i < $j) {
				$telsol = new telefonosolicitud($numero,$area[$i].$tel[$i]);
				if($telsol->insertar() != 0) {
					return 1;
				}
				$i++;
			}
			return 0;
		}else return 1;
	}
	function listarActividades() {	
		$i = 0;
		$listaActividades = new listaActividad();
		$listaAct = $listaActividades->listar();
		$table = array();		
		$j = sizeof($listaAct);
		while ($i < $j) {
			$aux = array();
			$aux[0] = $listaAct[$i]->get('nombre');
			$aux[1] = $listaAct[$i]->get('fecha');
			$aux[2] = $listaAct[$i]->get('descripcion');
			$aux[3] = $listaAct[$i]->get('puntos');
			$aux[4] = $listaAct[$i]->get('idTrimestre');
			$table[$i]=$aux;
			$i=$i+1;
		}	
		
		return $table;
	}	
	function consultarSolicitud($email, $numSol){
		$solicitud = new solicitud($numSol,null,null,null,null,null,null,null,null);
		if ((($solicitud -> autocompletar()) == 0) && ($solicitud->get("email") == $email))	{
			$atributos = $solicitud->getAtributos();
			$retorno =array();
			foreach ($atributos as $atributo)	$retorno[$atributo] = $solicitud->get($atributo);
			return $retorno;
		}else return 1;
	}
	function listarSolicitud(){
		$baseSolicitud = new listaSolicitud();
		$solicitudArray = $baseSolicitud->buscar(2,"estado"); //cambiar por 2 al activar.
		$retornoArray=array();
		if($solicitudArray != null){
			$i=0;
			while($i<sizeof($solicitudArray)){
				$solicitud=$solicitudArray[$i];
				$atributos = $solicitud->getAtributos();
				$retorno =array();
				foreach ($atributos as $atributo){
					$retorno[$atributo] = $solicitud->get($atributo);
					
				}
				$retornoArray[$i]=$retorno;
				$i=$i+1;
			}
			return $retornoArray;
		}else	return null;
	}
    
	function cargarTelefSolicitud($nro){
		$listaTelSol = new listaTelefonoSolicitud();
		$arreglo = $listaTelSol->buscarLista($nro,"nroSolicitud");
		if ($arreglo != null){
			$i = 0;
			foreach ($arreglo as $telef){
				$telefonos[$i] = $telef->get("telefono");
				$i++;
			}
			return $telefonos;
		}else{
			return null;
		}
	}
	function listarUsuarios($row, $ord, $start, $limit){
		$baseSolicitud = new listaSolicitud();
		$solicitudArray = $baseSolicitud->buscar(2,"estado"); //cambiar por 2 al activar.
		$retornoArray=array();
		if($solicitudArray != null){
			$i=0;
			while($i<sizeof($solicitudArray)){
				$solicitud=$solicitudArray[$i];
				$atributos = $solicitud->getAtributos();
				$retorno =array();
				foreach ($atributos as $atributo){
					$retorno[$atributo] = $solicitud->get($atributo);
					
				}
				$retornoArray[$i]=$retorno;
				$i=$i+1;
			}
			return $retornoArray;
		}else	return null;
	}
}
?>
