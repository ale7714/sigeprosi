<?php
if (!isset($_SESSION["coordinador"]) || (!($_SESSION["coordinador"]))){
	include "contents/areaRestringida.php";
	echo '<script>';
	echo 'alert("No tiene permisos para acceder a esta area del sistema.");';
	echo 'location.href="principal.php"';
	echo '</script>';
}else{
$root = $_SERVER['DOCUMENT_ROOT']."/sigeprosi/";
// include_once $root."class/class.fachadainterfaz.php";
// include_once $root."class/class.Usuario.php";
// $fachada = fachadaInterfaz::getInstance();
// if (isset($_GET['email']))	$user = $fachada->consultarUsuario($_GET['email']);
// else	$user = $fachada->consultarUsuario($_SESSION["correoUSB"]);
// $telefono = $user->get('telefono');
?>

<div id="main_column">
	<div class="section_w701"><font size="6" face="arial"><b>Crear caso de uso:</b></font>
	<div class="margin_bottom_20"></div>       
        <form name="formaCasodeuso" onSubmit="return validarCasoUso();" action="acciones/registrarCasoUso.php" method="post">
		<div class="section_w702">
         <table border="0" width="80%" align="center">
			<tr>
                <td align="left" width="50%">
                    <LABEL for="equipo"><b>Equipo:</b></LABEL>
                </td>
                <td width=64.5%>
                    <input title="Equipo" type="text" id="equipo" disabled="disabled" name="equipo" value="<?php echo $_SESSION['Equipo'];?>"/>
					<input type="hidden" id="idequipo" name="idequipo" value="<?php echo $_SESSION['Equipo'];?>"/>
                </td>
            </tr>
            <tr>
                <td align="left" width="50%">
                    <LABEL for="nombre"><b>Nombre:</b></LABEL>
                </td>
                <td width=64.5%>
                    <input title="Nombre" type="text" id="nombre" name="nombre" value=""/>
                </td>
            </tr>
            <tr>
                <td align="left" width="50%">
                    <LABEL for="apellido"><b>Descripci&oacute;n:</b></LABEL>
                </td>
                <td width=64.5%>
                    <textarea name="descripcion" id="descripcion" title="Ingrese toda la información referente al caso de uso" rows="10" cols="40"></textarea>
                </td>
            </tr>
        </table> 
		</div>
	</div>
	<div class="section_w701">
		<table border="0"  width="55%"  id="tableOperaciones">
			<tr >
                <td  colspan="2" >
					<input type="hidden" name="submitRegistration" value="true"/>
					<input type="hidden" name="equipoCU" value="<?php echo $_SESSION["Equipo"];?>"/>
					 <input type="image" width="50" height="50" id="enviar" name="enviar" src="images/ICO/guardar.png" alt="Guardad Cambios" class="submitbutton" title="Guardad Cambios"  />
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