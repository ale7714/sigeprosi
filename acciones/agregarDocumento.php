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
    include_once $root."/class/class.Documento.php";
    require_once "../aspectos/Seguridad.php";
	  $seguridad = Seguridad::getInstance();
	  $seguridad->escapeSQL($_POST);
		$nombre_archivo = $_FILES['adjunto']['name'];
		$tipo_archivo = $_FILES['adjunto']['type'];
		$tamano_archivo = $_FILES['adjunto']['size'];
		$ap = substr($tipo_archivo,12);
		$ext="";
		$ruta = $root.'/documentos/'.$_POST["Equipo"].'/';
		if ($tamano_archivo == 0 && $nombre_archivo==null) $ext = "vacia";

		if ($tipo_archivo==null) {
			if (strpos($nombre_archivo, ".doc")) $ext="doc";
			if (strpos($nombre_archivo, ".pdf")) $ext="pdf";
			if (strpos($nombre_archivo, ".PDF")) $ext="pdf";
		}else {
			if (strpos($tipo_archivo, "msword")) $ext="doc";
			if (strpos($tipo_archivo, "pdf")) $ext = "pdf";
		}
//	if (($tamano_archivo < 2050000)){ strpos($tipo_archivo, "msword") || strpos($tipo_archivo, "pdf")
			if (!($ext == "doc" || $ext == "pdf" || $ext == "vacia")){
			  echo '<script>';
				echo 'alert("Error!! el tipo de archivo seleccionado no est\u00e1 permitido.");';
				echo 'location.href="../principal.php?content=gestionarDocumentos";';
				echo '</script>';
				exit();
			}else{
				
		    if ($ext == "doc" || $ext == "pdf"){
					//falta: si archivo existe preguntar si quiere reemplazar
					if (move_uploaded_file($_FILES['adjunto']['tmp_name'],$ruta.$nombre_archivo)){
						$registro = new documento($_POST["Equipo"],$nombre_archivo,$ruta);
						if (!($registro->insertar()==0)){
							echo '<script>';
							echo 'alert("Ha ocurrido un error durante el registro de su documento en la base de datos.\n\
							Por favor comuniquese con el administrador del sistema.");';
							echo 'location.href="../principal.php?content=gestionarDocumentos";';
							echo '</script>';
						}    
						echo '<script>';
			      echo 'alert("El archivo ha sido cargado correctamente.");';
						echo 'location.href="../principal.php?content=gestionarDocumentos";';
						echo '</script>';			
			    }else{
			      echo '<script>';
						echo 'alert("Error!! ocurrio un problema al intentar cargar su documento.");';
						echo 'location.href="../principal.php?content=gestionarDocumentos";';
						echo '</script>';
						exit();
	  	  	}
				}else{
					echo '<script>';
					echo 'alert("Error!! no selecciono ningun documento.");';
					echo 'location.href="../principal.php?content=gestionarDocumentos";';
					echo '</script>';
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
?>
