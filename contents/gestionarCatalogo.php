<?php
 if (!(isset($_SESSION["admin"])) || (isset($_SESSION["admin"]) && !($_SESSION["admin"]) && (isset($_GET['email'])))){
	 include "contents/areaRestringida.php";
	 echo '<script>';
	 echo 'alert("No tiene permisos para acceder a esta \u00e1rea del sistema.");';
	echo 'location.href="principal.php"';
	 echo '</script>';
 }else{
    if (!(isset($_GET['categoria']))) $_GET['categoria'] = 'General';
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
$(function(){ 
  $("#catalogosGrid").jqGrid({
    url:'acciones/cargarCatalogos.php?categoria=<?php echo $_GET['categoria']?>',
    datatype: 'xml',
    mtype: 'GET',
    colNames:['Nombre'],
    colModel :[ 
      {name:'nombreCatalogo', index:'nombreCatalogo', width:500}, 
    ],
    pager: '#catologosPager',
    toolbar:[true,"top"],
    height: 'auto',
    rowNum:20,
    rowList:[20,40,60],
    sortname: 'invid',
    sortorder: 'asc',
    viewrecords: true,
    gridview: true,
    ondblClickRow: function(id){
      var val = jQuery(this).getRowData(id);
      window.location = "?content=listarElementos&nombre="+val['nombreCatalogo'];
    },
    caption: 'Catálogos',
  }).navGrid('#pager1',{
     edit: false,
     add: false,
     del: false
 }); 
}); 

$(function(){ 
  $("#categoriasGrid").jqGrid({
    url:'acciones/cargarSubcategorias.php?categoria=<?php echo $_GET['categoria']?>',
    datatype: 'xml',
    mtype: 'GET',
    colNames:['Nombre'],
    colModel :[ 
      {name:'nombreCategoria', index:'nombreCategoria', width:500}, 
    ],
    pager: '#categoriasPager',
    toolbar:[true,"top"],
    height: 'auto',
    rowNum:20,
    rowList:[20,40,60],
    sortname: 'invid',
    sortorder: 'asc',
    viewrecords: true,
    gridview: true,
    ondblClickRow: function(id){
      var val = jQuery(this).getRowData(id);
      window.location = "?content=gestionarCatalogo&categoria="+val['nombreCategoria'];
    },
    caption: 'Subcategorías',
  }).navGrid('#pager1',{
     edit: false,
     add: false,
     del: false
 }); 
}); 
</script>     
<div id="main_column">
   <div class="section_w701"><font size="6" face="arial"><b>Categor&iacute;a: <?php echo $_GET['categoria']?></b></font>  </div>  

    <div class="section_w702">
        <table align="center"><tr><td>
            <table id="catalogosGrid"><tr><td/></tr></table> 
            <div id="catalogosPager"></div> <p></p></td></tr>
        </table>
    </div> 
    <div class="section_w702">
        
        <table align="center"><tr><td>
            <table id="categoriasGrid"><tr><td/></tr></table> 
            <div id="categoriasPager"></div> <p></p></td></tr>
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

<div class="cleaner"></div>
<?php } ?>
