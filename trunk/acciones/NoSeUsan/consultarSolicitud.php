
<?php 
	/*	UNIVERSIDAD SIMON BOLIVAR
		PERIODO:			ENE-MAR 2012
		MATERIA: 			SISTEMAS DE INFORMACION II
		NOMBRE DEL ARCHIVO:	registrarSolicitud.php
	*/
    include_once "../class/class.Solicitud.php";
    include_once "../class/class.ListaSolicitud.php";

    if ($_POST["email"]=="ejemplo@usb.ve" || $_POST["numSol"]=="") 	{
        header("Location: ../principal.php?content=consultaSolicitud&error=camposVacios");
    }
    else{
	    //Verificacion formato correo 
	    $email = strtolower($_POST["email"]);
	    $patronCorreo = "/\w(@usb\.ve){1}$/"; //Patron para validar correo.
        if(!preg_match($patronCorreo, $email)){
            header("Location: ../principal.php?content=consultaSolicitud&error=formatoCorreo");
        }	    
        else{
            $baseSolicitud = new listaSolicitud();
			$solicitud = $baseSolicitud->buscar($_POST["numSol"],"nro");
            if($solicitud != null){
                if($solicitud->get("email") == $email){
					header("Location: ../principal.php?content=consultaSolicitudExitosa&nro=".$_POST["numSol"]);
				} else {
					header("Location: ../principal.php?content=consultaSolicitud&error=noExiste");
				}
            } else {
					header("Location: ../principal.php?content=consultaSolicitud&error=noExiste");
			}
        }
    }
                
    
    
?>