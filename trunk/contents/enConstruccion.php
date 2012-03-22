<? //if (!isset ($_POST['acepto'])) header('Location:principal.php?content=previoSolicitud')?>
<div id="main_column">
    <div class="section_w700"><h2>Temporalmente no disponible.</h2></div>        
    <div class="section_w702">
        <table align="center"><tr><td>
			<table id="etapasGrid"><tr><td/></tr></table> 
			<div id="etapasPager"></div> <p></p></td></tr>
		</table>
		<div align="center"><IMG src="images/ICO/Under-construction.png" width="200" height="200"></div>
		<center><b><span class="em_text"><font size=2 >Seccion en proceso de constuccion.</font></span></b></center>
		<div class="margin_bottom_20"></div>
		<div class="cleaner"></div>
	</div>
</div> <!-- end of main column -->
<!-- end of side column 1 -->
<div class="side_column_w200">
    <?php
    if (isset($_SESSION['admin'])){
        include 'sidebars/barraEnSesion.php';
         include 'sidebars/barraEnlaces.php';
    } else {
        include 'sidebars/barraInicioSesion.php';
        include 'sidebars/barraEnlaces.php';
    }
    ?>
    <!-- barra lateral -->

</div> <!-- end of right side column -->
<div class="cleaner"></div>

