<?php 
$root = $_SERVER['DOCUMENT_ROOT']."/sigeprosi/";
include_once $root."class/class.fachadainterfaz.php";
if (isset($_POST["email"]) && isset($_POST["numSol"])){
	if ($_POST["email"]=="ejemplo@usb.ve" || $_POST["email"]=="" || $_POST["numSol"]=="") 	{
        header("Location:../principal.php?content=solicitudes&error=camposVacios");
    }
    else {
	    //Verificacion formato correo 
	    $email = strtolower($_POST["email"]);
	    $patronCorreo = "/\w(@usb\.ve){1}$/"; //Patron para validar correo.
        if(!preg_match($patronCorreo, $email)){
            header("Location:../principal.php?content=solicitudes&error=formatoCorreo");
        }	    
        else{
            header("Location:../principal.php?content=consultaSolicitudExitosa&nro=".$_POST["numSol"]."&email=".$_POST["email"]);
        }
    }
}
?>