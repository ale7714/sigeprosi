<?php 
if (!isset($_SESSION['profesor']) || ((isset($_SESSION['profesor'])) && !($_SESSION['profesor']))){
	include "contents/areaRestringida.php";
	echo '<script>';
	echo 'alert("No tiene permisos para acceder a esta \u00e1rea del sistema.");';
	//echo 'location.href="principal.php"';
	echo '</script>';
}else{
	require_once "/class/class.Evaluacion.php";
	$id = $_GET['id'];  
    $eval = new evaluacion(null,null,null,null);
    $eval->set('id',$id);
    $eval->autocompletar();
?>
<link rel="stylesheet" type="text/css" media="screen" href="estilos/custom-theme/jquery-ui-1.8.17.custom.css" />
<link rel="stylesheet" type="text/css" media="screen" href="estilos/ui.jqgrid.css" />

<style type="text/css">
html, body {
    margin: 0;
    padding: 0;
    font-size: 86.6%;
}
</style>

<script src="jscripts/js/jquery-1.5.2.min.js" type="text/javascript"></script>
<script src="jscripts/js/i18n/grid.locale-en.js" type="text/javascript"></script>
<script src="jscripts/js/jquery.jqGrid.min.js" type="text/javascript"></script>

<div id="main_column">
   <div class="section_w701"><font size="6" face="arial"><b>Editar Evaluaci&oacute;n: <?php echo $eval->get('nombre'); ?></b></font>  </div>
	<form name="formacrearEvaluacion" onSubmit="" action="acciones/editarEvaluacion.php" method="post">
		<div class="section_w702">
        <table border="0">
            <tr>
                <td><LABEL for="passact"><b>Nombre:</b></LABEL> </td>
                <td><input title="nombreEvaluacion" type="text" id="Evaluacion" name="nombreEvaluacion" value="<?php echo $eval->get('nombre'); ?>" /></td>
            </tr>
            <tr>
                <td><LABEL for="passnuv"><b>Nota:</b></LABEL> </td>
                <td><input title="notaEvaluacion" type="text" id="notaEvaluacion" name="notaEvaluacion" value="<?php echo $eval->get('notaMax'); ?>" disabled /></td>
            </tr>
			<tr>
                <td><LABEL for="passnuv"><b>Es Presentaci&oacute;n:</b></LABEL> </td>
                <td><input title="Presentaci&oacute;n" type="checkbox" id="presentacion" name="presentacion" <?php if($eval->get('esPresentacion') == 1) echo "checked"; ?> disabled /></td>
            </tr>
        </table>
		</div>	
  <!-- Descomentar para colocar las opciones al jqgrid, agregar el if con los permisos y las llaves -->   
	<!--  
	<div class="section_w700">
		<center>
		<IMG SRC="images/ICO/add.png" class="pointer" onclick='location.href="?content=registroEquipo"' width="50" height="50" type="button" onclick="" title="Crear Nuevo Equipo" onMouseOver="javascript:this.width=60;this.height=60"  onMouseOut="javascript:this.width=50;this.height=50"> 
		</center>
    </div>  
-->
    <div class="section_w701">
		<table border="0"  width="62%"  id="tableOperaciones">
			<tr >
                <td>
					<input type="hidden" name="id" value="<?php echo $eval->get('nombre'); ?>"/>
					<input type="hidden" name="submitRegistration" value="true"/>
					<input type="image" width="50" height="50" id="guardar" name="guardar" src="images/ICO/guardar.png" alt="Guardar Cambios" class="submitbutton" title="Guardar Cambios"/>
				</td>
 
            </tr>
		</table>
	</div>

</form>
</div> <!-- end of main column -->
	
<!-- end of side column 1 -->

<div class="side_column_w200">
    <?php
    if (isset($_SESSION['admin'])){
        include 'sidebars/barraEnSesion.php';
        include 'sidebars/barraEnlaces.php';
    }else{
        include 'sidebars/barraInicioSesion.php';
        include 'sidebars/barraEnlaces.php';
    }
    ?>
    <!-- barra lateral -->

</div> <!-- end of right side column -->

<div class="cleaner"></div>
<?php  } ?>
