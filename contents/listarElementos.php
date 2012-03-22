<?php $cat = $_GET['nombre']; ?>
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
  $("#elementosGrid").jqGrid({
    url: <?php echo "'acciones/cargarElementos.php?catalogo=".$cat."'"?>,
    datatype: 'xml',
    mtype: 'GET',
    colNames:['nombreCatalogo','Nombre de Elemento'],
    colModel :[ 
			{name:'nombreCatalogo', index:'nombreCatalogo', hidden:true, width:200}, 
      {name:'nombre', index:'nombre', width:500}, 
    ],
    pager: '#elementosPager',
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
			var botonoes = document.getElementsByName("group1");
			var i;
			for(i=0;i<botonoes.length;i++) if (botonoes[i].checked) window.location = "?content="+botonoes[i].value+"&nombre="+val['nombre']+<?php echo "'&catalogo=".$cat."'"?>;
    },
    caption: 'Elementos',
  }).navGrid('#pager1',{
     edit: false,
     add: false,
     del: false
 }); 
}); 
</script>     
<div id="main_column">
   <div class="section_w701"><font size="6" face="arial"><b>Elementos del cat&aacute;logo <?php echo $_GET['nombre']?>:</b></font>  </div>  

    <div class="section_w702">
        
        <table align="center"><tr><td>
			<table id="elementosGrid"><tr><td/></tr></table> 
			<div id="elementosPager"></div> <p></p></td></tr>
		</table>
		<?php if (((isset($_SESSION['profesor'])) && ($_SESSION['profesor']))){?>
		<center><b> 
        <span class="em_text"><font size=2 >&iquest;Qu&eacute; desea realizar sobre elementos?</font></span>
        </b></center>
		<div align="center"><font size=2 >
                <input type="radio" name="group1" value="editaElemento" checked > Editar
                <input type="radio" name="group1" value="eliminarElemento" > Eliminar
				</font>
        </div>
		<?php } ?>
    </div> 
		<div class="section_w701">
		<table border="0"  width="55%"  id="tableNuevos" align="center">
			<tr>
        
      </tr>
		</table>
	</div>
<?php 
if (((isset($_SESSION['profesor'])) && ($_SESSION['profesor']))){?>
	<div class="section_w700">
		<center>
		<IMG SRC="images/ICO/add.png" class="pointer" onclick='location.href="?content=agregarElemento"' width="50" height="50" type="button" onclick="addElemento('tableNuevos')" title="Crear Nuevo Elemento" onMouseOver="javascript:this.width=60;this.height=60"  onMouseOut="javascript:this.width=50;this.height=50"> 
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
