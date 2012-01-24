<? //if (!isset ($_POST['acepto'])) header('Location:principal.php?content=previoSolicitud')?>
<div id="main_column">

    <div class="section_w700">

        <h2>Creacion de Proyectos</h2>

        <p><span class="em_text"><b>ATENCI�N : Por favor, rellene los siguientes campos, para completar 
                                    su solicitud. Todos los campos son obligatorios.</b></span></p>
        <h2> </h2>


        <p><b> 
            <?php  if (!isset ($_GET['error'])){
   			        $_GET['error'] = null;
                   }
			    if ($_GET['error']=="camposVacios"){
                    echo '<span style="color: red;">Debe llenar todos los campos obligatorios</span>';
                }
                else if ($_GET['error']=="solicExist"){
                    echo '<span style="color: red;">La solicitud ya se encuentra registrada.</span>';
                }
                else if ($_GET['error']=="formatoTlf"){
                    echo '<span style="color: red;">El formato del tel�fono es inv�lido.</span>';
                }
                else if ($_GET['error']=="Unidad"){
                    echo '<span style="color: red;">Debe seleccionar una Unidad.</span>';
                }
                else if ($_GET['error']=="formatoCorreo"){
                    echo '<span style="color: red;">El formato de correo es inv�lido.</span>';
                }else {
                    echo '(*) Datos obligatorios.';
                }
             ?> 
        </b></p>
    </div>        
    <div class="margin_bottom_20"></div>

    <div class="section_w700">
        <form name="formaRegistroSolicitud" action="" method="post">
        <table border="0">
            <tr>
                <td align="right" width=35.5%><LABEL for="email"><b>*E-mail:</b></LABEL> 
                    </td>
                    <td width=64.5%><input title="Ingrese su correo electr�nico" type="text" id="email" name="email" value="ejemplo@usb.ve" onfocus="clearText(this)" onblur="clearText(this)"/></td>
            </tr>

                <tr>
                    <td align="right"><b>*UnidadUSB:</b>
                </td>
                <td align="left">
                <select name="department">
                    <option value="" selected="selected"> -Seleccione- </option>
					
                    <option value="Apoyo Logistico"> Apoyo Logistico </option>
					
                </select>
                </td>
            </tr>

<!--
            <tr>
                <td align="right"><LABEL for="surname"><b>*Nombre de proyecto:</b></LABEL> </td>
                    <td><input title="Ingrese un nombre para su proyecto" type="text" name="nameproy" id="nameproy" value=""/></td>
            </tr>
            <tr>
                <td align="right"><LABEL for="surname"><b>*Nombre del solicitante:</b></LABEL> :</td>
                    <td><input title="Ingrese su nombre y apellido" type="text" name="namesoli" id="namesoli" value=""/></td>
            </tr>
            <tr>
                <td align="right"><LABEL for="surname"><b>*Direcci�n:</b></LABEL> :</td>
                    <td><input title="Ingrese su direcci�n exacta" type="text" name="direccion" id="direccion" value=""/></td>
            </tr> 
			
