<div id="templatemo_menu_wrapper">
	<div id="templatemo_menu">
    	<ul>
            
            <li><a href="?content=inicio" <?php if ($page=='inicio'){?>class="current fast"<?php }?>><b>Inicio</b></a></li>
            <li><a href="?content=gestionarEquipo" <?php if (($page=='gestionarEquipo') || ($page=='registroEquipo') || ($page=='consultaEquipo') || ($page=='editaEquipo')) {?>class="current fast"<?php }?>><b>Equipos</b></a></li>
            <li><a href="?content=gestionarProyecto" <?php if (($page=='gestionarProyecto') || ($page=='registroProyecto') || ($page=='consultaProyecto') || ($page=='editaProyecto')){?>class="current fast"<?php }?>><b>Proyectos</b></a></li>
            <li><a href="?content=gestionarEvaluacion" <?php if ($page=='gestionarEvaluacion'){?>class="current fast"<?php }?>><b>Evaluaciones</b></a></li>
            <li><a href="?content=gestionarPlanificacion" <?php if (($page=='gestionarPlanificacion') || ($page=='registroPlanificacion') || ($page=='editoPlanificacion') || ($page=='consultoPlanificacion') || ($page=='registroPlanificacionConPlantilla')){?>class="current fast"<?php }?>><b>Planificaciones</b></a></li>
            <li><a href="?content=gestionarSolicitud" <?php if (($page=='gestionarSolicitud') || ($page=='editaSolicitud') || ($page=='consultaSolicitudExitosa')){?>class="current fast"<?php }?>><b>Solicitudes</b></a></li>
            <li><a href="?content=gestionarUsuario" <?php if (($page=='gestionarUsuario') || ($page=='consultaUsuario') || ($page=='editaUsuario') || ($page=='cambiarContrasena')){?>class="current fast"<?php }?>><b>Usuarios</b></a></li>		
			<li><a href="?content=gestionarCatalogo" <?php if (($page=='gestionarCatalogo') || ($page=='consultaCatalogo') || ($page=='editaCatalogo') || ($page=='registroCatalogo')){?>class="current fast"<?php }?>><b>Cat&aacute;logos</b></a></li>		
		</ul>
    </div> <!-- end of menu -->
    
</div> <!-- end of menu wrapper -->
