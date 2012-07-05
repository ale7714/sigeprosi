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
  $("#proyectosGrid").jqGrid({
    url:'acciones/cargarProyectos.php',
    datatype: 'xml',
    mtype: 'GET',
    colNames:['Nombre','Nro Solicitud', 'Estado', 'Etapa'],
    colModel :[ 
      {name:'nombre', index:'nombre', width:50}, 
      {name:'numeroSolicitud', index:'numeroSolicitud', width:50}, 
      {name:'estado', index:'estado', width:20, align:'right'}, 
      {name:'etapaNombre', index:'etapaNombre', width:20, align:'right'},
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
		var botonoes = document.getElementsByName("group1");
		var i;
		for(i=0;i<botonoes.length;i++) if (botonoes[i].checked) window.location = "?content="+botonoes[i].value+"&nombre="+val['nombre'];
    },
    caption: 'Proyectos',
  }).navGrid('#pager1',{
     edit: false,
     add: false,
     del: false
 }); 
}); 
$(function(){ 
  $("#proyectosGridPorCliente").jqGrid({
    url:<?php echo "'acciones/cargarProyectosCliente.php?cliente=".$_SESSION['correoUSB']."'";?>,
    datatype: 'xml',
    mtype: 'GET',
    colNames:['Nombre','Nro Solicitud', 'Estado', 'Etapa'],
    colModel :[ 
      {name:'nombre', index:'nombre', width:200}, 
      {name:'numeroSolicitud', index:'numeroSolicitud', width:150}, 
      {name:'estado', index:'estado', width:100, align:'right'}, 
      {name:'etapaNombre', index:'etapaNombre', width:80, align:'right'},
    ],
    pager: '#proyectosPagerPorCliente',
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
		for(i=0;i<botonoes.length;i++) if (botonoes[i].checked) window.location = "?content="+botonoes[i].value+"&nombre="+val['nombre'];
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
        <?php if ($_SESSION['cliente'] == false){?>
        <table align="center"><tr><td>
			<table id="proyectosGrid"><tr><td/></tr></table> 
			<div id="proyectosPager"></div> <p></p></td></tr>
		</table>
		<?php } else { ?>
		 <table align="center"><tr><td>
			<table id="proyectosGridPorCliente"><tr><td/></tr></table> 
			<div id="proyectosPagerPorCliente"></div> <p></p></td></tr>
		</table>
		<?php } ?>
		<?php if (((isset($_SESSION['profesor'])) && ($_SESSION['profesor']))){?>
		<center><b> 
        <span class="em_text"><font size=2 >&iquest;Qu&eacute; desea realizar sobre proyectos?</font></span>
        </b></center>
		<div align="center"><font size=2 >
                <input type="radio" name="group1" value="consultaProyecto" checked <?php //if ($status == 0) echo "checked";?>> Consultar
                <input type="radio" name="group1" value="editaProyecto" <?php //if ($status == 1) echo "checked";?>> Editar
				</font>
        </div>
		<?php } ?>
		<?php if (((isset($_SESSION['cliente'])) && ($_SESSION['cliente']))){?>
		<center><b> 
        <span class="em_text"><font size=2 >&iquest;Qu&eacute; desea realizar sobre proyectos?</font></span>
        </b></center>
		<div align="center"><font size=2 >
                <input type="radio" name="group1" value="consultaProyecto" checked <?php //if ($status == 0) echo "checked";?>> Consultar
				</font>
        </div>
		<?php } ?>
    </div> 
<?php 
if (((isset($_SESSION['profesor'])) && ($_SESSION['profesor']))){?>
	<div class="section_w700">
		<center>
		<IMG SRC="images/ICO/add.png" onclick='location.href="?content=registroProyecto"' width="50" height="50" type="button" title="Crear Nuevo Proyecto"  class="pointer" onMouseOver="javascript:this.width=60;this.height=60"  onMouseOut="javascript:this.width=50;this.height=50"> 
		</center>
    </div>  
<?php } ?>
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
