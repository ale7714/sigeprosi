<div id="main_column">
    <div class="section_w700"><h2>&Aacute;rea restringida.</h2></div>        
    <div class="section_w702">
        <table align="center"><tr><td>
			<table id="etapasGrid"><tr><td/></tr></table> 
			<div id="etapasPager"></div> <p></p></td></tr>
		</table>
		<div align="center"><IMG src="images/ICO/Symbol-Stop.ico" ></div>
		<center><b><span class="em_text"><font size=2 >Secci&oacute;n s&oacute;lo para usuarios autorizados.</font></span></b></center>
		<div class="margin_bottom_20"></div>
		<div class="cleaner"></div>
	</div>
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
</div>
