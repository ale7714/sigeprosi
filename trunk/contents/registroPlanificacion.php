<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php //error_reporting(0);
    session_start();
    if (isset ($_SESSION['autenticado'])) header ('Location:usuarios/');
?>
<?php if (!isset ($_GET['error'])){
    $_GET['error'] = null;
}
?>

<!-- Incluimos cabecera -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registro de Planificacion- <? echo $page;?></title>
<meta name="keywords" content="sistema, gestion de proyectos, CSS, HTML, 3-column" />
<meta name="description" content="Sistema de gestión de proyectos desarrollado por JAIVA Systems" />

	<link type="text/css" rel="stylesheet" href="../estilos/dhtmlgoodies_calendar.css?random=20051112" media="screen"></LINK>
	<SCRIPT type="text/javascript" src="../estilos/dhtmlgoodies_calendar.js?random=20060118"></script>

<link href="../estilos/style.css" rel="stylesheet" type="text/css" />

<script language="javascript" type="text/javascript">
function clearText(field)
{   
    if (field.defaultValue == field.value) {
        field.value = '';
        if (field.name == 'pass' && field.type == 'text') field.type = 'password';
    }
    else if (field.value == ''){
        field.value = field.defaultValue;
        field.type = 'text';
    }
        
}

function onlyNumbers(evt)
{
    var keyPressed = (evt.which) ? evt.which : event.keyCode
    return !(keyPressed > 31 && (keyPressed < 48 || keyPressed > 57));
}

function onlyAlfaNumbers(evt)
{
    var keyPressed = (evt.which) ? evt.which : event.keyCode
    return (keyPressed < 32 || (keyPressed > 47 && keyPressed < 58) || (keyPressed > 64 && keyPressed < 91) || (keyPressed > 96 && keyPressed < 123));
}

function activar(id,button) {
    if (document.getElementById(id).checked){
        document.getElementById(button).disabled = "";
    }else{
        document.getElementById(button).disabled = true;
    }
  
} 

function activarCampo(option,campo) {
    if (option == "codigo"){
        document.getElementById(campo).disabled = true;
    }else{
        document.getElementById(campo).disabled = "";
    }
  
} 
function telefFormat(valor, mensaje, valor2, bool, evt)
{
    var keyPressed = (evt.which) ? evt.which : event.keyCode
    return !(keyPressed > 31 && (keyPressed < 48 || keyPressed > 57));
}//onkeypress="return CedulaFormat(this,'Cédula de Indentidad Invalida',-1,true,event)

function addRow(tableID) {
	var table = document.getElementById(tableID); 
	var rowCount = table.rows.length;
	var row = table.insertRow(rowCount); 
	var colCount = table.rows[0].cells.length; 
	for(var i=0; i<colCount; i++) { 
		var newcell = row.insertCell(i);
		newcell.innerHTML = table.rows[0].cells[i].innerHTML;
		//alert(newcell.childNodes[0].type);
		switch(newcell.childNodes[0].type) {
			case "text":
					newcell.childNodes[0].value = "";
					break;
			case "select-one":
					newcell.childNodes[0].selectedIndex = 0;
					break;
			default:
					newcell.align = "right";
					break;
		}
	}
}
function addActividad(tableID) {
	var table = document.getElementById(tableID); 
	var rowCount = table.rows.length;
	for (var j=0;j<6;j++){
		//alert(table.rows[0].cells[0].innerHTML);
		//alert(rowCount);
		var row = table.insertRow(rowCount+j-1); 
		
		var colCount = table.rows[j].cells.length; 
		//alert(table.rows[j].cells.length);
		for(var i=0; i<colCount; i++) { 
		//alert(table.rows[j].cells[i].innerHTML);
			var newcell = row.insertCell(i);
			newcell.innerHTML = table.rows[j].cells[i].innerHTML;
			
			switch(newcell.childNodes[0].type) {
				case "text":
						newcell.childNodes[0].value = "";
						break;
				case "select-one":
						newcell.childNodes[0].selectedIndex = 0;
						break;
				default:
						newcell.align = "right";
						break;
			}
		}
	}
	var botonesEliminar = document.getElementsByName("eliminarActividad");
	var nbotones = botonesEliminar.length;
	botonesEliminar[nbotones-1].id=nbotones;
}
function deleteActividad(id) {
	alert(id);
	var table = document.getElementById("tableActividad");
	var botonesEliminar = document.getElementsByName("eliminarActividad");
	var nbotones = botonesEliminar.length;
	if (id==1 && nbotones==1)	alert("La planificacion debe contener almenos una actividad asociada"); 
	else	for (var j=0;j<6;j++)	table.deleteRow(((id-1)*6));
	for(var j=id-1;j<nbotones;j++)	botonesEliminar[j].id=j+1;
	//var table = document.getElementById(tableID); 
	/*
	var rowCount = table.rows.length;
	for (var j=0;j<7;j++){
		var row = table.insertRow(rowCount-1+j); 
		var colCount = table.rows[j].cells.length; 
		
		for(var i=0; i<colCount; i++) { 
		}
	}
	*/
}
</script>

</head>
<body>
    
<!-- Incluimos pancarta superior y menu -->
<div id="templatemo_top_bar">

    <div class="rss_contact_section">
        <div class="rss_contact contact_button">
            <a href="#">Contacto</a>
        </div>
    </div>
</div> <!-- end of top bar -->

<div id="templatemo_banner_bar_wrapper">

    <div id="templatemo_banner_bar">

        <h1>
                <a href="../principal.php">SISTEMA DE GESTIÓN DE PROYECTOS 
                <span>PARA LA CADENA DE SISTEMAS DE INFORMACIÓN (SiGeProSI)</span></a>
        </h1>
    
    </div> <!-- end of banner -->
    
</div> <!-- end of banner wrapper -->
<div class="fondoTransparente"></div> 
<?php if( isset($menu) ) include $menu;?>

    <!-- begin content-->
    <div id="templatemo_content">

        
		
		<? //if (!isset ($_POST['acepto'])) header('Location:principal.php?content=previoSolicitud')?>
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
			<input type="button" onclick="deleteActividad(this.id)" id="1" name="eliminarActividad" value="  Eliminar actividad  " alt="Eliminar Actividad" class="submitbutton" title="Eliminar Actividad" />
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
		<tr><td align="right"><LABEL for="fecha"><b>Fecha:</b></LABEL> </td>
			<td>
				<input type="text" value="Seleccione -->" readonly name="fecha[]" id="fecha[]">
				<input type="button" value="Calendario" onclick="displayCalendar(document.forms[0].fecha,'yyyy-mm-dd',this)">
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
		
        
    </div> <!-- end of content -->

<div id="templatemo_footer_wrapper">

	<div id="templatemo_footer">
        
        <div class="margin_bottom_20"></div>
        
        <div class="section_w940">
        	Derechos Reservados © 2011 <a href="#">JAIVA Systems</a> 
        </div>
        
        <div class="cleaner"></div>
	</div> <!-- end of footer -->

</div> <!-- end of footer wrapper -->
<?php
include_once "../class/class.fachadainterfaz.php";
if (isset($_POST["nombre"])){
	
	$fachada = fachadaInterfaz::getInstance();
	$fachada->registrarActividad($_POST["nombre"],$_POST["fecha"],$_POST["descripcion"],$_POST["puntos"]);		
}
?>
</body>
</html>