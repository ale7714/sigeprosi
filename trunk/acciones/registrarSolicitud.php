<?php 
	/*	UNIVERSIDAD SIMON BOLIVAR
		PERIODO:			ENE-MAR 2012
		MATERIA: 			SISTEMAS DE INFORMACION II
		NOMBRE DEL ARCHIVO:	registrarSolicitud.php
	*/
    if ($_SERVER["SERVER_ADDR"]=="159.90.168.83" || $_SERVER["SERVER_ADDR"]!="127.0.0.1" )
      $root = "/home/ps6116-02/public_html/Sigeprosi/";
    else
      $root = $_SERVER['DOCUMENT_ROOT']."/sigeprosi/";
    include_once $root."/class/class.Solicitud.php";
    include_once $root."/class/class.listaSolicitud.php";
    include_once $root."/class/class.TelefonoSolicitud.php";
    include_once $root."/class/class.listaTelefonoSolicitud.php";
	$tel = $_POST["tlf"];
    $area = $_POST["codigo"];
	$email = strtolower($_POST["email"]);
	$i = 0;
	$j = sizeof($tel);
	$unidadUSB = $_POST["department"];
	$status = "0";
	$baseSolicitud = new listaSolicitud();
	//generamos un código aleatorio de registro
	$numero = rand().rand();
	$codigo = dechex($numero);
	$numero = substr('00000000', 0, (8-strlen($codigo))).$codigo;
	while($baseSolicitud->buscar($numero,"nro") != null){
		$numero = rand().rand();
		$codigo = dechex($numero);
		$numero = substr('00000000', 0, (8-strlen($codigo))).$codigo;
	}
	$registro = new solicitud($numero,$_POST["planteamiento"],$_POST["justificacion"],$email, $_POST["tiempolibre"], $_POST["recursos"],$_POST["personas"],$unidadUSB, $status);
	if ($registro->insertar()==0){
		$i = 0;
		$j = sizeof($tel);
		while( $i < $j) {
		  $telsol = new telefonosolicitud($numero,$area[$i].$tel[$i]);
		  if($telsol->insertar() != 0) {
			//echo "Error insertado el numero de telefono";
		  }
		  $i++;
		}
		echo '<script>';
		echo 'alert("Su solicitud a sido procesada exitosamente.\
		\nPor favor tome nota de los datos de la misma:\n\
		Correo asociado: '.$_POST['email'].'\nNumero de Solicitud: '.$numero.'");';
		echo 'location.href="../principal.php"';
		echo '</script>';	
	}else{
		echo '<script>';
		echo 'alert("Ha ocurrido un error durante la creacion de su solicitud.\n\
		Por favor comuniquese con el administrador del sistema.");';
		echo 'location.href="../principal.php"';
		echo '</script>';
	}    
?>
