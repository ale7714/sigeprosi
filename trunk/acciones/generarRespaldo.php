<?php
  /*if ($_SERVER['SERVER_ADDR'] == "127.0.0.1")
    $root = $_SERVER['DOCUMENT_ROOT']."/sigeprosi";
  else
    $root = "/home/ps6116-02/public_html/sigeprosi";
  */
  $root = $_SERVER['DOCUMENT_ROOT']."/sigeprosi";
	$ar=fopen("../respaldo.sql","w") or die("Problemas en la creacion");  
	$last_line = shell_exec('mysqldump -h localhost -u root --add-drop-database --add-drop-table --databases sigeprosi');
	chmod('../respaldo.sql',0777);
  fputs($ar,$last_line);
  fclose($ar);
	chdir($root);
	shell_exec('tar czvf sigeprosi.tar.gz *');
	chmod('./sigeprosi.tar.gz',0777);
	chdir($root.'/acciones');
	header("Location: ../sigeprosi.tar.gz");
  echo '<script type="text/javascript">';
  echo 'location.href="../sigeprosi.tar.gz";';
  echo 'alert("La descarga del archivo de respaldo iniciara en un momento.\n Presione aceptar una vez descargado el mismo.");';
  echo 'location.href="../principal.php?content=gestionarRespaldo";';
  echo '</script>';
?>
