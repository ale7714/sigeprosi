<? //if (!isset ($_POST['acepto'])) header('Location:principal.php?content=previoSolicitud')?>

<div id="main_column">

    <div class="section_w700">

        <h2>Cambio de Contrasena</h2>

        <h2> </h2>

    </div>        
    <div class="margin_bottom_20"></div>

    <div class="section_w700">
        <form name="formacambiarContrasena" action="acciones/cambiarContrasena.php" method="post">
        <table border="0">
            <tr>
                <td><LABEL for="user"><b>Usuario: </b></LABEL></td>
                <td><LABEL for="email"><?php echo $_SESSION["correoUSB"] ?></LABEL> </td>
            </tr>
            <tr>
                <td><LABEL for="passact"><b>Contrasena Actual:</b></LABEL> </td>
                <td><input type="password" value="**********" name="pass" size="10" class="inputfield" title="Contraseña" onfocus="clearText(this)" onblur="clearText(this)" onkeypress="return onlyAlfaNumbers(event)"/></td>
            </tr>
            <tr>
                <td><LABEL for="passnuv"><b>Contrasena Nueva:</b></LABEL> </td>
                <td><input type="password" value="**********" name="passnew" size="10" class="inputfield" title="Contraseña" onfocus="clearText(this)" onblur="clearText(this)" onkeypress="return onlyAlfaNumbers(event)"/></td>
            </tr>
            <tr>
                <td><LABEL for="passnuv2"><b>Contrasena Nueva Otra Vez:</b></LABEL>  </td>
                <td><input type="password" value="**********" name="passnew2" size="10" class="inputfield" title="Contraseña" onfocus="clearText(this)" onblur="clearText(this)" onkeypress="return onlyAlfaNumbers(event)"/></td>
            </tr>
            <tr>
                    <td><input type="hidden" name="submitRegistration" value="true"/></td>
                    <td colspan="2">
                    <input type="submit" id="enviar" name="enviar" value="Enviar" alt="Enviar" class="submitbutton" title="Enviar solicitud" /></td>
                    <td><input type="button" name="cancelar" value="Cancelar" alt="Cancelar" class="submitbutton" title="Cancelar" onclick="history.back(-2)" />
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
