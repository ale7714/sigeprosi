<?php 
if (!isset($_SESSION['profesor']) || ((isset($_SESSION['profesor'])) && !($_SESSION['profesor']))){
	include "contents/areaRestringida.php";
	echo '<script>';
	echo 'alert("No tiene permisos para acceder a esta \u00e1rea del sistema.");';
	//echo 'location.href="principal.php"';
	echo '</script>';
}else{
?>
<div id="main_column">

    <div class="section_w701">
        <font size="6" face="arial"><b>Agregar Planificaci&oacute;n de asignatura: </b></font> 
    </div>  	
<!--    <div class="margin_bottom_20"></div> -->

		
		 
    <!-- <div class="margin_bottom_20"></div>
	-->
    <form name="formaRegistroPlanificacion" onSubmit="return validarPlanificacion();" method="post" action="acciones/registrarPlanificacion.php">
	<div class="section_w702">
		<table border="0">

			<tr> <td><font size="4" face="arial"><b>Datos b&aacute;sicos: </b></font> </td></tr>

			<tr> <td><font size="2" face="arial"><b>Nota importante: </b>Todos los campos del formulario son obligatorios.</font> </td></tr>
		</table>
		<table border="0">
			<tr>
				<td align="right"><b>Etapa:</b>
                </td>
                <td align="left"><input value="" maxlength="7" onkeypress="return onlyNumbers(event)" title="Ingrese el numero de la planifcacion" type="text" id="numPlanif" name="numPlanif" onfocus="clearText(this)" onblur="clearText(this)"/>
                </td>
            </tr>
            <tr>
                <td align="right" width=35.5%><LABEL for="project_name"><b>Nombre:</b></LABEL></td>
                <td width=64.5%><input title="Ingrese el nombre de la planificacion" type="text" id="planificacion_name" name="planificacion_name" onfocus="clearText(this)" onblur="clearText(this)"/></td>
            </tr>
			
        </table>
	</div> 
	<div class="section_w701">
        <font size="5" face="arial"><b>Lista de actividades: </b></font> 
    </div>  
	<div class="section_w702">
		
        <table border="0" id="tableActividad">
		<tr><td align="center"><font size="4" face="arial"><b>Especificaciones de actividad: </b></font> </td>
		<td align="right" height="50px"><!--
			<h3>:
			<input type="button" onclick="deleteActividad(this.id)" id="1" name="eliminarActividad" value="  Eliminar actividad  " alt="Eliminar Actividad" class="submitbutton" title="Eliminar Actividad" >
			</h3>
			-->
			<IMG SRC="images/ICO/delete.png" width="30" height="30" type="button" onclick="deleteActividad(this.id)" id="eliminarActividad" name="eliminarActividad" alt="Eliminar Actividad" class="submitbutton" title="Eliminar Actividad" onMouseOver="javascript:this.width=35;this.height=35"  onMouseOut="javascript:this.width=30;this.height=30">
		</td>	
		</tr>
		<tr>
			<td align="right"><LABEL for="surname" ><b>Semana:</b></LABEL> </td>
			<td><select name="semana[]" id="semana-1">
					<option value="semana" selected="selected">Seleccione:</option>
					<option value="0">0</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
					<option value="13">13</option>
				</select>
			</td>
		</tr>
		<tr>
			<td align="right"><LABEL ><b>Nombre:</b></LABEL> </td>
			<td align="left">
			  <input type="text" id="nombreAct-1" name="nombreAct[]"/>
			  </td>
		</tr>
		<tr>
			<td align="right"><LABEL for="fecha"><b>Fecha:</b></LABEL> </td>
			<td align="left">
                            <input type="text" id="cal-field-1" value="Seleccione ->" readonly name="fecha[]"/>
                            
                            <IMG SRC="images/ICO/calendar.png" width="35" height="35" type="button" id="cal-button-1" name="calendario[]" alt="Calendario" class="submitbutton" title="Calendario">
                        </td>
		</tr>
            <tr>
                <td align="right"><LABEL for="surname"><b>Ponderaci&oacute;n:</b></LABEL> :</td>
                           <td><input title="Ingrese un numero aproximado" type="text" name="puntos[]" id="puntos-1" value="" maxlength="2" onkeypress="return onlyNumbers(event)" onblur="totalizarPonderacion()"/></td>
            </tr>
            <tr>
                <td align="right"><LABEL for="surname"><b>Descripci&oacute;n:</b><br/>(Max. 500 caracteres)</LABEL></td>
                    <td><textarea  name="descripcion[]" id="descripcion-1" title="Ingrese toda la informaci�n referente al problema" rows="10" cols="40" onkeypress="return contadorCaracteres(event)"></textarea></td>
            </tr>
			<tr><td align="center" colspan=2><h2></h2></td><td align="center" colspan=2><h2></h2></td></tr>
		</table>
	</div> 
	<div class="section_w701">
	<table width="62%" border="0">
			<tr >
				<td align="center" height="70px">
					<!--<input type="button" onclick="addActividad('tableActividad')" id="nuevaActividad[]" name="nuevaActividad[]" value="  Nueva actividad  " alt="nuevaActividad" class="submitbutton" title="Nueva Actividad" />
				-->
				<IMG SRC="images/ICO/new_activity.png" width="50" height="50" type="button" onclick="addActividad('tableActividad')" id="nuevaActividad[]" name="nuevaActividad[]" alt="Nueva Actividad" class="submitbutton" title="Nueva Actividad" onMouseOver="javascript:this.width=60;this.height=60"  onMouseOut="javascript:this.width=50;this.height=50"> 

				</td>
				
            </tr>
	</table>
	</div>
	<div class="section_w702">
		<table border="0">
			<tr> <td><font size="4" face="arial"><b>Ponderacion total de la planificaci&oacute;n: </b></font> </td></tr>
		</table>
		<table border="0" width="100%">
		<tr>
			<td align="right" width=42%><b>Total:</b>
                        </td>
                        <td align="left" width=58%><input value="0" readonly maxlength="2" onkeypress="return onlyNumbers()" title="Ingrese el numero de la planifcacion" type="text" id="totalPond" name="totalPond" />
                        </td>
                </tr>
			
        </table>
	</div>
	<div class="section_w701">
		<table border="0"  width="62%" id="tableOperaciones">
		<tr>
                <td  colspan="2" >
					<input type="hidden" name="submitRegistration" value="true"/>
					<input type="image" width="50" height="50" id="enviar" name="enviar" src="images/ICO/guardar.png" alt="Crear Planificacion" class="submitbutton" title="Crear Planificacion"  />
                                        <IMG SRC="images/ICO/cancel.png" name="cancel" id="cancel" width="50" height="50" tname="Cancelar" type="button" onclick='location.href="?content=gestionarPlanificacion"' class="submitbutton" value="Cancelar" title="Cancelar"  alt="Cancelar"> 
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
