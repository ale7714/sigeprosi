<?php
if ($_SERVER['SERVER_ADDR'] == "127.0.0.1")
		$root = $_SERVER['DOCUMENT_ROOT']."/sigeprosi/";
	else
		$root = "/home/ps6116-02/public_html/sigeprosi/";
include_once $root."/class/class.Usuario.php";
include_once $root."/snippets/generarSal.php";
include_once $root."/class/class.Encrypter.php";
session_start();
if (isset($_SESSION["correoUSB"])) {
    $enc = new Encrypter($_POST["pass"], generarSal($_SESSION["correoUSB"]));
    $codigo = $enc->toMD5();
	$u = new Usuario(null,null,$_SESSION["correoUSB"],$codigo,null,null,null,null);
    if ($u->autocompletar() != 0 || $u->get('password') != $codigo){
		session_destroy();
		echo '<script>';
		echo 'alert("La clave introducida es invalida. \n Por razones de seguridad su sesion  sera cerrada.");';
		echo 'location.href="../principal.php"';
		echo '</script>';
	}    
    else {
        $enc = new Encrypter($_POST["passnew"], generarSal($_SESSION["correoUSB"]));
        $u->set("password",$enc->toMD5());
        $u->actualizar($_SESSION["correoUSB"]);
        echo '<script>';
		echo 'alert("Su clave ha sido cambiada satisfactoriamente.");';
		echo 'location.href="../principal.php"';
		echo '</script>';
    }
}
?>
