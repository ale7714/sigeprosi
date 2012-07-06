<?php
  /*if ($_SERVER['SERVER_ADDR'] == "127.0.0.1")
    $root = $_SERVER['DOCUMENT_ROOT']."/sigeprosi";
  else
    $root = "/home/ps6116-02/public_html/sigeprosi";
  */
  include_once "../class/class.fachadainterfaz.php";
  $root = $_SERVER['DOCUMENT_ROOT']."/sigeprosi/";
	$nombre_archivo = $_FILES['adjunto']['name'];
	$tipo_archivo = $_FILES['adjunto']['type'];
	$tamano_archivo = $_FILES['adjunto']['size'];
	$error = $_FILES['adjunto']['error'];
  if ($error == UPLOAD_ERR_OK){
		if (!($tipo_archivo=='application/x-gzip')) {echo '<script>alert("Error!! el archivo seleccionado no es valido."); location.href="../principal.php?content=gestionarRespaldo";</script>';
		}else{
			if (move_uploaded_file($_FILES['adjunto']['tmp_name'],$root.$nombre_archivo)){					
				echo '<script>';
			  echo 'alert("El archivo ha sido cargado correctamente.\nSe procede con la restauracion");';
				echo '</script>';			
			}else{
			  echo '<script>';
				echo 'alert("Error!! ocurrio un problema al intentar cargar su documento.");';
				echo 'location.href="../principal.php?content=gestionarRespaldo";';
				echo '</script>';
				exit();
	  	}
		}
		chdir($root);
		shell_exec('tar xvpzf sigeprosi.tar.gz');
		$fachada = fachadaInterfaz::getInstance();
		$fachada->restaurar();
		echo '<script>';
		echo 'location.href="../principal.php?content=gestionarRespaldo";';
		echo '</script>';
	}else if (($error == UPLOAD_ERR_INI_SIZE) || ($error == UPLOAD_ERR_FORM_SIZE)) {
		echo '<script>';
		echo 'alert("Error!! el tama\u00f1o del archivo excede el m\u00e1ximo permitido.");';
		echo 'location.href="../principal.php?content=gestionarRespaldo";';
		echo '</script>';
	}else if ($error == UPLOAD_ERR_NO_FILE) {
		echo '<script>';
		echo 'alert("Error!! no selecciono ningun archivo.");';
		echo 'location.href="../principal.php?content=gestionarRespaldo";';
		echo '</script>';
	}else {
		echo '<script>';
		echo 'alert("Error!! al cargar el archivo seleccionado.");';
		echo 'location.href="../principal.php?content=gestionarRespaldo";';
		echo '</script>';
	}
?>
