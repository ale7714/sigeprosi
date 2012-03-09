<?php 
// if (!isset($_SESSION['profesor']) || ((isset($_SESSION['profesor'])) && !($_SESSION['profesor']))){
	// include "contents/areaRestringida.php";
	// echo '<script>';
	// echo 'alert("No tiene permisos para acceder a esta area del sistema.");';
	// echo 'location.href="principal.php"';
	// echo '</script>';
// }else{
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
<script src="jscripts/js/i18n/grid.locale-en.js" type="text/javascript"></script>
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
			addElementInput('profesores','listaProfesores',val['correoUSB']);
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
        <font size="6" face="arial"><b>Agregar Iteraci&oacute;n: </b></font> 
    </div>       
<!--    <div class="margin_bottom_20"></div> -->
    
        <form name="formaIteracion" onSubmit="" method="post" action="acciones/registrarIteracion.php">
		<div class="section_w702">
		<table border="0">
			<tr> <td><font size="4" face="arial"><b>Datos b&aacute;sicos: </b></font> </td></tr>
			<tr> <td><font size="2" face="arial"><b>Nota importante: </b>Todos los campos del formulario son obligatorios.</font> </td></tr>
		</table>
        <table border="0">
            <tr>
                <td align="right" width=35.5%><LABEL for="project_name"><b>Nombre de la Iteraci&oacute;n:</b></LABEL> 
                </td>
                <td width=64.5%><input title="Ingrese el nombre de la iteracion" type="text" id="nombreIter" name="nombreIter" onfocus="clearText(this)" onblur="clearText(this)"/>
				</td>
            </tr>

			<tr>
				<td align="right"><b>Tipo:</b>
                </td>
                <td align="left">
                <select id="tipo" name="tipo">
                    <option value="" selected="selected" > -Seleccione- </option>
					<option value="Incepcion"> Incepci&oacute;n </option>
					<option value="Incepcion"> Elaboraci&oacute;n </option>
					<option value="Incepcion"> Construcci&oacute;n </option>
					<option value="Incepcion"> Transici&oacute;n </option>
                </select>
                </td>
            </tr>

        </table>
	</div> 
	<div class="section_w701">
        <font size="5" face="arial"><b>Artefactos Impactados: </b></font> 
    </div>  
	<div class="section_w702">
		   <table border="0" id="tableCliente" width="100%">
		   		<tr><td align="center"><textarea width="100" height="100"></textarea> </td>
					<td align="right" ><!--
						<h3>:
						<input type="button" onclick="deleteActividad(this.id)" id="1" name="eliminarActividad" value="  Eliminar actividad  " alt="Eliminar Actividad" class="submitbutton" title="Eliminar Actividad" >
						</h3>
						-->
						<IMG SRC="images/ICO/delete.png" width="30" height="30" type="button" onclick="deleteCliente(this.id)" id="1" name="eliminarCliente" value="  Eliminar cliente  "  value=""  alt="Eliminar Actividad" class="submitbutton" title="Eliminar Cliente" onMouseOver="javascript:this.width=40;this.height=40"  onMouseOut="javascript:this.width=30;this.height=30">
					</td>	
				</tr>
				<!--tr>
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
            </tr-->

			<tr><td align="center" colspan=2><h2></h2></td><td align="center" colspan=2><h2></h2></td></tr>		
        </table>
	</div>
	<div class="section_w701">
		<table width="58%"  border="0">
			<tr >
				<td align="center">
					<!--<input type="button" onclick="addActividad('tableActividad')" id="nuevaActividad[]" name="nuevaActividad[]" value="  Nueva actividad  " alt="nuevaActividad" class="submitbutton" title="Nueva Actividad" />
				-->
				<IMG SRC="images/ICO/add.png" width="50" height="50" tname="nuevoCliente" type="button" onclick="addCliente('tableCliente')" class="submitbutton" value=" Agregar Nuevo Cliente  " title="Nuevo Cliente"  alt="nuevoCliente"> 

				</td>
				
            </tr>
		</table>
	</div>
	<div class="section_w701">
        <font size="5" face="arial"><b>Objetivos: </b></font> 
    </div>  
	<div class="section_w702">
		   <table border="0" id="tableCliente" width="100%">
		   		<tr><td align="center"><textarea width="100" height="100"></textarea> </td>	
				</tr>
				
			<tr><td align="center" colspan=2><h2></h2></td><td align="center" colspan=2><h2></h2></td></tr>		
        </table>
	</div>
	<div class="section_w701">
		<table border="0"  width="62%" id="tableOperaciones">
			<tr>
				<td colspan="2"><input type="image" src="images/ICO/delete.png" width="50" height="50" name="cancelar" alt="  Cancelar  " class="submitbutton" title="Cancelar" onclick="history.back(-2)" />
				</td>
                <td  colspan="2" >
					<!--
                    <input type="submit" id="enviar" name="enviar" value="  Agregar  " alt="Enviar" class="submitbutton" title="Enviar solicitud" /-->
                    
					<!--IMG SRC="images/ICO/Save.ico" width="50" height="50" type="submit" id="enviar" name="enviar" value="  Agregar  " alt="Enviar" class="submitbutton" title="Enviar solicitud">
                    -->
					<input type="hidden" name="submitRegistration" value="true"/>
					<input type="image" width="50" height="50" id="enviar" name="enviar" src="images/ICO/Arrow-Right.png" alt="Enviar" class="submitbutton" title="Enviar solicitud" onMouseOver="javascript:this.width=60;this.height=60"  onMouseOut="javascript:this.width=50;this.height=50"> 
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
    if (isset($_SESSION['admin']))
        include 'sidebars/barraEnSesion.php';
    else
        include 'sidebars/barraInicioSesion.php';
    ?>
    <!-- barra lateral -->

</div> <!-- end of right side column -->

<div class="cleaner"></div>
<?php  } ?>