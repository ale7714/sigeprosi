<?php
$root = $_SERVER['DOCUMENT_ROOT']."/sigeprosi/";
include_once $root."/class/class.Usuario.php";
include_once $root."/snippets/generarSal.php";
include_once $root."/class/class.Encrypter.php";
if (isset($_POST["user"])) {
    $enc = new Encrypter($_POST["pass"], generarSal($_POST["user"]));
    $codigo = $enc->toMD5();
	$u = new Usuario(null,null,$_POST["user"],$codigo,null,null,null,null);
    if ($u->autocompletar() != 0 || $u->get('password') != $codigo)
        echo "No encontrado ".$u->get('password')." ".$codigo;
    else {
        session_start();
        $_SESSION["correoUSB"]=$_POST["user"];
        $_SESSION["nombre"] = $u->get("nombre");
        $_SESSION["apellido"] = $u->get("apellido");
        $_SESSION["admin"] = true;
        $_SESSION['autenticado'] = true;
        header("Location: ../principal.php?content=logueado");
    }
}
?>