-->


            <tr>
                <td align="right"><LABEL for="surname"><b>*�Cu�ntas personas ,aproximadamente,<br/>ser�an beneficiadas por el sistema?</b></LABEL> :</td>
                           <td><input title="Ingrese un n�mero aproximado" type="text" name="personas" id="personas" value="" maxlength="7" onkeypress="return onlyNumbers(event)"/></td>
            </tr>
            <tr>
                <td align="right"><LABEL for="surname"><b>*Planteamiento del problema:</b><br/>(M�x. 500 caracteres)</LABEL></td>
                    <td><textarea name="planteamiento" id="planteamiento" title="Ingrese toda la informaci�n referente al problema" rows="10" cols="40" onkeypress="return contadorCaracteres(event)"></textarea></td>
            </tr>
            <tr>
                <td align="right"><LABEL for="surname"><b>*�Dispone de Recursos tecnol�gicos?<br/>De ser as� indique cu�les</b><br/>(M�x. 500 caracteres)</LABEL> </td>
                    <td><textarea name="recursos" id="recursos" title="computadora, servidor, conexi�n a internet, etc." rows="5" cols="40"></textarea></td>
            </tr>
            <tr>
                <td align="right"><LABEL for="surname"><b>*�Dispone de tiempo libre <br/> para dedic�rselo al sistema?</b><br/>(M�x. 500 caracteres) </LABEL> </td>
                    <td><textarea name="tiempolibre" id="tiempolibre" title="Ingrese toda la informaci�n acerca de su tiempo libre" rows="5" cols="40"></textarea></td>
            </tr>
            <tr>
                <td align="right"><LABEL for="surname"><b>*�Por qu� cree usted que es necesario<br/>desarrollar un SI para su problema? </b><br/>(M�x. 500 caracteres)</LABEL> </td>
                    <td><textarea name="justificacion" id="justificacion" title="Justifique el por qu� es necesario para usted, desarrollar un Sistema de informaci�n para su problema particular" rows="5" cols="40"></textarea></td>
            </tr>
			<tr>
				<td colspan="2">	
					<table id="tablaTel" border="0" width=100%>
						<td align="right"><LABEL for="surname" width=35.3%><b>*Tel�fono:</b></LABEL> </td>
						<td width=64.7%><select name="codigo[]" id="codigo[]" onchange="activarCampo(this.value, 'tlf[]')">
									<option value="codigo" selected="selected">C�digo</option>
									<option value="0212">0212</option>
									<option value="0412">0412</option>
									<option value="0414">0414</option>
									<option value="0424">0424</option>
									<option value="0416">0416</option>
									<option value="0426">0426</option>
							</select>-<input title="Ingrese su n�mero de tel�fono" type="text" name="tlf[]" id="tlf[]" value="" maxlength="7" size="7" disabled="disabled" onkeypress="return onlyNumbers(event)"/></td>
					</table>
				</td>
            </tr>
           	<tr>
			    <td align="center">
					<input name="more" type="button" onclick="addRow('tablaTel')" class="submitbutton" value="M�s" tittle="A�adir m�s numeros telefonicos"/>
				</td>
			</tr>
			
			
            <tr>
                    <td><input type="hidden" name="submitRegistration" value="true"/></td>

                    <td colspan="2">
                    <input type="submit" id="enviar" name="enviar" value="Enviar" alt="Enviar" class="submitbutton" title="Enviar solicitud" />
                    <input type="button" name="cancelar" value="Cancelar" alt="Cancelar" class="submitbutton" title="Cancelar" onclick="history.back(-2)" />
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
include_once "class/class.fachadainterfaz.php";
if (isset($_POST["email"]) && isset($_POST["tlf"])){
	$tel = $_POST["tlf"];
    $area = $_POST["codigo"];
    if ($_POST["email"]=="ejemplo@usb.ve" || $_POST["email"]==""  || $tel[0]=="" || $_POST["personas"]==""
		|| $_POST["planteamiento"]=="" || $_POST["recursos"]=="" || $_POST["tiempolibre"]==""
		|| $_POST["justificacion"]=="") 	{
        header("Location: ../principal.php?content=registroSolicitud&error=camposVacios");
    }else{
	    $email = strtolower($_POST["email"]);
        //$resultTelefono= sscanf($_POST["tlf"], "%d-%d",$codigo,$numero);
	    $patronCorreo = "/\w(@usb\.ve){1}$/"; //Patron para validar correo.
        if(!preg_match($patronCorreo, $email)){
            header("Location: ../principal.php?content=registroSolicitud&error=formatoCorreo");
        }else if($_POST["department"] == ""){
            header("Location: ../principal.php?content=registroSolicitud&error=Unidad");
        }else{
			$i = 0;
			$j = sizeof($tel);
			while( $i < $j) {
			  if($tel[$i]!=""){
					if(strlen($tel[$i]) !=7){
					       header("Location: ../principal.php?content=registroSolicitud&error=formatoTlf");
			  }} else if($tel[$i]==""){
					       header("Location: ../principal.php?content=registroSolicitud&error=formatoTlf");			  
			  }
			  $i++;
			}
            $unidadUSB = $_POST["department"];
            //$nameproy = $_POST["nameproy"];
            $status = "0";
            $baseSolicitud = new listaSolicitud();
            
                //generamos un c�digo aleatorio de registro
                $numero = rand().rand();
                $codigo = dechex($numero);
                //Completamos con ceros (0) a la izq para que sea codigo de 8 carateres
                $numero = substr('00000000', 0, (8-strlen($codigo))).$codigo;
                
                while($baseSolicitud->buscar($numero,"nro") != null){
                    //generamos un c�digo aleatorio de registro
                    $numero = rand().rand();
                    $codigo = dechex($numero);
                    //Completamos con ceros (0) a la izq para que sea codigo de 8 carateres
                    $numero = substr('00000000', 0, (8-strlen($codigo))).$codigo;
                    
                }
				echo "<script language=�JavaScript�>      alert(�JavaScript dentro de PHP�);     </script>";
				$fachada = fachadaInterfaz::getInstance();
				$fachada->registrarSolicitud($codigo,$_POST["planteamiento"],$_POST["justificacion"],$email, $_POST["tiempolibre"], $_POST["recursos"],$_POST["personas"],$unidadUSB, $status,$tel,$area);
		}
	}
}
?>