<?php
if (!(isset($_SESSION["admin"]))){
	include "contents/areaRestringida.php";
	echo '<script>';
	echo 'alert("No tiene permisos para acceder a esta area del sistema.");';
	//echo 'location.href="principal.php"';
	echo '</script>';
}else{
    require_once "class/class.listaDesarrolla.php";
    $lista = new listaDesarrolla();
    $result = $lista->buscar($_GET['nombre'],'nombreProyecto');
    $equipo = $result[0]->get('nombreEquipo');
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
  $("#profesoresGrid").jqGrid({
	url:<?php echo "'acciones/cargarUsuariosPE.php?nombreProyecto=".$_GET['nombre']."'";?>,
    datatype: 'xml',
    mtype: 'GET',
    colNames:['UsbID','Nombre', 'Apellido'],
    colModel :[ 
      {name:'correoUSB', index:'correoUSB', width:150}, 
      {name:'nombre', index:'nombre', width:120}, 
      {name:'apellido', index:'apellido', width:120, align:'right'},  
    ],
    pager: '#usuariosPager',
    toolbar:[true,"top"],
    height: 'auto',
    rowNum:100,
    rowList:[100],
    sortname: 'invid',
    sortorder: 'desc',
    viewrecords: true,
    gridview: true,
    ondblClickRow: function(id){
        var val = jQuery(this).getRowData(id);
	},
    caption: 'Profesores Evaluadores',
  }).navGrid('#pager1',{
     edit: false,
     add: false,
     del: false
 }); 
});
$(function(){ 
  $("#clientesGrid").jqGrid({
	url:<?php echo "'acciones/cargarUsuariosCA.php?nombreProyecto=".$_GET['nombre']."'";?>,
    datatype: 'xml',
    mtype: 'GET',
    colNames:['UsbID','Nombre', 'Apellido'],
    colModel :[ 
      {name:'correoUSB', index:'correoUSB', width:150}, 
      {name:'nombre', index:'nombre', width:120}, 
      {name:'apellido', index:'apellido', width:120, align:'right'},  
    ],
    pager: '#usuariosPager',
    toolbar:[true,"top"],
    height: 'auto',
    rowNum:100,
    rowList:[100],
    sortname: 'invid',
    sortorder: 'desc',
    viewrecords: true,
    gridview: true,
    ondblClickRow: function(id){
        var val = jQuery(this).getRowData(id);
	},
    caption: 'Clientes Asociados',
  }).navGrid('#pager1',{
     edit: false,
     add: false,
     del: false
 }); 
});
$(function(){ 
  $("#evaluacionesGrid").jqGrid({
	url:<?php echo "'acciones/cargarEvaluacionesCliente.php?proy=".$_GET['nombre']."'";?>,
    datatype: 'xml',
    mtype: 'GET',
    colNames:['Nombre'],
    colModel :[ 
      {name:'nombre', index:'nombre', width:250}, 
     ],
    pager: '#evaluacionesPager',
    toolbar:[true,"top"],
    height: 'auto',
    rowNum:100,
    rowList:[100],
    sortname: 'invid',
    sortorder: 'desc',
    viewrecords: true,
    gridview: true,
    ondblClickRow: function(id){
        var val = jQuery(this).getRowData(id);
		var botonoes = document.getElementsByName("group1");
		var i;
		for(i=0;i<botonoes.length;i++) if (botonoes[i].checked) window.location = "?content="+botonoes[i].value+"&id="+id+"&equipo=" + <?php echo "'".$equipo."'";?>;
	},
    caption: 'Evaluaciones Asociadas',
  }).navGrid('#pager1',{
     edit: false,
     add: false,
     del: false
 }); 
});
</script>

<div id="main_column">
	<div class="section_w701">
        <font size="6" face="arial"><b>Consultar Proyecto: </b></font> 
    </div>       
<!--    <div class="margin_bottom_20"></div> -->
		<?php 
		include_once "class/class.fachadainterfaz.php";
		$fachada = fachadaInterfaz::getInstance();
		$matriz=$fachada->buscarProyecto($_GET['nombre']);
		$proy = $matriz[0];
		?>
		 

		 <div class="section_w702">
		<table border="0">
			<tr> <td><font size="5" face="arial"><b>Datos b&aacute;sicos: </b></font> </td></tr>
		</table>
        <table border="0">
            <tr>
                <td align="right" width=35.5%><font size="4" face="arial"><b>Nombre del Proyecto:</b></font></td>
                <td width=64.5%><font size="3" face="arial"><?php echo $proy['nombre'] ?></font></td>
            </tr>
			<tr>
				<td align="right"><font size="4" face="arial"><b>Solicitud asociada:</b></font></td>
                <!--td align="left"><font size="3" face="arial">< ?php echo 'Nro :['.$proy['numeroSolicitud']['nro'].'] Email :['.$proy['numeroSolicitud']['email'].'] Unidad : ['.$proy['numeroSolicitud']['nombreUnidadAdministrativa'].']'; ?></font></td-->
				<td align="left"><font size="3" face="arial"><?php echo ''.$proy['numeroSolicitud']['nombreUnidadAdministrativa'].'-'.$proy['numeroSolicitud']['nro'].''; ?></font></td>
            </tr>
			<tr>
				<td align="right"><font size="4" face="arial"><b>Etapa inicial:</b></font></td>
                <td align="left"><font size="3" face="arial"><?php echo ''.$proy['idEtapa']['nombre'].'-'.$proy['idEtapa']['numero'].''; ?></font></td>
            </tr>
			<tr><td align="right"><font size="4" face="arial"><b>Estado:</b></font></td>
                <td align="left"><font size="3" face="arial"><?php echo $proy['estado'] ?></font></td>
            </tr>
        </table>
	</div> 
	<div class="section_w701">
        <font size="5" face="arial"><b>Lista de Clientes asociados: </b></font> 
    </div> 
	<div class="section_w702">
        <table align="center">
			<tr><td><table id="clientesGrid"><tr><td/></tr></table><div id="usuariosPager"></div> <p></p></td>
			</tr>
		</table>    
	</div>
	<div class="section_w701">
        <font size="5" face="arial"><b>Lista de Profesores evaluadores asociados: </b></font> 
    </div>  
	<div class="section_w702">
		<table align="center">
			<tr><td><table id="profesoresGrid"><tr><td/></tr></table><div id="usuariosPager"></div> <p></p></td>
			</tr>
		</table>
    </div>
    <?php if (((isset($_SESSION['cliente'])) && ($_SESSION['cliente']))){?>
	<div class="section_w701">
        <font size="5" face="arial"><b>Lista Presentaciones: </b></font> 
    </div>  
	<div class="section_w702">
		<table align="center">
			<tr><td><table id="evaluacionesGrid"><tr><td/></tr></table><div id="evaluacionesPager"></div> <p></p></td>
			</tr>
		</table>
        <div align="center"><font size=2 >
                <input type="radio" name="group1" value="registroEntregaPresentacion" checked <?php //if ($status == 0) echo "checked";?>> Evaluar
                </font>
        </div>
    </div>

    <?php } ?>
		<div class="section_w701">
		<table border="0"  width="55%"  id="tableOperaciones">
			<tr >
             <input type="button" name="volver" value="Volver" alt="Volver" class="submitbutton" title="Volver a la p�gina anterior" onclick="history.back(-1)" />
				</td>
            </tr>
		</table>
		</div>
    <div class="margin_bottom_20"></div>
    <div class="cleaner"></div>
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
<?php  } ?>
