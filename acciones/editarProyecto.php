<?php
    require_once "../aspectos/Seguridad.php";
    $seguridad = Seguridad::getInstance();
    $seguridad->escapeSQL($_POST);
    include_once "../class/class.fachadainterfaz.php";
	$fachada = fachadaInterfaz::getInstance();
	$telefonos = array();
	//var_dump($_POST["codigo"]);
	if(sizeof($_POST["nombre"])!=0 && isset($_POST["tlf"])){
		$cod=$_POST["codigo"];
		$num=$_POST["tlf"];
		$i=0;
		foreach ($cod as $codigo){
			$telefonos[$i]=$cod[$i]."".$num[$i];
			$i++;
		}
	}
	if($fachada->editarProyecto($_POST["nombreProy"],$_POST["etapa"],$_POST["etapa_v"],$_POST["estado"],$_POST['unidad'],$_POST["nombre"],$_POST["apellido"],$_POST["email"],$telefonos,$_POST["rol"],$_POST["profesores"])==0){
	  echo '<script>';
		echo 'alert("El proyecto fue editado exitosamente");';
	  echo 'location.href="../principal.php?content=gestionarProyecto"';
		echo '</script>';
	  //header("Location: ../principal.php?content=gestionarProyecto");
	}else{
		 echo '<script>';
		echo 'alert("Error en la actualizaci/u00f3n del proyecto");';
	   echo '</script>';
	}


?>
