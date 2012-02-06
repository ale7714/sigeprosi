<? //if (!isset ($_POST['acepto'])) header('Location:principal.php?content=previoSolicitud')?>



	



<div id="main_column">

    <div class="section_w700">

        <h2>Registro de Usuario</h2>

        <p><span class="em_text"><b>ATENCIÓN : Por favor, rellene el siguiente campo, para completar 
                                    el registro del usuario. Todos los campos son obligatorios.</b></span></p>
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
<?php 
include_once $_SERVER['DOCUMENT_ROOT']."/sigeprosi/"."/class/class.fachadainterfaz.php";
if (isset($_POST["email"])){
	if ($_POST["email"]=="ejemplo@usb.ve" || $_POST["email"]=="") 	{
			header("Location: principal.php?content=registroSolicitud&error=camposVacios");
		}else{
			$email = strtolower($_POST["email"]);
			//$resultTelefono= sscanf($_POST["tlf"], "%d-%d",$codigo,$numero);
			$patronCorreo = "/\w(@usb\.ve){1}$/"; //Patron para validar correo.
			if(!preg_match($patronCorreo, $email)){
				header("Location: principal.php?content=registroSolicitud&error=formatoCorreo");
			} else {
				$fachada = fachadaInterfaz::getInstance();
				$fachada->registrarUsuario($_POST["email"]);
                //header("Location: principal.php");
			}
		}
}
?>