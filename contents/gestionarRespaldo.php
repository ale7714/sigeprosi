<?php
 if (!(isset($_SESSION["admin"])) || (isset($_SESSION["admin"]) && !($_SESSION["admin"]) )){
	 include "contents/areaRestringida.php";
	 echo '<script>';
	 echo 'alert("No tiene permisos para acceder a esta area del sistema.");';
	echo 'location.href="principal.php"';
	 echo '</script>';
 }
?>

<link rel="stylesheet" type="text/css" media="screen" href="estilos/custom-theme/jquery-ui-1.8.17.custom.css" />
<link rel="stylesheet" type="text/css" media="screen" href="estilos/ui.jqgrid.css" />

<style type="text/css">
html, body {
    margin: 0;
    padding: 0;
    font-size: 86.6%;
}
</style>

<script src="jscripts/js/jquery-1.5.2.min.js" type="text/javascript"></script>
<script src="jscripts/js/i18n/grid.locale-es.js" type="text/javascript"></script>
<script src="jscripts/js/jquery.jqGrid.min.js" type="text/javascript"></script>


<?php
    /*if ($_SERVER['SERVER_ADDR'] == "127.0.0.1")
                  $root = $_SERVER['DOCUMENT_ROOT']."/sigeprosi";
          else
                  $root = "/home/ps6116-02/public_html/sigeprosi";
    */
    $root = $_SERVER['DOCUMENT_ROOT']."/sigeprosi";
?>
<div id="main_column">
	<div class="section_w701"><font size="6" face="arial"><b>Descargar respaldo del sistema:</b></font>  </div>  

    <div class="section_w701">
		<table border="0"  width="62%" id="tableOperaciones">
			<tr >
                <td  colspan="2" >
		<input type="hidden" name="submitRegistration" value="true"/>
		<input type="image" width="50" height="50" id="descargar" name="descargar" src="images/ICO/descargar.png" alt="Enviar" class="submitbutton" title="Descargar respaldo" onMouseOver="javascript:this.width=60;this.height=60"  onMouseOut="javascript:this.width=50;this.height=50" onclick="javascript: location.href='../sigeprosi/acciones/generarRespaldo.php';" />
	</td>
            </tr>
		</table>
	</div>



   <div class="section_w701"><font size="6" face="arial"><b>Restaurar:</b></font>  </div>  

		<form action="../sigeprosi/acciones/procesarRestauracion.php" method="post" enctype="multipart/form-data">
    <div class="section_w702">
			<table align="center">
				<tr>
					<td align="right"><LABEL for="documento"><b>*Seleccione el archivo de respaldo </b></LABEL> </td>
					<td align="left"><input type="file" id="adjunto" name="adjunto" size="35" title="Presione click para buscar el archivo"></td>
				
			</tr>
			<tr>
				<td><b>ATENCIÓN: el archivo de respaldo debe haber sido generado por este sistema,
							 de lo contrario no se garantiza el correcto funcionamiento.</b>
				</td>
			</tr>
			</table>
    </div>
		
	<div class="section_w700">
		<div class="section_w701">
		<table border="0"  width="62%" id="tableOperaciones">
			<tr >
                <td  colspan="2" >
		<input type="hidden" name="submitRegistration" value="true"/>
		<input type="image" width="50" height="50" id="guardar" name="guardar" src="images/ICO/guardar.png" alt="Enviar" class="submitbutton" title="Subir archivo" onMouseOver="javascript:this.width=60;this.height=60"  onMouseOut="javascript:this.width=50;this.height=50" onclick="" />
	</td>
            </tr>
		</table>
	</div>

    </div>
		</form>
    
</div> <!-- end of main column -->
	
<!-- end of side column 1 -->

<div class="side_column_w200">
    <?php
    if (isset($_SESSION['admin'])){
        include 'sidebars/barraEnSesion.php';
        include 'sidebars/barraEnlaces.php';
    }else{
        include 'sidebars/barraInicioSesion.php';
        include 'sidebars/barraEnlaces.php';
    }
    ?>
    <!-- barra lateral -->

</div> <!-- end of right side column -->

<div class="cleaner"></div>
