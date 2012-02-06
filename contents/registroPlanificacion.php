<div id="main_column">

    <div class="section_w700">

        <h2>Agregar Planificacion</h2>


        <p><b> 
        </b></p>
    </div>  	
<!--    <div class="margin_bottom_20"></div> -->

		<b> 
            Datos basicos:			
        </b>
		 
    <div class="margin_bottom_20"></div>

    <div class="section_w700">
        <form name="formaRegistroPlanificacion" action="" method="post">
		<table border="0">
            <tr>
                <td align="right" width=35.5%><LABEL for="project_name"><b>*Nombre de la planificacion:</b></LABEL> 
                    </td>
                    <td width=64.5%><input title="Ingrese el nombre del proyecto" type="text" id="project_name" name="project_name" onfocus="clearText(this)" onblur="clearText(this)"/></td>
            </tr>

			<tr>
			    <!-- Cuales son las opciones de etapa inicial? --- ATENCION -->
				<td align="right"><b>*Etapa:</b>
                </td>
                <td align="left">
                <select name="etapa_inicial">
                    <option value="" selected="selected"> -Seleccione- </option>
                </select>				
                </td>
            </tr>
        </table>
		<h2>Actividades:</h2>
		
        <table border="0" id="tableActividad">
		<tr><td align="center"><h2></h2></td><td align="center"><h2></h2></td></tr>
		<tr><td align="center"><LABEL for="fecha"><h3>Especificaciones de Actividad </h3></b></LABEL> </td>
		<td>
			<h3>:
			<input type="button" onclick="deleteActividad(this.id)" id="1" name="eliminarActividad" value="  Eliminar actividad  " alt="Eliminar Actividad" class="submitbutton" title="Eliminar Actividad" >
			</h3>
		</td>	
		</tr>
		<tr>
			<td align="right"><LABEL for="surname" ><b>*Semana:</b></LABEL> </td>
			<td><select name="semana[]" id="semana[]" >
					<option value="semana" selected="selected">Seleccione:</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
				</select>
			</td>
		</tr>
		<tr>
			<td align="right"><LABEL for="fecha"><b>Fecha:</b></LABEL> </td>
			<td style="vertical-align: top; text-align: left;">
			  <input type="text" id="cal-field-1" value="Seleccione -->" readonly name="fecha[]"/>
			  <button type="button" id="cal-button-1" name="calendario[]">...</button>
			  <script type="text/javascript">
			  
				Calendar.setup({
				  inputField    : "cal-field-"+(id+1),
				  button        : "cal-button-"+(id+1),
				  align         : "Tr"
				});
			  </script>
			</td>
		</tr>
            <tr>
                <td align="right"><LABEL for="surname"><b>Ponderaje:</b></LABEL> :</td>
                           <td><input title="Ingrese un numero aproximado" type="text" name="puntos[]" id="puntos[]" value="" maxlength="7" onkeypress="return onlyNumbers(event)"/></td>
            </tr>
            <tr>
                <td align="right"><LABEL for="surname"><b>Descripcion:</b><br/>(Max. 500 caracteres)</LABEL></td>
                    <td><textarea name="descripcion[]" id="descripcion[]" title="Ingrese toda la información referente al problema" rows="10" cols="40" onkeypress="return contadorCaracteres(event)"></textarea></td>
            </tr>
			<tr >
				<td align="left">
					<input type="button" onclick="addActividad('tableActividad')" id="nuevaActividad[]" name="nuevaActividad[]" value="  Nueva actividad  " alt="nuevaActividad" class="submitbutton" title="Nueva Actividad" />
				</td>
				<td  ></td  >
            </tr>
		</table>
        
		
		<table width="60%"  border="0">
			<tr >
                    

                    <td  colspan="2" >
						<input type="submit" id="enviar" name="enviar" value="  Agregar  " alt="Enviar" class="submitbutton" title="Enviar solicitud" />
						<input type="button" name="cancelar" value="Cancelar" alt="  Cancelar  " class="submitbutton" title="Cancelar" onclick="history.back(-2)" />
						<input type="hidden" name="submitRegistration" value="true"/>
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
if (isset($_POST["nombre"])){
	
	$fachada = fachadaInterfaz::getInstance();
	$fachada->registrarActividad($_POST["nombre"],$_POST["fecha"],$_POST["descripcion"],$_POST["puntos"]);		
}
?>