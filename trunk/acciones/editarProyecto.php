<?php
   include_once "../class/class.fachadainterfaz.php";
	$fachada = fachadaInterfaz::getInstance();
	$telefonos = array();
	//var_dump($_POST["codigo"]);
	if(sizeof($_POST["nombre"])!=0 && $_POST["tlf"]!=null){
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
	   echo '</script>';
	   header("Location: ../principal.php?content=gestionarProyecto");
	}else{
		 echo '<script>';
		echo 'alert("Error en la actualizaci�n del proyecto");';
	   echo '</script>';
	}


?>