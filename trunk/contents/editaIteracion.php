<?php 
if ((!isset($_SESSION['coordinador']) || ((isset($_SESSION['coordinador'])) && !($_SESSION['coordinador']))) &&
	(!isset($_SESSION['profesor']) || ((isset($_SESSION['profesor'])) && !($_SESSION['profesor'])))){
	include "contents/areaRestringida.php";
	echo '<script>';
	echo 'alert("No tiene permisos para acceder a esta area del sistema.");';
	//echo 'location.href="principal.php"';
	echo '</script>';
}else{
		include_once "class/class.fachadainterfaz.php";
		$fachada = fachadaInterfaz::getInstance();
		$matriz=$fachada->consultarIteracionNombre($_GET['nombre']);
		if ($matriz['estado']== 1){
			include "contents/areaRestringida.php";
			echo '<script>';
			echo 'alert("Iteracion ya aprobada, no puede editar esta iteracion.");';
			echo 'history.back();';
			echo '</script>';
		}else{
		//$nActividades=sizeof($matriz['actividades']);
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
  $("#CUGrid").jqGrid({
    url: <?php echo "'acciones/cargarCasoDeUsoEquipo.php?Equipo=".$matriz['idEquipo']."'"?>,
    datatype: 'xml',
    mtype: 'GET',
    colNames:['id','Nombre','completitud'],
    colModel :[ 
	{name:'id', index:'id', width:50}, 
      {name:'nombre', index:'nombre', width:300}, 
	  //{name:'descripcion', index:'descripcion', width:120}, 
	  {name:'completitud', index:'completitud', width:150, align:'right'}, 
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
    
        <form name="formaIteracion" onSubmit="" method="post" action="acciones/editarIteracion.php">
		<div class="section_w702">
		<table border="0">
			<tr> <td><font size="4" face="arial"><b>Datos b&aacute;sicos: </b></font> </td></tr>
			<tr> <td><font size="2" face="arial"><b>Nota importante: </b>Todos los campos del formulario son obligatorios.</font> </td></tr>
		</table>
        <table border="0">
            <tr>
                <td align="right" width=35.5%><LABEL for="project_name"><b>Nombre de la Iteraci&oacute;n:</b></LABEL> 
                </td>
                <td width=64.5%><input title="Ingrese el nombre de la iteracion" type="text" value="<?php echo $matriz['nombre'];?>" id="nombreIter" name="nombreIter" onfocus="clearText(this)" onblur="clearText(this)"/>
				<input title="Ingrese el nombre de la iteracion" type="hidden" value="<?php echo $matriz['id'];?>" id="nombreIterA" name="nombreIterA" onfocus="clearText(this)" onblur="clearText(this)"/>
				<input type="hidden" id="equipo" value="<?php echo $_SESSION["Equipo"];?>"  name="equipo"/>
				</td>
            </tr>

			<tr>
				<td align="right"><b>Tipo:</b>
                </td>
                <td align="left">
                <select id="tipoIteracion" name="tipoIteracion">
                   
					<option value="Incepcion" <?php if ($matriz['tipo']== "Incepci&oacute;n") echo 'selected="selected"';?>> Incepci&oacute;n </option>
					<option value="Elaboracion" <?php if ($matriz['tipo']== "Elaboraci&oacute;n") echo 'selected="selected"';?>> Elaboraci&oacute;n </option>
					<option value="Construccion" <?php if ($matriz['tipo']== "Construcci&oacute;n") echo 'selected="selected"';?>> Construcci&oacute;n </option>
					<option value="Transicion" <?php if ($matriz['tipo']== "Transici&oacute;n") echo 'selected="selected"';?>> Transici&oacute;n </option>
                </select>
                </td>
            </tr>
	<?php if (isset($_SESSION['profesor']) && ($_SESSION['profesor'])){ ?>
			<tr>
				<td align="right"><b>Estatus:</b>
                </td>
                <td align="left">
                <select id="estatus" name="estatus">
                   
					<option value="Iniciada" <?php if ($matriz['estado']== 0) echo 'selected="selected"';?>> Planificada </option>
					<option value="Aprobada" <?php if ($matriz['estado']== 1) echo 'selected="selected"';?>> Aprobada </option>
					<option value="Cerrada" <?php if ($matriz['estado']== 2) echo 'selected="selected"';?>> Iniciada </option>
                </select>
                </td>
            </tr>		
	<?php }?>

        </table>
	</div> 
	<div class="section_w701">
        <font size="5" face="arial"><b>Artefactos Impactados: </b></font> 
    </div>  
	<?php
		include_once "class/class.fachadainterfaz.php";
        include_once "class/class.Elemento.php";
		$fachada = fachadaInterfaz::getInstance();
		$elementos = $fachada->consultarCatalogo("Artefactos");
	?>
	<div class="section_w702">
		   <table align="center"  border="0" id="tablaArtefactos" width="100%" >
		   	<?php foreach ($elementos as $elemento){	?>
						<tr>
						<td width="60%"><font size="3" face="arial"><b><?php echo $elemento[0]->get("nombre"); ?> </b></font>
						</td>
						<td align="left">
							<input type="checkbox" name="artefactos[]" value="<?php echo $elemento[0]->get("id"); ?>"  <?php foreach ($matriz['artefactos'] as $atributo) if ($atributo == $elemento) echo 'checked';?>>
						</td>
						</tr>
			<?php 	}?>
			</table>
	</div>

	<div class="section_w701">
        <font size="5" face="arial"><b>Objetivos: </b></font> 
    </div>  
	<div class="section_w702">
		   <table border="0" id="tableCliente" width="100%">
		   		<tr>
					<td align="center">
						<textarea id="objetivos" name="objetivos" rows="6" cols="40"> <?php echo $matriz['objetivos'];?></textarea> 
					</td>	
				</tr>
        </table>
	</div>
	
	
		<div class="section_w701">
        <font size="5" face="arial"><b>Lista de actividades: </b></font> 
    </div>  
	<div class="section_w702">
		<table border="1" id="tableActividad">	
			<?php $i =0; foreach ($matriz['actividades'] as $atributo){?>
			<tr>
				<td>
					<table border="0" id="tableActividad<?php echo ($i/2)+1; ?>" >
						<tr>
							<td align="center"><font size="4" face="arial"><b>Especificaciones de actividad: </b></font> </td>
							<td align="right" >
								<IMG SRC="images/ICO/Symbol-Delete.ico" width="30" height="30" type="button" onclick="deleteActividadIteracion(this.id)" <?php if(($i/2)+1 == 1) {echo 'id="eliminarActividad"';} else {echo 'id="'.(($i/2)+1).'"';}?> name="eliminarActividad" alt="Eliminar Actividad" class="submitbutton" title="Eliminar Actividad" onMouseOver="javascript:this.width=40;this.height=40"  onMouseOut="javascript:this.width=30;this.height=30">
							</td>	
						</tr>
						<tr>
							<td align="right"><LABEL ><b>Nombre:</b></LABEL> </td>
							<td align="left">
							  <input type="text" id="nombreAct-<?php echo ($i/2)+1; ?>" value="<?php echo $atributo['nombre'];?>"  name="nombreAct[]"/>
							  
							  <input type="text" id="nEstudiantes-<?php echo ($i/2)+1; ?>" value="0"  hidden="true" name="nEstudiantes[]"/>
							</td>
						</tr>
						<tr>
							<td align="right"><LABEL for="surname"><b>Descipci&oacute;n:</b></LABEL></td>
							<td><input title="Ingrese un numero aproximado" type="text" name="descripcion[]" id="puntos-<?php echo ($i/2)+1; ?>" value="<?php echo $atributo['descripcion'];?>"/></td>
						</tr>
						<tr>
							<td align="right"><LABEL for="fecha"><b>Fecha de Inicio:</b></LABEL> </td>
							<td align="left">
							<IMG SRC="images/ICO/Calendar.ico" width="35" height="35" type="button" id="cal-button-<?php echo $i+2; ?>" name="calendario[]" alt="Calendario" class="submitbutton" title="Calendario" onMouseOver="javascript:this.width=40;this.height=40"  onMouseOut="javascript:this.width=35;this.height=35">					
							<input type="text" id="cal-field-<?php echo $i+2; ?>" value="<?php echo $atributo['fechaInicio'];?>" readonly name="fechaInicio[]"/>
							</td>
						</tr>
						<tr>
							<td align="right"><LABEL for="fecha"><b>Fecha de Fin:</b></LABEL> </td>
							<td align="left">
								<IMG SRC="images/ICO/Calendar.ico" width="35" height="35" type="button" id="cal-button-<?php echo $i+1; ?>" name="calendario[]" alt="Calendario" class="submitbutton" title="Calendario" onMouseOver="javascript:this.width=40;this.height=40"  onMouseOut="javascript:this.width=35;this.height=35">
								<input type="text" id="cal-field-<?php echo $i+1; ?>" value="<?php echo $atributo['fechaFin'];?>" readonly name="fechaFin[]"/>
							</td>
						</tr>
						
					</table>
				</td>
			</tr>
			<tr>
				<td>
					<table align="center">
						<tr>
							<td>
								<table id="usuariosGrid-<?php echo ($i/2)+1; ?>" name="usuariosGrid-<?php echo ($i/2)+1; ?>">
									<tr>
										<td>
										<td/>
									</tr>
								</table>
								<div id="usuariosPager-<?php echo ($i/2)+1; ?>" name="usuariosPager-<?php echo ($i/2)+1; ?>"></div> 
								<p></p>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		<?php $i=$i+2;}?>
		</table>
	</div> 
	<div class="section_w701">
		<table width="58%"  border="0">
			<tr >
				<td align="center">
					<IMG SRC="images/ICO/Symbol-Add.ico" width="50" height="50" type="button" onclick="addActividadIteracion('tableActividad')" id="nuevaActividad[]" name="nuevaActividad[]" alt="Nueva Actividad" class="submitbutton" title="Nueva Actividad" onMouseOver="javascript:this.width=60;this.height=60"  onMouseOut="javascript:this.width=50;this.height=50"> 
				</td>
            </tr>
		</table>
	</div>
	<div class="section_w701">
        <font size="4" face="arial"><b>Productos: </b></font> 
    </div>  
	<div class="section_w702">
		<font size="4" face="arial"><b>Casos de uso: </b></font> 
        <table align="center">
			<tr>
				<td>
					<table id="CUGrid">
						<tr>
							<td><td/>
						</tr>
					</table>
					<div id="CUPager"></div> 
					<p></p>
				</td>
			</tr>	
		</table>
		<font size="4" face="arial"><b>Otros: </b></font> 
		<table border="0" id="tablePE" width="60%" align="center">	
        </table>
		<table width="58%"  border="0">
			<tr >
				<td align="center">
				<IMG SRC="images/ICO/Symbol-Add.ico" width="50" height="50" type="button" onclick="addProductoExtra('','tablePE','')" id="nuevaProducto[]" name="nuevaProducto[]" alt="Nuevo Producto" class="submitbutton" title="Nuevo Producto" onMouseOver="javascript:this.width=60;this.height=60"  onMouseOut="javascript:this.width=50;this.height=50"> 
				</td>
            </tr>
		</table>
	</div>
	<div class="section_w701">
        <font size="5" face="arial"><b>Criterios asociados a productos: </b></font> 
    </div>  
	<div class="section_w702">
		<table border="0" id="listaCriterios" width="80%">		
        </table>
	</div>
	<div class="section_w701">
		<table border="0"  width="62%" id="tableOperaciones">
			<tr>
                <td  colspan="2" >
					<input type="hidden" name="submitRegistration" value="true"/>
					<input type="image" width="50" height="50" id="enviar" name="enviar" src="images/ICO/Save.ico" alt="Enviar" class="submitbutton" title="Enviar solicitud" onMouseOver="javascript:this.width=60;this.height=60"  onMouseOut="javascript:this.width=50;this.height=50"/> 
				</td>
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
<?php  }} ?>