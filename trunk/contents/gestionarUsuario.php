<?php if (!isset($_SESSION['admin']) || ((isset($_SESSION['admin'])) && !($_SESSION['admin']))){
	include "contents/areaRestringida.php";
	echo '<script>';
	echo 'alert("No tiene permisos para acceder a esta area del sistema.");';
	//echo 'location.href="principal.php"';
	echo '</script>';
}else{ ?>
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
  $("#usuariosGrid").jqGrid({
    url:'acciones/cargarUsuarios.php',
    datatype: 'xml',
    mtype: 'GET',
    colNames:['UsbID','Nombre', 'Apellido', 'Activo','Rol'],
    colModel :[ 
      {name:'correoUSB', index:'correoUSB', width:150}, 
      {name:'nombre', index:'nombre', width:120}, 
      {name:'apellido', index:'apellido', width:120, align:'right'}, 
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
		var botonoes = document.getElementsByName("group1");
		var i;
		for(i=0;i<botonoes.length;i++) if (botonoes[i].checked) window.location = "?content="+botonoes[i].value+"&email="+val['correoUSB'];
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
   <div class="section_w701"><font size="6" face="arial"><b>Gestionar Usuario:</b></font>  </div>  

    <div class="section_w702">
        
        <table align="center"><tr><td>
			<table id="usuariosGrid"><tr><td/></tr></table> 
			<div id="usuariosPager"></div> <p></p></td></tr>
		</table>
		<center><b> 
        <span class="em_text"><font size=2 >&iquest;Qu&eacute; desea realizar sobre usuarios?</font></span>
        </b></center>
		<div align="center"><font size=2 >
                <input type="radio" name="group1" value="consultaUsuario" checked <?php //if ($status == 0) echo "checked";?>> Consultar
                <input type="radio" name="group1" value="editaUsuario" <?php //if ($status == 1) echo "checked";?>> Editar
		<input type="radio" name="group1" value="cambiarContrasena" <?php //if ($status == 1) echo "checked";?>> Cambiar Clave de acceso
				</font>
                </div>
    </div> 

	<div class="section_w700">
		<center>
		  	<table width="62%" border="0">
			<tr>
				<td align="center" height="65px">
					<!--<input type="button" onclick="addActividad('tableActividad')" id="nuevaActividad[]" name="nuevaActividad[]" value="  Nueva actividad  " alt="nuevaActividad" class="submitbutton" title="Nueva Actividad" />
				-->
				<IMG SRC="images/ICO/add.png" onclick='location.href="?content=registroUsuario"' class="pointer" width="50" height="50" type="button" title="Crear Nuevo Usuario" onMouseOver="javascript:this.width=60;this.height=60" onMouseOut="javascript:this.width=50;this.height=50"> 

                                </td>
				
                        </tr>
                        </table>
		</center>
        </div>
   
</div> <!-- end of main column -->
	
<!-- end of side column 1 -->

<div class="side_column_w200">
    <?php
    if (isset($_SESSION['admin'])){
        include 'sidebars/barraEnSesion.php';
         include 'sidebars/barraEnlaces.php';
    } else {
        include 'sidebars/barraInicioSesion.php';
        include 'sidebars/barraEnlaces.php';
    }
    ?>
    <!-- barra lateral -->

</div> <!-- end of right side column -->

<div class="cleaner"></div>
<?php  } ?>
