<div class="box">

    <h3>Bienvenido</h3>

    <p><span><? //session_start();
        echo $_SESSION["nombre"].' '.$_SESSION["apellido"];?>
    </span></p>
  
	<IMG SRC="images/ICO/Logout.ico" width="50" height="50" type="button" onclick='location.href="acciones/CerrarSesion.php"' class="submitbutton" title="Cerrar Sesion" onMouseOver="javascript:this.width=60;this.height=60"  onMouseOut="javascript:this.width=50;this.height=50"> 
	<IMG SRC="images/ICO/Config-Tools.ico" width="50" height="50" type="button" onclick='location.href="?content=consultaUsuario&email=<?php echo $_SESSION["correoUSB"]?>"' class="submitbutton" title="Consultar Perfil de Usuario" onMouseOver="javascript:this.width=60;this.height=60"  onMouseOut="javascript:this.width=50;this.height=50"> 
	<!--
        <a href="principal.php?content=cambiarContrasena">Cambiar Contrasena</a> | 
        <p> <a href="acciones/CerrarSesion.php">Cerrar sesión</a> |</p>
        <p> <a href="?content=consultaUsuario&email=<?php echo $_SESSION["correoUSB"]?>">Ver Perfil</a></p>
    -->
	</div>
  <div class="news_section">
    <div class="cleaner"></div>
</div>