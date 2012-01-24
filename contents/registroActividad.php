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
<title>Registro de Actividades- <? echo $page;?></title>
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
					/*newcell.childNodes[0].onchange = function onchange(event) { activarCampo(this.value, "tlf[]");}
					newcell.childNodes[0].name = newcell.childNodes[0].name+rowCount;
					newcell.childNodes[2].name = newcell.childNodes[2].name+rowCount;
					newcell.childNodes[2].id = newcell.childNodes[2].id+rowCount;*/
					break;
			default:
					newcell.align = "right";
					break;
		}
	}
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

        <h2>Registro de Actividades</h2>

        <p><span class="em_text"><b>ATENCIÓN : Por favor, rellene los siguientes campos, para completar 
                                    su solicitud. Todos los campos son obligatorios.</b></span></p>
        <h2> </h2>


        <p><b> 
            <?php  if (!isset ($_GET['error'])){
   			        $_GET['error'] = null;
                   }
			    if ($_GET['error']=="camposVacios"){
                    echo '<span style="color: red;">Debe llenar todos los campos obligatorios</span>';
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
                <td align="right" width=35.5%><LABEL for="nombre"><b>Nombre:</b></LABEL> 
                    </td>
                    <td width=64.5%><input title="Ingrese su correo electrónico" type="text" id="nombre" name="nombre" value="Quiz Nro 1" onfocus="clearText(this)" onblur="clearText(this)"/></td>
            </tr>
		
		<tr><td align="right"><LABEL for="fecha"><b>Fecha:</b></LABEL> </td>
			<td>
				<input type="text" value="Seleccione -->" readonly name="fecha" id="fecha">
				<input type="button" value="Calendario" onclick="displayCalendar(document.forms[0].fecha,'yyyy-mm-dd',this)">
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
                <td align="right"><LABEL for="surname"><b>*Dirección:</b></LABEL> :</td>
                    <td><input title="Ingrese su dirección exacta" type="text" name="direccion" id="direccion" value=""/></td>
            </tr> 
			
-->


            <tr>
                <td align="right"><LABEL for="surname"><b>Ponderaje:</b></LABEL> :</td>
                           <td><input title="Ingrese un número aproximado" type="text" name="puntos" id="puntos" value="" maxlength="7" onkeypress="return onlyNumbers(event)"/></td>
            </tr>
            <tr>
                <td align="right"><LABEL for="surname"><b>Descripcion:</b><br/>(Max. 500 caracteres)</LABEL></td>
                    <td><textarea name="descripcion" id="descripcion" title="Ingrese toda la información referente al problema" rows="10" cols="40" onkeypress="return contadorCaracteres(event)"></textarea></td>
            </tr>
			
			
			
            <tr>
                    <td><input type="hidden" name="submitRegistration" value="true"/></td>

                    <td align="center" colspan="2">
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