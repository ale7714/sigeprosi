<?php 
if (!isset($_SESSION['profesor']) || ((isset($_SESSION['profesor'])) && !($_SESSION['profesor']))){
	include "contents/areaRestringida.php";
	echo '<script>';
	echo 'alert("No tiene permisos para acceder a esta area del sistema.");';
	//echo 'location.href="principal.php"';
	echo '</script>';
}else{
    require_once "class/class.fachadainterfaz.php";
	$fachada = fachadaInterfaz::getInstance();
	$equipo=$fachada->buscarEquipo($_GET['nombre']);
	//$proy = $matriz[0];
    //$equipo = $_GET['nombre'];
   // $desarrolla = new desarrolla($_GET['nombre'],null,null);
    //$desarrolla->autocompletar();
?>
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
<script src="jscripts/js/i18n/grid.locale-es.js" type="text/javascript"></script>
<script src="jscripts/js/jquery.jqGrid.min.js" type="text/javascript"></script>

<script type="text/javascript">
$(function(){ 
  $("#usuariosGrid").jqGrid({
    url:'acciones/cargarMiembrosC.php?equipo=<?php echo $equipo['nombre']?>',
    datatype: 'xml',
    mtype: 'GET',
    colNames:['UsbID','Nombre', 'Apellido','Coordinador del equipo'],
    colModel :[ 
      {name:'correoUSB', index:'correoUSB', width:150}, 
      {name:'nombre', index:'nombre', width:120}, 
      {name:'apellido', index:'apellido', width:120, align:'right'}, 
	  {name:'coordinador', index:'coordinador', width:150, align:'right'}, 
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
		if (val['coordinador']=='No'){	
			jQuery(this).setCell(id,'coordinador','Si',false,false, false);
			addElementInput('estudiantes','listaEstudiantes',val['correoUSB'])
		}else{
			jQuery(this).setCell(id,'coordinador','No',false,false, false);
			eliminarElemento(val['correoUSB']);
		}
	},
    caption: 'Estudiantes',
  }).navGrid('#pager1',{
     edit: false,
     add: false,
     del: false
 }); 
}); 
</script>

<div id="main_column"><? //if (!isset ($_POST['acepto'])) header('Location:principal.php?content=previoSolicitud')?>
	
	<div class="section_w701">
        <font size="5" face="arial"><b>Seleccionar Coordinador de <?php echo $equipo['nombre']?>: </b></font> 
    </div>       
<!--    <div class="margin_bottom_20"></div> -->
    
        <form name="formaEquipo" onSubmit="return validarCoordinador();" method="post" action="acciones/registrarCoordinador.php">
	<div class="section_w701">
        <font size="4" face="arial"><b>Lista de Integrantes del Equipo: </b></font>
		<p><br><font size="2" face="arial"><b>Seleccione un estudiante</b></font></p>		
    </div>  
	<div class="section_w702">
        <table align="center">
			<tr><td><table id="usuariosGrid"><tr><td/></tr></table><div id="usuariosPager"></div> <p></p></td>
			</tr>
		</table>
		
	</div>
	<div class="section_w701">
		<table border="0"  width="62%" id="tableOperaciones">
			<tr >
                <td  colspan="2" >
					<!--
                    <input type="submit" id="enviar" name="enviar" value="  Agregar  " alt="Enviar" class="submitbutton" title="Enviar solicitud" />
                    <input type="button" name="cancelar" value="Cancelar" alt="  Cancelar  " class="submitbutton" title="Cancelar" onclick="history.back(-2)" />
					<IMG SRC="images/ICO/Save.ico" width="50" height="50" type="submit" id="enviar" name="enviar" value="  Agregar  " alt="Enviar" class="submitbutton" title="Enviar solicitud">
                    -->
					<input type="hidden" name="submitRegistration" value="true"/>
					<input type="hidden" name="nombreE"  id="nombreE" value="<?php echo $equipo['nombre']?>"/>
					<input type="image" width="50" height="50" id="enviar" name="enviar" src="images/ICO/guardar.png" alt="Enviar" class="submitbutton" title="Enviar solicitud"  />
					<?php if (isset($_GET['continuar']) && $_GET['continuar'] == "activo") {?>
					<IMG SRC="images/ICO/cancel.png" name="cancel" id="cancel" width="50" height="50" tname="Cancelar" type="button" onclick='location.href="?content=gestionarEquipo"' class="submitbutton" value="Cancelar" title="Continuar sin modificar"  alt="Cancelar">  
					<?php }?>
					
				</td>
            </tr>
		</table>
	</div>  
		
	<table align="center" id="listaEstudiantes" name="listaEstudiantes"></table>
        </form>
	
	
    <div class="margin_bottom_20"></div>
    <div class="cleaner"></div>
</div> <!-- end of main column -->

<!-- end of side column 1 -->

<div class="side_column_w200">
 <?php
    if (isset($_SESSION['admin']))
        include 'sidebars/barraEnSesion.php';
    else
        include 'sidebars/barraInicioSesion.php';
    ?>
    <!-- barra lateral -->

</div> <!-- end of right side column -->

<div class="cleaner"></div>
<?php  } ?>
