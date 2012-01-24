<div class="box">

    <h3>Bienvenido</h3>

    <p><span><? //session_start();
        echo $_SESSION["nombre"].' '.$_SESSION["apellido"];?>
    </span></p>
    <div class="news_section">
        <a href="#">Mi Perfil</a> | 
        <a href="../acciones/desconectarse.php">Cerrar sesión</a>
    </div>

    <div class="cleaner"></div>
</div>