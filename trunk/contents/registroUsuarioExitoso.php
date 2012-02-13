<? //if (!isset ($_POST['acepto'])) header('Location:principal.php?content=previoSolicitud')?>
<?php
    if (isset($_SESSION["admin"]) && $_SESSION["admin"] == true) {
?>
<div id="main_column">

    <div class="section_w700">

        <h2>Registro de Usuario</h2>

        <p><b> 
            <?php 
                if ($_GET["exito"] == 1) {
                    echo "Se registro el usuario ".$_GET['email']." exitosamente";
                }
                else {
                    echo "Ya existe el usuario: ".$_GET['email'];
                }
             ?> 
        </b></p>
    </div>        
    <div class="margin_bottom_20"></div>

    <div class="section_w700">
        <form name="formaRegistroSolicitud" action="principal.php" method="post">
        <table border="0">
            <tr>
                    <td><input type="hidden" name="goBack" value="true"/></td>
                    <td colspan="1">
                    <input type="submit" id="volver" name="volver" value="Volver" alt="Volver" class="submitbutton" title="Volver a home" />
                    </td>
            </tr>
        </table>
        </form>
        <h3> </h3>
    </div>  

    <div class="margin_bottom_20"></div>
    <div class="cleaner"></div>
</div> <!-- end of main column -->

<!-- end of side column 1 -->

<div class="side_column_w200">

    <!-- barra lateral -->

</div> <!-- end of right side column -->

<div class="cleaner"></div>

<?php
}
else {
    echo '<h3>No posee permisos de administrador.</h3>';
    echo '<div class="news_title"><a href="principal.php">Ir a la p?gina principal</a></div>';
}
?>