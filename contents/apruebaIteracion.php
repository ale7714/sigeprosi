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
<script src="jscripts/js/i18n/grid.locale-es.js" type="text/javascript"></script>
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
      {name:'fechaInicio', index:'fechaInicio', width:125, align:'center'},
      {name:'fechaFin', index:'fechaFin', width:125, align:'center'},
      {name:'descripcion', index:'descripcion', hidden:true, width:10},
      {name:'nombreUser', index:'nombreUser', hidden:true, width:10},
      {name:'apellidoUser', index:'apellidoUser', hidden:true, width:10},
    ],
    pager: '#actividadesPager',
    width:'auto',
    height: 'auto',
    rowNum:20,
    rowList:[20,40,60],
    sortname: 'nombre',
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
        var subgrid_table_id, pager_id;
        var html = "<span><b>Descripcion:</b></span>"
                    + "<span style=\"color:#0431B4\"><p style=\"text-indent:50\">"
                    + val['descripcion']
                    + "</p>"
                    + "</span><br/>"
                    + "<span><b>Responsables: </b></span>"
                    + "<br/>";
            subgrid_table_id = subgrid_id+"_t"; 
            pager_id = "p_"+subgrid_table_id;
            $("#"+subgrid_id).html(html + "<table id='"+subgrid_table_id+"' class='scroll'></table><div id='"+pager_id+"' class='scroll'></div>");
            jQuery("#"+subgrid_table_id).jqGrid({ 
                    url:"acciones/cargarRecursos.php?id="+val['id'], 
                    datatype: "xml", 
                    colNames: ['correoUSB','Nombre','Apellido'], 
                    colModel: [ 
                        {name:"correoUSB",index:"correoUSB",width:175,key:true}, 
                        {name:"nombre",index:"nombre",width:100,align:"left"}, 
                        {name:"apellido",index:"apellido",width:100,align:"left"}, 
                    ],
                    rowNum:20,
                    pager: pager_id, 
                    sortname: 'correoUSB', 
                    sortorder: "asc", 
                    width:'auto',
                    height: 'auto' 
                }
            );
    },
    caption: 'Actividades',
  }).navGrid('#pager1',{
     edit: false,
     add: false,
     del: false
 }); 
}); 
$(function() {
  $("#casoUsoGrid").jqGrid({
    url:<?php echo "'acciones/cargarCasoDeUsoIteracion.php?id=".$id."'"?>,
    datatype: 'xml',
    mtype: 'GET',
    colNames:['id','Nombre','Completitud'],
    colModel :[ 
      {name:'id', index:'id', hidden:true, width:10},
      {name:'nombre', index:'nombre', width:250}, 
      {name:'completitud', index:'completitud', width:200, align:'right'},
    ],
    pager: '#casoUsoPager',
    toolbar:[true,"top"],
    width:'auto',
    height: 'auto',
    rowNum:20,
    rowList:[20,40,60],
    sortname: 'nombre',
    sortorder: 'desc',
    viewrecords: true,
    gridview: true,
    subGrid: true,
    subGridRowExpanded: function(subgrid_id, row_id) {
        var val = jQuery(this).getRowData(row_id);
        var subgrid_table_id, pager_id;
            var html = "<span><b>Criterios: </b></span><br/>"
            subgrid_table_id = subgrid_id+"_t"; 
            pager_id = "p_"+subgrid_table_id;
            $("#"+subgrid_id).html(html + "<table id='"+subgrid_table_id+"' class='scroll'></table><div id='"+pager_id+"' class='scroll'></div>");
            jQuery("#"+subgrid_table_id).jqGrid({ 
                    url:"acciones/cargarCriteriosCU.php?id="+val['id'], 
                    datatype: "xml", 
                    colNames: ['Criterio'], 
                    colModel: [ 
                        {name:"criterios",index:"criterios",width:350,key:true, sortable:false},
                    ],
                    rowNum:20,
                    pager: pager_id, 
                    sortname: 'criterios', 
                    sortorder: "asc", 
                    width:'auto',
                    height: 'auto' 
                }
            );
    },
    caption: 'Casos de Uso de la Iteracion',
  }).navGrid('#pager1',{
     edit: false,
     add: false,
     del: false
 }); 
});
$(function() {
  $("#productoGrid").jqGrid({
    url:<?php echo "'acciones/cargarProductosIteracion.php?id=".$id."'"?>,
    datatype: 'xml',
    mtype: 'GET',
    colNames:['id','Nombre','Descripcion'],
    colModel :[ 
      {name:'id', index:'id', hidden:true, width:10},
      {name:'nombre', index:'nombre', width:450}, 
      {name:'descripcion', index:'descripcion', hidden:true, width:150, align:'right'}
    ],
    pager: '#productoPager',
    toolbar:[true,"top"],
    width:'auto',
    height: 'auto',
    rowNum:20,
    rowList:[20,40,60],
    sortname: 'nombre',
    sortorder: 'desc',
    viewrecords: true,
    gridview: true,
    subGrid: true,
    subGridRowExpanded: function(subgrid_id, row_id) {
        var val = jQuery(this).getRowData(row_id);
        var subgrid_table_id, pager_id;
            var html = "<span><b>Descripcion:</b></span>"
                    + "<span style=\"color:#0431B4\"><p style=\"text-indent:50\">"
                    + val['descripcion']
                    + "</p>"
                    + "</span><br/>"
                    + "<span><b>Criterios: </b></span>"
                    + "<br/>";
            subgrid_table_id = subgrid_id+"_t"; 
            pager_id = "p_"+subgrid_table_id;
            $("#"+subgrid_id).html(html + "<table id='"+subgrid_table_id+"' class='scroll'></table><div id='"+pager_id+"' class='scroll'></div>");
            jQuery("#"+subgrid_table_id).jqGrid({ 
                    url:"acciones/cargarCriteriosPX.php?id="+val['id'], 
                    datatype: "xml", 
                    colNames: ['Criterio'], 
                    colModel: [
                        {name:"criterios",index:"criterios",width:450,key:true, sortable:false}
                    ],
                    rowNum:20,
                    pager: pager_id, 
                    sortname: 'criterios', 
                    sortorder: "asc", 
                    width:'auto',
                    height: 'auto' 
                }
            );
    },
    caption: 'Productos Adicionales',
  }).navGrid('#pager1',{
     edit: false,
     add: false,
     del: false
 }); 
});
</script>

