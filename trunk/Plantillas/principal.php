<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php //error_reporting(0);
    session_start();
    if (isset ($_SESSION['autenticado'])) header ('Location:usuarios/');
?>
<!-- Verificamos si esta indicado el contenido de la página -->
<? if (!isset ($_GET['content'])) $_GET['content']='content';?>
<? $page=$_GET['content'];?>

<!-- ponemos menu a los contenidos que necesitan -->
<? if ($_GET['content']=='content' || $_GET['content']=='proyectos' || $_GET['content']=='solicitudes') $menu='menu/menus.php' ?>

<? if (!isset ($_GET['error'])){
    $_GET['error'] = null;
}
?>

<!-- Incluimos cabecera -->
<? include 'banners/header.php';?>
<body>
    
<!-- Incluimos pancarta superior y menu -->
<? include 'banners/banner.php';?>
<? if( isset($menu) ) include $menu;?>

    <!-- begin content-->
    <div id="templatemo_content">

        <? include 'contents/'.$_GET['content'].'.php';?>
        
    </div> <!-- end of content -->

<? include 'banners/footer.php'?>

</body>
</html>