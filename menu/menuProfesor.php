<div id="templatemo_menu_wrapper">

	<div id="templatemo_menu">
    	<ul>
            <li><a href="?content=inicio" <?if ($page=='inicio'){?>class="current fast"<?}?>><b>Inicio</b></a></li>
            <li><a href="?content=gestionarEquipo" <?if (($page=='gestionarEquipo') || ($page=='registroEquipo') || ($page=='consultaEquipo') || ($page=='editaEquipo')) {?>class="current fast"<?}?>><b>Equipos</b></a></li>
            <li><a href="?content=gestionarProyecto" <?if (($page=='gestionarProyecto') || ($page=='registroProyecto') || ($page=='consultaProyecto') || ($page=='editaProyecto')){?>class="current fast"<?}?>><b>Proyectos</b></a></li>
            <li><a href="?content=gestionarEvaluacion" <?if (($page=='gestionarEvaluacion') || ($page=='registroEvaluacion') || ($page=='consultoEvaluacion') || ($page=='editaEvaluacion')){?>class="current fast"<?}?>><b>Evaluaciones</b></a></li>
            <li><a href="?content=gestionarPlanificacion" <?if (($page=='gestionarPlanificacion') || ($page=='registroPlanificacion') || ($page=='editoPlanificacion') || ($page=='consultoPlanificacion') || ($page=='registroPlanificacionConPlantilla')){?>class="current fast"<?}?>><b>Planificaciones</b></a></li>
            <li><a href="?content=gestionarSolicitud" <?if ($page=='gestionarSolicitud'){?>class="current fast"<?}?>><b>Solicitudes</b></a></li>
			<li><a href="?content=gestionarIteracion" <?if ($page=='gestionarIteracion'){?>class="current fast"<?}?>><b>Iteraciones</b></a></li>
        </ul>
    </div> <!-- end of menu -->
    
</div> <!-- end of menu wrapper -->
