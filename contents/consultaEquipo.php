<?php 
if (!isset($_SESSION['profesor']) || ((isset($_SESSION['profesor'])) && !($_SESSION['profesor']))){
	include "contents/areaRestringida.php";
	echo '<script>';
	echo 'alert("No tiene permisos para acceder a esta area del sistema.");';
	//echo 'location.href="principal.php"';
	echo '</script>';
} else {
    require_once "class/class.fachadainterfaz.php";
    $nombre = $_GET['nombre'];
    $desarrolla = new desarrolla($nombre,null,null);
    $desarrolla->autocompletar();
?>
<link rel="stylesheet" type="text/css" media="screen" href="estilos/custom-theme/jquery-ui-1.8.17.custom.css" />
<link rel="stylesheet" type="text/css" media="screen" href="estilos/ui.jqgrid.css" />

<style type="text/css">
html, body {
    margin: 0;
    padding: 0;
    font-size: 75%;
}
</style>

<script src="jscripts/js/jquery-1.5.2.min.js" type="text/javascript"></script>
<script src="jscripts/js/i18n/grid.locale-en.js" type="text/javascript"></script>
<script src="jscripts/js/jquery.jqGrid.min.js" type="text/javascript"></script>

<script type="text/javascript">
$(function(){ 
  $("#miembrosGrid").jqGrid({
    url:'acciones/cargarMiembros.php?equipo=<?php echo $nombre?>',
    datatype: 'xml',
    mtype: 'GET',
    colNames:['UsbID','Nombre', 'Apellido'],
    colModel :[ 
      {name:'correoUSB', index:'correoUSB', width:150}, 
      {name:'nombre', index:'nombre', width:120}, 
      {name:'apellido', index:'apellido', width:120, align:'right'}, 
    ],
    pager: '#miembrosPager',
    toolbar:[true,"top"],
    height: 'auto',
    rowNum:20,
    rowList:[20,40,60],
    sortname: 'invid',
    sortorder: 'desc',
    viewrecords: true,
    gridview: true,
    loadonce: true,
    caption: 'Miembros',
  }).navGrid('#pager1',{
     edit: false,
     add: false,
     del: false
 }); 
}); 
</script>

<div id="main_column"><? //if (!isset ($_POST['acepto'])) header('Location:principal.php?content=previoSolicitud')?>
	
	<div class="section_w701">
        <font size="6" face="arial"><b>Consultar Equipo: </b></font> 
    </div>       
<!--    <div class="margin_bottom_20"></div> -->
    
    <form name="formaEquipo" onSubmit="return validarEquipo();" method="post" action="acciones/registrarEquipo.php">
    <div class="section_w702">
		<table border="0">
			<tr> <td><font size="4" face="arial"><b>Datos b&aacute;sicos: </b></font> </td></tr>
		</table>
        <table border="0">
            <tr>
                <td align="right" width=35.5%>
                    <LABEL for="project_name"><b>Nombre del Equipo:</b></LABEL> 
                </td>
                <td width=64.5%>
                    <LABEL for="project_name"><b><?php echo $nombre?></b></LABEL> 
                </td>
            </tr>
			
			<tr>
				<td align="right"><b>Proyecto:</b>
                </td>
                <td align="left">
                    <?php
                        echo $desarrolla->get('nombreProyecto');
                    ?>
                </td>
            </tr>

        </table>
	</div> 
	<div class="section_w701">
        <font size="5" face="arial"><b>Miembros: </b></font> 
    </div> 
	<div class="section_w702">
        <table align="center">
			<tr><td><table id="miembrosGrid"><tr><td/></tr></table><div id="miembrosPager"></div> <p></p></td>
			</tr>
		</table>
		
	</div>
		
    </form>
	
	
    <div class="margin_bottom_20"></div>
    <div class="cleaner"></div>
</div> <!-- end of main column -->

<!-- end of side column 1 -->

<div class="side_column_w200">
 <?php
    if (isset($_SESSION['admin']))
        include 'sidebars/barraEnSesion.php';
    else
        include 'sidebars/barraInicioSesion.php';
    ?>
    <!-- barra lateral -->

</div> <!-- end of right side column -->

<div class="cleaner"></div>
<?php  } ?>