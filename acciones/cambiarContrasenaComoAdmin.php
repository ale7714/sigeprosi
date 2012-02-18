<?php
$root = $_SERVER['DOCUMENT_ROOT']."/sigeprosi/";
include_once $root."/class/class.Usuario.php";
include_once $root."/snippets/generarSal.php";
include_once $root."/class/class.Encrypter.php";
session_start();
if (isset($_POST["email"])) {
    $enc = new Encrypter($_POST["pass"], generarSal($_POST["email"]));
    $codigo = $enc->toMD5();
	$u = new Usuario(null,null,$_POST["email"],$codigo,null,null,null,null);
    $u->autocompletar();
	$enc = new Encrypter($_POST["passnew"], generarSal($_POST["email"]));
	$u->set("password",$enc->toMD5());
	$u->actualizar($_POST["email"]);
	echo '<script>';
	echo 'alert("Su clave ha sido cambiada satisfactoriamente.");';
	echo 'location.href="../principal.php"';
	echo '</script>';
}
?>
