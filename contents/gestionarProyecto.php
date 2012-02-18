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
  $("#proyectosGrid").jqGrid({
    url:'acciones/cargarProyectos.php',
    datatype: 'xml',
    mtype: 'GET',
    colNames:['Nombre','Nro Solicitud', 'Estado', 'Etapa'],
    colModel :[ 
      {name:'nombre', index:'nombre', width:200}, 
      {name:'numeroSolicitud', index:'numeroSolicitud', width:150}, 
      {name:'estado', index:'estado', width:100, align:'right'}, 
      {name:'etapaNombre', index:'etapaNombre', width:150, align:'right'},
    ],
    pager: '#proyectosPager',
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
        window.location = "?content=consultaProyecto&nombre="+val['nombre'];
    },
    caption: 'Proyectos',
  }).navGrid('#pager1',{
     edit: false,
     add: false,
     del: false
 }); 
}); 
</script>     
<div id="main_column">
   <div class="section_w701"><font size="6" face="arial"><b>Gestionar Proyectos:</b></font>  </div>  

    <div class="section_w702">
        
        <table align="center"><tr><td>
			<table id="proyectosGrid"><tr><td/></tr></table> 
			<div id="proyectosPager"></div> <p></p></td></tr>
		</table>
		<center><b> 
        <span class="em_text"><font size=2 >&iquest;Qu&eacute; desea realizar sobre proyectos?</font></span>
        </b></center>
		<div align="center"><font size=2 >
                <input type="radio" name="group1" value="consultoPlanificacion" checked <?php //if ($status == 0) echo "checked";?>> Consultar
                <input type="radio" name="group1" value="editoPlanificacion" <?php //if ($status == 1) echo "checked";?>> Editar
				</font>
        </div>
    </div> 
<?php 
if (((isset($_SESSION['profesor'])) && ($_SESSION['profesor']))){?>
	<div class="section_w700">
		<center>
		<IMG SRC="images/ICO/Symbol-Add.ico" onclick='location.href="?content=registroProyecto"' width="50" height="50" type="button" onclick="" title="Crear Nuevo Proyecto" onMouseOver="javascript:this.width=60;this.height=60"  onMouseOut="javascript:this.width=50;this.height=50"> 
		</center>
    </div>  
<?php } ?>
</div> <!-- end of main column -->
	
<!-- end of side column 1 -->

<div class="side_column_w200">

    <!-- barra lateral -->

</div> <!-- end of right side column -->

<div class="cleaner"></div>
