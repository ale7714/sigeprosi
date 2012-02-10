<?php 
include_once "../class/class.fachadainterfaz.php";
	$tel = $_POST["tlf"];
    $area = $_POST["codigo"];
	$email = strtolower($_POST["email"]);
	$unidadUSB = $_POST["department"];
	$fachada = fachadaInterfaz::getInstance();
	$numero = $fachada->generarCodigoSolicitud();
	while(($fachada->exiteSolicitud($numero)) != 1)	$numero = $fachada->generarCodigoSolicitud(); 
	if(($fachada->registrarSolicitud($numero,$_POST["planteamiento"],$_POST["justificacion"],$email, $_POST["tiempolibre"], $_POST["recursos"],$_POST["personas"],$unidadUSB, "0",$tel,$area))==0)
	   header("Location: ../principal.php?content=solicitudExitosa&numero=".$numero."&mail=".$email);
?>