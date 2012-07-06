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
    font-size: 86.6%;
}
</style>

<script src="jscripts/js/jquery-1.5.2.min.js" type="text/javascript"></script>
<script src="jscripts/js/i18n/grid.locale-es.js" type="text/javascript"></script>
<script src="jscripts/js/jquery.jqGrid.min.js" type="text/javascript"></script>

<script type="text/javascript">
$(function(){ 
  $("#usuariosGrid").jqGrid({
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
</script>

<div id="main_column"><? //if (!isset ($_POST['acepto'])) header('Location:principal.php?content=previoSolicitud')?>
	
	<div class="section_w701">
        <font size="6" face="arial"><b>Agregar Proyecto: </b></font> 
    </div>       
<!--    <div class="margin_bottom_20"></div> -->
    
        <form name="formaProyecto" onSubmit="return validarProyecto();" method="post" action="acciones/registrarProyecto.php">
		<div class="section_w702">
		<table border="0">
			<tr> <td><font size="4" face="arial"><b>Datos b&aacute;sicos: </b></font> </td></tr>
			<tr> <td><font size="2" face="arial"><b>Nota importante: </b>Todos los campos del formulario son obligatorios.</font> </td></tr>
		</table>
        <table border="0">
            <tr>
                <td align="right" width=35.5%><LABEL for="project_name"><b>Nombre del Proyecto:</b></LABEL> 
                    </td>
                    <td width=64.5%><input title="Ingrese el nombre del proyecto" value="" type="text" id="nombreProy" name="nombreProy" onfocus="clearText(this)" onblur="clearText(this)"/></td>
            </tr>

			<tr>
				<td align="right"><b>Etapa inicial:</b>
                </td>
                <td align="left">
                <select id="etapa" name="etapa">
                    <option value="" selected="selected" > -Seleccione- </option>
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
                </td>
            </tr>
			
			<tr>
				<td align="right"><b>*Seleccionar Solicitud:</b>
                </td>
                <td align="left">
                <select name="solicitud" id="solicitud">
                    <option value="" selected="selected"> -Seleccione- </option>				
				<?php 
				$matriz=$fachada->listarSolicitud();
				if ($matriz!=null){
					$i=0;
					var_dump($matriz);
					while($i<sizeof($matriz)){
				?> 
                    <!--option value="< ?php echo $matriz[$i]['nro']."$$".$matriz[$i]['nombreUnidadAdministrativa'];?>"> < ?php echo 'Nro :['.$matriz[$i]['nro'].'] Email :['.$matriz[$i]['email'].'] Unidad : ['.$matriz[$i]['nombreUnidadAdministrativa'].']'; ?> </option-->
					<option value="<?php echo $matriz[$i]['nro']."$$".$matriz[$i]['nombreUnidadAdministrativa'];?>"> <?php echo ''.$matriz[$i]['nombreUnidadAdministrativa'].'-'.$matriz[$i]['nro'].''; ?> </option>
				<?php
					$i=$i+1;
					}
				}
				?>	
                </select>
                </td>
            </tr>

        </table>
	</div> 
	<div class="section_w701">
        <font size="5" face="arial"><b>Lista de clientes asociados al proyecto: </b></font> 
    </div>  
	<div class="section_w702">
		  <table border="0" id="tableCliente" width="100%">
		   	<tr><td align="center"><font size="4" face="arial"><b>Datos del cliente: </b></font> </td>
					<td align="right" height="45px"><!--
						<h3>:
						<input type="button" onclick="deleteActividad(this.id)" id="1" name="eliminarActividad" value="  Eliminar actividad  " alt="Eliminar Actividad" class="submitbutton" title="Eliminar Actividad" >
						</h3>
						-->
						<IMG SRC="images/ICO/delete.png" width="30" height="30" type="button" onclick="deleteCliente(this.id)" id="1" name="eliminarCliente" value="  Eliminar cliente  "  value=""  alt="Eliminar Actividad" class="submitbutton" title="Eliminar Cliente" onMouseOver="javascript:this.width=35;this.height=35"  onMouseOut="javascript:this.width=30;this.height=30">
					</td>	
				</tr>
        <tr>
          <td align="right" width=35.5%><LABEL for="participante"><b>Nombre:</b></LABEL> 
          </td>
          <td width=64.5%><input title="Ingrese el nombre del cliente" type="text" id="nombre[]" name="nombre[]" onfocus="clearText(this)" onblur="clearText(this)"/>
					</td>
        </tr>
        <tr>
          <td align="right" width=35.5%><LABEL for="participante"><b>Apellido:</b></LABEL> 
          </td>
          <td width=64.5%><input title="Ingrese el apellido del cliente" type="text" id="apellido[]" name="apellido[]" value="" onfocus="clearText(this)" onblur="clearText(this)"/>
					</td>
        </tr>
        <tr>
          <td align="right" width=35.5%><LABEL for="email"><b>Correo:</b></LABEL> </td>
          <td width=64.5%><input title="Ingrese el correo electronico" type="text" id="email[]" name="email[]" value="ejemplo@usb.ve" onfocus="clearText(this)" onblur="clearText(this)"/></td>
        </tr>
			  <tr>
          <td align="right"><LABEL for="telefono" width=35.3%><b>Tel&eacute;fono:</b></LABEL> </td>
          <td width=64.7%><select name="codigo[]" id="codigo[]" onchange="activarCampo(this.value, 'tlf[]')">
                            <option value="codigo" selected="selected">C&oacute;digo</option>
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
				<tr><td align="center" colspan=2><h2></h2></td><td align="center" colspan=2><h2></h2></td>
				</tr>		
        </table>
		
			<table width="58%"  border="0">
			<tr >
				<td align="center" height="65px">
					<!--<input type="button" onclick="addActividad('tableActividad')" id="nuevaActividad[]" name="nuevaActividad[]" value="  Nueva actividad  " alt="nuevaActividad" class="submitbutton" title="Nueva Actividad" />
				-->
				<IMG SRC="images/ICO/user_add.png" width="50" height="50" tname="nuevoCliente" type="button" onclick="addCliente('tableCliente')" class="submitbutton" value=" Agregar Nuevo Cliente  " title="Nuevo Cliente"  alt="nuevoCliente" onMouseOver="javascript:this.width=60;this.height=60"  onMouseOut="javascript:this.width=50;this.height=50"> 

				</td>
				
            </tr>
		</table>
		
	</div>
		<div class="section_w701">

	</div>
	<div class="section_w701">
        <font size="5" face="arial"><b>Lista de profesores que podran ser evaluadores: </b></font> 
    </div>  
	<div class="section_w702">
        <table align="center">
			<tr><td><table id="usuariosGrid"><tr><td/></tr></table><div id="usuariosPager"></div> <p></p></td>
			</tr>
		</table>
		
	</div>
	<div class="section_w701">
		<table border="0"  width="62%" id="tableOperaciones">
			<tr>
                <td  colspan="2" >
					<!--
                    <input type="submit" id="enviar" name="enviar" value="  Agregar  " alt="Enviar" class="submitbutton" title="Enviar solicitud" />
                    <input type="button" name="cancelar" value="Cancelar" alt="  Cancelar  " class="submitbutton" title="Cancelar" onclick="history.back(-2)" />
					<IMG SRC="images/ICO/Save.ico" width="50" height="50" type="submit" id="enviar" name="enviar" value="  Agregar  " alt="Enviar" class="submitbutton" title="Enviar solicitud">
                    -->
					<input type="hidden" name="submitRegistration" value="true"/>
					<input type="image" width="50" height="50" id="enviar" name="enviar" src="images/ICO/guardar.png" alt="Enviar" class="submitbutton" title="Enviar solicitud" onMouseOver="javascript:this.width=60;this.height=60"  onMouseOut="javascript:this.width=50;this.height=50"> 
                                        <IMG SRC="images/ICO/cancel.png" name="cancel" id="cancel" width="50" height="50" tname="Cancelar" type="button" onclick='location.href="?content=gestionarProyecto"' class="submitbutton" value="Cancelar" title="Cancelar"  alt="Cancelar"> 
            </tr>
		</table>
	</div>  
	<table align="center" id="listaProfesores" name="listaProfesores"></table>
        </form>
	
	
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
