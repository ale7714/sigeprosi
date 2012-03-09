<?php 
if (!isset($_SESSION['profesor']) || ((isset($_SESSION['profesor'])) && !($_SESSION['profesor']))){
	include "contents/areaRestringida.php";
	echo '<script>';
	echo 'alert("No tiene permisos para acceder a esta area del sistema.");';
	//echo 'location.href="principal.php"';
	echo '</script>';
}else{
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
<script src="jscripts/js/i18n/grid.locale-en.js" type="text/javascript"></script>
<script src="jscripts/js/jquery.jqGrid.min.js" type="text/javascript"></script>

<script type="text/javascript">
$(function(){ 
  $("#profesoresGrid").jqGrid({
    url:'acciones/cargarUsuariosProfesores.php',
    datatype: 'xml',
    mtype: 'GET',
    colNames:['UsbID','Nombre', 'Apellido','Es evaluador'],
    colModel :[ 
      {name:'correoUSB', index:'correoUSB', width:150}, 
      {name:'nombre', index:'nombre', width:120}, 
      {name:'apellido', index:'apellido', width:120, align:'right'}, 
	  {name:'evaluador', index:'evaluador', width:120, align:'right'}, 
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
		if (val['evaluador']=='No'){	
			jQuery(this).setCell(id,'evaluador','Si',false,false, false);
			addElementInput('profesores','listaProfesores',val['correoUSB'],val['correoUSB']);
		}else{
			jQuery(this).setCell(id,'evaluador','No',false,false, false);
			eliminarElemento(val['correoUSB']);
		}
	},
    caption: 'Profesores',
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
</script>

<div id="main_column">
	<div class="section_w701">
        <font size="6" face="arial"><b>Editar Proyecto: </b></font> 
    </div>       
<!--    <div class="margin_bottom_20"></div> -->
		<?php 
		include_once "class/class.fachadainterfaz.php";
		$fachada = fachadaInterfaz::getInstance();
		$matriz=$fachada->buscarProyecto($_GET['nombre']);
		$proy = $matriz[0];
		?>
		 
        <form name="formaProyecto" method="post" action="acciones/editarProyecto.php">
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
                <td align="left"><font size="3" face="arial">                <select id="etapa" name="etapa">
                    <!--option value="< ?php echo $proy['idEtapa']['id']; ?>" selected="selected" > < ?php echo 'Nro :['.$proy['idEtapa']['numero'].'] Nombre :['.$proy['idEtapa']['nombre'].']'; ?> </option-->
					<option value="<?php echo $proy['idEtapa']['id']; ?>" selected="selected" > <?php echo ''.$proy['idEtapa']['nombre'].'-'.$proy['idEtapa']['numero'].''; ?> </option>
					<?php 
					include_once "class/class.fachadainterfaz.php";
					$fachada = fachadaInterfaz::getInstance();
					$matriz=$fachada->listarPlanificacion();
					if ($matriz!=null){
						$i=0;
						//var_dump($matriz);
						while($i<sizeof($matriz)){
					?> 
						<!--option value="< ?php echo $matriz[$i]['id'];?>"> < ?php echo 'Nro :['.$matriz[$i]['numero'].'] Nombre :['.$matriz[$i]['nombre'].']';?> </option-->
						<option value="<?php echo $matriz[$i]['id'];?>"> <?php echo ''.$matriz[$i]['nombre'].'-'.$matriz[$i]['numero'].'';?> </option>
					<?php
						$i=$i+1;
						}
					}
					?>	
                </select>
				</font></td>
            </tr>
			<tr><td align="right"><font size="4" face="arial"><b>Estado:</b></font></td>
                <td align="left"><select name="estado" id="estado">
                    <option  value="<?php if($proy['estado'] == "Activo"){ echo 1;}
                                          if($proy['estado'] == "Inactivo"){ echo 0;}
										  if($proy['estado'] == "Completado"){ echo 0;}?>" selected="selected"> <?php echo $proy['estado'] ?> </option>
					<option  value="0"> Inactivo </option>	
					<option  value="1"> Activo </option>
					<option  value="2"> Completado </option>						
                </select></td>
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
        <font size="5" face="arial"><b>Agregar Clientes Asociados:</b></font> 
    </div> 
	<div class="section_w702">
		   <table border="0" id="tableCliente" width="100%" style="display:none;">
		   		<tr><td align="center"><font size="4" face="arial"><b>Datos del cliente: </b></font> </td>
					<td align="right" ><!--
						<h3>:
						<input type="button" onclick="deleteActividad(this.id)" id="1" name="eliminarActividad" value="  Eliminar actividad  " alt="Eliminar Actividad" class="submitbutton" title="Eliminar Actividad" >
						</h3>
						-->
						<IMG SRC="images/ICO/Symbol-Delete.ico" width="30" height="30" type="button" onclick="deleteCliente(this.id)" id="1" name="eliminarCliente" value="  Eliminar cliente  "  value=""  alt="Eliminar Cliente" class="submitbutton" title="Eliminar Actividad" onMouseOver="javascript:this.width=40;this.height=40"  onMouseOut="javascript:this.width=30;this.height=30">
					</td>	
				</tr>
            <tr>
                <td align="right" width=35.5%><LABEL for="participante"><b>Nombre:</b></LABEL> 
                    </td>
                    <td width=64.5%><input title="Ingrese el nombre del cliente" type="text" id="nombre[]" name="nombre[]" onfocus="clearText(this)" onblur="clearText(this)"/></td>
            </tr>
            <tr>
                <td align="right" width=35.5%><LABEL for="participante"><b>Apellido:</b></LABEL> 
                    </td>
                    <td width=64.5%><input title="Ingrese el apellido del cliente" type="text" id="apellido[]" name="apellido[]" value="" onfocus="clearText(this)" onblur="clearText(this)"/></td>
            </tr>
            <tr>
                <td align="right" width=35.5%><LABEL for="email"><b>Correo:</b></LABEL> </td>
                <td width=64.5%><input title="Ingrese el correo electronico" type="text" id="email[]" name="email[]" value="ejemplo@usb.ve" onfocus="clearText(this)" onblur="clearText(this)"/></td>
            </tr>
			
            <tr>
                    <td align="right"><LABEL for="telefono" width=35.3%><b>Telefono:</b></LABEL> </td>
                    <td width=64.7%><select name="codigo[]" id="codigo[]" onchange="activarCampo(this.value, 'tlf[]')">
                            <option value="codigo" selected="selected">Codigo</option>
                            <option value="0212">0212</option>
                            <option value="0412">0412</option>
                            <option value="0414">0414</option>
                            <option value="0424">0424</option>
                            <option value="0416">0416</option>
                            <option value="0426">0426</option>
                            </select>
							<input title="Ingrese su n?mero de tel?fono" type="text" name="tlf[]" id="tlf[]" value="" maxlength="7" size="7" disabled="disabled" onkeypress="return onlyNumbers(event)"/>
                    </td>
            </tr>

            <tr>
                <td align="right" width=35.5%><LABEL for="rol"><b>Cargo:</b></LABEL> </td>
                <td width=64.5%><input title="Ingrese el rol" type="text" id="rol[]" name="rol[]" value="" onfocus="clearText(this)" onblur="clearText(this)"/></td>
            </tr>
			<tr><td align="center" colspan=2><h2></h2></td><td align="center" colspan=2><h2></h2></td></tr>		
        </table>
			<table width="58%"  border="0">
			<tr >
				<td align="center">
					<!--<input type="button" onclick="addActividad('tableActividad')" id="nuevaActividad[]" name="nuevaActividad[]" value="  Nueva actividad  " alt="nuevaActividad" class="submitbutton" title="Nueva Actividad" />
				-->
				<IMG SRC="images/ICO/Symbol-Add.ico" name="hide" id="hide" width="50" height="50" tname="nuevoCliente" type="button" onclick="showHideTC('tableCliente')" class="submitbutton" value="  Nuevo Cliente  " title="Nuevo Cliente"  alt="nuevoCliente" onMouseOver="javascript:this.width=60;this.height=60"  onMouseOut="javascript:this.width=50;this.height=50"> 
				<IMG SRC="images/ICO/Symbol-Add.ico"  style="display:none;" name="add" id="add" width="50" height="50" tname="nuevoCliente" type="button" onclick="addCliente('tableCliente')" class="submitbutton" value="  Nuevo Cliente  " title="Nuevo Cliente"  alt="nuevoCliente" onMouseOver="javascript:this.width=60;this.height=60"  onMouseOut="javascript:this.width=50;this.height=50"> 
				</td>
				
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
		<div class="section_w701">
		<table align="center" id="listaProfesores" name="listaProfesores"></table>
        <table border="0">
            
			<tr>
                    <td><input type="hidden" name="submitRegistration" value="true"/>
			            <input type="hidden" name="unidad" id="unidad" value="<?php echo $proy['numeroSolicitud']['nombreUnidadAdministrativa']; ?>"/>
						<input type="hidden" name="etapa_v" id="etapa_v" value="<?php echo $proy['idEtapa']['id']; ?>"/>
						<input type="hidden" name="nombreProy" id="nombreProy" value="<?php echo $proy['nombre']; ?>"/></td>
                    <td colspan="2">
                    <input type="submit" id="enviar" name="enviar" value="Guardar" alt="Guardar" class="submitbutton" title="Guardar Cambios" />
                    <input type="button" name="cancelar" value="Cancelar" alt="Cancelar" class="submitbutton" title="Cancelar" onclick="history.back(-2)" />
                    </td>
            </tr>

        </table>
			
		</div>
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
