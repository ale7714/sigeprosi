<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
		include_once "../class/class.fachadainterfaz.php";
		if (isset($_POST["user"]) && isset($_POST["pass"])){
			$fachada = fachadaInterfaz::getInstance();
			$fachada->iniciarSesion($_POST["user"],$_POST["pass"]);
			if ($fachada->iniciarSesion($_POST["user"],$_POST["pass"]) == 0)	session_start();
			else echo 'No se inicio Sesion';
		}
?>
<?php session_start();?>
    
<!-- Verificamos que el usuario haya iniciado sesion -->
<? include 'bloqueDeSeguridad.php';?>
    
<!-- Verificamos si esta indicado el contenido de la página -->
<? if (!isset ($_GET['content'])) $_GET['content']='inicio';?>
<? $page=$_GET['content'];?>

<!-- Verificamos el privilegio del usuario -->
<? if ($_SESSION["privilegio"] = "1") $menu='../menu/menuAdmin.php'?>
<!--Completar para los demás menus-->

<? if (!isset ($_GET['error'])){
    $_GET['error'] = null;
}
?>

<!-- Incluimos cabecera -->
<? include '../banners/header.php';?>
<body>

<!-- Incluimos pancarta superior y menu -->
<? include '../banners/banner.php';?>
<? if( isset($menu) ) include $menu;?>

    <!-- begin content-->
    <div id="templatemo_content">

        <? include 'content/'.$_GET['content'].'.php';?>
        
    </div> <!-- end of content -->

<? include '../banners/footer.php';?>

</body>
</html>