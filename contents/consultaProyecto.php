<?php
if (!(isset($_SESSION["admin"]))){
	include "contents/areaRestringida.php";
	echo '<script>';
	echo 'alert("No tiene permisos para acceder a esta area del sistema.");';
	//echo 'location.href="principal.php"';
	echo '</script>';
}else{
?>
<div id="main_column">
	<div class="section_w701">
        <font size="6" face="Comic Sans MS,arial,verdana"><b>Consultar Proyecto: </b></font> 
    </div>       
<!--    <div class="margin_bottom_20"></div> -->
		<?php 
		include_once "class/class.fachadainterfaz.php";
		$fachada = fachadaInterfaz::getInstance();
		$matriz=$fachada->buscarProyecto($_GET['nombre']);
		$proy = $matriz[0];
		?>
		 <form name="formaProyecto" method="post" action="acciones/editarProyecto.php">
		<div class="section_w702">
		<table border="0">
			<tr> <td><font size="4" face="Comic Sans MS,arial,verdana"><b>Datos b&aacute;sicos: </b></font> </td></tr>
		</table>
        <table border="0">
            <tr>
                <td align="right" width=35.5%><LABEL for="project_name"><b>Nombre del Proyecto:</b></LABEL> 
                    </td>
                    <td width=64.5%><input title="Ingrese el nombre del proyecto" value="<?php echo $proy['nombre'] ?>" DISABLED type="text" id="nombreProy" name="nombreProy" onfocus="clearText(this)" onblur="clearText(this)"/></td>
            </tr>

			<tr>
				<td align="right"><b>Etapa inicial:</b>
                </td>
                <td align="left">
                <select id="etapa" name="etapa" DISABLED>
                    <option  value="<?php echo $proy['idEtapa'] ?>" selected="selected" > <?php echo $proy['idEtapa'] ?></option>
                </select>
                </td>
            </tr>
			
			<tr>
				<td align="right"><b>Seleccionar Solicitud:</b>
                </td>
                <td align="left">
                <select name="solicitud" id="solicitud" DISABLED>
                    <option  value="<?php echo $proy['numeroSolicitud'] ?>" selected="selected"> <?php echo $proy['numeroSolicitud'] ?></option>				
                </select>
                </td>
            </tr>
			<tr>
				<td align="right"><b>Estado:</b>
                </td>
                <td align="left">
                <select name="estado" id="estado" DISABLED>
                    <option  value="<?php echo $proy['estado'] ?>" selected="selected"> <?php echo $proy['estado'] ?> </option>				
                </select>
                </td>
            </tr>
        </table>
	</div> 
	<div class="section_w701">
        <font size="5" face="Comic Sans MS,arial,verdana"><b>Lista de Clientes asociados: </b></font> 
    </div>  
	<div class="section_w702">
		<?php
		
					  echo '       		   <table border="0" id="tableCliente" width="100%">';
					$matriz=$fachada->buscarClientes($proy['nombre']);
					$i = 0;
					$j = sizeof($matriz);
					while($i < $j){
					     echo '<tr><td align="left"><font size="4" face="Comic Sans MS,arial,verdana"><b>Datos del cliente: </b></font> </td>
				</tr></h3>
							<tr>
								<td align="right" width=35.5%><LABEL for="participante"><b>Nombre:</b></LABEL> 
									</td>
									<td width=64.5%><input title="Ingrese el nombre del cliente" type="text" id="nombre[]" name="nombre[]" DISABLED value="'.$matriz[$i]['nombre'].'" onfocus="clearText(this)" onblur="clearText(this)"/></td>
							</tr>
							<tr>
								<td align="right" width=35.5%><LABEL for="participante"><b>Apellido:</b></LABEL> 
									</td>
									<td width=64.5%><input title="Ingrese el apellido del cliente" type="text" id="apellido[]" name="apellido[]"  DISABLED value="'.$matriz[$i]['apellido'].'"  onfocus="clearText(this)" onblur="clearText(this)"/></td>
							</tr>
							<tr>
								<td align="right" width=35.5%><LABEL for="email"><b>Correo:</b></LABEL> </td>
								<td width=64.5%><input title="Ingrese el correo electronico" type="text" id="email[]" name="email[]" DISABLED value="'.$matriz[$i]['correo'].'"  onfocus="clearText(this)" onblur="clearText(this)"/></td>
							</tr>
							
							<tr>
									<td align="right"><LABEL for="telefono" width=35.3%><b>Telefono:</b></LABEL> </td>
									<td width=64.7%><select name="codigo[]" id="codigo[]" DISABLED>
												<option value="'.substr($matriz[$i]['telefono'],0,4).'" selected="selected">'.substr($matriz[$i]['telefono'],0,4).'</option>
											</select>-<input title="Ingrese su numero de telefono" type="text" name="tlf[]" id="tlf[]" DISABLED value="'.substr($matriz[$i]['telefono'],4,11).'" maxlength="7" size="7" onkeypress="return onlyNumbers(event)"/>
									</td>
							</tr>

							<tr>
								<td align="right" width=35.5%><LABEL for="rol"><b>Cargo:</b></LABEL> </td>
								<td width=64.5%><input title="Ingrese el rol" type="text" id="rol[]" name="rol[]" value="'.$matriz[$i]['cargo'].'" DISABLED onfocus="clearText(this)" onblur="clearText(this)"/></td>
							</tr>';
					   $i++;
					}
					  echo '</table>';
		?>
	</div> 
	<div class="section_w701">
        <font size="5" face="Comic Sans MS,arial,verdana"><b>Lista de Profesores evaluadores asociados: </b></font> 
    </div>  
	<div class="section_w702">
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
<?php  } ?>