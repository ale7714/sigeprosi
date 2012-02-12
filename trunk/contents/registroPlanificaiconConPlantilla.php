<?php 
	include_once "class/class.fachadainterfaz.php";
	$nro = $_GET['numero'];
	$nombre = $_GET['nombre'];
	$fachada = fachadaInterfaz::getInstance();
	$planificacion = $fachada->consultarplanificacion($nombre,$nro);
	$actividades = $fachada->cargarActividades($planificacion['id']);

	//$status = $solicitud["estado"];
?>
<div id="main_column">

    <div class="section_w701">

        <font size="6" face="Comic Sans MS,arial,verdana"><b>Editar Planificaci&oacute;n de asignatura:</b></font> 


        <p><b> 
        </b></p>
    </div>  	
<!--    <div class="margin_bottom_20"></div> 

		<b> 
            Datos basicos:			
        </b>
		 
    <div class="margin_bottom_20"></div>
-->
	<form name="formaRegistroPlanificacion" onSubmit="return validarPlanificacion();" method="post" action="acciones/registrarPlanificacion.php">
    <div class="section_w702">
        
		<table border="0">
			<tr> <td><font size="4" face="Comic Sans MS,arial,verdana"><b>Datos b&aacute;sicos: </b></font> </td></tr>
		</table>
		<table border="0">
            <tr>
                <td align="right" width=35.5%><LABEL for="project_name"><b>Nombre de la planificaci&oacute;n:</b></LABEL> 
                    </td>
                    <td width=64.5%><input value="" title="Ingrese el nombre de la planificacion" type="text" id="planificacion_name" name="planificacion_name" /></td>
					<td width=64.5%><input type="text" hidden="true" value="<?php echo $planificacion['nombre']; ?>" name="planificacion_name_V"/></td>
            </tr>

			<tr>
			    <!-- Cuales son las opciones de etapa inicial? --- ATENCION -->
				<td align="right"><b>Etapa:</b>
                </td>
                <td align="left"><input value="<?php echo $planificacion['numero']; ?>" maxlength="7" onkeypress="return onlyNumbers(event)" title="Ingrese el numero de la planifcacion" type="text" id="numPlanif" name="numPlanif" />
				<td align="left"><input hidden="true" value="<?php echo $planificacion['numero']; ?>" type="text" name="numPlanif_V"/>
                </td>
            </tr>
        </table>
	</div>
	<div class="section_w701">
        <font size="5" face="Comic Sans MS,arial,verdana"><b>Actividades: </b></font> 
    </div>
    <div class="section_w702">
        <table border="0" id="tableActividad">
		<?php 
		$i=1;
		foreach ($actividades as $actividad){
		?>
		<tr><td align="center"><font size="4" face="Comic Sans MS,arial,verdana"><b>Especificaciones de actividad: </b></font> </td>
		<td>
			
			<IMG SRC="images/ICO/Symbol-Delete.ico" width="30" height="30" type="button" onclick="deleteActividad(this.id)" id="eliminarActividad" name="eliminarActividad" alt="Eliminar Actividad" class="submitbutton" title="Eliminar Actividad" onMouseOver="javascript:this.width=40;this.height=40"  onMouseOut="javascript:this.width=30;this.height=30">
		</td>	
		</tr>
		<tr>
			<td align="right"><LABEL for="surname" ><b>Semana:</b></LABEL> </td>
			<td><select name="semana[]" id="semana-1" Onblur="estaVacio(this);">
					<option value="semana" >Seleccione:</option>
					<option value="0" <?php if ($actividad['semana']== 0) echo 'selected="selected"'; ?>>0</option>
					<option value="1" <?php if ($actividad['semana']== 1) echo 'selected="selected"'; ?>>1</option>
					<option value="2" <?php if ($actividad['semana']== 2) echo 'selected="selected"'; ?>>2</option>
					<option value="3" <?php if ($actividad['semana']== 3) echo 'selected="selected"'; ?>>3</option>
					<option value="4" <?php if ($actividad['semana']== 4) echo 'selected="selected"'; ?>>4</option>
					<option value="5" <?php if ($actividad['semana']== 5) echo 'selected="selected"'; ?>>5</option>
					<option value="6" <?php if ($actividad['semana']== 6) echo 'selected="selected"'; ?>>6</option>
					<option value="7" <?php if ($actividad['semana']== 7) echo 'selected="selected"'; ?>>7</option>
					<option value="8" <?php if ($actividad['semana']== 8) echo 'selected="selected"'; ?>>8</option>
					<option value="9" <?php if ($actividad['semana']== 9) echo 'selected="selected"'; ?>>9</option>
					<option value="10" <?php if ($actividad['semana']==10) echo 'selected="selected"'; ?>>10</option>
					<option value="11" <?php if ($actividad['semana']== 11) echo 'selected="selected"'; ?>>11</option>
					<option value="12" <?php if ($actividad['semana']== 12) echo 'selected="selected"'; ?>>12</option>
					<option value="13" <?php if ($actividad['semana']== 13) echo 'selected="selected"'; ?>>13</option>
				</select>
			</td>
		</tr>
		<tr>
			<td align="right"><LABEL ><b>Nombre:</b></LABEL> </td>
			<td align="left">
			  <input type="text" id="nombreAct-1" value="<?php echo $actividad['nombre']; ?>"  name="nombreAct[]"/>
			  </td>
		</tr>
		<tr>
			<td align="right"><LABEL for="fecha"><b>Fecha:</b></LABEL> </td>
			<td style="vertical-align: top; text-align: left;">
			<IMG SRC="images/ICO/Calendar.ico" width="35" height="35" type="button" id="cal-button-<?php echo $i;?>" name="calendario[]" alt="Calendario" class="submitbutton" title="Calendario" onMouseOver="javascript:this.width=40;this.height=40"  onMouseOut="javascript:this.width=35;this.height=35">
			<input type="text" id="cal-field-<?php echo $i;?>" value="<?php echo $actividad['fecha'];?>" readonly name="fecha[]"/>
			  <!--button type="button" id="cal-button-1" name="calendario[]">...</button>-->
			  <script type="text/javascript">
				nuevoCalendario(<?php echo $i;?>);
			  </script>
			  
			</td>
		</tr>
            <tr>
                <td align="right"><LABEL for="surname"><b>Ponderaci&oacute;n:</b></LABEL> :</td>
                           <td><input title="Ingrese un numero aproximado" type="text" name="puntos[]" id="puntos-<?php echo $i;?>" value="<?php echo $actividad['puntos'];?>" maxlength="7" onkeypress="return onlyNumbers(event)"/></td>
						   <td><input hidden="true" name="id[]" value="<?php echo $actividad['id'];?>" /></td>
            </tr>
            <tr>
                <td align="right"><LABEL for="surname"><b>Descripci&oacute;n:</b><br/>(Max. 500 caracteres)</LABEL></td>
                    <td><textarea  name="descripcion[]" id="descripcion-1" title="Ingrese toda la informaci?n referente al problema" rows="10" cols="40" onkeypress="return contadorCaracteres(event)"><?php echo $actividad['descripcion'];?></textarea></td>
            </tr>
			<tr><td align="center" colspan=2><h2></h2></td></tr>
			<?php $i++;} 
			echo '<script type="text/javascript">';
			echo	'setId('.$i.');';
			 echo '</script>';
			?>
			
		
			<!--tr >
				<td align="left">
					<input type="button" onclick="addActividad('tableActividad')" id="nuevaActividad[]" name="nuevaActividad[]" value="  Nueva actividad  " alt="nuevaActividad" class="submitbutton" title="Nueva Actividad" />
				</td>
				<td  ></td  >
            </tr-->
		</table>
    </div>
	<div class="section_w701">
	<table width="58%"  border="0">
			<tr >
				<td align="center">
					<!--<input type="button" onclick="addActividad('tableActividad')" id="nuevaActividad[]" name="nuevaActividad[]" value="  Nueva actividad  " alt="nuevaActividad" class="submitbutton" title="Nueva Actividad" />
				-->
				<IMG SRC="images/ICO/Symbol-Add.ico" width="50" height="50" type="button" onclick="addActividad('tableActividad')" id="nuevaActividad[]" name="nuevaActividad[]" alt="Nueva Actividad" class="submitbutton" title="Nueva Actividad" onMouseOver="javascript:this.width=60;this.height=60"  onMouseOut="javascript:this.width=50;this.height=50"> 

				</td>
				
            </tr>
		</table>
	</div>
	
	<div class="section_w702">
		<table border="0">
			<tr> <td><font size="4" face="Comic Sans MS,arial,verdana"><b>Ponderacion total de la planificaci&oacute;n: </b></font> </td></tr>
		</table>
		<table border="0" width="100%">
			<tr>
				<td align="right" width=42%><b>Total:</b>
                </td>
                <td align="left" width=58%><input value="0" maxlength="7" onkeypress="return onlyNumbers(event)" title="Ingrese el numero de la planifcacion" type="text" id="totalPond" name="totalPond" />
                </td>
            </tr>
			
        </table>
	</div>
	<script>totalizarPonderacion();</script>
	<div class="section_w701">
		<table width="60%"  border="0">
			<tr >
                <td  colspan="2" >
                    <!--input type="submit" id="enviar" name="enviar" value="  Agregar  " alt="Enviar" class="submitbutton" title="Enviar solicitud" />
                    <input type="button" name="cancelar" value="Cancelar" alt="  Cancelar  " class="submitbutton" title="Cancelar" onclick="history.back(-2)" />
                    <input type="hidden" name="submitRegistration" value="true"/-->
					
					<input type="hidden" name="submitRegistration" value="true"/>
					<input type="image" width="50" height="50" id="enviar" name="enviar" src="images/ICO/Save.ico" alt="Enviar" class="submitbutton" title="Enviar solicitud"  />
					<IMG SRC="images/ICO/Arrow-Right.ico" width="50" height="50" type="button" name="cancelar" value="Cancelar" alt="  Cancelar  " class="submitbutton" title="Cancelar" onclick="history.back(-2)" onMouseOver="javascript:this.width=60;this.height=60"  onMouseOut="javascript:this.width=50;this.height=50">
					
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

    <!-- barra lateral -->

</div> <!-- end of right side column -->

<div class="cleaner"></div>