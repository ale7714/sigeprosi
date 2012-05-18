<?php 
if (!isset($_SESSION['profesor']) || ((isset($_SESSION['profesor'])) && !($_SESSION['profesor']))){
	include "contents/areaRestringida.php";
	echo '<script>';
	echo 'alert("No tiene permisos para acceder a esta \u00e1rea del sistema.");';
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
<script src="jscripts/js/i18n/grid.locale-en.js" type="text/javascript"></script>
<script src="jscripts/js/jquery.jqGrid.min.js" type="text/javascript"></script>

<script type="text/javascript">
$(function(){ 
  $("#equiposGrid").jqGrid({
    url:'acciones/cargarEquipos.php',
    datatype: 'xml',
    mtype: 'GET',
    colNames:['Nombre', 'Estado', 'Asignado'],
    colModel :[ 
      {name:'nombre', index:'nombre', width:200}, 
      {name:'estado', index:'estado', width:100, align:'right'}, 
      {name:'asignado', index:'asignado', width:100, align:'right'}, 
    ],
    pager: '#equiposPager',
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
		if (val['asignado']=='No'){	
			jQuery(this).setCell(id,'asignado','Si',false,false,false);
			addElementInput('equipos','listaEquipos',val['nombre'],val['nombre']);
		}else{
			jQuery(this).setCell(id,'asignado','No',false,false,false);
		}
	},
    caption: 'Equipos',
  }).navGrid('#pager1',{
     edit: false,
     add: false,
     del: false
 }); 
}); 
</script>   
<div id="main_column">
   <div class="section_w701"><font size="6" face="arial"><b>Registro de Evaluaci&oacute;n:</b></font>  </div>
	<form name="formacrearEvaluacion" action="acciones/registrarEvaluacion.php" method="post">
		<div class="section_w702">
        <table border="0">
            <tr>
                <td><LABEL for="passact"><b>Nombre:</b></LABEL> </td>
                <td><input title="nombreEvaluacion" type="text" id="nombreEvaluacion" name="nombreEvaluacion" /></td>
            </tr>
            <tr>
                <td><LABEL for="passnuv"><b>Nota:</b></LABEL> </td>
                <td><input title="notaEvaluacion" type="text" id="notaEvaluacion" name="notaEvaluacion" /></td>
            </tr>
			<tr>
                <td><LABEL for="passnuv"><b>Es Presentaci&oacute;n:</b></LABEL> </td>
                <td><input title="Presentaci&oacute;n" type="checkbox" id="presentacion" name="presentacion" /></td>
            </tr>
        </table>
		</div>	
	<div class="section_w701"><font size="4" face="arial"><b>Agregar Equipo:</b></font>  </div>
    <div class="section_w702">
        
        <table align="center"><tr><td>
			<table id="equiposGrid"><tr><td/></tr></table> 
			<div id="equiposPager"></div> <p></p></td></tr>
		</table>
    </div> 
		<table align="center" id="listaEquipos" name="listaEquipos"></table>
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
					<input type="hidden" name="submitRegistration" value="true"/>
					<input type="image" width="50" height="50" id="enviar" name="enviar" src="images/ICO/guardar.png" alt="Guardar Cambios" class="submitbutton" title="Guardar Cambios"/>
                                       
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
