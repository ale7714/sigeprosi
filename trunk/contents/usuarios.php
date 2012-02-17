<?php if (!isset($_SESSION['admin']) || ((isset($_SESSION['admin'])) && !($_SESSION['admin']))){
	include "contents/areaRestringida.php";
	include 'banners/footer.php';
	echo '<script>';
	echo 'alert("No tiene permisos para acceder a esta area del sistema.");';
	echo 'location.href="principal.php"';
	echo '</script>';
} ?>
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
  $("#usuariosGrid").jqGrid({
    url:'acciones/cargarUsuarios.php',
    datatype: 'xml',
    mtype: 'GET',
    colNames:['UsbID','Nombre', 'Apellido', 'Activo','Rol'],
    colModel :[ 
      {name:'correoUSB', index:'correoUSB', width:150}, 
      {name:'nombre', index:'nombre', width:150}, 
      {name:'apellido', index:'apellido', width:150, align:'right'}, 
      {name:'activo', index:'activo', width:100, align:'right'},
	  {name:'rol', index:'rol', width:100, align:'right'},
    ],
    pager: '#usuariosPager',
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
        window.location = "?content=consultaUsuario&email="+val['correoUSB'];
    },
    caption: 'Usuarios',
  }).navGrid('#pager1',{
     edit: false,
     add: false,
     del: false
 }); 
}); 
</script>


<div id="main_column">

    <div class="section_w700">

        <h2>Usuarios</h2>

        <p><span class="em_text">En esta sección podrá gestionar los usuarios del sistema.</span></p>

    </div>        

    <div class="margin_bottom_20"></div>

    <div class="section_w700">
    <?php
    if (isset($_SESSION['admin'])) { ?>
        <table id="usuariosGrid"><tr><td/></tr></table> 
        <div id="usuariosPager"></div> <p></p>
    <?php } ?>

    </div>        

    <div class="section_w700">

        <!--h3>Crear solicitud</h3-->
        <div class="button_01"><a href="?content=registroUsuario">Registrar Usuario</a></div>

    </div>        

    <div class="margin_bottom_20"></div>
    <div class="cleaner"></div>
</div> <!-- end of main column -->

<!-- end of side column 1 -->
        
<div class="side_column_w200">

    <!-- barra lateral -->
    <?php
    if (isset($_SESSION['admin']))
        include 'sidebars/barraEnSesion.php';
    else
        include 'sidebars/barraInicioSesion.php';
    ?>

    <? include 'sidebars/barraEnlaces.php';?>

</div> <!-- end of right side column -->

<div class="cleaner"></div>
