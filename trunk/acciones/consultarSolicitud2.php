<?php 
$root = $_SERVER['DOCUMENT_ROOT']."/sigeprosi/";
include_once $root."class/class.fachadainterfaz.php";
if (isset($_GET["email"]) && isset($_GET["nro"])){
	if ($_GET["email"]=="ejemplo@usb.ve" || $_GET["email"]=="" || $_GET["nro"]=="") 	{
        header("Location:../principal.php?content=solicitudes&error=camposVacios");
    }
    else{
	    //Verificacion formato correo 
	    $email = strtolower($_GET["email"]);
	    $patronCorreo = "/\w(@usb\.ve){1}$/"; //Patron para validar correo.
        if(!preg_match($patronCorreo, $email)){
            header("Location:../principal.php?content=solicitudes&error=formatoCorreo");
        }	    
        else{
            $fachada = fachadaInterfaz::getInstance();
			$solicitud = $fachada->consultarSolicitud($email, $_GET['nro']);
			session_start();
			$_SESSION['solicitud'] = $solicitud;
			$_SESSION['telefonos'] = $fachada->cargarTelefSolicitud($solicitud['nro']);
			header("Location:../principal.php?content=consultaSolicitudExitosa");
			
			//header("Location:".$root."principal.php?content=consultaSolicitudExitosa");
			//print_r ($telefonos);
        }
    }
}
?>