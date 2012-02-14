<div class="box">

    <h3>Bienvenido</h3>

    <p><span><? //session_start();
        echo $_SESSION["nombre"].' '.$_SESSION["apellido"];?>
    </span></p>
    <div class="news_section">
        <a href="principal.php?content=cambiarContrasena">Cambiar Contrasena</a> | 
        <p> <a href="acciones/CerrarSesion.php">Cerrar sesión</a> |</p>
        <p> <a href="?content=consultaUsuario&email=<?php echo $_SESSION["correoUSB"]?>">Ver Perfil</a></p>
    </div>

    <div class="cleaner"></div>
</div>