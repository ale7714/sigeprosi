<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gestión de Proyectos - <? echo $page;?></title>
<meta name="keywords" content="sistema, gestion de proyectos, CSS, HTML, 3-column" />
<meta name="description" content="Sistema de gestión de proyectos desarrollado por JAIVA Systems" />
<link href="<?if (isset ($_SESSION['autenticado'])) echo '../';?>estilos/style.css" rel="stylesheet" type="text/css" />

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