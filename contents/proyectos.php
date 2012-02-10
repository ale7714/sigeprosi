<? //if (!isset ($_POST['acepto'])) header('Location:principal.php?content=previoSolicitud')?>
<div id="main_column">

    <div class="section_w700">

        <h2>Gestionar Proyectos</h2>

        <p><span class="em_text"><b>En esta sección podra agregar, consultar o editar los proyectos.</b></span></p>
        <h2> </h2>
        <p><b> 
        </b></p>
    </div>        
<!--    <div class="margin_bottom_20"></div> -->
		<b> 
            ¿Qué desea realizar sobre proyectos?
        </b>
		<br><br>
    <div class="section_w700">
	
	       <select name="solicitud" id="solicitud">
                    <option value="" selected="selected"> -Seleccione- </option>				
				<?php 
				include_once "class/class.fachadainterfaz.php";
				$fachada = fachadaInterfaz::getInstance();
				$matriz=$fachada->listarProyecto();
				if ($matriz!=null){
					$i=0;
					var_dump($matriz);
					while($i<sizeof($matriz)){
				?> 
                    <option value="<?php $valor = $matriz[$i]['nombre']; echo $matriz[$i]['nombre']?>"> <?php echo 'Nombre:['.$matriz[$i]['nombre'].'] Estado :['.$matriz[$i]['estado'].']'; ?> </option>
				<?php
					$i=$i+1;
					}
				}
				?>	 </select> <div class="button_01"><a href="?content=consultaProyecto&nombre=<?php echo $valor ?>">Consultar </a></div>
        <br><br>
        <div class="button_01"><a href="?content=agregarProyecto">Agregar </a></div>
        

		<br>
        <h3> </h3>


    </div>  

	
    <div class="margin_bottom_20"></div>
    <div class="cleaner"></div>
</div> <!-- end of main column -->

<!-- end of side column 1 -->

<div class="side_column_w200">

    <!-- barra lateral -->

</div> <!-- end of right side column -->

<div class="cleaner"></div>

