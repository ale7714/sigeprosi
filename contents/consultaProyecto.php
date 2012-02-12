<? //if (!isset ($_POST['acepto'])) header('Location:principal.php?content=previoSolicitud')?>
<div id="main_column">

    <div class="section_w700">

        <h2>Consultar Proyecto</h2>

        <p><span class="em_text"><b>ATENCION : Por favor, rellene los siguientes campos, para completar 
                                    su solicitud. Todos los campos son obligatorios.</b></span></p>
        <h2> </h2>
    </div>        
<!--    <div class="margin_bottom_20"></div> -->

		<b> 
            Datos basicos:			
        </b>
		
    <div class="section_w700">
		<?php 
		include_once "class/class.fachadainterfaz.php";
		$fachada = fachadaInterfaz::getInstance();
		$matriz=$fachada->buscarProyecto($_GET['nombre']);
		$proy = $matriz[0];
		?>
        <form name="formaProyecto" method="post" action="acciones/editaProyecto.php">
				<br>
				
        <table border="0">
            <tr>
                <td align="right" width=35.5%><LABEL for="project_name"><b>*Nombre del Proyecto:</b></LABEL> 
                    </td>
                    <td width=64.5%><input title="Ingrese el nombre del proyecto" value="<?php echo $proy['nombre'] ?>" READONLY type="text" id="nombreProy" name="nombreProy" onfocus="clearText(this)" onblur="clearText(this)"/></td>
            </tr>

			<tr>
				<td align="right"><b>*Etapa inicial:</b>
                </td>
                <td align="left">
                <select id="etapa" name="etapa" READONLY>
                    <option  value="<?php echo $proy['idEtapa'] ?>" selected="selected" > <?php echo $proy['idEtapa'] ?></option>
                </select>
                </td>
            </tr>
			
			<tr>
				<td align="right"><b>*Seleccionar Solicitud:</b>
                </td>
                <td align="left">
                <select name="solicitud" id="solicitud" READONLY>
                    <option  value="<?php echo $proy['numeroSolicitud'] ?>" selected="selected"> <?php echo $proy['numeroSolicitud'] ?></option>				
                </select>
                </td>
            </tr>
			<tr>
				<td align="right"><b>*Estado:</b>
                </td>
                <td align="left">
                <select name="estado" id="estado" READONLY>
                    <option  value="<?php echo $proy['estado'] ?>" selected="selected"> <?php echo $proy['estado'] ?> </option>				
                </select>
                </td>
            </tr>
        </table>
		<?php
		
					  echo '       <table border="0" id="tableCliente">
            <tr><td align="center"><h2></h2></td><td align="center"><h2></h2></td></tr>';
					$matriz=$fachada->buscarClientes($proy['nombre']);
					$i = 0;
					$j = sizeof($matriz);
					while($i < $j){
					     echo ' <tr>
								<td align="right"><LABEL for="cliente"><h3>Cliente:</h3> </LABEL> </td>
							</tr> </h3>
							<tr>
								<td align="right" width=35.5%><LABEL for="participante"><b>*Nombre:</b></LABEL> 
									</td>
									<td width=64.5%><input title="Ingrese el nombre del cliente" type="text" id="nombre[]" name="nombre[]" READONLY value="'.$matriz[$i]['nombre'].'" onfocus="clearText(this)" onblur="clearText(this)"/></td>
							</tr>
							<tr>
								<td align="right" width=35.5%><LABEL for="participante"><b>*Apellido:</b></LABEL> 
									</td>
									<td width=64.5%><input title="Ingrese el apellido del cliente" type="text" id="apellido[]" name="apellido[]"  READONLY value="'.$matriz[$i]['apellido'].'"  onfocus="clearText(this)" onblur="clearText(this)"/></td>
							</tr>
							<tr>
								<td align="right" width=35.5%><LABEL for="email"><b>*Correo:</b></LABEL> </td>
								<td width=64.5%><input title="Ingrese el correo electronico" type="text" id="email[]" name="email[]" READONLY value="'.$matriz[$i]['correo'].'"  onfocus="clearText(this)" onblur="clearText(this)"/></td>
							</tr>
							
							<tr>
									<td align="right"><LABEL for="telefono" width=35.3%><b>*Telefono:</b></LABEL> </td>
									<td width=64.7%><select name="codigo[]" id="codigo[]" READONLY>
												<option value="'.substr($matriz[$i]['telefono'],0,4).'" selected="selected">'.substr($matriz[$i]['telefono'],0,4).'</option>
											</select>-<input title="Ingrese su numero de telefono" type="text" name="tlf[]" id="tlf[]" READONLY value="'.substr($matriz[$i]['telefono'],4,11).'" maxlength="7" size="7" onkeypress="return onlyNumbers(event)"/>
									</td>
							</tr>

							<tr>
								<td align="right" width=35.5%><LABEL for="rol"><b>*Cargo:</b></LABEL> </td>
								<td width=64.5%><input title="Ingrese el rol" type="text" id="rol[]" name="rol[]" value="'.$matriz[$i]['cargo'].'" onfocus="clearText(this)" onblur="clearText(this)"/></td>
							</tr>';
					   $i++;
					}
					  echo '</table>';
		?>

				<?php
		
					  echo '<table border="0" id="tableProfesor">
							<tr>
							</tr>
							<h3>';
					$matriz=$fachada->buscarProfes($proy['nombre']);
					$i = 0;
					$j = sizeof($matriz);
					while($i < $j){
					     echo ' <tr>
								<td align="right"><LABEL for="fecha"><h3>Profesor:</h3> </LABEL> </td>
							</tr>
							</h3>
							<tr>
								<td align="right" width=35.5%><LABEL for="usbid"><b>*USBID:</b></LABEL>
									</td>
									<td width=64.5%><input title="Ingrese el USBID" type="text" id="usbid[]" name="usbid[]" onfocus="clearText(this)" value="'.$matriz[$i]['correo'].'" READONLY onblur="clearText(this)"/></td>
							</tr>';
					   $i++;
					}
					  echo '</table>';
		?>
	        
        <table border="0">
            
			<tr>
                    <td><input type="hidden" name="submitRegistration" value="true"/></td>
                    <td colspan="2">
                    <input type="submit" id="enviar" name="enviar" value="Editar" alt="Enviar" class="submitbutton" title="Editar Solicitud" />
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

