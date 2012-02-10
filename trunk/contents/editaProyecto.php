<? //if (!isset ($_POST['acepto'])) header('Location:principal.php?content=previoSolicitud')?>
<div id="main_column">

    <div class="section_w700">

        <h2>Editar Proyecto</h2>

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
$root = $_SERVER['DOCUMENT_ROOT']."/sigeprosi/";
include_once $root."class/class.fachadainterfaz.php";
//session_start();
if (isset($_SESSION['proyecto']) && isset($_SESSION['clientes']) && isset($_SESSION['profesores'])){
	
	$proy = $_SESSION['proyecto'];
	$clientes = $_SESSION['clientes'];
	$profes = $_SESSION['profesores'];
	//var_dump($proy);
	session_destroy();
} 
?>
        <form name="formaProyecto" method="post" action="acciones/editarProyecto.php">
				<br>
				
        <table border="0">
            <tr>
                <td align="right" width=35.5%><LABEL for="project_name"><b>*Nombre del Proyecto:</b></LABEL> 
                    </td>
                    <td width=64.5%><input title="Ingrese el nombre del proyecto" value="<?php echo $proy['nombre'] ?>" DISABLED type="text" id="nombreProy" name="nombreProy" onfocus="clearText(this)" onblur="clearText(this)"/></td>
            </tr>

			<tr>
				<td align="right"><b>*Etapa inicial:</b>
                </td>
                <td align="left">
                <select id="etapa" name="etapa">
                    <option  value="<?php echo $proy['idEtapa'] ?>" selected="selected" > <?php echo $proy['idEtapa'] ?></option>
                </select>
                </td>
            </tr>
			
			<tr>
				<td align="right"><b>*Seleccionar Solicitud:</b>
                </td>
                <td align="left">
                <select name="solicitud" id="solicitud" DISABLED>
                    <option  value="<?php echo $proy['numeroSolicitud'] ?>" selected="selected"> <?php echo $proy['numeroSolicitud'] ?></option>				
                </select>
                </td>
            </tr>
			<tr>
				<td align="right"><b>*Estado:</b>
                </td>
                <td align="left">
                <select name="estado" id="estado">
                    <option  value="<?php if($proy['estado'] == "Activo"){ echo 1;}
                                          if($proy['estado'] == "Inactivo"){ echo 0;}?>" selected="selected"> <?php echo $proy['estado'] ?> </option>	
					<option  value="1"> Activo </option>
					<option  value="0"> Inactivo </option>						
                </select>
                </td>
            </tr>
        </table>
		<?php
		
					  echo '       <table border="0" id="tableCliente">
            <tr><td align="center"><h2></h2></td><td align="center"><h2></h2></td></tr>';
					$i = 0;
					$j = sizeof($clientes);
					//var_dump($clientes);
					while($i < $j){
					     echo ' <tr>
								<td align="right"><LABEL for="cliente"><h3>Cliente:</h3> </LABEL> </td>
							</tr> </h3>
							<tr>
								<td align="right" width=35.5%><LABEL for="participante"><b>*Nombre:</b></LABEL> 
									</td>
									<td width=64.5%><input title="Ingrese el nombre del cliente" type="text" id="nombre[]" name="nombre[]" value="'.$clientes[$i]['nombre'].'" onfocus="clearText(this)" onblur="clearText(this)"/></td>
							</tr>
							<tr>
								<td align="right" width=35.5%><LABEL for="participante"><b>*Apellido:</b></LABEL> 
									</td>
									<td width=64.5%><input title="Ingrese el apellido del cliente" type="text" id="apellido[]" name="apellido[]"  value="'.$clientes[$i]['apellido'].'"  onfocus="clearText(this)" onblur="clearText(this)"/></td>
							</tr>
							<tr>
								<td align="right" width=35.5%><LABEL for="email"><b>*Correo:</b></LABEL> </td>
								<td width=64.5%><input title="Ingrese el correo electronico" type="text" id="email[]" name="email[]" DISABLED value="'.$clientes[$i]['correo'].'"  onfocus="clearText(this)" onblur="clearText(this)"/></td>
							</tr>
							
							<tr>
									<td align="right"><LABEL for="telefono" width=35.3%><b>*Telefono:</b></LABEL> </td>
									<td width=64.7%><select name="codigo[]" id="codigo[]">
												<option value="'.substr($clientes[$i]['telefono'],0,4).'" selected="selected">'.substr($clientes[$i]['telefono'],0,4).'</option>
												<option value="0212">0212</option>
												<option value="0412">0412</option>
												<option value="0414">0414</option>
												<option value="0424">0424</option>
												<option value="0416">0416</option>
												<option value="0426">0426</option>
											</select>-<input title="Ingrese su numero de telefono" type="text" name="tlf[]" id="tlf[]" value="'.substr($clientes[$i]['telefono'],4,11).'" maxlength="7" size="7" onkeypress="return onlyNumbers(event)"/>
									</td>
							</tr>

							<tr>
								<td align="right" width=35.5%><LABEL for="rol"><b>*Cargo:</b></LABEL> </td>
								<td width=64.5%><input title="Ingrese el rol" type="text" id="rol[]" name="rol[]" value="'.$clientes[$i]['cargo'].'" onfocus="clearText(this)" onblur="clearText(this)"/></td>
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
					$i = 0;
					$j = sizeof($profes);
					while($i < $j){
					     echo ' <tr>
								<td align="right"><LABEL for="fecha"><h3>Profesor:</h3> </LABEL> </td>
							</tr>
							</h3>
							<tr>
								<td align="right" width=35.5%><LABEL for="usbid"><b>*USBID:</b></LABEL>
									</td>
									<td width=64.5%><input title="Ingrese el USBID" type="text" id="usbid[]" name="usbid[]" onfocus="clearText(this)" value="'.$profes[$i]['correo'].'" onblur="clearText(this)"/></td>
							</tr>';
					   $i++;
					}
					  echo '</table>';
		?>
	        <h3> </h3>
        <table border="0">
            
			<tr>
                    <td><input type="hidden" name="submitRegistration" value="true"/></td>
                    <td colspan="2">
                    <input type="submit" id="enviar" name="enviar" value="Guardar" alt="Guardar" class="submitbutton" title="Guardar Cambios" />
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

