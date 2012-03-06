<?php
if (!(isset($_SESSION["admin"])) || (isset($_SESSION["admin"]) && !($_SESSION["admin"]) && (isset($_GET['email'])))){
	include "contents/areaRestringida.php";
	echo '<script>';
	echo 'alert("No tiene permisos para acceder a esta area del sistema.");';
	//echo 'location.href="principal.php"';
	echo '</script>';
}else{
$root = $_SERVER['DOCUMENT_ROOT']."/sigeprosi/";
include_once $root."class/class.fachadainterfaz.php";
include_once $root."class/class.Usuario.php";
$fachada = fachadaInterfaz::getInstance();
if (isset($_GET['email']))	$user = $fachada->consultarUsuario($_GET['email']);
else	$user = $fachada->consultarUsuario($_SESSION["correoUSB"]);
$telefono = $user->get('telefono');
?>

<div id="main_column">
	<div class="section_w701"><font size="6" face="arial"><b>Edicion de Perfil de Usuario:</b></font>
	<div class="margin_bottom_20"></div>
	<font size="5" face="arial"> <?php echo $user->get('correoUSB')?></font></div>       
        <form name="formaSolicitud" action="acciones/editaUsuario.php" method="post">
		<div class="section_w702">
         <table border="0" width="80%" align="center">
            <tr>
                <td align="left" width="50%">
                    <LABEL for="nombre"><b>Nombre:</b></LABEL>
                </td>
                <td width=64.5%>
                    <input title="Nombre" type="text" id="nombre" name="nombre" value="<?php echo $user->get('nombre'); ?>" />
                </td>
            </tr>
            <tr>
                <td align="left" width="50%">
                    <LABEL for="apellido"><b>Apellido:</b></LABEL>
                </td>
                <td width=64.5%>
                    <input title="Apellido" type="text" id="apellido" name="apellido" value="<?php echo $user->get('apellido'); ?>" />
                </td>
            </tr>
            <tr>
                <td align="left" width=35.5%>
                    <LABEL for="correoOpt"><b>Correo Opcional:</b></LABEL>
                </td>
                <td width=64.5%>
                    <input title="Correo Opcional" type="text" id="correoOpt" name="correoOpt" value="<?php echo $user->get('correoOpcional'); ?>" />
                </td>
            </tr>
            <tr>
                <td align="left">
                    <LABEL for="tel"><b>Telefono:</b></LABEL>
                </td>
                <td width=64.7%>
                    <?php
                        if ($user->get('telefono') == "") {
                            $cod = "";
                            $tlf = "";
                        }
                        else {
                            $cod = substr($telefono,0,4);
                            $tlf = substr($telefono,4,11);
                        }
                    ?>
                    <select name="codigo" id="codigo">
                        <option value="<?php echo $cod?>" selected="selected"><?php echo $cod?></option>
                        <option value="0212">0212</option>
                        <option value="0412">0412</option>
                        <option value="0414">0414</option>
                        <option value="0424">0424</option>
                        <option value="0416">0416</option>
                        <option value="0426">0426</option>
					</select>-<input title="Ingrese su n�mero de tel�fono" type="text" name="tlf" id="tlf" value="<?php echo $tlf?>" maxlength="7" size="7" onkeypress="return onlyNumbers(event)"/></td></tr>
            </tr>
            <tr>
                <td align="left">
                    <LABEL for="cedula"><b>Cedula o Carnet:</b></LABEL>
                </td>
                <td width=64.5%>
                    <input title="Cedula Carnet" type="text" id="cedula" name="cedula" value="<?php echo $user->get('carnetOCedula'); ?>" />
                </td>
            </tr>
            <tr>
                <td align="left" width=35.5%>
                    <LABEL for="Rol"><b>Rol:</b></LABEL>
                </td>
                <td width=64.5%>
                    <?php
                        switch ($user->get('rol')) {
                            case 0:
                                $rol = "Administrador";
                                break;
                            case 1:
                                $rol = "Administrador/Profesor";
                                break;
                            case 2:
                                $rol = "Profesor";
                                break;
                            case 3:
                                $rol = "Estudiante";
                                break;
							case 4:
                                $rol = "Cliente";
                                break;
                            default:
                                $rol = "Desconocido";
                                break;
                        }
                    if (isset($_SESSION["admin"]) && $_SESSION["admin"]){
					?>
					
                    <select name="rol" id="rol">
                        <option value="0" <?php if ($user->get('rol') == 0) echo 'selected="selected"';?>>Administrador</option>
						 <option value="1" <?php if ($user->get('rol') == 1) echo 'selected="selected"';?>>Administrador/Profesor</option>
                        <option value="2" <?php if ($user->get('rol') == 2) echo 'selected="selected"';?>>Profesor</option>
						<option value="3" <?php if ($user->get('rol') == 3) echo 'selected="selected"';?>>Estudiante</option>
                        <option value="4" <?php if ($user->get('rol') == 4) echo 'selected="selected"';?>>Cliente</option>
					</select>
				 
                </td>
            </tr>
            <tr>
                <td align="left">
                    <LABEL for="estado"><b>Estado:</b></LABEL>
                </td>
                <?php
                    $status = $user->get('activo');
                ?>
                <td>
                    <input type="radio" name="group1" value="1" <?php if ($status == 1) echo "checked";?>>Activo
                    <input type="radio" name="group1" value="0" <?php if ($status == 0) echo "checked";?>>Inactivo
                </td>
            </tr>
			<?php }else	echo $rol; ?>
        </table> 
	</div>
	<div class="section_w701">
		<table border="0"  width="55%"  id="tableOperaciones">
			<tr >
                <td  colspan="2" >
					<input type="hidden" name="submitRegistration" value="true"/>
					<input type="hidden" name="email" value="<?php echo $user->get('correoUSB');?>"/>
					 <input type="image" width="50" height="50" id="enviar" name="enviar" src="images/ICO/guardar.png" alt="Guardad Cambios" class="submitbutton" title="Guardad Cambios"  />
				</td>
            </tr>
		</table>
	</div>
    </form>  
	<?php if (isset($_SESSION["admin"]) && !isset($_GET['email'])){
					?>
	<form name="formacambiarContrasena" action="acciones/cambiarContrasena.php" method="post">
		<div class="section_w702">
        <table border="0">
            <tr>
                <td><LABEL for="passact"><b>Contrasena Actual:</b></LABEL> </td>
                <td><input type="password" value="**********" name="pass" size="10" class="inputfield" title="Contrase�a" onfocus="clearText(this)" onblur="clearText(this)" onkeypress="return onlyAlfaNumbers(event)"/></td>
            </tr>
            <tr>
                <td><LABEL for="passnuv"><b>Contrasena Nueva:</b></LABEL> </td>
                <td><input type="password" value="**********" name="passnew" size="10" class="inputfield" title="Contrase�a" onfocus="clearText(this)" onblur="clearText(this)" onkeypress="return onlyAlfaNumbers(event)"/></td>
            </tr>
            <tr>
                <td><LABEL for="passnuv2"><b>Confirmar contrasena:</b></LABEL>  </td>
                <td><input type="password" value="**********" name="passnew2" size="10" class="inputfield" title="Contrase�a" onfocus="clearText(this)" onblur="clearText(this)" onkeypress="return onlyAlfaNumbers(event)"/></td>
            </tr>
        </table>
		</div>
		<div class="section_w701">
		<table border="0"  width="55%"  id="tableOperaciones">
			<tr >
                <td  colspan="2" >
					<input type="hidden" name="submitRegistration" value="true"/>
					<input type="image" width="50" height="50" id="enviar" name="enviar" src="images/ICO/Login.ico" alt="Guardad Cambios" class="submitbutton" title="Cambiar Contrasena"  />
				</td>
            </tr>
		</table>
		</div>
	</form>
   <?php } ?>
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