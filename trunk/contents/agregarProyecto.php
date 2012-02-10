<? //if (!isset ($_POST['acepto'])) header('Location:principal.php?content=previoSolicitud')?>
<div id="main_column">

    <div class="section_w700">

        <h2>Agregar Proyecto</h2>

        <p><span class="em_text"><b>ATENCION : Por favor, rellene los siguientes campos, para completar 
                                    su solicitud. Todos los campos son obligatorios.</b></span></p>
        <h2> </h2>
    </div>        
<!--    <div class="margin_bottom_20"></div> -->

		<b> 
            Datos basicos:			
        </b>
		
    <div class="section_w700">
        <form name="formaProyecto" onSubmit="return validarProyecto();" method="post" action="acciones/agregarProyecto.php">
				<br>
				
        <table border="0">
            <tr>
                <td align="right" width=35.5%><LABEL for="project_name"><b>*Nombre del Proyecto:</b></LABEL> 
                    </td>
                    <td width=64.5%><input title="Ingrese el nombre del proyecto" value="" type="text" id="nombreProy" name="nombreProy" onfocus="clearText(this)" onblur="clearText(this)"/></td>
            </tr>

			<tr>
				<td align="right"><b>*Etapa inicial:</b>
                </td>
                <td align="left">
                <select id="etapa" name="etapa">
                    <option value="" selected="selected" > -Seleccione- </option>
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
				include_once "class/class.fachadainterfaz.php";
				$fachada = fachadaInterfaz::getInstance();
				$matriz=$fachada->listarSolicitud();
				if ($matriz!=null){
					$i=0;
					var_dump($matriz);
					while($i<sizeof($matriz)){
				?> 
                    <option value="<?php echo $matriz[$i]['nro']."$*$".$matriz[$i]['nombreUnidadAdministrativa'] ?>"> <?php echo 'Nro :['.$matriz[$i]['nro'].'] Email :['.$matriz[$i]['email'].'] Unidad : ['.$matriz[$i]['nombreUnidadAdministrativa'].']'; ?> </option>
				<?php
					$i=$i+1;
					}
				}
				?>	
                </select>
                </td>
            </tr>

        </table>
       <table border="0" id="tableCliente">
            <tr><td align="center"><h2></h2></td><td align="center"><h2></h2></td></tr>
            <h3> <tr>
                <td align="right"><LABEL for="cliente"><h3>Cliente:</h3> </LABEL> </td>
		<td>
                    <input type="button" onclick="deleteCliente(this.id)" id="1" name="eliminarCliente" value="  Eliminar cliente  "  value=""  alt="Eliminar Actividad" class="submitbutton" title="Eliminar Actividad" >
		</td>
            </tr> </h3>
            <tr>
                <td align="right" width=35.5%><LABEL for="participante"><b>*Nombre:</b></LABEL> 
                    </td>
                    <td width=64.5%><input title="Ingrese el nombre del cliente" type="text" id="nombre[]" name="nombre[]" onfocus="clearText(this)" onblur="clearText(this)"/></td>
            </tr>
            <tr>
                <td align="right" width=35.5%><LABEL for="participante"><b>*Apellido:</b></LABEL> 
                    </td>
                    <td width=64.5%><input title="Ingrese el apellido del cliente" type="text" id="apellido[]" name="apellido[]" value="" onfocus="clearText(this)" onblur="clearText(this)"/></td>
            </tr>
            <tr>
                <td align="right" width=35.5%><LABEL for="email"><b>*Correo:</b></LABEL> </td>
                <td width=64.5%><input title="Ingrese el correo electronico" type="text" id="email[]" name="email[]" value="ejemplo@usb.ve" onfocus="clearText(this)" onblur="clearText(this)"/></td>
            </tr>
			
            <tr>
                    <td align="right"><LABEL for="telefono" width=35.3%><b>*Telefono:</b></LABEL> </td>
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
                <td align="right" width=35.5%><LABEL for="rol"><b>*Cargo:</b></LABEL> </td>
                <td width=64.5%><input title="Ingrese el rol" type="text" id="rol[]" name="rol[]" value="" onfocus="clearText(this)" onblur="clearText(this)"/></td>
            </tr>
            <tr>
                <td> <input name="nuevoCliente" type="button" onclick="addCliente('tableCliente')" class="submitbutton" value="  Nuevo Cliente  " title="Nuevo Cliente"  alt="nuevoCliente"/> </td>
            </tr>
			
        </table>
  

        <br>
        <table border="0" id="tableProfesor">
                <tr>
                </tr>
                <h3>
                <tr>
                    <td align="right"><LABEL for="fecha"><h3>Profesor:</h3> </LABEL> </td>
                    <td>
                    <input type="button" onclick="deleteProfesor(this.id)" id="1" name="eliminarProfesor" value="  Eliminar profesor  " alt="Eliminar Profesor" class="submitbutton" title="Eliminar Profesor" >
                    </td>
                </tr>
                </h3>
                <tr>
                    <td align="right" width=35.5%><LABEL for="usbid"><b>*USBID:</b></LABEL>
                        </td>
                        <td width=64.5%><input title="Ingrese el USBID" type="text" id="usbid[]" name="usbid[]" onfocus="clearText(this)" value="ejemplo@usb.ve" onblur="clearText(this)"/></td>
                </tr>
                <tr>
                    <td> <input name="nuevoCliente" type="button" onclick="addProfesor('tableProfesor')" class="submitbutton" value="  Nuevo Profesor  " title="Nuevo Profesor"  alt="nuevoCliente"/> </td>
                </tr>
            </table>
			        <h3> </h3>
        <table border="0">
            
			<tr>
                    <td><input type="hidden" name="submitRegistration" value="true"/></td>
                    <td colspan="2">
                    <input type="submit" id="enviar" name="enviar" value="Enviar" alt="Enviar" class="submitbutton" title="Enviar solicitud" />
                    <input type="button" name="cancelar" value="Cancelar" alt="Cancelar" class="submitbutton" title="Cancelar" onclick="history.back(-2)" />
                    </td>
            </tr>

        </table>
		
        </form>
        <h3> </h3>

    </div>
	
    <div class="margin_bottom_20"></div>
    <div class="cleaner"></div>
</div> <!-- end of main column -->

<!-- end of side column 1 -->

<div class="side_column_w200">

    <!-- barra lateral -->

</div> <!-- end of right side column -->

<div class="cleaner"></div>

