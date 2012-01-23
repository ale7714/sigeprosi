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
</script>

</head>