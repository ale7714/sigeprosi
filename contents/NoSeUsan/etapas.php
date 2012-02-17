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
        window.location = "?content=editoPlanificacion&nombre="+val['nombre']+"&numero="+val['numero'];//"?content=consultaPlanificacion&id="+val['id'];
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

    <div class="section_w700">
		
        <h2>Gestionar planificaciones</h2>

        <p><span class="em_text"><b>En esta sección podra agregar, consultar o editar planificaciones del trimestre.</b></span></p>
        <h2> </h2>
        <p><b> 
        </b></p>
    </div>        
<!--    <div class="margin_bottom_20"></div> -->
		<b> 
        <span class="em_text"><font size=2 >¿Qué desea realizar sobre planificaciones?</font></span>

        </b>
		<br><br>
    <div class="section_w700">
        
        <table id="etapasGrid"><tr><td/></tr></table> 
        <div id="etapasPager"></div> <p></p>
        <div class="button_01"><a href="?content=registroPlanificacion">Agregar </a></div>
        <!--<br><br>
        <div class="button_01"><a href="?content=editarPlanificacion&numero=&nombre=">Editar </a></div>
        </div>-->

		<br>
        <h3> </h3>


    </div>  

	
    <div class="margin_bottom_20"></div>
    <div class="cleaner"></div>
</div> <!-- end of main column -->

<!-- end of side column 1 -->

<div class="side_column_w200">

    <!-- barra lateral -->

</div> <!-- end of right side column -->

<div class="cleaner"></div>

