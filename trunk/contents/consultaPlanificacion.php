<?php $id = $_GET['id']; ?>

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
  $("#actividadesGrid").jqGrid({
    url: <?php echo "'acciones/cargarActividades.php?id=".$id."'"?>,
    datatype: 'xml',
    mtype: 'GET',
    colNames:['id', 'Semana', 'Ponderacion', 'Fecha', 'Descripcion'],
    colModel :[ 
      {name:'id', index:'id', hidden:true, width:10},
      {name:'semana', index:'semana', width:100, align:'left'},
      {name:'puntos', index:'puntos', width:100, align:'center'},
      {name:'fecha', index:'fecha', width:200, align:'center'},
      {name:'descripcion', index:'descripcion', hidden:true, width:10},
    ],
    pager: '#actividadesPager',
    width:'auto',
    height: 'auto',
    rowNum:20,
    rowList:[20,40,60],
    sortname: 'invid',
    sortorder: 'desc',
    viewrecords: true,
    gridview: true,
    subGrid: true,
    ondblClickRow: function(id){
        var val = jQuery(this).getRowData(id);
        window.location = "?content=consultaPlanificacion&id="+val['id'];
    },
    subGridRowExpanded: function(subgrid_id, row_id) {
        var val = jQuery(this).getRowData(row_id);
        var html = "<span><b>Descripcion:</b></span>"
                    + "<span style=\"color:#0431B4\"><p style=\"text-indent:50\">"
                    + val['descripcion']
                    + "</p>"
                    + "</span><br/>";
        $("#" + subgrid_id).append(html);
    },
    caption: 'Actividades',
  }).navGrid('#pager1',{
     edit: false,
     add: false,
     del: false
 }); 
}); 
</script>

<div id="main_column">

    <div class="section_w700">

        <h2>Consulta de Planificaciones</h2>

        <p><b> 
            <?php
            include_once "class/class.fachadainterfaz.php";
            $fachada = fachadaInterfaz::getInstance();
			$result = $fachada->consultarPlanificacion2($id);
			if (!isset ($_GET['error'])){
   			        $_GET['error'] = null;
                   }
			    if ($_GET['error']=="camposVacios"){
                    echo '<span style="color: red;">Debe llenar todos los campos obligatorios</span>';
                }
                else if ($_GET['error']=="formatoCorreo"){
                    echo '<span style="color: red;">El formato de correo es inválido.</span>';
                }
				else if ($_GET['error']=="noExiste"){
                    echo '<span style="color: red;">El numero de solicitud o correo no pertenecen a una solicitud.</span>';
                }else {
                    //echo '(*) Datos obligatorios.';
                }
             ?> 
        </b></p>
    </div>        
    <div class="margin_bottom_20"></div>

    <div class="section_w700">
        <h2>Nombre de Etapa:  <?php echo $result['nombre']?><br><br>
        Numero de Etapa:  <?php echo $result['numero']?></h2>
        <table id="actividadesGrid"><tr><td/></tr></table> 
        <div id="actividadesPager"></div> <p></p>
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

