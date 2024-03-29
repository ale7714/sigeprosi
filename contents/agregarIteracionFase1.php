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
    font-size: 75%;
}
</style>

<script src="jscripts/js/jquery-1.5.2.min.js" type="text/javascript"></script>
<script src="jscripts/js/i18n/grid.locale-es.js" type="text/javascript"></script>
<script src="jscripts/js/jquery.jqGrid.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){ 
  $("#CUGrid").jqGrid({
    url:'acciones/cargarUsuariosEstudiantes.php',
    datatype: 'xml',
    mtype: 'GET',
    colNames:['Nombre','Pertenece'],
    colModel :[ 
      {name:'nombre', index:'nombre', width:120}, 
	  {name:'pertenece', index:'pertenece', width:120, align:'right'}, 
    ],
    pager: '#CUPager',
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
		if (val['pertenece']=='No') {	
			jQuery(this).setCell(id,'pertenece','Si',false,false, false);
			addElementInput('estudiantes','listaEstudiantes',val['correoUSB'],val['correoUSB'])
		} else {
			jQuery(this).setCell(id,'pertenece','No',false,false, false);
			eliminarElemento(val['correoUSB']);
		}
	},
    caption: 'Casos de uso',
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
		   <table border="0" id="tableCliente" width="100%" >
		   		<tr><td align="center"><textarea rows="10" cols="40"></textarea> </td>

				</tr>
			<!--<tr><td align="center" colspan=2><h2></h2></td><td align="center" colspan=2><h2></h2></td></tr>	
-->			
        </table>
	</div>
	<!--
	<div class="section_w701">
		<table width="58%"  border="0">
			<tr >
				<td align="center">
				<IMG SRC="images/ICO/add.png" width="50" height="50" tname="nuevoCliente" type="button" onclick="addCliente('tableCliente')" class="submitbutton" value=" Agregar Nuevo Cliente  " title="Nuevo Cliente"  alt="nuevoCliente"> 

				</td>
				
            </tr>
		</table>
	</div>
	-->
	<div class="section_w701">
        <font size="5" face="arial"><b>Objetivos: </b></font> 
    </div>  
	<div class="section_w702">
		   <table border="0" id="tableCliente" width="100%">
		   		<tr><td align="center"><textarea rows="10" cols="40"></textarea> </td>	
				</tr>
				
			<!--<tr><td align="center" colspan=2><h2></h2></td><td align="center" colspan=2><h2></h2></td></tr>		
			-->
        </table>
	</div>
	
	
		<div class="section_w701">
        <font size="5" face="arial"><b>Lista de actividades: </b></font> 
    </div>  
	<div class="section_w702">
		<table border="1" id="tableActividad">
		<tr><td>
        <table border="1" id="tableActividad1">
		<tr><td align="center"><font size="4" face="arial"><b>Especificaciones de actividad: </b></font> </td>
		<td align="right" ><!--
			<h3>:
			<input type="button" onclick="deleteActividad(this.id)" id="1" name="eliminarActividad" value="  Eliminar actividad  " alt="Eliminar Actividad" class="submitbutton" title="Eliminar Actividad" >
			</h3>
			-->
			<IMG SRC="images/ICO/Symbol-Delete.ico" width="30" height="30" type="button" onclick="deleteActividad(this.id)" id="eliminarActividad" name="eliminarActividad" alt="Eliminar Actividad" class="submitbutton" title="Eliminar Actividad" onMouseOver="javascript:this.width=40;this.height=40"  onMouseOut="javascript:this.width=30;this.height=30">
		</td>	
		</tr>
		<tr>
			<td align="right"><LABEL ><b>Nombre:</b></LABEL> </td>
			<td align="left">
			  <input type="text" id="nombreAct-1" value=""  name="nombreAct[]"/>
			  <input type="text" id="nEstudiantes-1" value="0"  hidden="true" name="nEstudiantes[]"/>
			  </td>
		</tr>
		<tr>
			<td align="right"><LABEL for="surname"><b>Descipci&oacute;n:</b></LABEL></td>
			   <td><input title="Ingrese un numero aproximado" type="text" name="puntos[]" id="puntos-1" value="" maxlength="2" onkeypress="return onlyNumbers(event)" onblur="totalizarPonderacion()"/></td>
		</tr>
		
		<tr>
			<td align="right"><LABEL for="fecha"><b>Fecha de Inicio:</b></LABEL> </td>
			<td align="left">
			  
			  <!--<button type="button" id="cal-button-1" name="calendario[]">...</button>
			  -->
			<IMG SRC="images/ICO/Calendar.ico" width="35" height="35" type="button" id="cal-button-2" name="calendario[]" alt="Calendario" class="submitbutton" title="Calendario" onMouseOver="javascript:this.width=40;this.height=40"  onMouseOut="javascript:this.width=35;this.height=35">

	
			<input type="text" id="cal-field-2" value="Seleccione ->" readonly name="fechaInicio[]"/>
			</td>
		</tr>
		<tr>
			<td align="right"><LABEL for="fecha"><b>Fecha de Fin:</b></LABEL> </td>
			<td align="left">
			  
			  <!--<button type="button" id="cal-button-1" name="calendario[]">...</button>
			  -->
			<IMG SRC="images/ICO/Calendar.ico" width="35" height="35" type="button" id="cal-button-1" name="calendario[]" alt="Calendario" class="submitbutton" title="Calendario" onMouseOver="javascript:this.width=40;this.height=40"  onMouseOut="javascript:this.width=35;this.height=35">

	
			<input type="text" id="cal-field-1" value="Seleccione ->" readonly name="fechaFin[]"/>
			</td>
		</tr>
		<!--
            <tr>
                <td align="right"><LABEL for="surname"><b>Descripci&oacute;n:</b><br/>(Max. 500 caracteres)</LABEL></td>
                    <td><textarea  name="descripcion[]" id="descripcion-1" title="Ingrese toda la informaci?n referente al problema" rows="10" cols="40" onkeypress="return contadorCaracteres(event)"></textarea></td>
            </tr>
			<tr><td align="center" colspan=2><h2></h2></td><td align="center" colspan=2><h2></h2></td></tr>
			-->
		<tr>
		</table>
		</td></tr>
		<tr><td>
		<table align="center">
			<tr><td><table id="usuariosGrid-1" name="usuariosGrid-1"><tr><td/></tr></table><div id="usuariosPager-1" name="usuariosPager-1"></div> <p></p></td></tr>
		</table>
		</td></tr>
		</table>
	</div> 
	<div class="section_w701">
	<table width="58%"  border="0">
			<tr >
				<td align="center">
					<!--<input type="button" onclick="addActividad('tableActividad')" id="nuevaActividad[]" name="nuevaActividad[]" value="  Nueva actividad  " alt="nuevaActividad" class="submitbutton" title="Nueva Actividad" />
				-->
				<IMG SRC="images/ICO/Symbol-Add.ico" width="50" height="50" type="button" onclick="addActividadIteracion('tableActividad')" id="nuevaActividad[]" name="nuevaActividad[]" alt="Nueva Actividad" class="submitbutton" title="Nueva Actividad" onMouseOver="javascript:this.width=60;this.height=60"  onMouseOut="javascript:this.width=50;this.height=50"> 

				</td>
				
            </tr>
		</table>
	</div>
	
	
		<div class="section_w701">
        <font size="4" face="arial"><b>Asociar Casos de uso: </b></font> 
    </div>  
	<div class="section_w702">
        <table align="center">
			<tr><td><table id="CUGrid"><tr><td/></tr></table><div id="CUPager"></div> <p></p></td>
			</tr>
		</table>
		
	</div>
	
	
	
		<div class="section_w701">
        <font size="5" face="arial"><b>Productos Extra: </b></font> 
    </div>  
	<div class="section_w702">
		   <table border="0" id="tablePE" width="100%">
		   		<tr><td align="center"><textarea rows="10" cols="40"></textarea> </td>	
				</tr>
				
			<!--<tr><td align="center" colspan=2><h2></h2></td><td align="center" colspan=2><h2></h2></td></tr>		
			-->
        </table>
	</div>
	
		<div class="section_w701">
        <font size="5" face="arial"><b>Criterios: </b></font> 
    </div>  
	<div class="section_w702">
		   <table border="0" id="tableCriterios" width="100%">
		   		<tr><td align="center"><textarea rows="10" cols="40"></textarea> </td>	
				</tr>
				
			<!--<tr><td align="center" colspan=2><h2></h2></td><td align="center" colspan=2><h2></h2></td></tr>		
			-->
        </table>
	</div>
	
	<div class="section_w701">
		<table border="0"  width="62%" id="tableOperaciones">
			<tr>
                <td  colspan="2" >
					<input type="hidden" name="submitRegistration" value="true"/>
					<input type="image" width="50" height="50" id="enviar" name="enviar" src="images/ICO/Save.ico" alt="Enviar" class="submitbutton" title="Enviar solicitud" onMouseOver="javascript:this.width=60;this.height=60"  onMouseOut="javascript:this.width=50;this.height=50"> 
            </tr>
		</table>
	</div>  
	<table align="center" id="listaEstudiantes" name="listaEstudiantes" border="0"></table>
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
