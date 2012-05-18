<?php 
	/*	UNIVERSIDAD SIMON BOLIVAR
		PERIODO:			ENE-MAR 2012
		MATERIA: 			SISTEMAS DE INFORMACION II
		NOMBRE DEL ARCHIVO:	registrarSolicitud.php
	*/
    /*if ($_SERVER['SERVER_ADDR'] == "127.0.0.1")
                  $root = $_SERVER['DOCUMENT_ROOT']."/sigeprosi";
          else
                  $root = "/home/ps6116-02/public_html/sigeprosi";
    */
    $root = $_SERVER['DOCUMENT_ROOT']."/sigeprosi";
    include_once $root."/class/class.Solicitud.php";
    include_once $root."/class/class.listaSolicitud.php";
    include_once $root."/class/class.TelefonoSolicitud.php";
    include_once $root."/class/class.listaTelefonoSolicitud.php";
    require_once "../aspectos/Seguridad.php";

  $seguridad = Seguridad::getInstance();
  $seguridad->escapeSQL($_POST);
	$tel = $_POST["tlf"];
    $area = $_POST["codigo"];
	$email = strtolower($_POST["email"]);
	$i = 0;
	$j = sizeof($tel);
	$unidadUSB = $_POST["department"];
	$status = "0";
	$baseSolicitud = new listaSolicitud();
	//generamos un código aleatorio de registro
	mt_srand (time());
  $numero = mt_rand(0,65535).mt_rand(0,65535);
	$codigo = dechex($numero);
	$numero = substr('00000000', 0, (8-strlen($codigo))).$codigo;
	while($baseSolicitud->buscar($numero,"nro") != null){
		$numero = mt_rand(0,65535).mt_rand(0,65535);
		$codigo = dechex($numero);
		$numero = substr('00000000', 0, (8-strlen($codigo))).$codigo;
	}

//	if (isset($_FILES['adjunto'])){
		$nombre_archivo = $_FILES['adjunto']['name'];
		$tipo_archivo = $_FILES['adjunto']['type'];
		$tamano_archivo = $_FILES['adjunto']['size'];
		$ap = substr($tipo_archivo,12);
		$ext="";
		
		if ($tamano_archivo == 0 && $nombre_archivo==null) $ext = "vacia";

		if ($tipo_archivo==null) {
			if (strpos($nombre_archivo, ".doc")) $ext="doc";
			if (strpos($nombre_archivo, ".pdf")) $ext="pdf";
			if (strpos($nombre_archivo, ".PDF")) $ext="pdf";
		}else {
			if (strpos($tipo_archivo, "msword")) $ext="doc";
			if (strpos($tipo_archivo, "pdf")) $ext = "pdf";
		}
		echo $ext;
//	if (($tamano_archivo < 2050000)){ strpos($tipo_archivo, "msword") || strpos($tipo_archivo, "pdf")
			if (!($ext == "doc" || $ext == "pdf" || $ext == "vacia")){
			  echo '<script>';
				echo 'alert("Error!! el tipo de archivo seleccionado no est\u00e1 permitido.");';
				echo 'location.href="../principal.php?content=registroSolicitud";';
				echo '</script>';
				exit();
			}else{
				
		    if ($ext == "doc" || $ext == "pdf"){
					if (move_uploaded_file($_FILES['adjunto']['tmp_name'],'../adjuntosSolicitudes/'.$numero.'.'.$ext)){
						echo '<script>';
			      echo 'alert("El archivo ha sido cargado correctamente.");';
						echo '</script>';			
			    }else{
			      echo '<script>';
						echo 'alert("Error!! ocurrio un problema al intentar cargar su documento.");';
						echo 'location.href="../principal.php?content=registroSolicitud";';
						echo '</script>';
						exit();
	  	  	}
				}
			}
/*		}else{
			echo '<script>';
			echo 'alert("Error!! el tama\u00f1o m\u00e1ximo permitido para los documentos es 2MB.");';
			echo 'location.href="../principal.php?content=registroSolicitud";';
			echo '</script>';
			exit();
		}
	}
*/

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
        mail($_POST['email'],"Datos de su solicitud","Nro: ".$numero."\nEmail: ".$_POST['email']."\n");
		echo '<script>';
		echo 'alert("Su solicitud ha sido procesada exitosamente.\
		\nPor favor revise su email, para obtener los datos");';
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
