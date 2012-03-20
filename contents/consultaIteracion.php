<?php
// if ((!isset($_SESSION["profesor"])) || (isset($_SESSION["profesor"]) && !$_SESSION["profesor"])){
	// include "contents/areaRestringida.php";
	// echo '<script>';
	// echo 'alert("No tiene permisos para acceder a esta area del sistema.");';
	// echo '</script>';
// }else{
?>
<?php $id = $_GET['id']; ?>

<link rel="stylesheet" type="text/css" media="screen" href="estilos/custom-theme/jquery-ui-1.8.17.custom.css" />
<link rel="stylesheet" type="text/css" media="screen" href="estilos/ui.jqgrid.css" />

<style type="text/css">
html, body {
    margin: 0;
    padding: 0;
    font-size: 75%;
}
</style>

<script src="jscripts/js/jquery-1.5.2.min.js" type="text/javascript"></script>
<script src="jscripts/js/i18n/grid.locale-en.js" type="text/javascript"></script>
<script src="jscripts/js/jquery.jqGrid.min.js" type="text/javascript"></script>

<script type="text/javascript">
$(function() {
  $("#actividadesGrid").jqGrid({
    url: <?php echo "'acciones/cargarActividadesIteracion.php?id=".$id."'"?>,
    datatype: 'xml',
    mtype: 'GET',
    colNames:['id', 'Nombre', 'Fecha Inicio', 'Fecha Fin', 'Descripcion', 'Nombre', 'Apellido'],
    colModel :[ 
      {name:'id', index:'id', hidden:true, width:10},
      {name:'nombre', index:'nombre', width:200, align:'left'},
      {name:'fechaInicio', index:'fechaInicio', width:100, align:'center'},
      {name:'fechaFin', index:'fechaFin', width:100, align:'center'},
      {name:'descripcion', index:'descripcion', hidden:true, width:10},
      {name:'nombreUser', index:'nombreUser', hidden:true, width:10},
      {name:'apellidoUser', index:'apellidoUser', hidden:true, width:10},
    ],
    pager: '#actividadesPager',
    width:'auto',
    height: 'auto',
    rowNum:20,
    rowList:[20,40,60],
    sortname: 'invid',
    sortorder: 'desc',
    viewrecords: true,
    gridview: true,
    subGrid: true,
    ondblClickRow: function(id){
        var val = jQuery(this).getRowData(id);
        window.location = "?content=consultaIteracion&id="+val['id'];
    },
    subGridRowExpanded: function(subgrid_id, row_id) {
        var val = jQuery(this).getRowData(row_id);
        var html = "<span><b>Descripcion:</b></span>"
                    + "<span style=\"color:#0431B4\"><p style=\"text-indent:50\">"
                    + val['descripcion']
                    + "</p>"
                    + "</span><br/>"
                    + "<span><b>Responsable: </b></span>"
                    + "<span style=\"color:#0431B4\">"
                    + val['nombreUser']
                    + " "
                    + val['apellidoUser']
                    + "</span><br/>";
        $("#" + subgrid_id).append(html);
    },
    caption: 'Actividades',
  }).navGrid('#pager1',{
     edit: false,
     add: false,
     del: false
 }); 
}); 
$(function(){ 
  $("#casoUsoGrid").jqGrid({
    url:<?php echo "'acciones/cargarCasoDeUsoIteracion.php?id=".$id."'"?>,
    datatype: 'xml',
    mtype: 'GET',
    colNames:['Nombre','Completitud'],
    colModel :[ 
      {name:'nombre', index:'nombre', width:200}, 
      {name:'completitud', index:'completitud', width:150, align:'right'},
    ],
    pager: '#casoUsoPager',
    toolbar:[true,"top"],
    height: 'auto',
    rowNum:20,
    rowList:[20,40,60],
    sortname: 'invid',
    sortorder: 'desc',
    viewrecords: true,
    gridview: true,
    caption: 'Casos de Uso de la Iteracion',
  }).navGrid('#pager1',{
     edit: false,
     add: false,
     del: false
 }); 
});
</script>

<div id="main_column">

    <div class="section_w700">

        <h2>Consulta de Iteracion</h2>
    
        <p><b> 
            <?php
            include_once "class/class.fachadainterfaz.php";
            $fachada = fachadaInterfaz::getInstance();
			$result = $fachada->consultarIteracion($id);
			if (!isset ($_GET['error'])){
   			        $_GET['error'] = null;
                   }
			    if ($_GET['error']=="camposVacios"){
                    echo '<span style="color: red;">Debe llenar todos los campos obligatorios</span>';
                }
                else if ($_GET['error']=="formatoCorreo"){
                    echo '<span style="color: red;">El formato de correo es inválido.</span>';
                }
				else if ($_GET['error']=="noExiste"){
                    echo '<span style="color: red;">El numero de solicitud o correo no pertenecen a una solicitud.</span>';
                }else {
                    //echo '(*) Datos obligatorios.';
                }
             ?> 
        </b></p>
    </div>        
    <div class="margin_bottom_20"></div>

    <div class="section_w700">
        <h3>Nombre de Iteracion:  <?php echo $result['nombre']?></h3><br><br>
        <table border="0" width="80%" align="center">
        <tr>
        <td align="left" width="50%"><font size="5" face="arial"><b>Etapa: </b></font></td>
            <td align="left"><font size="4" face="arial">
            <?php 
                switch ($result['tipo']) {
                    case 0: 
                        echo "Iniciaci&oacuten";
                        break;
                    case 1:
                        echo "Elaboracion";
                        break;
                    case 2:
                        echo "Construcción";
                        break;
                    case 3:
                        echo "Transición";
                        break;
                    default:
                        echo "Desconocido";
                        break;
                }
            ?>
            </font>
            </td>
        </tr>
        <tr>
        <td align="left" width="50%"><font size="5" face="arial"><b>Objetivos: </b></font></td>
        </tr>
        <tr> <td> </td>
            <td align="left"><font size="4" face="arial">
            <p style="text-indent:50">
            <?php 
                echo($result['objetivos']);
            ?>
            </p>
            </font>
            </td>
        </tr>
    </table>
    <table border="0" width="80%" align="center">
        <tr>
        <td align="left" width="50%">
        <table id="actividadesGrid"><tr><td/></tr></table> 
        <div id="actividadesPager"></div> <p></p>
        </td>
        </tr>
    </table>
    <table border="0" width="80%" align="center">
        <tr>
        <td align="left" width="50%">
        <table id="casoUsoGrid"><tr><td/></tr></table> 
        <div id="casoUsoPager"></div> <p></p>
        </td>
        </tr>
    </table>

    </div>  

    <div class="margin_bottom_20"></div>
    <div class="cleaner"></div>
</div> <!-- end of main column -->

<!-- end of side column 1 -->

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
<?php  //} ?>