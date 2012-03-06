<div id="main_column">

    <div class="section_w700">

        <h2>¿Qué es el SiGeProSI?</h2>
        <a href="#"><img class="image_wrapper fl_image" src="images/universidad-simon-bolivar.jpg" alt="html css templates" /></a>
        <p><span class="em_text">Es un Portal creado exclusivamente para el <a href="http://www.ps.usb.ve">Departamento de Procesos
                    y Sistemas</a> de la <a href="http://www.usb.ve">Universidad Simón Bolívar</a>, desarrollado por la empresa Jaiva
                    Solutions. Con este portal, se hace realidad, el poder guardar todos y cada uno de los proyectos realizados en la 
                    asignatura "Sistemas de Información", así como también todos los datos relacionados a estos proyectos.</span></p>

    </div>        

    <div class="margin_bottom_20"></div>

    <div class="cleaner"></div>
</div> <!-- end of main column -->

<!-- end of side column 1 -->
        
<div class="side_column_w200">

    <!-- barra lateral -->
<?php
	if (isset($_SESSION['admin'])){
		    include 'sidebars/barraEnSesion.php';
                    include 'sidebars/barraEnlaces.php';
	}else{
		
		include 'sidebars/barraInicioSesion.php';
		include 'sidebars/barraEnlaces.php';
	}
?>

</div> <!-- end of right side column -->

<div class="cleaner"></div>
