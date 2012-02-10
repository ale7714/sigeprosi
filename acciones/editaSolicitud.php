<?php 
include_once "../class/class.fachadainterfaz.php";
if (isset($_POST["department"]) && isset($_POST["tlf"])){
    $email = $_POST["email"];
	$tel = $_POST["tlf"];
    $area = $_POST["codigo"];
    if ( $tel[0]=="" || $_POST["personas"]=="" || $_POST["planteamiento"]=="" || $_POST["recursos"]==""
      	|| $_POST["tiempolibre"]=="" || $_POST["justificacion"]=="") 	{			
        header("Location: ../principal.php?content=editaSolicitud&nro=".$nro."&email=".$email."&error=camposVacios");
    }else{
	   if($_POST["department"] == ""){
            header("Location: ../principal.php?content=editaSolicitud&nro=".$nro."&email=".$email."&error=Unidad");
        } else{
			$i = 0;
			$j = sizeof($tel);
			while( $i < $j) {
			  if($tel[$i]!=""){
					if(strlen($tel[$i]) !=7){
					       header("Location: ../principal.php?content=editaSolicitud&nro=".$nro."&email=".$email."&error=formatoTlf");
			  }} else if($tel[$i]==""){
					       header("Location: ../principal.php?content=editaSolicitud&nro=".$nro."&email=".$email."&error=formatoTlf");			  
			  }
			  $i++;
			}
                $unidadUSB = $_POST["department"];
                $status = $_POST["group1"];
                echo $_POST["group1"];
				//echo "<script language=’JavaScript’>      alert(‘JavaScript dentro de PHP’);     </script>";
				$fachada = fachadaInterfaz::getInstance();
				if(($fachada->actualizarSolicitud($nro,$_POST["planteamiento"],$_POST["justificacion"],$email, $_POST["tiempolibre"], $_POST["recursos"],$_POST["personas"],$unidadUSB, $status,$tel,$area,$telefonos))==0)
				{
				  // header("Location: ../principal.php?content=solicitudExitosa&numero=".$numero."&mail=".$email);
				}
		}
	}
} 
?>