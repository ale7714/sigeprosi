<?php
 if (!(isset($_SESSION["admin"])) || (isset($_SESSION["admin"]) && !($_SESSION["admin"]) && (isset($_GET['email'])))){
	 include "contents/areaRestringida.php";
	 echo '<script>';
	 echo 'alert("No tiene permisos para acceder a esta area del sistema.");';
	echo 'location.href="principal.php"';
	 echo '</script>';
 }
?>

<div id="main_column">
	<div class="section_w701"><font size="6" face="arial"><b>Agregar cat&aacute;logo:</b></font>
	<div class="margin_bottom_20"></div>       
  <form name="formaCatalogo" action="acciones/agregarCatalogo.php" method="post">
		<div class="section_w702">
         <table border="0" width="80%" align="center">
            <tr>
                <td align="left" width="50%">
                    <LABEL for="nombre"><b>Nombre:</b></LABEL>
                </td>
                <td width=64.5%>
                    <input type="text" name="nombre" id="nombre" title="Ingrese el nombre del elemento" rows="10" cols="40" value="" />
                </td>
            </tr>
        </table> 
		</div>
	</div>
	<div class="section_w701">
		<table border="0" id="tableOperaciones" align="center">
			<tr>
        <td>
					<input type="image" width="50" height="50" id="guardar" name="guardar" src="images/ICO/guardar.png" alt="Guardad Cambios" class="submitbutton" title="Guardad Cambios" onclick="" />
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
