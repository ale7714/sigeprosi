<?php
// if (!(isset($_SESSION["admin"])) || (isset($_SESSION["admin"]) && !($_SESSION["admin"]) && (isset($_GET['email'])))){
	// include "contents/areaRestringida.php";
	// echo '<script>';
	// echo 'alert("No tiene permisos para acceder a esta area del sistema.");';
	//echo 'location.href="principal.php"';
	// echo '</script>';
// }else{
	$root = $_SERVER['DOCUMENT_ROOT']."/sigeprosi/";
	include_once $root."class/class.fachadainterfaz.php";
	//include_once $root."class/class.CasoUso.php";
	$fachada = fachadaInterfaz::getInstance();
	if (isset($_GET['idcu']))	$cu = $fachada->consultarCasoUso($_GET['idcu']);
	else echo "Hubo un error. Debes pasar el id del caso de Uso";
// $telefono = $user->get('telefono');
?>

<div id="main_column">
	<div class="section_w701"><font size="6" face="arial"><b>Editar caso de uso:</b></font>
	<div class="margin_bottom_20"></div>       
        <form name="formaCasodeuso" action="acciones/registroCasoUso.php" method="post">
		<div class="section_w702">
         <table border="0" width="80%" align="center">
            <tr>
                <td align="left" width="50%">
                    <LABEL for="nombre"><b>Nombre:</b></LABEL>
                </td>
                <td width=64.5%>
                    <input title="Nombre" type="text" id="nombre" name="nombre" value= "<?php echo $cu['nombre']; ?>"/>
                </td>
            </tr>
            <tr>
                <td align="left" width="50%">
                    <LABEL for="apellido"><b>Descripcion:</b></LABEL>
                </td>
                <td width=64.5%>
                    <textarea name="descripcion" id="descripcion" title="Ingrese toda la información referente al caso de uso" rows="10" cols="40" value = <?php echo $cu['descripcion']; ?>></textarea>
                </td>
            </tr>
			<tr>
				<td align="left" width="50%">
                    <LABEL for="completitud"><b>Porcentaje(%):</b></LABEL>
				</td>
				<td>
					<select name="completitud" id="completitud">
									<option value= <?php echo $cu['completitud'];?> selected="selected"><?php echo $cu['completitud'];?></option>
									<option value=0>00</option>
									<option value=10>10</option>
									<option value=20>20</option>
									<option value=30>30</option>
									<option value=40>40</option>
									<option value=50>50</option>
									<option value=60>60</option>
									<option value=70>70</option>
									<option value=80>80</option>
									<option value=90>90</option>
									<option value=100>100</option>
					</select>
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
					<input type="hidden" name="idcu" value="<?php echo $cu['idcu'];?>"/>
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