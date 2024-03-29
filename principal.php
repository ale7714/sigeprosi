<?PHP
    require_once "aspectos/Seguridad.php";
    $seguridad = Seguridad::getInstance();
    $seguridad->escapeSQL($_GET);
?>
<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- Verificamos si esta indicado el contenido de la página -->
<?php if (!isset ($_GET['content'])) $_GET['content']='inicio';?>
<?php $page=$_GET['content'];?>

<!-- ponemos menu a los contenidos que necesitan -->
<?php
    if ((isset($_SESSION['admin']) && ($_SESSION['admin'])) && (isset($_SESSION['profesor']) && ($_SESSION['profesor']))) 
        $menu='menu/menuAdminProfesores.php';
	else if ((isset($_SESSION['estudiante']) && ($_SESSION['estudiante'])) && (isset($_SESSION['coordinador']) && ($_SESSION['coordinador']))) 
        $menu='menu/menuEstudianteCoord.php';
	else if (isset($_SESSION['admin']) && ($_SESSION['admin'])) $menu='menu/menuAdmin.php';
        else if (isset($_SESSION['profesor']) && ($_SESSION['profesor']))	$menu='menu/menuProfesor.php';
	else if (isset($_SESSION['estudiante']) && ($_SESSION['estudiante']))	$menu='menu/menuEstudiante.php';
	else if (isset($_SESSION['cliente']) && ($_SESSION['cliente']))	$menu='menu/menuCliente.php';
	else $menu='menu/menu.php';
?>

<?php if (!isset ($_GET['error'])){
    $_GET['error'] = null;
}
?>

<!-- Incluimos cabecera -->
<?php include 'banners/header.php';?>
<body <?php 
		if($_GET['content']=="registroPlanificacion")	 echo 'onLoad="initialize();"'; 
		if($_GET['content']=="agregarIteracion"){	 
			//echo "url('acciones/cargarCasoDeUsoEquipo?Equipo="+$_SESSION['Equipo']+"')";
			echo 'onLoad="url(\''.$_SESSION['Equipo'].'\');"';
		}
		if($_GET['content']=="editaIteracion"){
			include_once "class/class.fachadainterfaz.php";
			$fachada = fachadaInterfaz::getInstance();
			$matriz=$fachada->consultarIteracionNombre($_GET['nombre']);
			if ($matriz['estado']!= 1) echo 'onLoad="initializeEdicionIteracion('.sizeof($matriz['actividades']).',\''.$_SESSION['Equipo'].'\');"';
		}
		?> >
    
<!-- Incluimos pancarta superior y menu -->
<?php include 'banners/banner.php';?>
<?php if( isset($menu) ) {//echo $menu; 
include $menu;}?>

    <!-- begin content-->
    <div id="templatemo_content">

        <?php include "contents/".$_GET['content'].".php";?>
        
    </div> <!-- end of content -->

<?php include 'banners/footer.php'?>
</body>
</html>
