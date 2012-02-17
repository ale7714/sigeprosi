<div class="font"><b>
</b>
</div> <!-- end message error -->
<div class="box">

    <h3>Entrar al sistema</h3>

    <form action="acciones/IniciarSesion.php" method="post">
        <input type="text" value="Usuario..." name="user" size="10" class="inputfield" title="Nombre de Usuario" onfocus="clearText(this)" onblur="clearText(this)" />
        <input type="text" value="Contraseña..." name="pass" size="10" class="inputfield" title="Contraseña" onfocus="clearText(this)" onblur="clearText(this)" onkeypress="return onlyAlfaNumbers(event)"/>
        <input type="hidden" name="content" value="<? echo $_GET['content'];?>">
        <input type="submit" name="entrar" value="Ingresar" alt="Ingresar" class="submitbutton" title="Iniciar Sesión" />
		    <?php 
	if ($_GET['error']=="datosVacios")     echo 'NOTA: Debe especificar un usuario y contraseña';
    if ($_GET['error']=="noRegistrado")     echo 'NOTA: Usuario no registrado.';
    if ($_GET['error']=="errorPass")      echo 'NOTA: Contraseña incorrecta.';
    if ($_GET['error']=="cuentaDesactivada")	echo 'NOTA: Cuenta desactivada, contacte al administrador del sistema.';
    ?>
    </form>
	
    <div class="cleaner"></div>
</div>
