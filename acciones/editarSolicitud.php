
<?php 
	//NO FUNCIONA TODAVIA NO ESTA IMPLEMENTADA
    include_once "../class/class.Solicitud.php";
    include_once "../class/class.ListaSolicitud.php";
    include_once "../class/class.TelefonoSolicitud.php";
    include_once "../class/class.ListaTelefonoSolicitud.php";
    include_once "../class/class.fachadainterfaz.php";
	$tel = $_POST["tlf"];
    $area = $_POST["codigo"];
	$numero = $_POST["nro"];
    if ($_POST["email2"]=="ejemplo@usb.ve" || $_POST["email2"]==""  || $tel[0]=="" || $_POST["personas"]==""
		|| $_POST["planteamiento"]=="" || $_POST["recursos"]=="" || $_POST["tiempolibre"]==""
		|| $_POST["justificacion"]=="") 	{
        header("Location: ../principal.php?content=editaSolicitud&nro=".$_POST["nro"]."&mail=".$_POST["email2"]."&error=camposVacios");
    }
    else{
	    $email = strtolower($_POST["email2"]);
        //$resultTelefono= sscanf($_POST["tlf"], "%d-%d",$codigo,$numero);
	    $patronCorreo = "/\w(@usb\.ve){1}$/"; //Patron para validar correo.
        if(!preg_match($patronCorreo, $email)){
            header("Location: ../principal.php?content=editaSolicitud&nro=".$_POST["nro"]."&mail=".$_POST["email2"]."&error=formatoCorreo");
        }	


	    //Verificamos el campo de la UNIDAD USB. 
        else if($_POST["department"] == ""){
            header("Location: ../principal.php?content=editaSolicitud&nro=".$_POST["nro"]."&mail=".$_POST["email2"]."&error=Unidad");
        }
        else{
			$i = 0;
			$j = sizeof($tel);
			while( $i < $j) {
			  if($tel[$i]!=""){
					if(strlen($tel[$i]) !=7){
					       header("Location: ../principal.php?content=editaSolicitud&nro=".$_POST["nro"]."&mail=".$_POST["email2"]."&error=formatoTlf");
			  }} else if($tel[$i]==""){
					       header("Location: ../principal.php?content=editaSolicitud&nro=".$_POST["nro"]."&mail=".$_POST["email2"]."&error=formatoTlf");			  
			  }
			  $i++;
			}
            $unidadUSB = $_POST["department"];
            //$nameproy = $_POST["nameproy"];
            $status = "0";
            $baseSolicitud = new listaSolicitud();
            
                //generamos un c�digo aleatorio de registro
                /* $numero = rand().rand();
                $codigo = dechex($numero);
                //Completamos con ceros (0) a la izq para que sea codigo de 8 carateres
                $numero = substr('00000000', 0, (8-strlen($codigo))).$codigo;
                
                while($baseSolicitud->buscar($numero,"nro") != null){
                    //generamos un c�digo aleatorio de registro
                    $numero = rand().rand();
                    $codigo = dechex($numero);
                    //Completamos con ceros (0) a la izq para que sea codigo de 8 carateres
                    $numero = substr('00000000', 0, (8-strlen($codigo))).$codigo;
                    
                } */

				//Revisar el pasaje de parametro 'status' ('0') 
				$fachada = fachadaInterfaz::getInstance();
				$solicitud = $fachada->actualizarSolicitud($numero,$_POST["planteamiento"],$_POST["justificacion"],$_POST['email2'], $_POST['tiempolibre'], $_POST['recursos'],$_POST['personas'],$_POST['department'],0,$tel,$area);
				
				if ($olicitud == 0) header("Location: ../principal.php?content=solicitudExitosa&numero=".$numero."&mail=".$_POST['email2']);
				else header("Location: ../principal.php?content=editaSolicitud&numero=".$numero."&mail=".$_POST['email2']."&error=modificar");
				//$solicitud = $fachada->consultarSolicitud($email, $_POST['numSol']);
				//$telefonos = $fachada->cargarTelefSolicitud($solicitud['nro']);
			
			
                /* $registro = new solicitud($numero,$_POST["planteamiento"],$_POST["justificacion"],$email, $_POST["tiempolibre"], $_POST["recursos"],$_POST["personas"],$unidadUSB, $status);
                if($registro->insertar()==0){
					echo 'Hubo el registro con el siguiente numero: '.$numero;
					$i = 0;
					$j = sizeof($tel);
					while( $i < $j) {
					  $telsol = new telefonosolicitud($numero,$area[$i].$tel[$i]);
					  if($telsol->insertar() != 0) {
					    echo "Error insertado el numero de telefono";
					  }
					  $i++;
					} */
                    
                    //$numero = $basesolicitud->buscarUltimaSolicitud();
                    //header("Location: ../principal.php?content=solicitudExitosa&numero=".$numero."&mail=".$_POST['email2']);
                    //echo 'Solicitud exitosa: ';
                    //echo $email;
                    //echo $unidadUSB;
                    //echo $nameproy;
                    //echo '! ';
                    //echo ' <a href="login.php" style="color:#FFFFFF;"><strong>Regresar a la p?gina de inicio</strong></a></p>';
                //}
            }
                
    }
    
?>