<?php
if (isset($_SESSION["admin"]) && $_SESSION["admin"] ) {
?>
<?php 
$root = $_SERVER['DOCUMENT_ROOT']."/sigeprosi/";
include_once $root."class/class.fachadainterfaz.php";
include_once $root."class/class.Usuario.php";
if (isset($_GET['email'])) {
	$fachada = fachadaInterfaz::getInstance();
	$user = $fachada->consultarUsuario($_GET['email']);
    $telefono = $user->get('telefono');
}
?>

<div id="main_column">

    <div class="section_w700">

        <h2>Editar Usuario: <?php echo $user->get('correoUSB')?></h2>
        
    </div>        
    <div class="margin_bottom_20"></div>

    <div class="section_w700">


        <form name="formaSolicitud" action="acciones/editaUsuario.php" method="post">
        
        <table border="0">
            <tr>
                <td align="left" width=35.5%>
                    <LABEL for="nombre"><b>Nombre:</b></LABEL>
                </td>
                <td width=64.5%>
                    <input title="Nombre" type="text" id="nombre" name="nombre" value="<?php echo $user->get('nombre'); ?>" />
                </td>
            </tr>
            <tr>
                <td align="left" width=35.5%>
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
					</select>-<input title="Ingrese su número de teléfono" type="text" name="tlf" id="tlf" value="<?php echo $tlf?>" maxlength="7" size="7" onkeypress="return onlyNumbers(event)"/></td></tr>
					<input type="hidden" name="codigo" value="<?php echo $cod?>"/>
					<input type="hidden" name="telefono" value="<?php echo $tlf?>"/>
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
                                $rol = "Administrador.";
                                break;
                            case 1:
                                $rol = "Profesor.";
                                break;
                            case 2:
                                $rol = "Cliente.";
                                break;
                            case 3:
                                $rol = "Estudiante.";
                                break;
                            default:
                                $rol = "Desconocido.";
                                break;
                        }
                    ?>
                    <select name="codigo" id="codigo">
                        <option value="<?php echo $user->get('rol')?>" selected="selected"><?php echo $rol?></option>
                        <option value="0">Administrador</option>
                        <option value="1">Profesor</option>
                        <option value="2">Cliente</option>
                        <option value="3">Estudiante</option>
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
                    <input type="radio" name="group1" value="0" <?php if ($status == 1) echo "checked";?>>Activo
                    <input type="radio" name="group1" value="0" <?php if ($status == 0) echo "checked";?>>Inactivo
                </td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="submitEdit" value="true"/>
                    <input type="hidden" name="email" value="<?php echo $user->get('email');?>"/>
                </td>
                <td colspan="2">
                    <input type="submit" id="enviar" name="enviar" value="Guardar" alt="Guardar" class="submitbutton" title="Guardar cambios" />
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
} else {
?>

<?php
}
?>