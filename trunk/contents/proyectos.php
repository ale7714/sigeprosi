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
    height: 300,
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
<? //if (!isset ($_POST['acepto'])) header('Location:principal.php?content=previoSolicitud')?>
<div id="main_column">

    <div class="section_w700">

        <h2>Gestionar Proyectos</h2>

        <p><span class="em_text"><b>En esta sección podra agregar, consultar o editar los proyectos.</b></span></p>
        <h2> </h2>
        <p><b> 
        </b></p>
    </div>        
<!--    <div class="margin_bottom_20"></div> -->
		<b> 
            ¿Qué desea realizar sobre proyectos?
        </b>
		<br><br>
    <div class="section_w700">
        
        <table id="proyectosGrid"><tr><td/></tr></table> 
        <div id="proyectosPager"></div> <p></p>
	    <!-- <div class="button_01"><a href="?content=consultaProyecto&nombre=">Consultar </a></div> 
        <br><br> -->
        <div class="button_01"><a href="?content=agregarProyecto">Agregar </a></div>
        

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

