
	<div id="templatemo_menu">
    	<ul>
            <li><a href="?content=inicio" <?if ($page=='inicio'){?>class="current fast"<?}?>><b>Inicio</b></a></li>
            <li><a href="#" <?if ( ($page=='consultarDocumentos') || ($page=='gestionarEquipo') || ($page=='registroEquipo') || ($page=='consultaEquipo') || ($page=='editaEquipo') || ($page=='gestionarEvaluacion') || ($page=='registroEvaluacion') || ($page=='consultoEvaluacion') || ($page=='editaEvaluacion')){?>class="current fast"<?}?>> <b>Estudiantes</b></a>
            <ul>
               <li><a href="?content=gestionarEquipo" ><b>Equipos</b></a></li>
               <li><a href="?content=gestionarEvaluacion"><b>Evaluaciones</b></a></li>
               <li><a href="?content=consultarDocumentos"><b>Documentos</b></a></li>
            </ul>
            </li>
            <li><a href="?content=gestionarProyecto" <?if (($page=='gestionarProyecto') || ($page=='registroProyecto') || ($page=='consultaProyecto') || ($page=='editaProyecto')){?>class="current fast"<?}?>><b>Proyectos</b></a></li>
           
            <li><a href="?content=gestionarPlanificacion" <?if (($page=='gestionarPlanificacion') || ($page=='registroPlanificacion') || ($page=='editoPlanificacion') || ($page=='consultoPlanificacion') || ($page=='registroPlanificacionConPlantilla')){?>class="current fast"<?}?>><b>Planificaciones</b></a></li>
            <li><a href="?content=gestionarSolicitud" <?if (($page=='gestionarSolicitud') || ($page=='editaSolicitud') || ($page=='consultaSolicitudExitosa')){?>class="current fast"<?}?>><b>Solicitudes</b></a></li>	
            <li><a href="#" <?if (($page=='gestionarRespaldo')  ||  ($page=='gestionarUsuario') || ($page=='consultaUsuario') || ($page=='editaUsuario') || ($page=='cambiarContrasena')){?>class="current fast"<?}?> > <b>Configuraci&oacute;n</b></a>
            <ul>
                <li><a href="?content=gestionarRespaldo"><b>Respaldo</b></a></li>
                <li><a href="?content=gestionarUsuario"><b>Usuarios</b></a></li>	
            </ul>
            </li>
	</ul>
    </div> <!-- end of menu -->
    

