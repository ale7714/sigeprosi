<? //if (!isset ($_POST['acepto'])) header('Location:principal.php?content=previoSolicitud')?>
<div id="main_column">

    <div class="section_w700">

        <h2>Creacion de Proyectos</h2>

        <p><span class="em_text"><b>ATENCIÓN : Por favor, rellene los siguientes campos, para completar 
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
                    echo '(*) Datos obligatorios.';
                }
             ?> 
        </b></p>
    </div>        
    <div class="margin_bottom_20"></div>

    <div class="section_w700">
        <form name="formaRegistroSolicitud" action="" method="post">
        <table border="0">
            <tr>
                <td align="right" width=35.5%><LABEL for="email"><b>*E-mail:</b></LABEL> 
                    </td>
                    <td width=64.5%><input title="Ingrese su correo electrónico" type="text" id="email" name="email" value="ejemplo@usb.ve" onfocus="clearText(this)" onblur="clearText(this)"/></td>
            </tr>

                <tr>
                    <td align="right"><b>*Solicitud ya Aprovada:</b>
                </td>
                <td align="left">
                <select name="department">
                    <option value="" selected="selected"> -Seleccione- </option>
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

<!--
            <tr>
                <td align="right"><LABEL for="surname"><b>*Nombre de proyecto:</b></LABEL> </td>
                    <td><input title="Ingrese un nombre para su proyecto" type="text" name="nameproy" id="nameproy" value=""/></td>
            </tr>
            <tr>
                <td align="right"><LABEL for="surname"><b>*Nombre del solicitante:</b></LABEL> :</td>
                    <td><input title="Ingrese su nombre y apellido" type="text" name="namesoli" id="namesoli" value=""/></td>
            </tr>
            <tr>
                <td align="right"><LABEL for="surname"><b>*Dirección:</b></LABEL> :</td>
                    <td><input title="Ingrese su dirección exacta" type="text" name="direccion" id="direccion" value=""/></td>
            </tr> 
			
-->


            <tr>
                <td align="right"><LABEL for="surname"><b>*¿Cuántas personas ,aproximadamente,<br/>serían beneficiadas por el sistema?</b></LABEL> :</td>
                           <td><input title="Ingrese un número aproximado" type="text" name="personas" id="personas" value="" maxlength="7" onkeypress="return onlyNumbers(event)"/></td>
            </tr>
            <tr>
                <td align="right"><LABEL for="surname"><b>*Planteamiento del problema:</b><br/>(Máx. 500 caracteres)</LABEL></td>
                    <td><textarea name="planteamiento" id="planteamiento" title="Ingrese toda la información referente al problema" rows="10" cols="40" onkeypress="return contadorCaracteres(event)"></textarea></td>
            </tr>
            <tr>
                <td align="right"><LABEL for="surname"><b>*¿Dispone de Recursos tecnológicos?<br/>De ser así indique cuáles</b><br/>(Máx. 500 caracteres)</LABEL> </td>
                    <td><textarea name="recursos" id="recursos" title="computadora, servidor, conexión a internet, etc." rows="5" cols="40"></textarea></td>
            </tr>
            <tr>
                <td align="right"><LABEL for="surname"><b>*¿Dispone de tiempo libre <br/> para dedicárselo al sistema?</b><br/>(Máx. 500 caracteres) </LABEL> </td>
                    <td><textarea name="tiempolibre" id="tiempolibre" title="Ingrese toda la información acerca de su tiempo libre" rows="5" cols="40"></textarea></td>
            </tr>
            <tr>
                <td align="right"><LABEL for="surname"><b>*¿Por qué cree usted que es necesario<br/>desarrollar un SI para su problema? </b><br/>(Máx. 500 caracteres)</LABEL> </td>
                    <td><textarea name="justificacion" id="justificacion" title="Justifique el por qué es necesario para usted, desarrollar un Sistema de información para su problema particular" rows="5" cols="40"></textarea></td>
            </tr>
			<tr>
				<td colspan="2">	
					<table id="tablaTel" border="0" width=100%>
						<td align="right"><LABEL for="surname" width=35.3%><b>*Teléfono:</b></LABEL> </td>
						<td width=64.7%><select name="codigo[]" id="codigo[]" onchange="activarCampo(this.value, 'tlf[]')">
									<option value="codigo" selected="selected">Código</option>
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
					<input name="more" type="button" onclick="addRow('tablaTel')" class="submitbutton" value="Más" tittle="Añadir más numeros telefonicos"/>
				</td>
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

