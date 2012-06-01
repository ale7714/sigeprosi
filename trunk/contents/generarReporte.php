<?php
	
	if (!isset($_SESSION['profesor']) || ((isset($_SESSION['profesor'])) && !($_SESSION['profesor']))){
		include "contents/areaRestringida.php";
		echo '<script>';
		echo 'alert("No tiene permisos para acceder a esta area del sistema.");';
		//echo 'location.href="principal.php"';
		echo '</script>';
	}else{
?>

<div id="main_column">
	<form name="generarReporte" onSubmit="" action="acciones/generarReporte.php" method="post">
	<div class="section_w701"><font size="6" face="arial"><b>Generar reportes</b></font>
	<div class="margin_bottom_20"></div>       
        
		<div class="section_w702">
         <table border="0" width="80%" align="center">
            <tr>
				<td align="right" > Tipo de reporte: </td>
				<td>
					<select name="tipoReporte" id="tipoReporte">
						<option value = "seleccion">-Selecione-</option>
						<option value = "evaluacionEstudiante">Evaluaci&oacute;n de Estudiantes</option>
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
					<input type="image" width="50" height="50" id="generar" name="generar" src="images/ICO/reporte_Task.png" alt="Generar Reporte" class="submitbutton" title="Generar Reporte"  />
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