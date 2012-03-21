<div id="templatemo_menu_wrapper">
	<div id="templatemo_menu">
    	<ul>
            <li><a href="?content=inicio" <?if ($page=='inicio'){?>class="current fast"<?}?>><b>Inicio</b></a></li>
            <li><a href="?content=gestionarProyecto" <?if ($page=='gestionarProyecto')  {?>class="current fast"<?}?>><b>Proyectos</b></a></li>
            <li><a href="?content=gestionarSolicitud" <?if (($page=='gestionarSolicitud') || ($page=='editaSolicitud') || ($page=='consultaSolicitudExitosa')) {?>class="current fast"<?}?>><b>Solicitudes</b></a></li>
            <li><a href="?content=gestionarUsuario" <?if (($page=='gestionarUsuario') || ($page=='consultaUsuario') || ($page=='editaUsuario') || ($page=='cambiarContrasena')){?>class="current fast"<?}?>><b>Usuarios</b></a></li>		
        </ul>
    </div> <!-- end of menu -->
    
</div> <!-- end of menu wrapper -->
