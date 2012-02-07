<?php
$root = $_SERVER['DOCUMENT_ROOT']."/sigeprosi/";
include_once $root."/class/class.Usuario.php";
include_once $root."/snippets/generarSal.php";
include_once $root."/class/class.Encrypter.php";
if (isset($_POST["email"])){
	if ($_POST["email"]=="ejemplo@usb.ve" || $_POST["email"]=="") 	{
			header("Location: ../principal.php?content=registroUsuario2&error=camposVacios");
		}else{
			$email = strtolower($_POST["email"]);
			//$resultTelefono= sscanf($_POST["tlf"], "%d-%d",$codigo,$numero);
			$patronCorreo = "/\w(@usb\.ve){1}$/"; //Patron para validar correo.
			if(!preg_match($patronCorreo, $email)){
				header("Location: ../principal.php?content=registroUsuario2&error=formatoCorreo");
			} else {
				$numero = rand().rand();
                $codigo = dechex($numero);
                $enc = new Encrypter($codigo, generarSal($_POST["email"]));
                $registro = new Usuario(null,null,$_POST["email"],$enc->toMD5(),null, 1);
                if ($registro->insertar() == 0)
                    header("Location: ../principal.php?content=registroUsuarioExitoso&exito=1&email=".$_POST["email"]."&cod=".$codigo);
                else
                    header("Location: ../principal.php?content=registroUsuarioExitoso&exito=0&email=".$_POST["email"]);
			}
		}
}
?>