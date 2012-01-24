
<?php 
	/*	UNIVERSIDAD SIMON BOLIVAR
		PERIODO:			ENE-MAR 2012
		MATERIA: 			SISTEMAS DE INFORMACION II
		NOMBRE DEL ARCHIVO:	registrarSolicitud.php
	*/
    include_once "../class/class.Solicitud.php";
    include_once "../class/class.ListaSolicitud.php";
    include_once "../class/class.TelefonoSolicitud.php";
    include_once "../class/class.ListaTelefonoSolicitud.php";
	$tel = $_POST["tlf"];
    $area = $_POST["codigo"];
    if ($_POST["email"]=="ejemplo@usb.ve" || $_POST["email"]==""  || $tel[0]=="" || $_POST["personas"]==""
		|| $_POST["planteamiento"]=="" || $_POST["recursos"]=="" || $_POST["tiempolibre"]==""
		|| $_POST["justificacion"]=="") 	{
        header("Location: ../principal.php?content=registroSolicitud&error=camposVacios");
    }
    else{
	    $email = strtolower($_POST["email"]);
        //$resultTelefono= sscanf($_POST["tlf"], "%d-%d",$codigo,$numero);
	    $patronCorreo = "/\w(@usb\.ve){1}$/"; //Patron para validar correo.
        if(!preg_match($patronCorreo, $email)){
            header("Location: ../principal.php?content=registroSolicitud&error=formatoCorreo");
        }	


	    //Verificamos el campo de la UNIDAD USB. 
        else if($_POST["department"] == ""){
            header("Location: ../principal.php?content=registroSolicitud&error=Unidad");
        }
        else{
			$i = 0;
			$j = sizeof($tel);
			while( $i < $j) {
			  if($tel[$i]!=""){
					if(strlen($tel[$i]) !=7){
					       header("Location: ../principal.php?content=registroSolicitud&error=formatoTlf");
			  }} else if($tel[$i]==""){
					       header("Location: ../principal.php?content=registroSolicitud&error=formatoTlf");			  
			  }
			  $i++;
			}
            $unidadUSB = $_POST["department"];
            //$nameproy = $_POST["nameproy"];
            $status = "0";
            $baseSolicitud = new listaSolicitud();
            
                //generamos un código aleatorio de registro
                $numero = rand().rand();
                $codigo = dechex($numero);
                //Completamos con ceros (0) a la izq para que sea codigo de 8 carateres
                $numero = substr('00000000', 0, (8-strlen($codigo))).$codigo;
                
                while($baseSolicitud->buscar($numero,"nro") != null){
                    //generamos un código aleatorio de registro
                    $numero = rand().rand();
                    $codigo = dechex($numero);
                    //Completamos con ceros (0) a la izq para que sea codigo de 8 carateres
                    $numero = substr('00000000', 0, (8-strlen($codigo))).$codigo;
                    
                }

                $registro = new solicitud($numero,$_POST["planteamiento"],$_POST["justificacion"],$email, $_POST["tiempolibre"], $_POST["recursos"],$_POST["personas"],$unidadUSB, $status);
                if($registro->insertar()==0){
					$i = 0;
					$j = sizeof($tel);
					while( $i < $j) {
					  $telsol = new telefonosolicitud($numero,$area[$i].$tel[$i]);
					  if($telsol->insertar() != 0) {
					    echo "Error insertado el numero de telefono";
					  }
					  $i++;
					}
                    header("Location: ../principal.php?content=solicitudExitosa&numero=".$numero."&mail=".$_POST['email']);
                }
            }
                
    }
    
?>