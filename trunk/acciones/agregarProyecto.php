<?php
$root = $_SERVER['DOCUMENT_ROOT']."/sigeprosi/";
include_once $root."/class/class.fachadainterfaz.php;"

//Por los momentos no se esta verificando etapa 
$nombres = $_POST["nombre"];
$apellidos = $_POST["apellido"];
$correos = $_POST["email"];
$codigos = $_POST["codigo"];
$tel = $_POST["tlf"];
$roles = $_POST["rol"];
$usbids = $_POST["usbid"];

if ($_POST["nombreProy"]=="" || $_POST["solicitud"]=="" {
        header("Location: ../principal.php?content=agregarProyecto&error=camposVacios");
    }
    else{
			$i = 0;
			$j = sizeof($nombres);
			while( $i < $j) {
			  if($tel[$i]!=""){
					if(strlen($tel[$i]) !=7){
					       header("Location: ../principal.php?content=agregarProyecto&error=formatoTlf");}
			  }else if ($nombres[$i]=="" || $apellidos[$i] =="" || $roles[$i] == "" || $correos[$i] == "" || $usbids[$i] == ""){
			         header("Location: ../principal.php?content=agregarProyecto&error=camposVacios");
			  } else if($tel[$i]==""){
					       header("Location: ../principal.php?content=agregarProyecto&error=formatoTlf");			  
			  } else if ($correos[$i] != ""){
			  	    $email = strtolower($correos[$i);
					//$resultTelefono= sscanf($_POST["tlf"], "%d-%d",$codigo,$numero);
					$patronCorreo = "/\w(@usb\.ve){1}$/"; //Patron para validar correo.
					if(!preg_match($patronCorreo, $email)){
						header("Location: ".$root."/principal.php?content=agregarProyecto&error=formatoCorreo");
					}
			  } else if ($usbids[$i] != ""){
			  	    $email = strtolower($usbis[$i);
					//$resultTelefono= sscanf($_POST["tlf"], "%d-%d",$codigo,$numero);
					$patronCorreo = "/\w(@usb\.ve){1}$/"; //Patron para validar correo.
					if(!preg_match($patronCorreo, $email)){
						header("Location: ".$root."/principal.php?content=agregarProyecto&error=formatoCorreo");
					}
			  }
			  $i++;
		    }
	}
//Luego insercion :)...
}

?>