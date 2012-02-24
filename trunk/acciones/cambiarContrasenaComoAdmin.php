<?php
$root = $_SERVER['DOCUMENT_ROOT']."/sigeprosi/";
include_once $root."/class/class.Usuario.php";
include_once $root."/snippets/generarSal.php";
include_once $root."/class/class.Encrypter.php";
session_start();
if (isset($_POST["email"])) {
	$u = new Usuario(null,null,$_POST["email"],null,null,null,null,null);
    $u->autocompletar();
    $enc = new Encrypter($_POST["passnew"], generarSal($_POST["email"]));
    $codigo = $enc->toMD5();
	$u->set("password",$codigo);
	$u->actualizar($_POST["email"]);
	echo '<script>';
	echo 'alert("La clave ha sido cambiada satisfactoriamente.");';
	echo 'location.href="../principal.php"';
	echo '</script>';
}
?>
