<?php 
// if (!isset($_SESSION['coordinador']) || ((isset($_SESSION['coordinador'])) && !($_SESSION['coordinador']))){
	// include "contents/areaRestringida.php";
	// echo '<script>';
	// echo 'alert("No tiene permisos para acceder a esta area del sistema.");';
	// echo 'location.href="principal.php"';
	// echo '</script>';
// }else{
?>
<div id="main_column">

<!--    <div class="margin_bottom_20"></div> -->

		
		 
    <!-- <div class="margin_bottom_20"></div>
	-->
    <form name="formaRegistroPlanificacion" onSubmit="return validarPlanificacion();" method="post" action="acciones/registrarPlanificacion.php"> 
	<div class="section_w701">
        <font size="5" face="arial"><b>Lista de actividades: </b></font> 
    </div>  
	<div class="section_w702">
		
        <table border="0" id="tableActividad">
		<tr>
            <td align="center"><font size="4" face="arial"><b>Especificaciones de actividad: </b></font> </td>
            <td align="right" >
                <IMG SRC="images/ICO/Symbol-Delete.ico" width="30" height="30" type="button" onclick="deleteActividad(this.id)" id="eliminarActividad" name="eliminarActividad" alt="Eliminar Actividad" class="submitbutton" title="Eliminar Actividad" onMouseOver="javascript:this.width=40;this.height=40"  onMouseOut="javascript:this.width=30;this.height=30">
            </td>	
		</tr>
        <tr>
			<td align="right"><LABEL ><b>Nombre:</b></LABEL> </td>
			<td align="left">
			  <input type="text" id="nombreAct-1" value=""  name="nombreAct[]"/>
			  </td>
		</tr>
        <tr>
            <td align="right">
                <LABEL for="surname"><b>Descripci&oacute;n:</b><br/>(Max. 250 caracteres)</LABEL>
            </td>
            <td>
                <textarea  name="descripcion[]" id="descripcion-1" title="Ingrese toda la informaci�n referente al problema" rows="10" cols="40" onkeypress="return contadorCaracteres(event)"></textarea>
            </td>
        </tr>
		<tr>
			<td align="right">
                <LABEL for="fecha"><b>Fecha de Inicio:</b></LABEL> 
            </td>
			<td align="left">
			<IMG SRC="images/ICO/Calendar.ico" width="35" height="35" type="button" id="cal-button-1" name="calendario[]" alt="Calendario" class="submitbutton" title="Calendario" onMouseOver="javascript:this.width=40;this.height=40"  onMouseOut="javascript:this.width=35;this.height=35">
			<input type="text" id="cal-field-1" value="Seleccione ->" readonly name="fecha[]"/>
			</td>
		</tr>
        <tr>
			<td align="right">
                <LABEL for="fecha"><b>Fecha de Finalizaci&oacute;n:</b></LABEL> 
            </td>
			<td align="left">
			<IMG SRC="images/ICO/Calendar.ico" width="35" height="35" type="button" id="cal-button-2" name="calendario[]" alt="Calendario" class="submitbutton" title="Calendario" onMouseOver="javascript:this.width=40;this.height=40"  onMouseOut="javascript:this.width=35;this.height=35">
			<input type="text" id="cal-field-2" value="Seleccione ->" readonly name="fecha[]"/>
			</td>
		</tr>
		<tr><td align="center" colspan=2><h2></h2></td><td align="center" colspan=2><h2></h2></td></tr>
		</table>
	</div> 
	<div class="section_w701">
	<table width="58%"  border="0">
			<tr >
				<td align="center">
					<!--<input type="button" onclick="addActividad('tableActividad')" id="nuevaActividad[]" name="nuevaActividad[]" value="  Nueva actividad  " alt="nuevaActividad" class="submitbutton" title="Nueva Actividad" />
				-->
				<IMG SRC="images/ICO/Symbol-Add.ico" width="50" height="50" type="button" onclick="addActividadIteracion('tableActividad')" id="nuevaActividad[]" name="nuevaActividad[]" alt="Nueva Actividad" class="submitbutton" title="Nueva Actividad" onMouseOver="javascript:this.width=60;this.height=60"  onMouseOut="javascript:this.width=50;this.height=50"> 

				</td>
				
            </tr>
		</table>
	</div>
	<div class="section_w701">
		<table border="0"  width="62%" id="tableOperaciones">
			<tr >
                <td  colspan="2" >
					<input type="hidden" name="submitRegistration" value="true"/>
					 <input type="image" width="50" height="50" id="enviar" name="enviar" src="images/ICO/Save.ico" alt="Crear Planificacion" class="submitbutton" title="Crear Planificacion"  />
				</td>
            </tr>
		</table>
	</div>  
	</form>
    <div class="margin_bottom_20"></div>
    <div class="cleaner"></div>
</div> <!-- end of main column -->

<!-- end of side column 1 -->
<script>
    id++;
    nuevoCalendario(id);
    id++;
    nuevoCalendario(id);
</script>
<div class="side_column_w200">
 <?php
    if (isset($_SESSION['admin']))
        include 'sidebars/barraEnSesion.php';
    else
        include 'sidebars/barraInicioSesion.php';
    ?>
    <!-- barra lateral -->

</div> <!-- end of right side column -->

<div class="cleaner"></div>
<?php //  } ?>