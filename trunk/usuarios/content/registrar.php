<? //if (!isset ($_POST['acepto'])) header('Location:principal.php?content=previoSolicitud')?>
<div id="main_column">

    <div class="section_w700">

<h2>Registro de usuario</h2> 
		<table border="0" align="center">
		    
		    <tr><td>
                    <hr noshade size="1">
                    <b><font color="white"><p align="justify"><strong>Atenci&oacute;n :</strong> Este servicio presta restricciones de seguridad al intentar
                    acceder al sistema. S&oacute;lo se permitir&aacute; el acceso a los proyectos a aquellos estudiantes
                    que est&eacute;n cursando actualmente la materia y a los profesores que se encuentren dictando la misma. Los profesores
                    y estudiantes que no participen de la materia pueden consultar en modo usuario mas no intervenir en el desarrollo del mismo.  
                    &uacute;nicamente podr&aacute;n realizar solicitudes al sistema usuarios pertenecientes a la
                    comunidad universitaria.</b></font></p>
                    <hr noshade size="1">
                    </td></tr>
                </table>
                <br />
                <form name="addUsuario" action="acciones/registrarUsuario.php" method="post" onsubmit="return validacionForma()">

                <table border="0" align="center">
                    <tr><td colspan="3">
                        <p style="text-align:center" align="justify"><font color="white"><b>A continuaci&oacute;n ingrese la informaci&oacute;n solicitada.</b></font></p>
                        
                    </td></tr>
                    <tr height="22px"><td colspan="3" >
                        
                        <b>
                        <?if ($_GET['error']=="camposVacios"){
                            echo '<span style="color: red;"> Debe llenar todos los campos obligatorios</span>';
                        }
                        else if ($_GET['error']=="passNoCoinciden"){
                            echo '<span style="color: red;"> Las contraseñas no coinciden</span>';
                        }
                        else if ($_GET['error']=="userExist"){
                            echo '<span style="color: red;"> El usuario ya se encuentra registrado.</span>';
                        }
                        else if ($_GET['error']=="formatoCarnet"){
                            echo '<span style="color: red;"> El formato de carnet es inv&aacute;lido.</span>';
                        }
                        else if ($_GET['error']=="formatoCorreo"){
                            echo '<span style="color: red;"> El formato de correo es inv&aacute;lido.</span>';
                        }else{?>
                            <font color="white"><b>(*)Datos obligatorios</b></font>
                            <?
                        }?>
                        </b>
                        
                    </td></tr>
                    <tr>
                            <td align="right"><LABEL for="name"><font color="white"><b>*Apellidos</b></font></LABEL> :
                            </td>
                            <td><input type="text" id="name" name="name" value="" title="Use letras capitalizadas, por ejemplo: P&eacute;rez P&eacute;rez"></td>
                            <td>
                        
                            </td>

                    </tr>
                    <tr>
                            <td align="right"><LABEL for="surname"><font color="white"><b>*Nombres</b></font></LABEL> :</td>
                            <td><input type="text" name="surname" id="surname" value="" title="Use letras capitalizadas, por ejemplo: Jos&eacute; Luis"></td>
                            <td>
                         
                            </td>

                    </tr>
                    <tr>
                            <td align="right"><LABEL for="officialCode"><font color="white"><b>N&uacute;mero de carnet</b></font></LABEL> :</td>
                            <td><input type="text" name="officialCode" id="officialCode" value="" title="si es estudiante de la USB deber&aacute; ser de la forma XX-XXXXX"></td>
                            <td>
                       
                            </td>

                    </tr>
                    <tr>
                            <td align="right"><LABEL for="username"><font color="white"><b>*Nombre de usuario</b></font></LABEL> :</td>
                            <td><input type="text" name="username" id="username" value="" title="Use algo corto y f&aacute;cil de recordar"></td>
                            <td>
                            
                            </td>

                    </tr>
                    <tr>
                            <td  align="right"><LABEL for="pass1"><font color="white"><b>*Contrase&ntildea;</b></font></LABEL> :</td>
                            <td><input type="password" name="pass1" id="pass1" title="Ingresé una contraseña temporal para el usuario"></td>
                            <td>
                        
                            </td>
                    </tr>

                    <tr>
                            <td align="right"><LABEL for="pass2"><font color="white"><b>*Contrase&ntildea;(de nuevo)</b></font></LABEL> :</td>
                            <td><input type="password" name="pass2" id="pass2"></td>
                            <td>
                            </td>
                    </tr>
                    <tr>

                            <td align="right"><LABEL for="email"><font color="white"><b>*Correo electr&oacute;nico</b></font></LABEL> :<br /></td>
                            <td><input type="text" name="email" id="email" value="" title="@usb.ve"></td>
                            <td>
                            
                            </td>
                    </tr>
                    <tr>
                            <td align="right"><LABEL for="email2"><font color="white"><b>Otro correo electr&oacute;nico</b></font></LABEL> :</td>

                            <td><input type="text" name="email2" id="email2" value=""></td>
                            <td>
                         
                            </td>
                    </tr>
                <tr>
                    <td><input type="hidden" name="submitRegistration" value="true"/></td>

                    <td colspan="2">
					<!-- usar el name, el id es para javascript-->
                    <input type="submit" id="registrar" name="registrar" value="Registrar" alt="Enviar" class="submitbutton" title="Registrar Usuario" />
                    <input type="button" name="cancelar" value="Cancelar" alt="Cancelar" class="submitbutton" title="Cancelar" onclick="history.back(-2)" />
                    </td>
				</tr>
				</table>
				</form>

    </div>  

    <div class="margin_bottom_20"></div>
    <div class="cleaner"></div>
</div> <!-- end of main column -->

<!-- end of side column 1 -->

<div class="side_column_w200">

    <!-- barra lateral -->

</div> <!-- end of right side column -->

<div class="cleaner"></div>