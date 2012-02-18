<?php 
if (!isset($_SESSION['profesor']) || ((isset($_SESSION['profesor'])) && !($_SESSION['profesor']))){
	include "contents/areaRestringida.php";
	echo '<script>';
	echo 'alert("No tiene permisos para acceder a esta area del sistema.");';
	//echo 'location.href="principal.php"';
	echo '</script>';
}else{
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
var url;
url =
$(function() {
  $("#etapasGrid").jqGrid({
    url:'acciones/cargarEtapas.php',
    datatype: 'xml',
    mtype: 'GET',
    colNames:['Id','Nombre', 'Numero'],
    colModel :[ 
      {name:'id', index:'id', hidden:true, width:200}, 
      {name:'nombre', index:'nombre', width:250}, 
      {name:'numero', index:'numero', width:50, align:'right'}, 
    ],
    pager: '#etapasPager',
    toolbar:[true,"top"],
    height: 'auto',
    rowNum:20,
    rowList:[20,40,60],
    sortname: 'invid',
    sortorder: 'desc',
    viewrecords: true,
    gridview: true,
    ondblClickRow: function(id){
        var val = jQuery(this).getRowData(id);
        var botonoes = document.getElementsByName("group1");
		var i;
		for(i=0;i<botonoes.length;i++) if (botonoes[i].checked) window.location = "?content="+botonoes[i].value+"&nombre="+val['nombre']+"&numero="+val['numero'];//"?content=consultaPlanificacion&id="+val['id'];
	},
    caption: 'Planificaciones',
  }).navGrid('#pager1',{
     edit: false,
     add: false,
     del: false
 }); 
}); 
</script>

<? //if (!isset ($_POST['acepto'])) header('Location:principal.php?content=previoSolicitud')?>
<div id="main_column">
   <div class="section_w701"><font size="6" face="arial"><b>Gestionar Planificacion de Asignatura:</b></font>  </div>  

    <div class="section_w702">
        
        <table align="center"><tr><td>
			<table id="etapasGrid"><tr><td/></tr></table> 
			<div id="etapasPager"></div> <p></p></td></tr>
		</table>
		<center><b> 
        <span class="em_text"><font size=2 >&iquest;Qu&eacute; desea realizar sobre planificaciones?</font></span>
        </b></center>
		<div align="center"><font size=2 >
                <input type="radio" name="group1" value="consultoPlanificacion" checked <?php //if ($status == 0) echo "checked";?>> Consultar
                <input type="radio" name="group1" value="editoPlanificacion" <?php //if ($status == 1) echo "checked";?>> Editar
                <input type="radio" name="group1" value="registroPlanificacionConPlantilla" <?php //if ($status == 2) echo "checked";?>> Usar como plantilla
				</font>
        </div>    
    </div>
		
	<div class="section_w700">
		<center>
		<IMG SRC="images/ICO/Symbol-Add.ico" onclick='location.href="?content=registroPlanificacion"' width="50" height="50" type="button" onclick="" title="Crear Nueva Planificacion" onMouseOver="javascript:this.width=60;this.height=60"  onMouseOut="javascript:this.width=50;this.height=50"> 
		</center>
    </div>    
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
