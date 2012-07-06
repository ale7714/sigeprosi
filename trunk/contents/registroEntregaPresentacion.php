<?php 
if (!isset($_SESSION["correoUSB"])) {
    include "contents/areaRestringida.php";
	echo '<script>';
	echo 'alert("No tiene permisos para acceder a esta area del sistema.");';
	//echo 'location.href="principal.php"';
	echo '</script>';
}
else if (!($_SESSION['profesor']) && !($_SESSION["cliente"])) {
	include "contents/areaRestringida.php";
	echo '<script>';
	echo 'alert("No tiene permisos para acceder a esta area del sistema.");';
	echo '</script>';
}else{
    $profc = true;
    $lider = false;
    if ($_SESSION['admin']) { $profc = false; $lider = true; }
    $equipo = $_GET['equipo'];
    $idEval = $_GET['id'];
    $user = $_SESSION["correoUSB"];
    require_once "class/class.EntregaPresentacion.php";
    $entrega = new entregaPresentacion($user,0,0,0,0,0,0,"",$idEval,$equipo);
    $entrega->autocompletar();
?>

<link rel="stylesheet" type="text/css" media="screen" href="estilos/custom-theme/jquery-ui-1.8.17.custom.css" />
<link rel="stylesheet" type="text/css" media="screen" href="estilos/ui.jqgrid.css" />

<style type="text/css">
html, body {
    margin: 0;
    padding: 0;
    font-size: 86.6%;
}
</style>

<script src="jscripts/js/jquery-1.5.2.min.js" type="text/javascript"></script>
<script src="jscripts/js/i18n/grid.locale-es.js" type="text/javascript"></script>
<script src="jscripts/js/jquery.jqGrid.min.js" type="text/javascript"></script>

<script type="text/javascript">

$(function(){ 
  $("#entregasGrid").jqGrid({
    editurl:'clientArray',
    datatype: 'local',
    colNames:[
        'Evaluacion Preliminar','Funcionalidad', 'Interfaz', 'Navegacion', 
        'Conocimiento del Negocio', 'Uso Herramientas'
    ],
    colModel :[
      {name:'evaluacionPreliminar', index:'evaluacionPreliminar', width:125, editable: true 
        <?php if (!$lider) echo ", hidden:true" ?>},
      {name:'funcionalidad', index:'funcionalidad', width:80, editable: true },
      {name:'interfaz', index:'interfaz', width:50, editable: true },
      {name:'navegacion', index:'navegacion', width:75, editable: true },
      {name:'conocimiento', index:'conocimiento', width:150, editable: true },
      {name:'usoHerramientas', index:'usoHerramientas', width:150, editable: true 
        <?php if (!$lider) echo ", hidden: true" ?>}
    ],
    pager: '#entregasPager',
    height: 'auto',
    width: 600,
    sortname: 'id',
    sortorder: 'desc',
    gridview: true,
    rowNum: 1,
    data: [
        {
            evaluacionPreliminar:"<?php echo $entrega->get('evaluacionPrevia');?>", 
            funcionalidad:"<?php echo $entrega->get('funcionalidad');?>",  
            interfaz:"<?php echo $entrega->get('interfaz');?>", 
            navegacion:"<?php echo $entrega->get('navegacion');?>", 
            conocimiento:"<?php echo $entrega->get('conocimiento');?>",  
            usoHerramientas:"<?php echo $entrega->get('usoHerramientas');?>"
        }
    ],
    caption: 'Evaluacion Proyecto',
  }); 
  jQuery("#entregasGrid").jqGrid('navGrid',"#entregasPager",{refresh:false, search:false, edit:false,add:false,del:false});
  jQuery("#entregasGrid").jqGrid('inlineNav',"#entregasPager",{add:false});
});


</script>

<div id="main_column">
    <form name="formaRegistroEntryPres" onSubmit="return validarEntregaPresentacion();" action="acciones/registrarEntregaPresentacion.php" method="post">
    <input type="hidden" name="equipo" value="<?php echo $equipo;?>"/>
    <input type="hidden" name="id" value="<?php echo $idEval;?>"/>
    <input type="hidden" name="correoUSB" value="<?php echo $user;?>"/>
    <input type="hidden" name="evalPrev" id="evalPrev" value=""/>
    <input type="hidden" name="func" id="func" value=""/>
    <input type="hidden" name="inter" id="inter" value=""/>
    <input type="hidden" name="nav" id="nav" value=""/>
    <input type="hidden" name="conoc" id="conoc" value=""/>
    <input type="hidden" name="usoHer" id="usoHer" value=""/>
    <div class="section_w702">
        <table align="center">
			<tr><td><table id="entregasGrid"></table> </td></tr>
			<tr><td><div id="entregasPager"></div></td></tr>
        </table>
    </div>
    <div class="section_w702">
        <table align="center">
            <tr><td><font size="5" face="arial"><b>Comentarios: </b></font></td></tr>
            <tr><td>
                <textarea rows="5" cols="75" id="coment" name="coment"><?php echo $entrega->get("comentarios");?></textarea>
            </td></tr>
            <tr><td>
                <input 
                    type="image" width="50" height="50" id="enviar" name="enviar" 
                    src="images/ICO/guardar.png" alt="Guardar Cambios" class="submitbutton" title="Guardar Cambios"
                />
            </td></tr>
        </table>
    </div>
    </form>
</div> <!-- end of main column -->
<?php
}
?>
<!-- end of side column 1 -->

<div class="side_column_w200">
    <?php
    if (isset($_SESSION['admin'])){
        include 'sidebars/barraEnSesion.php';
        include 'sidebars/barraEnlaces.php';
    }else{
        include 'sidebars/barraInicioSesion.php';
        include 'sidebars/barraEnlaces.php';
    }
    ?>
    <!-- barra lateral -->

</div> <!-- end of right side column -->
<div class="cleaner"></div>
