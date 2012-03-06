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
?>

<div id="main_column">
	<div class="section_w701"><font size="6" face="arial"><b>Perfil de Usuario:</b></font>
		<font size="5" face="arial"> <?php echo $user->get('correoUSB')?></font></div>
    <div class="section_w702">
        <table border="0" width="80%" align="center">
            <tr><td align="left" width="50%"><font size="5" face="arial"><b>Nombre:</b></font></td>
                <td width="50%"><font size="4" face="arial"><?php echo $user->get('nombre'); ?></font></td>
            </tr>
            <tr>
                <td align="left"><font size="5" face="arial"><b>Apellido:</b></font></td>
                <td align="left"><font size="4" face="arial"><?php echo $user->get('apellido'); ?></font></td>
            </tr>
            <tr>
                <td align="left"><font size="5" face="arial"><b>Correo Opcional:</b></font></td>
                <td align="left"><font size="4" face="arial">
                        <?php 
                            if ($user->get('correoOpcional') == "")
                                echo "No especificado"; 
                            else
                                echo $user->get('correoOpcional'); 
                        ?>
				</font>
                </td>
            </tr>
            <tr>
                <td align="left"><font size="5" face="arial"><b>Telefono:</b></font></td>
                <td align="left"><font size="4" face="arial">
                        <?php 
                            if ($user->get('telefono') == "")
                                echo "No especificado"; 
                            else
                                echo $user->get('telefono'); 
                        ?>
                    </font>
                </td>
            </tr>
            <tr>
                <td align="left"><font size="5" face="arial"><b>Cedula o Carnet:</b></font></td>
                <td align="left">
                    <font size="4" face="arial">
                        <?php 
                            if ($user->get('carnetOCedula') == "")
                                echo "No especificado"; 
                            else
                                echo $user->get('carnetOCedula'); 
                        ?>
                    </font>
                </td>
            </tr>
            <tr>
                <td align="left"><font size="5" face="arial"><b>Rol:</b></font></td>
                <td align="left"><font size="4" face="arial">
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
                    </font>
                </td>
            </tr>
            <tr>
                <td align="left"><font size="5" face="arial"><b>Estado:</b></font>
                </td>
                <td align="left"><font size="4" face="arial">
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
                    </font>
                </td>
            </tr>
        </table>
    </div>
	<?php
		if (!$_SESSION["admin"] || ($_SESSION["admin"] && !isset($_GET['email']))){ ?>
		<div class="section_w700">
		<center>
		<IMG SRC="images/ICO/user_edit.png" style="cursor:pointer" onclick='location.href="?content=editaUsuario"' width="60" height="60" type="button" title="Editar Perfil de Usuario"> 
		</center>
		</div>  
	<?php } ?>
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