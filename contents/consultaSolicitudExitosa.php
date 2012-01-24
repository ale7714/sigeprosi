<?php
	include_once "./class/class.Solicitud.php";
	include_once "./class/class.listaSolicitud.php";
	include_once "./class/class.TelefonoSolicitud.php";
	include_once "./class/class.listaTelefonoSolicitud.php";
	//if (!isset ($_POST['acepto'])) header('Location:principal.php?content=previoSolicitud')?>
<div id="main_column">

    <div class="section_w700">

        <h2>Solicitud Nro  <?php echo strtoupper($_GET['nro'])?></h2>
		
		<p><span class="em_text"><b>Se encuentra 	    
			<?php $nro = $_GET['nro'];
				  $baseSolicitud = new listaSolicitud();
				  $solicitud = $baseSolicitud->buscar($nro,"nro");
				  if($solicitud->get("estado") == 0){
				     echo '<span style="color:#0000A0;">Aceptada</span>';
				  }
				  else if($solicitud->get("estado") == 1){
				     echo '<span style="color:#0000A0;">En Análisis</span>';
				  }
				  else if($solicitud->get("estado") == 2){
				     echo '<span style="color:#0000A0;">Aprobado</span>';
				  }
			?>
		</b></span></p>
        <h2> </h2>

    </div>        
    <div class="margin_bottom_20"></div>

    <div class="section_w700">

        <form name="formaSolicitud" action="acciones/editarSolicitud.php" method="post">
        <table border="0">
            <tr>
                <td align="right" width=35.5%><LABEL for="email"><b>*E-mail:</b></LABEL> 
                    </td>
                    <td width=64.5%><input title="Correo electrónico" type="text" id="email" name="email" value="<?php print $solicitud->get("email")?>" disabled="disabled"/></td>
            </tr>

                <tr>
                    <td align="right"><b>*UnidadUSB:</b>
                </td>
                <td align="left">
                <select name="department"  disabled="disabled">
                    <option value="<?php print $solicitud->get("nombreUnidadAdministrativa")?>" selected="selected"><?php print $solicitud->get("nombreUnidadAdministrativa")?></option>
                </select>
                </td>
            </tr>

            <tr>
                <td align="right"><LABEL for="surname"><b>*¿Cuántas personas ,aproximadamente,<br/>serían beneficiadas por el sistema?</b></LABEL> :</td>
                           <td><input title="Numero de personas afectadas" type="text" name="personas" id="personas" value="<?php print $solicitud->get("nroAfectados")?>" disabled="disabled" maxlength="7"/></td>
            </tr>
            <tr>
                <td align="right"><LABEL for="surname"><b>*Planteamiento del problema:</b><br/>(Máx. 500 caracteres)</LABEL></td>
                    <td><textarea name="planteamiento" id="planteamiento" title="Información referente al problema" rows="10" cols="40" disabled="disabled"><?php print $solicitud->get("planteamiento")?></textarea></td>
            </tr>
            <tr>
                <td align="right"><LABEL for="surname"><b>*¿Dispone de Recursos tecnológicos?<br/>De ser así indique cuáles</b><br/>(Máx. 500 caracteres)</LABEL> </td>
                    <td><textarea name="recursos" id="recursos" title="computadora, servidor, conexión a internet, etc." rows="5" cols="40" disabled="disabled"><?php print $solicitud->get("tecnologia")?></textarea></td>
            </tr>
            <tr>
                <td align="right"><LABEL for="surname"><b>*¿Dispone de tiempo libre <br/> para dedicárselo al sistema?</b><br/>(Máx. 500 caracteres) </LABEL> </td>
                    <td><textarea name="tiempolibre" id="tiempolibre" title="Información acerca de su tiempo libre" rows="5" cols="40" disabled="disabled"><?php print $solicitud->get("tiempo")?></textarea></td>
            </tr>
            <tr>
                <td align="right"><LABEL for="surname"><b>*¿Por qué cree usted que es necesario<br/>desarrollar un SI para su problema? </b><br/>(Máx. 500 caracteres)</LABEL> </td>
                    <td><textarea name="justificacion" id="justificacion" title="" rows="5" cols="40" disabled="disabled"><?php print $solicitud->get("tiempo")?></textarea></td>
            </tr>
			<tr>
				<?php $listaTelSol = new listaTelefonoSolicitud();
					  $arreglo = $listaTelSol->buscarLista($nro,"nroSolicitud");
				?>
				<td colspan="2">	
					<table id="tablaTel" border="0" width=100%>
						<td align="right"><LABEL for="surname" width=35.3%><b>*Teléfono:</b></LABEL> </td>
						<td width=64.7%><input title="Numero de Telefono" size="11" value="<?php print $arreglo[0]->get("telefono")?>" disabled="disabled"/></td>
					</table>
				</td>
            </tr>

			
			
            <tr>
                    <td><input type="hidden" name="submitRegistration" value="true"/></td>

                    <td colspan="2">
				    <?php if($solicitud->get("estado") == 0){
							 echo ' <input type="submit" id="editar" name="editar" value="Editar" alt="Editar" class="submitbutton" title="Editar solicitud" />';
						  }
				   ?>
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