<?php
    require_once "../aspectos/Seguridad.php";
    $seguridad = Seguridad::getInstance();
    $seguridad->escapeSQL($_POST);
    include_once "../class/class.fachadainterfaz.php";
	$fachada = fachadaInterfaz::getInstance();
	$cat = $_POST['catalogo'];
	if($fachada->agregarElemento($_POST["catalogo"],$_POST["nombre"])==0){
	  echo '<script>';
	  echo 'location.href="../principal.php?content=gestionarCatalogo";';
		echo 'alert("El elemento fue agregado exitosamente");';
		echo '</script>';
	  //header("Location: ../principal.php?content=listarElementos&nombre=".$_POST["catalogo"]."");
	}else{
		echo '<script>';
		echo 'alert("Error al intentar agregar el elemento");';
	  echo 'location.href="../principal.php?content=gestionarCatalogo";';
	  echo '</script>';
		//header("Location: ../principal.php?content=listarElementos&nombre=".$_POST["catalogo"]."&error=mp");
	}


?>
