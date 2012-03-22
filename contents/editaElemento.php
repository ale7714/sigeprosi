<?php
 /*if (!(isset($_SESSION["admin"])) || (isset($_SESSION["admin"]) && !($_SESSION["admin"]) && (isset($_GET['email'])))){
	 include "contents/areaRestringida.php";
	 echo '<script>';
	 echo 'alert("No tiene permisos para acceder a esta area del sistema.");';
	echo 'location.href="principal.php"';
	 echo '</script>';
 }*/
	$root = $_SERVER['DOCUMENT_ROOT']."/sigeprosi/";
	include_once $root."class/class.fachadainterfaz.php";
	
	$fachada = fachadaInterfaz::getInstance();
	//if (isset($_GET['idcu']))	$cu = $fachada->consultarCasoUso($_GET['idcu']);
	//else echo "Hubo un error. Debes pasar el id del caso de Uso";
?>

<div id="main_column">
	<div class="section_w701"><font size="6" face="arial"><b>Editar elemento:</b></font>
	<div class="margin_bottom_20"></div>       
  <form name="formaElemento" action="" method="post">
		<div class="section_w702">
         <table border="0" width="80%" align="center">
            <tr>
                <td align="left" width="50%">
                    <LABEL for="nombre"><b>Cat&aacute;logo:</b></LABEL>
                </td>
                <td width=64.5% align="left">
									<select id="nombre" name="nombre">
										<?php 
											$matriz=$fachada->listarCatalogo();
											if ($matriz!=null){
												$i=0;
												var_dump($matriz);
												while($i<sizeof($matriz)){
										?>
										<option value="<?php echo $matriz[$i]['nombre'];?>" <?php if ($_GET['catalogo']==$matriz[$i]['nombre']) echo 'selected';?> > <?php echo ''.$matriz[$i]['nombre'].'';?> </option>
										<?php
													$i=$i+1;
												}
											}
										?>	
                </select>
                </td>
            </tr>
            <tr>
                <td align="left" width="50%">
                    <LABEL for="apellido"><b>Nombre:</b></LABEL>
                </td>
                <td width=64.5%>
                    <input type="text" name="nombre" id="nombre" title="Ingrese el nombre del elemento" rows="10" cols="40" value="<?php echo $_GET['nombre']; ?>" />
                </td>
            </tr>
        </table> 
		</div>
	</div>
	<div class="section_w701">
		<table border="0"  width="55%"  id="tableOperaciones" align="center">
			<tr>
        <td align="right" colspan="3">
					<input type="image" width="50" height="50" id="cancelar" name="cancelar" src="images/ICO/delete.png" alt="Cancelar" title="Cancelar" onclick="location.href='?content=listarElementos&nombre=<?php echo $_GET['catalogo'];?>'"/></td>
				<td align="left">
					<input type="image" width="50" height="50" id="guardar" name="guardar" src="images/ICO/guardar.png" alt="Guardad Cambios" class="submitbutton" title="Guardad Cambios" onclick="javascript: submit();" />
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
