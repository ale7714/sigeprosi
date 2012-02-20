<?php
	/*	UNIVERSIDAD SIMON BOLIVAR
		PERIODO:			SEP-DIC 2010
		CATEDRA: 			INGENIERIA DE SOFTWARE
		COMPANIA: 			HEALTHY SOLUTIONS
		NOMBRE DEL ARCHIVO:	CLASS.FACHADAINTERFAZ.PHP
		DESCRIPCION:
	*/
$root = $_SERVER['DOCUMENT_ROOT']."/sigeprosi/";
include_once $root."/snippets/generarSal.php";
include_once "class.Encrypter.php";
include_once "class.Usuario.php";
include_once "class.Etapa.php";
include_once "class.Trimestre.php";
include_once "class.Actividad.php"; 
include_once "class.listaActividad.php"; 
include_once "class.Proyecto.php";
include_once "class.tiene.php"; 
include_once "class.pertenece.php"; 
include_once "class.seasocia.php"; 
//include_once "class.BusquedaConCondicion.php";
//include_once "class.fBaseDeDatos.php";
include_once "class.Solicitud.php";
include_once "class.listaSolicitud.php";
include_once "class.listaEtapa.php";
include_once "class.listaProyecto.php";
include_once "class.listaSeAsocia.php";
include_once "class.listaUsuarios.php";
include_once "class.listaPertenece.php";
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
		Descripcion	: Patr�n singleton, solo crea un nuevo objeto fachadainterfaz si ya no 
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
	function registrarUsuario($email, $privilegio){
        $numero = rand().rand();
        $codigo = dechex($numero);
        $enc = new Encrypter($codigo, generarSal($_POST["email"]));
        $registro = new Usuario(null,null,$email,$enc->toMD5(),null, 1,$privilegio,null);
		if($registro->insertar()==0){
			return 0;
		}else return 1;
	}
	
	/*
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
	}*/
	
	
	
	function editarProyecto($nombreProy,$etapa,$solicitud,$nombres,$apellidos,$correos,$cods,$tels,$roles,$usbids){
		$arr = explode('$*$', $solicitud);
		var_dump($arr);
		$numSolicitud = $arr[0];
		$unidad = $arr[1];
		$proyecto = new proyecto($nombreProy,$numSolicitud,1,$etapa);  //1 proyecto activo
		if($proyecto->insertar()==0){
			$i = 0;
			$j = sizeof($nombres);
			while($i < $j){
				$numero = rand().rand();
				$codigo = dechex($numero);
				$cliente = new usuario($nombres[$i],$apellidos[$i],$correos[$i],$codigo,1,4,null);
				if($cliente->insertar() == 0){
					$cPertenece = new pertenece($unidad,$correos[$i],$roles[$i],$cods[i].$tels[i]);
					if($cPertenece->insertar()== 0) {
						$clienteSeAsocia = new seasocia($correos[$i],$nombreProy);
						if($clienteSeAsocia->insertar() != 0) return 1;
					} else return 1;
				} else return 1;
			}
			$i = 0;
			$j = sizeof($usbids);
		    while($i < $j){
				$profeSeAsocia = new seasocia($usbids[$i],$nombreProy);
				if($profeSeAsocia->insertar() != 0) return 1;
			}
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
	function registrarPlanificacion($nombre,$numero,$semanas,$fechas, $puntos, $descripciones,$nombreact){
		$registro = new etapa($numero,$nombre);
		if($registro->insertar()==0){
			$registro->autocompletar();
			$idEtapa=$registro->get('id');
			$i = 0;
			$j = sizeof($descripciones);
			while( $i < $j) {
			
				$actividad = new actividad($semanas[$i],$fechas[$i],$descripciones[$i],$puntos[$i],$idEtapa,$nombreact[$i]);
				if($actividad->insertar() != 0) {
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
			$aux[4] = $listaAct[$i]->get('nombre');
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
	function listarPlanificacion(){
		$lista = new listaEtapa();
		$listaP = $lista->listar(); //cambiar por 2 al activar.
		$retornoArray=array();
		if($listaP != null){
			$i=0;
			while($i<sizeof($listaP)){
				$planificacion=$listaP[$i];
				$atributos = $planificacion->getAtributos();
				$retorno =array();
				foreach ($atributos as $atributo){
					$retorno[$atributo] = $planificacion->get($atributo);
					$retorno['id'] = $planificacion->get('id');
				}
				$retornoArray[$i]=$retorno;
				$i=$i+1;
			}
			return $retornoArray;
		}else	return null;
	}
	function listarProyecto(){
		$lista = new listaProyecto();
		$proyectoArray = $lista->listar();
		$retornoArray=array();
		if($proyectoArray != null){
			$i=0;
			while($i<sizeof($proyectoArray)){
				$proyecto=$proyectoArray[$i];
				$atributos = $proyecto->getAtributos();
				$retorno =array();
				foreach ($atributos as $atributo){
					if ( $atributo == "estado"){
                         if($proyecto->get($atributo) == 1) { 
						     $retorno[$atributo] = "Activo"; }	 else $retorno[$atributo] = "Inativo";
					} else	$retorno[$atributo] = $proyecto->get($atributo);
					
				}
				$retornoArray[$i]=$retorno;
				$i=$i+1;
			}
			return $retornoArray;
		}else	return null;
	}
	
	function buscarProyecto($nombre){
		$lista = new listaProyecto();
		$proyectoArray = $lista->buscar($nombre,"nombre");
		$retornoArray=array();
		if($proyectoArray != null){
			$i=0;
			while($i<sizeof($proyectoArray)){
				$proyecto=$proyectoArray[$i];
				$atributos = $proyecto->getAtributos();
				$retorno =array();
				foreach ($atributos as $atributo){
					if ( $atributo == "estado"){
                         if($proyecto->get($atributo) == 1) { 
						     $retorno[$atributo] = "Activo"; }	 else $retorno[$atributo] = "Inactivo";
					} else	$retorno[$atributo] = $proyecto->get($atributo);
					
				}
				$retornoArray[$i]=$retorno;
				$i=$i+1;
			}
			return $retornoArray;
		}else	return null;
	}
	
	function buscarClientes($nombre){
		$lista = new listaSeAsocia();
		$proyectoArray = $lista->buscar($nombre,'nombreProyecto');
		$retornoArray=array();
		if($proyectoArray != null){
			$i=0;
			$j=0;
			while($i<sizeof($proyectoArray)){
				$proyecto=$proyectoArray[$i];
				$usuario=new usuario(null,null,$proyecto->get('correoUSBUsuario'),null,null,null,null,null);
				$usuario-> autocompletar();
				if ($usuario->get('rol')==4){
					$atributos = $usuario->getAtributos();
					$retorno =array();
					foreach ($atributos as $atributo){
						$retorno[$atributo] = $usuario->get($atributo);
					}
					$retornoArray[$j]=$retorno;
					$j++;
				}
				$i=$i+1;
			}
			return $retornoArray;
		}else	return null;
	}
	
	function buscarProfes($nombre){
		$lista = new listaSeAsocia();
		$proyectoArray = $lista->buscar($nombre,'nombreProyecto');
		$retornoArray=array();
		if($proyectoArray != null){
			$i=0;
			$j=0;
			while($i<sizeof($proyectoArray)){
				$proyecto=$proyectoArray[$i];
				$usuario=new usuario(null,null,$proyecto->get('correoUSBUsuario'),null,null,null,null,null);
				$usuario-> autocompletar();
				if ($usuario->get('rol')==1 || $usuario->get('rol')==2){
					$atributos = $usuario->getAtributos();
					$retorno =array();
					foreach ($atributos as $atributo){
						$retorno[$atributo] = $usuario->get($atributo);
					}
					$retornoArray[$j]=$retorno;
					$j++;
				}
				$i=$i+1;
			}
			return $retornoArray;
		}else	return null;
	}
	
	function listarProfesores(){
		$lista = new listaUsuarios();
		$usuariosArray = $lista->listar(2,'rol');
		$retornoArray=array();
		if($usuariosArray != null){
			$i=0;
			while($i<sizeof($usuariosArray)){
				$usuario =$usuariosArray[$i];
				$atributos = $usuario->getAtributos();
				$retorno =array();
				foreach ($atributos as $atributo){
					$retorno[$atributo] = $usuario->get($atributo);
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
	function consultarPlanificacion($nombre, $numero){
		$etapa = new etapa($numero,$nombre);
		if (($etapa -> autocompletar()) != 0) return 1;
		$atributos = $etapa->getAtributos();
		$retorno =array();
		foreach ($atributos as $atributo)	$retorno[$atributo] = $etapa->get($atributo);
		$retorno['id'] = $etapa->get('id');
		return $retorno;
	}
    function consultarPlanificacion2($id){
		$etapa = new etapa(null,null);
        $etapa->set('id',$id);
		if (($etapa -> autocompletar()) != 0) return 1;
		$atributos = $etapa->getAtributos();
		$retorno =array();
		foreach ($atributos as $atributo)	$retorno[$atributo] = $etapa->get($atributo);
		$retorno['id'] = $etapa->get('id');
		return $retorno;
	}
	function cargarActividades($idEtapa){
		$lista = new listaActividad();
		$arreglo = $lista->buscar($idEtapa);
		//$actividades =array();
		if ($arreglo != null){
			$i = 0;
			foreach ($arreglo as $actividad){
				$actividades =array();
				$actividades['semana'] = $actividad->get("semana");
				$actividades['fecha'] = $actividad->get("fecha");
				$actividades['puntos'] = $actividad->get("puntos");
				$actividades['descripcion'] = $actividad->get("descripcion");
				$actividades['id'] = $actividad->get("id");
				$actividades['nombre'] = $actividad->get("nombre");
				$resultado[$i]=$actividades;
				$i++;
			}
			return $resultado;
		}else{
			return null;
		}
	}
	function registrarProyecto($estado,$nombre,$idEtapa,$nroSolicitud,$nombres, $apellidos, $correosC,$telefonos,$cargos,$correosE){
		$arr = explode('$$', $nroSolicitud);
		$numSolicitud = $arr[0];
		$unidad = $arr[1];
		$registro = new proyecto($nombre,$numSolicitud,$estado,$idEtapa);
		if ($registro->insertar()==0) {
			$i = 0;
			$j = sizeof($correosC);
			while( $i < $j) {
				$email = strtolower($correosC[$i]);
				$numero = rand().rand();
                $codigo = dechex($numero);
                $enc = new Encrypter($codigo, generarSal($email));
				$usuario = new usuario($nombres[$i],$apellidos[$i],$email,$enc->toMD5(),null,1,4,null);
				if (($usuario->autocompletar())!=0)	if($usuario->insertar() != 0)	return 1;
				$cPertenece = new pertenece($unidad,$correosC[$i],$cargos[$i],$telefonos[$i]);
				if($cPertenece->insertar() != 0)	return 1;
				$clienteSeAsocia = new seasocia($correosC[$i],$nombre);
				if($clienteSeAsocia->insertar() != 0) return 1;
				$i++;
			}
			$i = 0;
			$j = sizeof($correosE);
			while( $i < $j) {
				$profeSeAsocia = new seasocia($correosE[$i],$nombre);
				if($profeSeAsocia->insertar() != 0) return 1;
				$i++;
			}	
			$tiene = new tiene($nombre,$idEtapa);
			if($tiene->insertar()!=0)	return 1; 
			return 0;
		} else return 1;
	}
	/*
	function agregarProyecto($nombreProy,$etapa,$solicitud,$nombres,$apellidos,$correos,$tels,$roles,$usbids){
		$arr = explode('$$', $solicitud);
		$numSolicitud = $arr[0];
		$unidad = $arr[1];
		$proyecto = new proyecto($nombreProy,$numSolicitud,1,$etapa);  //1 es proyecto activo
		if($proyecto->insertar()==0){
			$i = 0;
			$j = sizeof($nombres);
			while($i < $j){
				$numero = rand().rand();
				$codigo = dechex($numero);
				$cliente = new usuario($nombres[$i],$apellidos[$i],$correos[$i],$codigo,null,1,4,null);
				if($cliente->insertar() == 0){
					$tiene = new tiene($nombreProy,$etapa);
					if($tiene->insertar()==0){
						$cPertenece = new pertenece($unidad,$correos[$i],$roles[$i],$tels[$i]);
						if($cPertenece->insertar()== 0) {
							$clienteSeAsocia = new seasocia($correos[$i],$nombreProy);
							if($clienteSeAsocia->insertar() != 0) return 1;
						} else return 1;
					} else return 1;
				} else return 1;
				$i++;
			}
			$i = 0;
			$j = sizeof($usbids);
		    while($i < $j){
				$profeSeAsocia = new seasocia($usbids[$i],$nombreProy);
				if($profeSeAsocia->insertar() != 0) return 1;
				$i++;
			}
			return 0;
		}else	return 1;	
	}*/
    function consultarUsuario($email) {
        $user = new usuario(null,null,$email,null,null,null,null,null);
        $user->autocompletar();
        return $user;
    }
}
?>
