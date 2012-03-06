<div class="font"><b>
</b>
</div> <!-- end message error -->
<div class="box">

    <h3>Entrar al sistema</h3>

    <form action="acciones/IniciarSesion.php" method="post">
	<table border="0">
	<tr><td>
        <input type="text" value="Usuario..." name="user" size="10" class="inputfield" title="Nombre de Usuario" onfocus="clearText(this)" onblur="clearText(this)" />
    </td></tr>
	<tr><td>
		<input type="text" value="Contraseña..." name="pass" size="10" class="inputfield" title="Contraseña" onfocus="clearText(this)" onblur="clearText(this)" onkeypress="return onlyAlfaNumbers(event)"/>
    </td></tr>
		
		<?php 
		if (isset($_GET['error'])){
	echo '<tr><td>';
	if ($_GET['error']=="noActivo")     echo 'NOTA: Usuario inactivo, comuniquese con el administrador';
    if ($_GET['error']=="noRegistrado")     echo 'NOTA: Usuario no registrado.';
    if ($_GET['error']=="errorPass")      echo 'NOTA: Contraseña incorrecta.';
    if ($_GET['error']=="cuentaDesactivada")	echo 'NOTA: Cuenta desactivada, contacte al administrador del sistema.';
    echo '</td></tr>';
	}
	?>
    </table>
	<table align="center" width="30%"><tr><td>   
		<input type="hidden" name="content" value="<? echo $_GET['content'];?>">
	   <input type="image" width="100" height="50" id="enviar" name="enviar" src="images/ICO/ingresar.png" alt="Iniciar Sesion" class="submitbutton" title="Iniciar Sesion"  />
	</td></tr></table>
	</form>
	
    <div class="cleaner"></div>
</div>
