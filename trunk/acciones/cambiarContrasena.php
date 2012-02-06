<?php
include_once "../class/class.Usuario.php";
session_start();
if (isset($_SESSION["correoUSB"])){
	$u = new Usuario(null,null,$_SESSION["correoUSB"],$_POST["pass"],null,null);
    if ($u->autocompletar() != 0 || $u->get('password') != $_POST["pass"])
        echo "No encontrado";
    else {
        $u->set("password",$_POST["passnew"]);
        $u->actualizar($_SESSION["correoUSB"]);
        //header("Location: ../principal.php?content=cambiarContrasenaExito");
    }
}
else
    echo "bullshit";
?>