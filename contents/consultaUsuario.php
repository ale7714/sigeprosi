<?php
if (!(isset($_SESSION["admin"]))){
	include "contents/areaRestringida.php";
	echo '<script>';
	echo 'alert("No tiene permisos para acceder a esta area del sistema.");';
	//echo 'location.href="principal.php"';
	echo '</script>';
}else{
$root = $_SERVER['DOCUMENT_ROOT']."/sigeprosi/";
include_once $root."class/class.fachadainterfaz.php";
include_once $root."class/class.Usuario.php";
if (isset($_GET['email'])) {
	$fachada = fachadaInterfaz::getInstance();
	$user = $fachada->consultarUsuario($_GET['email']);
}

 
?>

<div id="main_column">

    <div class="section_w700">

        <h2>Usuario:  <?php echo $user->get('correoUSB')?></h2>

    </div>        
    <div class="margin_bottom_20"></div>

    <div class="section_w700">

        <table border="0">
            <tr>
                <td align="left" width=35.5%>
                    <LABEL for="nombre"><b>Nombre:</b></LABEL>
                </td>
                <td width=64.5%>
                    <LABEL for="nombre2"><?php echo $user->get('nombre'); ?></LABEL>
                </td>
            </tr>
            <tr>
                <td align="left">
                    <LABEL for="apellido"><b>Apellido:</b></LABEL>
                </td>
                <td align="left">
                    <LABEL for="nombre2"><?php echo $user->get('apellido'); ?></LABEL>
                </td>
            </tr>
            <tr>
                <td align="left">
                    <LABEL for="correoOpt"><b>Correo Opcional:</b></LABEL>
                </td>
                <td align="left">
                    <LABEL for="correoOpt2">
                        <?php 
                            if ($user->get('correoOpcional') == "")
                                echo "N/A"; 
                            else
                                echo $user->get('correoOpcional'); 
                        ?>
                    </LABEL>
                </td>
            </tr>
            <tr>
                <td align="left">
                    <LABEL for="tel"><b>Telefono:</b></LABEL>
                </td>
                <td align="left">
                    <LABEL for="tel2">
                        <?php 
                            if ($user->get('telefono') == "")
                                echo "N/A"; 
                            else
                                echo $user->get('telefono'); 
                        ?>
                    </LABEL>
                </td>
            </tr>
            <tr>
                <td align="left">
                    <LABEL for="cedula"><b>Cedula o Carnet:</b></LABEL>
                </td>
                <td align="left">
                    <LABEL for="cedula2">
                        <?php 
                            if ($user->get('carnetOCedula') == "")
                                echo "N/A"; 
                            else
                                echo $user->get('carnetOCedula'); 
                        ?>
                    </LABEL>
                </td>
            </tr>
            <tr>
                <td align="left">
                    <LABEL for="rol"><b>Rol:</b></LABEL>
                </td>
                <td align="left">
                    <LABEL for="rol2">
                        <?php 
                            switch ($user->get('rol')) {
                                case 0:
                                    echo "Administrador.";
                                    break;
                                case 2:
                                    echo "Profesor.";
                                    break;
                                case 4:
                                    echo "Cliente.";
                                    break;
                                case 3:
                                    echo "Estudiante.";
                                    break;
								case 1:
                                    echo "Administrador/Profesor.";
                                    break;
                                default:
                                    echo "Desconocido.";
                                    break;
                            }
                        ?>
                    </LABEL>
                </td>
            </tr>
            <tr>
                <td align="left">
                    <LABEL for="estado"><b>Estado:</b></LABEL>
                </td>
                <td align="left">
                    <LABEL for="estado2">
                        <?php 
                            switch ($user->get('activo')) {
                                case 1:
                                    echo "Activo.";
                                    break;
                                default:
                                    echo "Inactivo.";
                                    break;
                            }
                        ?>
                    </LABEL>
                </td>
            </tr>
            <tr>
                <td><input type="hidden" name="submitEditar" value="true"/></td>
                <td colspan="2">
                <?php
                    echo '<div class="button_01"><a href="?content=editaUsuario&email='.$user->get('correoUSB').'">Editar</a></div>';
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
<?php  } ?>