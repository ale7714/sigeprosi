<div id="templatemo_menu_wrapper">

	<div id="templatemo_menu">
    	<ul>
            <li><a href="?content=inicio" <?php if ($page=='inicio'){?>class="current fast"<?php }?>><b>Inicio</b></a></li>
            <li><a href="?content=gestionarProyecto" <?php if ($page=='consultaProyecto'){?>class="current fast"<?php }?>><b>Proyectos</b></a></li>
            <li><a href="?content=gestionarEvaluacion" <?php if ($page=='gestionarEvaluacion' || $page=='consultoEvaluacion' ){?>class="current fast"<?php }?>><b>Evaluaciones</b></a></li>
			<li><a href="?content=gestionarCasodeuso" <?php if ($page=='gestionarCasodeuso' || $page=='registroCasoUso' || $page=='editaCasoUso'){?>class="current fast"<?php }?>><b>Casos de Uso</b></a></li>
            <li><a href="?content=gestionarIteracion" <?php if ($page=='gestionarIteracion'){?>class="current fast"<?php }?>><b>Iteraciones</b></a></li>
						<li><a href="?content=gestionarDocumentos" <?php if ($page=='gestionarDocumentos'){?>class="current fast"<?php }?>><b>Documentos</b></a></li>
		</ul>
    </div> <!-- end of menu -->
    
</div> <!-- end of menu wrapper -->
