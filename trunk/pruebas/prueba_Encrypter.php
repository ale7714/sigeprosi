<?php
    include_once $_SERVER['DOCUMENT_ROOT']."/sigeprosi/"."/class/class.Encrypter.php";
    include_once $_SERVER['DOCUMENT_ROOT']."/sigeprosi/"."/snippets/redirect.php";
	$enc = new Encrypter("sho sho", 1);
    echo $enc->toMD5();
?>