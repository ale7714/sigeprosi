<?php
if ($_SERVER["SERVER_ADDR"]=="159.90.168.83" || $_SERVER["SERVER_ADDR"]!="127.0.0.1" )
  $root = "/home/ps6116-02/public_html/Sigeprosi/";
else
  $root = $_SERVER['DOCUMENT_ROOT']."/sigeprosi/";
include_once $root."/class/class.Usuario.php";
include_once $root."/snippets/generarSal.php";
include_once $root."/class/class.Encrypter.php";
if (isset($_POST["user"])) {
	$user = $_POST["user"];
	if (strpos($user, '@') === false) $user = $user.'@usb.ve';
	echo 'Usuario: '.$user;
    $enc = new Encrypter($_POST["pass"], generarSal($user));
    $codigo = $enc->toMD5();
	$u = new Usuario(null,null,$user,$codigo,null,null,null,null);
    if ($u->autocompletar() != 0)	header("Location: ../principal.php?content=inicio&error=noRegistrado");
	else if ($u->get('password') != $codigo)	header("Location: ../principal.php?content=inicio&error=errorPass");
	else if ($u->get('activo')!=1) header("Location: ../principal.php?content=inicio&error=noActivo");
	else {
		session_start();
		$_SESSION["correoUSB"]=$u->get("correoUSB");
		$_SESSION["nombre"] = $u->get("nombre");
		$_SESSION["apellido"] = $u->get("apellido");
		$_SESSION["admin"] = (($u->get("rol")) == 0) || (($u->get("rol")) == 1);
		$_SESSION["profesor"] = (($u->get("rol")) == 2) || (($u->get("rol")) == 1);
		$_SESSION["estudiante"] = (($u->get("rol")) == 3);
		$_SESSION["cliente"] = (($u->get("rol")) == 4);
		$_SESSION['autenticado'] = true;
		header("Location: ../principal.php?content=inicio");
	}
}
?>
