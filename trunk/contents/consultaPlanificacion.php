<? //if (!isset ($_POST['acepto'])) header('Location:principal.php?content=previoSolicitud')?>
<div id="main_column">

    <div class="section_w700">

        <h2>Consulta de Planificaciones</h2>

        <p><b> 
            <?php  
			
			
			if (!isset ($_GET['error'])){
   			        $_GET['error'] = null;
                   }
			    if ($_GET['error']=="camposVacios"){
                    echo '<span style="color: red;">Debe llenar todos los campos obligatorios</span>';
                }
                else if ($_GET['error']=="formatoCorreo"){
                    echo '<span style="color: red;">El formato de correo es inválido.</span>';
                }
				else if ($_GET['error']=="noExiste"){
                    echo '<span style="color: red;">El numero de solicitud o correo no pertenecen a una solicitud.</span>';
                }else {
                    echo '(*) Datos obligatorios.';
                }
             ?> 
        </b></p>
    </div>        
    <div class="margin_bottom_20"></div>

    <div class="section_w700">
        <form name="formaConsultaSolicitud" action="acciones/consultarSolicitud.php" method="post">
        <table border="0">
            <tr>
                <td align="right" width=35.5%><LABEL for="numSol"><b>*Numero de Solicitud:</b></LABEL> 
                    </td>
                    <td width=64.5%><input title="Ingrese su numero de solicitud" type="text" id="numSol" name="numSol" value="" onfocus="clearText(this)" onblur="clearText(this)"/></td>
            </tr>
            <tr>
                <td align="right" width=35.5%><LABEL for="email"><b>*E-mail:</b></LABEL> 
                    </td>
                    <td width=64.5%><input title="Ingrese su correo electrónico" type="text" id="email" name="email" value="ejemplo@usb.ve" onfocus="clearText(this)" onblur="clearText(this)"/></td>
            </tr>			
            <tr>
                    <td><input type="hidden" name="submitRegistration" value="true"/></td>

                    <td colspan="2">
                    <input type="submit" id="enviar" name="enviar" value="Enviar" alt="Enviar" class="submitbutton" title="Consultar" />
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

<?php
include_once "class/class.fachadainterfaz.php";
if (isset($_POST["nombre"])){
	
	$fachada = fachadaInterfaz::getInstance();
	$fachada->registrarActividad($_POST["nombre"],$_POST["fecha"],$_POST["descripcion"],$_POST["puntos"]);		
}
?>