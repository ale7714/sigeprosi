
<?php 
	/*	UNIVERSIDAD SIMON BOLIVAR
		PERIODO:			ENE-MAR 2012
		MATERIA: 			SISTEMAS DE INFORMACION II
		NOMBRE DEL ARCHIVO:	registrarSolicitud.php
	*/
    include_once "../class/class.Usuario.php";
    if ($_POST["email"]=="ejemplo@usb.ve" || $_POST["email"]=="") 	{
        header("Location: ../principal.php?content=registroSolicitud&error=camposVacios");
    }else{
	    $email = strtolower($_POST["email"]);
        //$resultTelefono= sscanf($_POST["tlf"], "%d-%d",$codigo,$numero);
	    $patronCorreo = "/\w(@usb\.ve){1}$/"; //Patron para validar correo.
        if(!preg_match($patronCorreo, $email)){
            header("Location: ../principal.php?content=registroSolicitud&error=formatoCorreo");
        }	


	    //Verificamos el campo de la UNIDAD USB. 
        

                $registro = new Usuario(null,null,$email,null, 1);
                if($registro->insertar()==0){
					echo 'Hubo el registro ';
                    
                    //$numero = $basesolicitud->buscarUltimaSolicitud();
                    header("Location: ../principal.php?content=solicitudExitosa&numero=".$numero."&mail=".$_POST['email']);
                    //echo 'Solicitud exitosa: ';
                    //echo $email;
                    //echo $unidadUSB;
                    //echo $nameproy;
                    //echo '! ';
                    //echo ' <a href="login.php" style="color:#FFFFFF;"><strong>Regresar a la p?gina de inicio</strong></a></p>';
                }
            
                
    
    
?>