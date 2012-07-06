<?php 
	include_once "class/class.Evaluacion.php";
    $id = $_GET['id'];  
    $eval = new evaluacion(null,null,null,null);
    $eval->set('id',$id);
    $eval->autocompletar();
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
    font-size: 86.6%;
}
</style>

<script src="jscripts/js/jquery-1.5.2.min.js" type="text/javascript"></script>
<script src="jscripts/js/i18n/grid.locale-es.js" type="text/javascript"></script>
<script src="jscripts/js/jquery.jqGrid.min.js" type="text/javascript"></script>

<script type="text/javascript">
var url;
url =
$(function() {
  $("#etapasGrid").jqGrid({
    url:'acciones/cargarEntregasGE.php?id=<?php echo $eval->get('id'); ?>',
    datatype: 'xml',
    mtype: 'GET',
    colNames:['Nombre'],
    colModel :[  
      {name:'nombre', index:'nombre', width:250, align:'right'}, 
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
		window.location = "?content=editaEntrega"+"&id="+id;
	},
    caption: 'Entregas',
  }).navGrid('#pager1',{
     edit: false,
     add: false,
     del: false
 }); 
}); 
</script>

<? //if (!isset ($_POST['acepto'])) header('Location:principal.php?content=previoSolicitud')?>
<div id="main_column">
   <div class="section_w701"><font size="6" face="arial"><b>Evaluación: <?php echo $eval->get('nombre'); ?>
   </b></font>  </div>  

    <div class="section_w702">
        
        <table align="center" border="0"><tr><td>
            <table id="etapasGrid"><tr><td/></tr></table> 
            <div id="etapasPager"></div> <p></p></td></tr>
	</table>
<!--		<center><b> 
        <span class="em_text"><font size=2 >&iquest;Qu&eacute; desea realizar sobre planificaciones?</font></span>
        </b></center>
		<div align="center"><font size=2 >
                <input type="radio" name="group1" value="consultoPlanificacion" checked <?php //if ($status == 0) echo "checked";?>> Consultar
                <input type="radio" name="group1" value="editoPlanificacion" <?php //if ($status == 1) echo "checked";?>> Editar
                <input type="radio" name="group1" value="registroPlanificacionConPlantilla" <?php //if ($status == 2) echo "checked";?>> Usar como plantilla
				</font>
        </div>    -->
    </div>
		
<!--	<div class="section_w700">
		<center>
		<IMG SRC="images/ICO/add.png" onclick='location.href="?content=registroPlanificacion"' width="50" height="50" type="button" onclick="" title="Crear Nueva Planificacion" onMouseOver="javascript:this.width=60;this.height=60"  onMouseOut="javascript:this.width=50;this.height=50" class="pointer"> 
		</center>
        </div>    -->
 
        <center>
        <!--form action="" method="post"-->
			<table border=0>
				<tr>
					<td width="15%">
					</td>
					<td>
						<!--input type="button" value="Crear Entrega" onclick='<?php //echo 'location.href="?content=registroEntrega&id='.$id.'"'; ?>' /-->
						<input type="image" width="50" height="50" id="crearEntrega" name="crearEntrega" src="images/ICO/add.png" onclick='<?php echo 'location.href="?content=registroEntrega&id='.$id.'"'; ?>' alt="Crear Entrega" title="Crear Entrega"  />
					</td>
					<td>
						<input type="image" width="50" height="50" id="generar" name="generar" src="images/ICO/reporte_Task.png" onclick='<?php echo 'location.href="acciones/generarReporte.php?&id='.$id.'"'; ?>' alt="Generar Reporte" title="Generar Reporte"  />
					</td>
					<td width="20%">
					</td>
					<td>
					
						<!--input type="button" value="Revisar Reporte"/-->
						<!--input type="button" value="Generar Reporte" onclick='<?php //echo 'location.href="acciones/generarReporte.php?&id='.$id.'"'; ?>' /-->
					
						<!--input type="button" name="cancelar" value="Cancelar" class ="submitbutton" onclick='location.href="?content=gestionarEvaluacion"' /-->
						<input type="image" width="50" height="50" id="cancelar" name="cancelar" src="images/ICO/cancel.png" onclick='location.href="?content=gestionarEvaluacion"' alt="Cancelar" title="Cancelar" />
					</td>
				</tr>
			</table>
        <!--/form-->
        </center>
  
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
