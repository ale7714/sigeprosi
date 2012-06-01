<?php
  /*if ($_SERVER['SERVER_ADDR'] == "127.0.0.1")
    $root = $_SERVER['DOCUMENT_ROOT']."/sigeprosi";
  else
    $root = "/home/ps6116-02/public_html/sigeprosi";
  */
  $root = $_SERVER['DOCUMENT_ROOT']."/sigeprosi";
/*	$ar=fopen($root."/respaldo.sql","r") or die("Problemas en la creacion");  
	
	$last_line = shell_exec('mysqldump -h localhost -u root --add-drop-database --add-drop-table --databases sigeprosi');
	fputs($ar,$last_line);
  fclose($ar);
	chdir($root);
	shell_exec('tar czvf sigeprosi.tar.gz *');
	chmod('sigeprosi.tar.gz',0777);
	chdir($root.'/acciones');
	echo '<script>';
  echo 'location.href="../sigeprosi.tar.gz";';
  echo 'alert("La descarga del archivo de respaldo iniciara en un momento.\n Presione aceptar una vez descargado el mismo.");';
  echo 'location.href="../principal.php?content=gestionarRespaldo";';
  echo '</script>';
  */
	/*	$nombre_archivo = $_FILES['adjunto']['name'];
		echo $nombre_archivo;
		$tipo_archivo = $_FILES['adjunto']['type'];
		echo $tipo_archivo;
		$tamano_archivo = $_FILES['adjunto']['size'];
		echo $tamano_archivo;
		$ap = substr($tipo_archivo,12);
		$ext="";
		if ($tamano_archivo == 0 && $nombre_archivo==null) $ext = "vacia";

		if ($tipo_archivo==null) {
			if (strpos($nombre_archivo, ".tar.gz")) $ext="tar.gz";
		}else {
			if (strpos($tipo_archivo, "msword")) $ext="doc";
		}*/
//	if (($tamano_archivo < 2050000)){ strpos($tipo_archivo, "msword") || strpos($tipo_archivo, "pdf")
		/*	if (!($ext == "tar.gz" || $ext == "vacia")){
			  echo '<script>';
				echo 'alert("Error!! el archivo seleccionado no es valido.");';
				echo 'location.href="../principal.php?content=gestionarRespaldo";';
				echo '</script>';
				exit();
			}else{
		    if ($ext == "tar.gz"){
					if (move_uploaded_file($_FILES['adjunto']['tmp_name'],$root.$nombre_archivo)){						
						echo '<script>';
			      echo 'alert("El archivo ha sido cargado correctamente.");';
						echo 'location.href="../principal.php?content=gestionarRespaldo";';
						echo '</script>';			
			    }else{
			      echo '<script>';
						echo 'alert("Error!! ocurrio un problema al intentar cargar su documento.");';
						echo 'location.href="../principal.php?content=gestionarRespaldo";';
						echo '</script>';
						exit();
	  	  	}
				}else{
					echo '<script>';
					echo 'alert("Error!! no selecciono ningun documento.");';
					echo 'location.href="../principal.php?content=gestionarRespaldo";';
					echo '</script>';
				}
			}*/
	$filename = $root.'/respaldo.sql';
	$mysql_host = 'localhost';
	$mysql_username = 'root';
	$mysql_password = '';
	$mysql_database = '';
 
	// Connect to MySQL server
	mysql_connect($mysql_host, $mysql_username, $mysql_password) or die('Error connecting to MySQL server: ' . mysql_error());
	// Select database
	//Smysql_select_db($mysql_database) or die('Error selecting MySQL database: ' . mysql_error());
	$templine = '';
	// Read in entire file
	$lines = file($filename);
	// Loop through each line
	foreach ($lines as $line){
    if (substr($line, 0, 2) == '--' || $line == '')
        continue;
     // Add this line to the current segment
    $templine .= $line;
    // If it has a semicolon at the end, it's the end of the query
    if (substr(trim($line), -1, 1) == ';'){
        // Perform the query
        mysql_query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
        // Reset temp variable to empty
        $templine = '';
    }
}
	chdir('../sigeprosi');
	shell_exec('tar xzvf sigeprosi.tar.gz');
	echo '<script>';
	echo 'location.href="../principal.php?content=gestionarRespaldo";';
	echo '</script>';
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
