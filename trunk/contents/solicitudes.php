<div id="main_column">

    <div class="section_w700">

        <h2>Solicitudes de requerimientos</h2>

        <p><span class="em_text">En esta sección podrá realizar solicitudes de requerimientos de sistema, 
              o bien de consultar el estado de alguna solicitud realizada.</span></p>

    </div>        

    <div class="margin_bottom_20"></div>

    <div class="section_w700">

        <h3>Consulta de solicitud</h3>
        <form action="buscarSolicitud.php" method="post">
            <input type="text" value="Número solicitud..." name="number" size="10" maxlength="15" class="inputfield" title="Número solicitud" onfocus="clearText(this)" onblur="clearText(this)" onkeypress="return onlyAlfaNumbers(event)"/>
            <input type="text" value="Correo electrónico..." name="email" size="10" class="inputfield" title="Correo electrónico" onfocus="clearText(this)" onblur="clearText(this)" />
            <input type="submit" name="entrar" value="Consultar" alt="Consultar" class="submitbutton_left" title="Consultar solicitud" />
        </form>

    </div>        

    <div class="section_w700">

        <!--h3>Crear solicitud</h3-->
        <div class="button_01"><a href="?content=previoSolicitud">Crear solicitud</a></div>

    </div>        

    <div class="margin_bottom_20"></div>
    <div class="cleaner"></div>
</div> <!-- end of main column -->

<!-- end of side column 1 -->
        
<div class="side_column_w200">

    <!-- barra lateral -->
    <? include 'sidebars/barraInicioSesion.php';?>
    <? include 'sidebars/barraEnlaces.php';?>

</div> <!-- end of right side column -->

<div class="cleaner"></div>