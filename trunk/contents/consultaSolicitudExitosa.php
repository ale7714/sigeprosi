<?php 
if ($_SERVER['SERVER_ADDR'] == "127.0.0.1")
		$root = $_SERVER['DOCUMENT_ROOT']."/sigeprosi/";
	else
		$root = "/home/ps6116-02/public_html/sigeprosi/";
include_once $root."class/class.fachadainterfaz.php";
if (isset($_GET['nro']) && isset($_GET['email'])) {
	$fachada = fachadaInterfaz::getInstance();
	$solicitud = $fachada->consultarSolicitud($_GET['email'], $_GET['nro']);
	$telefonos = $fachada->cargarTelefSolicitud($solicitud['nro']);
}
?>
<div id="main_column">
    <div class="section_w700">
        <h2>Solicitud Nro  <?php echo strtoupper($solicitud['nro'])?></h2>
		
		<p><span class="em_text"><b>Se encuentra 	    
			<?php $nro = $solicitud['nro'];
				  if($solicitud['estado'] == 0){
				     echo '<span style="color:#0000A0;">Pendiente</span>';
				  }
				  else if($solicitud['estado'] == 1){
				     echo '<span style="color:#0000A0;">Aceptado</span>';
				  }
				  else if($solicitud['estado'] == 2){
				     echo '<span style="color:#0000A0;">Aprobado</span>';
				  }
				  else if($solicitud['estado'] == 3){
				     echo '<span style="color:#0000A0;">Rechazada</span>';
				  }
			?>
		</b></span></p>
        <h2> </h2>

    </div>        
    <div class="margin_bottom_20"></div>

    <div class="section_w700">

        <table border="0">
            <tr>
                <td align="right" width=35.5%><LABEL for="email"><b>*E-mail:</b></LABEL> 
                    </td>
                    <td width=64.5%><input title="Correo electrónico" type="text" id="email" name="email" value="<?php print $solicitud['email']?>" disabled="disabled"/></td>
            </tr>

                <tr>
                    <td align="right"><b>*UnidadUSB:</b>
                </td>
                <td align="left">
                <select name="department"  disabled="disabled">
                    <option value="<?php print $solicitud['nombreUnidadAdministrativa']?>" selected="selected"><?php print $solicitud['nombreUnidadAdministrativa']?></option>
                </select>
                </td>
            </tr>

            <tr>
                <td align="right"><LABEL for="surname"><b>*¿Cuántas personas ,aproximadamente,<br/>serían beneficiadas por el sistema?</b></LABEL> :</td>
                           <td><input title="Numero de personas afectadas" type="text" name="personas" id="personas" value="<?php print $solicitud['nroAfectados']?>" disabled="disabled" maxlength="7"/></td>
            </tr>
            <tr>
                <td align="right"><LABEL for="surname"><b>*Planteamiento del problema:</b><br/>(Máx. 500 caracteres)</LABEL></td>
                    <td><textarea name="planteamiento" id="planteamiento" title="Información referente al problema" rows="10" cols="40" disabled="disabled"><?php print $solicitud['planteamiento']?></textarea></td>
            </tr>
            <tr>
                <td align="right"><LABEL for="surname"><b>*¿Dispone de Recursos tecnológicos?<br/>De ser así indique cuáles</b><br/>(Máx. 500 caracteres)</LABEL> </td>
                    <td><textarea name="recursos" id="recursos" title="computadora, servidor, conexión a internet, etc." rows="5" cols="40" disabled="disabled"><?php print $solicitud['tecnologia']?></textarea></td>
            </tr>
            <tr>
                <td align="right"><LABEL for="surname"><b>*¿Dispone de tiempo libre <br/> para dedicárselo al sistema?</b><br/>(Máx. 500 caracteres) </LABEL> </td>
                    <td><textarea name="tiempolibre" id="tiempolibre" title="Información acerca de su tiempo libre" rows="5" cols="40" disabled="disabled"><?php print $solicitud['tiempo']?></textarea></td>
            </tr>
            <tr>
                <td align="right"><LABEL for="surname"><b>*¿Por qué cree usted que es necesario<br/>desarrollar un SI para su problema? </b><br/>(Máx. 500 caracteres)</LABEL> </td>
                    <td><textarea name="justificacion" id="justificacion" title="" rows="5" cols="40" disabled="disabled"><?php print $solicitud['justificacion']?></textarea></td>
            </tr>
			<tr>
				<?php 
					  echo '<td colspan="2"><table id="tablaTel" border="0" width=100%>';
					  foreach($telefonos as $telef){
					     echo '<tr><td align="right"><LABEL for="surname" width=35.3%><b>*Teléfono:</b></LABEL> </td>
						 <td width=64.7%><input title="Numero de Telefono" size="11" value="'.$telef.'" disabled="disabled"/></td></tr>';
					     
					  }
					  echo '</table></td>';
				?>
            </tr>

			
			
            <tr>
                    <td><input type="hidden" name="submitRegistration" value="true"/></td>
					
                    <td colspan="2">
					<input type="button" name="volver" value="Volver" alt="Volver" class="submitbutton" title="Volver a la página anterior" onclick="history.back(-1)" />
				    <?php //Solo se muestra el botón de editar si la solicitud esta en el estado 0 es decir aceptado
						if($solicitud['estado'] == 0){
							 echo '<div class="button_01"><a href="?content=editaSolicitud&nro='.$nro.'&email='.$solicitud['email'].'">Editar</a></div>';
						}
				    ?>
                    </td>
            </tr>
			

        </table>

        <h3> </h3>


    </div>  

    <div class="margin_bottom_20"></div>
    <div class="cleaner"></div>
</div> <!-- end of main column -->

<!-- end of side column 1 -->

<div class="side_column_w200">
 <?php
    if (isset($_SESSION['admin']))
        include 'sidebars/barraEnSesion.php';
    else
        include 'sidebars/barraInicioSesion.php';
    ?>
    <!-- barra lateral -->

</div> <!-- end of right side column -->

<div class="cleaner"></div>