<div id="main_column">
	
    <div class="section_w700">

        <h2>Consulta de Iteraci&oacute;n</h2>
    
        <p><b> 
            <?php
            include_once "class/class.fachadainterfaz.php";
            $fachada = fachadaInterfaz::getInstance();
			$result = $fachada->consultarIteracion($id);
			if (!isset ($_GET['error'])) {
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
<form name="formaIteracion" onSubmit="" method="post" action="acciones/aprobarIteracion.php">
    <div class="section_w702">
        <h3>Nombre de Iteracion:  <?php echo $result['nombre']?></h3>
        <table border="0" width="80%" align="center">
        <tr>
        <td align="left" width="50%"><font size="5" face="arial"><b>Etapa: </b></font></td>
            <td align="left"><font size="4" face="arial">
            <?php 
                switch ($result['tipo']) {
                    case 0: 
                        echo "Iniciaci&oacute;n";
                        break;
                    case 1:
                        echo "Elaboraci&oacute;n";
                        break;
                    case 2:
                        echo "Construcci&oacute;n";
                        break;
                    case 3:
                        echo "Transici&oacute;n";
                        break;
                    default:
                        echo "Desconocido";
                        break;
                }
            ?>
            </font>
            </td>
        </tr>
        <tr><br></br></tr>
        <tr><br></br></tr>
        <tr>
        <td align="left" width="50%"><font size="5" face="arial"><b>Estado: </b></font></td>
		<?php if (isset($_SESSION['profesor']) && ($_SESSION['profesor'])){ ?>
			
				
                <td align="left">
				<input title="Ingrese el nombre de la iteracion" type="hidden" value="<?php echo $result['id'];?>" id="idIteracion" name="idIteracion" onfocus="clearText(this)" onblur="clearText(this)"/>
				<input title="Ingrese el nombre de la iteracion" type="hidden" value="<?php echo $result['tipo'];?>" id="tipoIteracion" name="tipoIteracion" onfocus="clearText(this)" onblur="clearText(this)"/>
				<input title="Ingrese el nombre de la iteracion" type="hidden" value="<?php echo $result['objetivos'];?>" id="objetivos" name="objetivos" onfocus="clearText(this)" onblur="clearText(this)"/>
				<input title="Ingrese el nombre de la iteracion" type="hidden" value="<?php echo $result['idEquipo'];?>" id="equipo" name="equipo" onfocus="clearText(this)" onblur="clearText(this)"/>
                <input title="Ingrese el nombre de la iteracion" type="hidden" value="<?php echo $result['nombre'];?>" id="nombreIter" name="nombreIter" onfocus="clearText(this)" onblur="clearText(this)"/>
                
				<select id="estatus" name="estatus">
                   
					<option value="Iniciada" <?php if ($result['estado']== 0) echo 'selected="selected"';?>> Planificada </option>
					<option value="Aprobada" <?php if ($result['estado']== 1) echo 'selected="selected"';?>> Aprobada </option>
					<option value="Cerrada" <?php if ($result['estado']== 2) echo 'selected="selected"';?>> Iniciada </option>
                </select>
                </td>
       		
		<?php }?>
        </tr>
        <tr><br></br></tr>
        <tr><br></br></tr>
        <tr>
        <td align="left" width="50%"><font size="5" face="arial"><b>Objetivos: </b></font></td>
        </tr>
        <tr><br></br></tr>
        <tr>
            <table border="0" width="80%" align="center">
            <tr>
            <td align="right"><font size="4" face="arial">
            <p style="text-indent:50" align="right">
            <?php 
                echo($result['objetivos']);
            ?>
            </p>
            </font>
            </td>
            </tr>
            </table>
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
    <table border="0" width="80%" align="center">
        <tr>
        <td align="left" width="50%">
        <table id="productoGrid"><tr><td/></tr></table> 
        <div id="productoPager"></div> <p></p>
        </td>
        </tr>
    </table>

    </div>  
	<div class="section_w701">
		<table border="0"  width="62%" id="tableOperaciones">
			<tr>
                <td  colspan="2" >
					<input type="hidden" name="submitRegistration" value="true"/>
					<input type="image" width="50" height="50" id="enviar" name="enviar" src="images/ICO/Save.ico" alt="Enviar" class="submitbutton" title="Enviar solicitud" onMouseOver="javascript:this.width=60;this.height=60"  onMouseOut="javascript:this.width=50;this.height=50"/> 
				</td>
			</tr>
		</table>
	</div> 
</form>
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
