<?php 
$root = $_SERVER['DOCUMENT_ROOT']."/sigeprosi/";
include_once $root."class/class.fachadainterfaz.php";
	$fachada = fachadaInterfaz::getInstance();
	$matriz=$fachada->buscarProyecto($_POST['nombreProy']);
	session_start();
	$_SESSION['proyecto'] = $matriz[0];
	$_SESSION['clientes'] = $fachada->buscarClientes($_POST['nombreProy']);
	$_SESSION['profesores'] = $fachada->buscarProfes($_POST['nombreProy']);
	header("Location:../principal.php?content=editaProyecto");
	//header("Location:".$root."principal.php?content=consultaSolicitudExitosa");
	//print_r ($telefonos);

?>