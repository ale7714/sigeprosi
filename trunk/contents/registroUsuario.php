<? //if (!isset ($_POST['acepto'])) header('Location:principal.php?content=previoSolicitud')?>
<?php
    if (isset($_SESSION["admin"]) && $_SESSION["admin"] == true) {
?>
<div id="main_column">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <div class="section_w700">

        <h2>Registro de Usuario</h2>

        <p><span class="em_text"><b>ATENCI�N : Por favor, rellene el siguiente campo, para completar 
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
                    echo '<span style="color: red;">El formato del tel�fono es inv�lido.</span>';
                }
                else if ($_GET['error']=="Unidad"){
                    echo '<span style="color: red;">Debe seleccionar una Unidad.</span>';
                }
                else if ($_GET['error']=="formatoCorreo"){
                    echo '<span style="color: red;">El formato de correo es inv�lido.</span>';
                }else {
                    echo '(*) Datos obligatorios.';
                }
             ?> 
        </b></p>
    </div>        
    <div class="margin_bottom_20"></div>

    <div class="section_w700">
        <form name="formaRegistroSolicitud" action="acciones/registroUsuario.php" method="post">
        <table border="0">
            <tr>
                <td align="right" width=35.5%><LABEL for="email"><b>*E-mail:</b></LABEL> 
                    </td>
                <td width=64.5%><input title="Ingrese su correo electr�nico" type="text" id="email" name="email" value="ejemplo@usb.ve" onfocus="clearText(this)" onblur="clearText(this)"/></td>
                
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
}
else {
    echo '<h3>No posee permisos de administrador.</h3>';
    echo '<div class="news_title"><a href="principal.php">Ir a la p�gina principal</a></div>';
}
?>