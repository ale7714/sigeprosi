<div id="main_column">

    <div class="section_w700">

        <b><font color="white"><h2>Se registr&oacute; satisfactoriamente al usuario.</h2>

        <p><span class="em_text">A continuaci&oacute;n se presentan los datos de confirmaci&oacute;n del usuario.
                                 Por favor reenv&iacute;e estos datos a los usuarios para que puedan ingresar al sistema en un futuro.</span></p>
								 
		<ul class="list_01">
            <li><b>Correo: <? echo $_GET['email']?></b></li>
			<li><b>Contrase&ntilde;a: <? echo $_GET['pass1']?></b></li>

        </ul>
		
		<p><span class="em_text">
		NOTA: M&aacute;s adelante se cambiar&aacute; esta opci&oacute;n y se reenviar&aacute; un correo autom&aacute;ticamente al usuario con sus datos</span></p>
		</b></font color="white">

    </div>        

    <div class="margin_bottom_20"></div>

    <div class="cleaner"></div>
</div> <!-- end of main column -->

<!-- end of side column 1 -->

<div class="side_column_w200">

<? include '../sidebar/barraExito.php';?>

</div> <!-- end of right side column -->

<div class="cleaner"></div>