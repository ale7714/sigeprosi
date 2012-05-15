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
var lastsel = -1;

function saveRow(id) {
    jQuery('#entregasGrid').saveRow(id);
    jQuery("#entregasGrid").jqGrid('setRowData',lastsel,{act:" "});
}

function cancelRow(id) {
    jQuery('#entregasGrid').restoreRow(id);
    jQuery("#entregasGrid").jqGrid('setRowData',lastsel,{act:" "});
}

$(function(){ 
  $("#entregasGrid").jqGrid({
    url:        'acciones/cargarEntregas.php?id=1',
    editurl:    'acciones/editarEntregas.php?',
    datatype: 'xml',
    mtype: 'GET',
    colNames:['id','Nombre','Apellido', 'Nota', 'Opciones'],
    colModel :[
      {name:'id', index:'id', width:50, hidden: true, editable: false },
      {name:'nombre', index:'nombre', width:200, editable: false }, 
      {name:'apellido', index:'apellido', width:200, align:'right', editable: false }, 
      {name:'nota', index:'nota', width:100, align:'right', editable: true, sorttype:"int" },
      {name:'act',index:'act', width:75,sortable:false}
    ],
    pager: '#entregasPager',
    height: 'auto',
    sortname: 'id',
    sortorder: 'desc',
    viewrecords: true,
    gridview: true,
    editoptions: {
               dataEvents: [
                   {
                       type: 'keypress',
                       fn: function(e) {
                            alert('pretaste'); // do something with selected item value
                       }
                   }
               ]
             },
    onSelectRow:  
    function(id){ 
        if(id && id!==lastsel) {
            if (lastsel != -1) {
                jQuery('#entregasGrid').jqGrid('restoreRow',lastsel);
                jQuery("#entregasGrid").jqGrid('setRowData',lastsel,{act:" "});
            }
            se = "<input style='height:22px;width:20px;' type='button' value='S' onclick=\"saveRow('"+id+"');\" />"; 
            ce = "<input style='height:22px;width:20px;' type='button' value='C' onclick=\"cancelRow('"+id+"');\" />"; 
            jQuery("#entregasGrid").jqGrid('setRowData',id,{act:se+ce});
            jQuery('#entregasGrid').jqGrid('editRow',id,true);
            
            lastsel=id; 
        } 
    },
    
    caption: 'Entregas',
  }); 
});
</script>     
<div id="main_column">
   <div class="section_w701"><font size="6" face="arial"><b>Editar Calificaciones:</b></font>  </div>  

    <div class="section_w702">
        
        <table align="center"><tr><td>
			<table id="entregasGrid"><tr><td/></tr></table> 
			<div id="entregasPager"></div> <p></p></td></tr>
		</table>
    </div> 
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
<?php
    // require_once "aspectos/Logger.php";
    // $logger = Logger::getInstance();
    // $logger->log("Edito las calificaciones");
?>
<div class="cleaner"></div>
