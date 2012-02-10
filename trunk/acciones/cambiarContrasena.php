<?php
$root = $_SERVER['DOCUMENT_ROOT']."/sigeprosi/";
include_once $root."/class/class.Usuario.php";
include_once $root."/snippets/generarSal.php";
include_once $root."/class/class.Encrypter.php";
session_start();
if (isset($_SESSION["correoUSB"])) {
    $enc = new Encrypter($_POST["pass"], generarSal($_SESSION["correoUSB"]));
    $codigo = $enc->toMD5();
	$u = new Usuario(null,null,$_SESSION["correoUSB"],$codigo,null,null);
    if ($u->autocompletar() != 0 || $u->get('password') != $codigo)
        echo "No encontrado";
    else {
        $enc = new Encrypter($_POST["passnew"], generarSal($_SESSION["correoUSB"]));
        $u->set("password",$enc->toMD5());
        $u->actualizar($_SESSION["correoUSB"]);
        header("Location: ../principal.php?content=cambiarContrasenaExito");
    }
}
else
    echo "bullshit";
?>
