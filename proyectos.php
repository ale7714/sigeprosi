<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php error_reporting(0);?> 
<? include 'banners/header.php';?>
<body>

<? include 'banners/banner.php';?>
<? $page="proyectos";?>
<? include 'banners/menu.php';?>

    <!-- begin content-->
    <div id="templatemo_content">

        <div id="main_column">

            <div class="section_w700">

                <h2>Proyectos</h2>

                    </div>        

            <div class="margin_bottom_20"></div>

            <div class="cleaner"></div>
        </div> <!-- end of main column -->

        <!-- end of side column 1 -->
        
        <div class="side_column_w200">
            
            <div class="font"><b>
                <?if ($_GET['datosVacios']=="si"){
                    echo 'NOTA: Debe especificar un usuario y contraseña';
                }
                if ($_GET['registrado']=="no"){
                    echo 'NOTA: Usuario no registrado "'.$_GET["user"].'"';
                }
                if ($_GET['errorPass']=="si"){
                    echo 'NOTA: Contraseña incorrecta.';
                }
                if ($_GET['cuentaDesactivada']=="si"){
                    echo 'NOTA: Cuenta desactivada, contacte al administrador del sistema.';
                }
                ?>
            </b>
            </div> <!-- end message error -->
            
            <div class="box">

                <h3>Entrar al sistema</h3>

                <form action="validarUsuario.php" method="post">
                    <input type="text" value="Usuario..." name="user" size="10" class="inputfield" title="Nombre de Usuario" onfocus="clearText(this)" onblur="clearText(this)" />
                    <input type="password" value="" name="pass" size="10" class="inputfield" title="Contraseña" onfocus="clearText(this)" onblur="clearText(this)" />

                    <input type="submit" name="entrar" value="Ingresar" alt="Search" class="submitbutton" title="Iniciar Sesión" />
                </form>

                <div class="cleaner"></div>
            </div>

            <div class="box">

                <h3>Enlaces de interés</h3>

                <div class="news_section">
                    <div class="news_title"><a href="http://www.usb.ve" TARGET="_BLANK">Universidad Simón Bolívar</a></div>
                    <p></p>
                </div>

                 <div class="news_section">
                    <div class="news_title"><a href="http://ci.ldc.usb.ve/" TARGET="_BLANK">Dpto. Tecnología de Información</a></div>
                    <p></p>
                </div>

                <div class="news_section">
                    <div class="news_title"><a href="http://www.ps.usb.ve" TARGET="_BLANK">Dpto de Procesos y Sistemas</a></div>
                    <p></p>
                </div>

            </div>

            <div class="box">
            <h3>Contacto Rápido</h3>

                <form action="#" method="get">

                    <input type="text" value="Introduzca su nombre" name="name" size="10" class="inputfield" title="name" onfocus="clearText(this)" onblur="clearText(this)" />

                    <input type="text" value="Correo electrónico" name="email" size="10" class="inputfield" title="email" onfocus="clearText(this)" onblur="clearText(this)" />

                    <textarea id="message_input" rows="5" cols=""></textarea>

                    <input type="submit" name="Submit" value="Enviar" alt="Submit" class="submitbutton" title="Submit" />

                </form>
            </div>


        </div> <!-- end of right side column -->

        <div class="cleaner"></div>
    </div> <!-- end of content -->

<? include 'footer.php';?>

</body>
</html>