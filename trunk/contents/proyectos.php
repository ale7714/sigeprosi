<? //if (!isset ($_POST['acepto'])) header('Location:principal.php?content=previoSolicitud')?>
<div id="main_column">

    <div class="section_w700">

        <h2>Agregar Proyecto</h2>

        <p><span class="em_text"><b>ATENCION : Por favor, rellene los siguientes campos, para completar 
                                    su solicitud. Todos los campos son obligatorios.</b></span></p>
        <h2> </h2>


        <p><b> 
            <?php  if (!isset ($_GET['error'])){
   			        $_GET['error'] = null;
                   }
			          if ($_GET['error']=="camposVacios"){
                    echo '<span style="color: red;">Debe llenar todos los campos obligatorios</span>';
                }
                else if ($_GET['error']=="solicExist"){
                    echo '<span style="color: red;">La solicitud ya se encuentra registrada.</span>';
                }
                else if ($_GET['error']=="formatoTlf"){
                    echo '<span style="color: red;">El formato del teléfono es inválido.</span>';
                }
                else if ($_GET['error']=="Unidad"){
                    echo '<span style="color: red;">Debe seleccionar una Unidad.</span>';
                }
                else if ($_GET['error']=="formatoCorreo"){
                    echo '<span style="color: red;">El formato de correo es inválido.</span>';
                }else {
                    /*echo '(*) Datos obligatorios.';*/
                }
             ?> 
        </b></p>
    </div>        
<!--    <div class="margin_bottom_20"></div> -->

		<b> 
            Datos basicos:			
        </b>
		
    <div class="section_w700">
        <form name="formaRegistroSolicitud" action="" method="post">
				<br>
				
        <table border="0">
            <tr>
                <td align="right" width=35.5%><LABEL for="project_name"><b>*Nombre del Proyecto:</b></LABEL> 
                    </td>
                    <td width=64.5%><input title="Ingrese el nombre del proyecto" type="text" id="project_name" name="project_name" onfocus="clearText(this)" onblur="clearText(this)"/></td>
            </tr>

			<tr>
				<td align="right"><b>*Etapa inicial:</b>
                </td>
                <td align="left">
                <select name="etapa_inicial">
                    <option value="" selected="selected"> -Seleccione- </option>
				
				//REVISARRRR
				<?php 
				include_once "class/class.fachadainterfaz.php";
				$fachada = fachadaInterfaz::getInstance();
				$matriz=$fachada->listarSolicitud();
				if ($matriz!=null){
					$i=0;
					while($i<sizeof($matriz)){
				?> 
                    <option value="<?php echo $matriz[$i]['nro'];?>"> <?php echo 'Nro :['.$matriz[$i]['nro'].'] Email :['.$matriz[$i]['email'].'] Unidad : ['.$matriz[$i]['nombreUnidadAdministrativa'].']'; ?> </option>
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
                <select name="solicitud">
                    <option value="" selected="selected"> -Seleccione- </option>
				
				//REVISARRRR
				<?php 
				include_once "class/class.fachadainterfaz.php";
				$fachada = fachadaInterfaz::getInstance();
				$matriz=$fachada->listarSolicitud();
				if ($matriz!=null){
					$i=0;
					while($i<sizeof($matriz)){
				?> 
                    <option value="<?php echo $matriz[$i]['nro'];?>"> <?php echo 'Nro :['.$matriz[$i]['nro'].'] Email :['.$matriz[$i]['email'].'] Unidad : ['.$matriz[$i]['nombreUnidadAdministrativa'].']'; ?> </option>
				<?php
					$i=$i+1;
					}
				}
				?>	
                </select>
                </td>
            </tr>

        </table>
        </form>

        <h3> </h3>


    </div>  

	<div class="section_w700">
        <form name="formaRegistroSolicitud" action="" method="post">
				
		<b> 
            Cliente:			
        </b>
					
        <table border="0">
            <tr>
                <td align="right" width=35.5%><LABEL for="participante"><b>*Participante:</b></LABEL> 
                    </td>
                    <td width=64.5%><input title="Ingrese el nombre del proyecto" type="text" id="participante" name="participante" onfocus="clearText(this)" onblur="clearText(this)"/></td>
            </tr>

			<tr>
                <td align="right" width=35.5%><LABEL for="email"><b>*Correo:</b></LABEL> 
                    </td>
                    <td width=64.5%><input title="Ingrese el nombre del proyecto" type="text" id="email" name="email" onfocus="clearText(this)" onblur="clearText(this)"/></td>
            </tr>
						
			
			
            <tr>
				<td colspan="2">	
					<table id="tablaTel" border="0" width=100%>
						<td align="right"><LABEL for="surname" width=35.3%><b>*Telefono:</b></LABEL> </td>
						<td width=64.7%><select name="codigo[]" id="codigo[]" onchange="activarCampo(this.value, 'tlf[]')">
									<option value="codigo" selected="selected">Codigo</option>
									<option value="0212">0212</option>
									<option value="0412">0412</option>
									<option value="0414">0414</option>
									<option value="0424">0424</option>
									<option value="0416">0416</option>
									<option value="0426">0426</option>
							</select>-<input title="Ingrese su número de teléfono" type="text" name="tlf[]" id="tlf[]" value="" maxlength="7" size="7" disabled="disabled" onkeypress="return onlyNumbers(event)"/></td>
					</table>
				</td>
            </tr>
			<tr>
			    <td align="center">
					<input name="more" type="button" onclick="addRow('tablaTel')" class="submitbutton" value="Agregar otro" title="Añadir más numeros telefonicos"/>
				</td>
			</tr>
			
			<tr>
                <td align="right" width=35.5%><LABEL for="rol"><b>*Rol:</b></LABEL> 
                    </td>
                    <td width=64.5%><input title="Ingrese el rol" type="text" id="rol" name="rol" onfocus="clearText(this)" onblur="clearText(this)"/></td>
            </tr>
			
        </table>
        </form>

        <h3> </h3>


    </div> 
	
	<div class="section_w700">
        <form name="formaRegistroSolicitud" action="" method="post">
				
				
        <table border="0">
            <tr>
                <td align="right" width=35.5%><LABEL for="project_name"><b>*USBID:</b></LABEL> 
                    </td>
                    <td width=64.5%><input title="Ingrese el USBID" type="text" id="usbid" name="usbid" onfocus="clearText(this)" onblur="clearText(this)"/></td>
            </tr>

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

