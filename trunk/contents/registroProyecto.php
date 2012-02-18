<?php 
if (!isset($_SESSION['profesor']) || ((isset($_SESSION['profesor'])) && !($_SESSION['profesor']))){
	include "contents/areaRestringida.php";
	echo '<script>';
	echo 'alert("No tiene permisos para acceder a esta area del sistema.");';
	//echo 'location.href="principal.php"';
	echo '</script>';
}else{
?>
<div id="main_column"><? //if (!isset ($_POST['acepto'])) header('Location:principal.php?content=previoSolicitud')?>
<div id="main_column">
	<div class="section_w701">
        <font size="6" face="Comic Sans MS,arial,verdana"><b>Agregar Proyecto: </b></font> 
    </div>       
<!--    <div class="margin_bottom_20"></div> -->
    
        <form name="formaProyecto" onSubmit="return validarProyecto();" method="post" action="acciones/registrarProyecto.php">
		<div class="section_w702">
		<table border="0">
			<tr> <td><font size="4" face="Comic Sans MS,arial,verdana"><b>Datos b&aacute;sicos: </b></font> </td></tr>
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
						<option value="<?php echo $matriz[$i]['id'];?>"> <?php echo 'Nro :['.$matriz[$i]['numero'].'] Nombre :['.$matriz[$i]['nombre'].']';?> </option>
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
                    <option value="<?php echo $matriz[$i]['nro']."$$".$matriz[$i]['nombreUnidadAdministrativa'];?>"> <?php echo 'Nro :['.$matriz[$i]['nro'].'] Email :['.$matriz[$i]['email'].'] Unidad : ['.$matriz[$i]['nombreUnidadAdministrativa'].']'; ?> </option>
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
        <font size="5" face="Comic Sans MS,arial,verdana"><b>Lista de clientes asociados al proyecto: </b></font> 
    </div>  
	<div class="section_w702">
		   <table border="0" id="tableCliente" width="100%">
		   		<tr><td align="center"><font size="4" face="Comic Sans MS,arial,verdana"><b>Datos del cliente: </b></font> </td>
					<td align="right" ><!--
						<h3>:
						<input type="button" onclick="deleteActividad(this.id)" id="1" name="eliminarActividad" value="  Eliminar actividad  " alt="Eliminar Actividad" class="submitbutton" title="Eliminar Actividad" >
						</h3>
						-->
						<IMG SRC="images/ICO/Symbol-Delete.ico" width="30" height="30" type="button" onclick="deleteCliente(this.id)" id="1" name="eliminarCliente" value="  Eliminar cliente  "  value=""  alt="Eliminar Actividad" class="submitbutton" title="Eliminar Actividad" onMouseOver="javascript:this.width=40;this.height=40"  onMouseOut="javascript:this.width=30;this.height=30">
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
                            </select>-<input title="Ingrese su n?mero de tel?fono" type="text" name="tlf[]" id="tlf[]" value="" maxlength="7" size="7" disabled="disabled" onkeypress="return onlyNumbers(event)"/>
                    </td>
            </tr>

            <tr>
                <td align="right" width=35.5%><LABEL for="rol"><b>Cargo:</b></LABEL> </td>
                <td width=64.5%><input title="Ingrese el rol" type="text" id="rol[]" name="rol[]" value="" onfocus="clearText(this)" onblur="clearText(this)"/></td>
            </tr>
			<tr><td align="center" colspan=2><h2></h2></td><td align="center" colspan=2><h2></h2></td></tr>		
        </table>
	</div>
		<div class="section_w701">
	<table width="58%"  border="0">
			<tr >
				<td align="center">
					<!--<input type="button" onclick="addActividad('tableActividad')" id="nuevaActividad[]" name="nuevaActividad[]" value="  Nueva actividad  " alt="nuevaActividad" class="submitbutton" title="Nueva Actividad" />
				-->
				<IMG SRC="images/ICO/Symbol-Add.ico" width="50" height="50" tname="nuevoCliente" type="button" onclick="addCliente('tableCliente')" class="submitbutton" value="  Nuevo Cliente  " title="Nuevo Cliente"  alt="nuevoCliente" onMouseOver="javascript:this.width=60;this.height=60"  onMouseOut="javascript:this.width=50;this.height=50"> 

				</td>
				
            </tr>
		</table>
	</div>
	<div class="section_w701">
        <font size="5" face="Comic Sans MS,arial,verdana"><b>Lista de profesores que podran ser evaluadores: </b></font> 
    </div>  
	<div class="section_w702">
	        <table border="0" id="tableProfesor" width="100%">
				<tr><td align="center"><font size="4" face="Comic Sans MS,arial,verdana"><b>Profesor : </b></font> </td>
					<td align="right" ><!--
						<h3>:
						<input type="button" onclick="deleteActividad(this.id)" id="1" name="eliminarActividad" value="  Eliminar actividad  " alt="Eliminar Actividad" class="submitbutton" title="Eliminar Actividad" >
						</h3>
						-->
						<IMG SRC="images/ICO/Symbol-Delete.ico" width="30" height="30" type="button" onclick="deleteProfesor(this.id)" id="1" name="eliminarProfesor" value="  Eliminar profesor  " alt="Eliminar Profesor" class="submitbutton" title="Eliminar Profesor" onMouseOver="javascript:this.width=40;this.height=40"  onMouseOut="javascript:this.width=30;this.height=30">
					</td>	
				</tr>
                <tr>
                    <td align="right" width=35.5%><LABEL for="usbid"><b>USBID:</b></LABEL>
                        </td>
							<td width=64.5%>
								<select name="usbid[]" id="usbid[]">
									<option value="" selected="selected"> -Seleccione- </option>				
									<?php 
									$matriz=$fachada->listarProfesores();
									if ($matriz!=null){
										$i=0;
										var_dump($matriz);
										while($i<sizeof($matriz)){
									?> 
										<option value="<?php echo $matriz[$i]['correoUSB'];?>"> <?php echo $matriz[$i]['nombre'].' '.$matriz[$i]['apellido']; ?> </option>
									<?php
										$i=$i+1;
										}
									}
									?>	
								</select>
					</td>
                </tr>
				<tr><td align="center" colspan=2><h2></h2></td><td align="center" colspan=2><h2></h2></td></tr>	
            </table>
	</div>
		<div class="section_w701">
	<table width="58%"  border="0">
			<tr >
				<td align="center">
					<!--<input type="button" onclick="addActividad('tableActividad')" id="nuevaActividad[]" name="nuevaActividad[]" value="  Nueva actividad  " alt="nuevaActividad" class="submitbutton" title="Nueva Actividad" />
				-->
				<IMG SRC="images/ICO/Symbol-Add.ico" width="50" height="50" name="nuevoCliente" type="button" onclick="addProfesor('tableProfesor')" class="submitbutton" value="  Nuevo Profesor  " title="Nuevo Profesor"  alt="nuevoCliente" onMouseOver="javascript:this.width=60;this.height=60"  onMouseOut="javascript:this.width=50;this.height=50"> 

				</td>
				
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
					 <input type="image" width="50" height="50" id="enviar" name="enviar" src="images/ICO/Save.ico" alt="Enviar" class="submitbutton" title="Enviar solicitud"  />
					<IMG SRC="images/ICO/Arrow-Right.ico" width="50" height="50" type="button" name="cancelar" value="Cancelar" alt="  Cancelar  " class="submitbutton" title="Cancelar" onclick="history.back(-2)" onMouseOver="javascript:this.width=60;this.height=60"  onMouseOut="javascript:this.width=50;this.height=50">
                </td>
            </tr>
		</table>
	</div>  
        </form>
        <h3> </h3>

   
	
    <div class="margin_bottom_20"></div>
    <div class="cleaner"></div>
</div> <!-- end of main column -->

<!-- end of side column 1 -->

<div class="side_column_w200">

    <!-- barra lateral -->

</div> <!-- end of right side column -->

<div class="cleaner"></div>
<?php  } ?>