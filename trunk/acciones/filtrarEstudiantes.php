
<?php 
	/*	UNIVERSIDAD SIMON BOLIVAR
		PERIODO:			ENE-MAR 2012
		MATERIA: 			SISTEMAS DE INFORMACION II
		NOMBRE DEL ARCHIVO:	filtrarEstudiantes.php
	*/
    include_once "../class/class.Solicitud.php";
    include_once "../class/class.ListaSolicitud.php";
    include_once "../class/class.TelefonoSolicitud.php";
    include_once "../class/class.listaTelefonoSolicitud.php";
	include_once "../class/class.Usuario.php";
	include_once "../class/class.Estudiante.php";
	include_once "../class/class.ComunidadUSB.php";
	include_once "../class/class.Desarrolla.php";
	include_once "../class/class.Lidera.php";
	include_once "../class/class.Trimestre.php";
	include_once "../class/class.BusquedaConCondicion.php";
	include_once "../class/fBaseDeDatos.php";
	
	$nombre[0] = "usuario";
	$columnas[0] = "id";
	$columnas[1] = "nombre";
	$columnas[2] = "apellido";
	$columnas[3] = "correoUSB";
	$parametros[0] = "activo";
	$valores[0] = 1;
	$simbolo = "=";
	
	$usuariosActivos = new BusquedaConCondicion ($nombre, $columnas, $parametros, $valores, $simbolo, NULL, NULL);
	$bd = new fBaseDeDatos();
	$consulta = $bd->search($usuariosActivos);

	while ($array = mysql_fetch_array($consulta)) { 
		print_r ($array);
	}
	
	
	
	
	
	
	
	
	
	
	
	// $tel = $_POST["tlf"];
    // $area = $_POST["codigo"];
    // if ($_POST["email"]=="ejemplo@usb.ve" || $_POST["email"]==""  || $tel[0]=="" || $_POST["personas"]==""
		// || $_POST["planteamiento"]=="" || $_POST["recursos"]=="" || $_POST["tiempolibre"]==""
		// || $_POST["justificacion"]=="") 	{
        // header("Location: ../principal.php?content=registroSolicitud&error=camposVacios");
    // }
    // else{
	    // $email = strtolower($_POST["email"]);
        //$resultTelefono= sscanf($_POST["tlf"], "%d-%d",$codigo,$numero);
	    // $patronCorreo = "/\w(@usb\.ve){1}$/"; //Patron para validar correo.
        // if(!preg_match($patronCorreo, $email)){
            // header("Location: ../principal.php?content=registroSolicitud&error=formatoCorreo");
        // }	


	    //Verificamos el campo de la UNIDAD USB. 
        // else if($_POST["department"] == ""){
            // header("Location: ../principal.php?content=registroSolicitud&error=Unidad");
        // }
        // else{
			// $i = 0;
			// $j = sizeof($tel);
			// while( $i < $j) {
			  // if($tel[$i]!=""){
					// if(strlen($tel[$i]) !=7){
					       // header("Location: ../principal.php?content=registroSolicitud&error=formatoTlf");
			  // }} else if($tel[$i]==""){
					       // header("Location: ../principal.php?content=registroSolicitud&error=formatoTlf");			  
			  // }
			  // $i++;
			// }
            // $unidadUSB = $_POST["department"];
            //$nameproy = $_POST["nameproy"];
            // $status = "0";
            // $baseSolicitud = new listaSolicitud();
            
                //generamos un c�digo aleatorio de registro
                // $numero = rand().rand();
                // $codigo = dechex($numero);
                //Completamos con ceros (0) a la izq para que sea codigo de 8 carateres
                // $numero = substr('00000000', 0, (8-strlen($codigo))).$codigo;
                
                // while($baseSolicitud->buscar($numero,"nro") != null){
                    //generamos un c�digo aleatorio de registro
                    // $numero = rand().rand();
                    // $codigo = dechex($numero);
                    //Completamos con ceros (0) a la izq para que sea codigo de 8 carateres
                    // $numero = substr('00000000', 0, (8-strlen($codigo))).$codigo;
                    
                // }

                // $registro = new solicitud($numero,$_POST["planteamiento"],$_POST["justificacion"],$email, $_POST["tiempolibre"], $_POST["recursos"],$_POST["personas"],$unidadUSB, $status);
                // if($registro->insertar()==0){
					// echo 'Hubo el registro con el siguiente numero: '.$numero;
					// $i = 0;
					// $j = sizeof($tel);
					// while( $i < $j) {
					  // $telsol = new telefonosolicitud($numero,$area[$i].$tel[$i]);
					  // if($telsol->insertar() != 0) {
					    // echo "Error insertado el numero de telefono";
					  // }
					  // $i++;
					// }
                    
                    //$numero = $basesolicitud->buscarUltimaSolicitud();
                    //header("Location: ../principal.php?content=solicitudExitosa&numero=".$numero."&mail=".$_POST['email']);
                    //echo 'Solicitud exitosa: ';
                    //echo $email;
                    // echo $unidadUSB;
                    // echo $nameproy;
                    // echo '! ';
                    // echo ' <a href="login.php" style="color:#FFFFFF;"><strong>Regresar a la p?gina de inicio</strong></a></p>';
                // }
            // }
                
    // }
    
?>