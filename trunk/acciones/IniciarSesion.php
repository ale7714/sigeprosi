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
        header("Location: ../principal.php?content=usuarioNoRegistrado");
    else {
        session_start();
        $_SESSION["correoUSB"]=$u->get("correoUSB");
        $_SESSION["nombre"] = $u->get("nombre");
        $_SESSION["apellido"] = $u->get("apellido");
        $_SESSION["admin"] = (($u->get("rol")) == 0) || (($u->get("rol")) == 1);
		$_SESSION["profesor"] = (($u->get("rol")) == 2);
		$_SESSION["estudiante"] = (($u->get("rol")) == 3);
		$_SESSION["cliente"] = (($u->get("rol")) == 4);
        $_SESSION['autenticado'] = true;
        header("Location: ../principal.php?content=logueado");
    }
}
?>
