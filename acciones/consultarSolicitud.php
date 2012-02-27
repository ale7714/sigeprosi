<?php 
include_once "../class/class.fachadainterfaz.php";
$fachada = fachadaInterfaz::getInstance();
if ($_SERVER['SERVER_ADDR'] == "127.0.0.1")
		$root = $_SERVER['DOCUMENT_ROOT']."/sigeprosi/";
	else
		$root = "/home/ps6116-02/public_html/Sigeprosi/";
include_once $root."class/class.fachadainterfaz.php";
if (isset($_POST["email"]) && isset($_POST["numSol"])){
	if ($fachada->consultarSolicitud($_POST["email"],$_POST["numSol"])==0)
		header("Location:../principal.php?content=consultaSolicitudExitosa&nro=".$_POST["numSol"]."&email=".$_POST["email"]);
    else{
		header("Location:../principal.php?content=gestionarSolicitud&error=noExiste");
    }
    
}
?>
