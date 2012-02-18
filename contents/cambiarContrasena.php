<?php
if (!(isset($_SESSION["admin"])) || (isset($_SESSION["admin"]) && !($_SESSION["admin"]) && (isset($_GET['email'])))){
	include "contents/areaRestringida.php";
	echo '<script>';
	echo 'alert("No tiene permisos para acceder a esta area del sistema.");';
	//echo 'location.href="principal.php"';
	echo '</script>';
}else{
?>
<div id="main_column">
    <div class="section_w701"><font size="6" face="arial"><b>Cambiar Contrasena de Usuario:</b></font></div>
	<form name="formacambiarContrasena" action="acciones/cambiarContrasenaComoAdmin.php" method="post">
    <div class="section_w702">
		<table border="0">
            <tr>
                <td><LABEL for="user"><b>Usuario: </b></LABEL></td>
                <td><LABEL for="email"><?php echo $_GET["email"] ?></LABEL> </td>
            </tr>
            <tr>
                <td><LABEL for="passnuv"><b>Contrasena Nueva:</b></LABEL> </td>
                <td><input type="password" value="**********" name="passnew" size="10" class="inputfield" title="Contraseña" onfocus="clearText(this)" onblur="clearText(this)" onkeypress="return onlyAlfaNumbers(event)"/></td>
            </tr>
            <tr>
                <td><LABEL for="passnuv2"><b>Confirme Contrasena:</b></LABEL>  </td>
                <td><input type="password" value="**********" name="passnew2" size="10" class="inputfield" title="Contraseña" onfocus="clearText(this)" onblur="clearText(this)" onkeypress="return onlyAlfaNumbers(event)"/></td>
            </tr>
        </table>
	</div>
	<div class="section_w701">
		<table border="0"  width="55%"  id="tableOperaciones">
		<tr >
			<td  colspan="2" >
				<input type="hidden" name="email" value="<?php echo $_GET["email"] ?>"/>
				 <input type="image" width="50" height="50" id="enviar" name="enviar" src="images/ICO/Login.ico" alt="Guardad Cambios" class="submitbutton" title="Cambiar Contrasena"  />
			</td>
		</tr>
		</table>
	</div>
    </form>
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
<?php  } ?>