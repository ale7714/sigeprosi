<?php $nombre = $_GET['nombre']; 
//if ($_SERVER['SERVER_ADDR'] == "127.0.0.1")
                  $root = $_SERVER['DOCUMENT_ROOT']."/sigeprosi";
          //else
                  //$root = "/home/ps6116-02/public_html/sigeprosi";
    if (!(isset($_SESSION["admin"])) || (isset($_SESSION["admin"]) && !$_SESSION["admin"])){
        include "contents/areaRestringida.php";
        echo '<script>';
        echo 'alert("No tiene permisos para acceder a esta area del sistema.");';
        //echo 'location.href="principal.php"';
        echo '</script>';
    } 
    else 
    {
        include_once "class/class.catalogo.php";
        include_once "class/class.listaCatalogo.php";
        $catalogo = new catalogo($nombre,null);
        $catalogo -> autocompletar();
        $id = $catalogo->get('id');
        $l = new listaCatalogo();
        $header = $l -> obtenerEncabezado($id);
        $items = sizeof($header);
        //foreach ($header as $h)
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
  $("#elementosGrid").jqGrid({
    url:        'acciones/cargarElementos.php?catalogo=<?php echo $nombre?>',
    editurl:    'acciones/editarElementos.php?idCat=<?php echo $id?>&cols=<?php echo $items?>',
    datatype: 'xml',
    mtype: 'GET',
    colNames:[
    <?php
        for ($i = 0; $i < ($items); $i++)
            echo "'".$header[$i]['nombre']."', ";
    ?>
        'Deshabilitado'
    ],
    colModel :[
    <?php
        for ($i = 0; $i < ($items); $i++) {
            $col = $header[$i]['columna'];
            echo (
                "{name:'elem".$col."', index:'elem".$col.
                "', sortable:false, width:100, editable: true },"
            );
        }
    ?>
        {name:'deshabilitado', index:'deshabilitado', width:50, editable: true, 
            sortable:false, edittype:"checkbox", editoptions: {value:"Si:No"} }
    ],
    pager: '#elementosPager',
    height: 'auto',
    width: 600,
    sortname: 'id',
    sortorder: 'desc',
    gridview: true,
    caption: 'Datos',
  }); 
  jQuery("#elementosGrid").jqGrid('navGrid',"#elementosPager",{refresh:false, search:false, edit:false,add:false,del:false});
  jQuery("#elementosGrid").jqGrid('inlineNav',"#elementosPager",{add:true});
});
</script>     
<div id="main_column">
   <div class="section_w701"><font size="6" face="arial"><b>Cat&aacute;logo: <?php echo $_GET['nombre']?></b></font>  </div>  

    <div class="section_w702">
        
        <table align="center"><tr><td>
			<table id="elementosGrid"><tr><td/></tr></table> 
			<div id="elementosPager"></div> <p></p></td></tr>
		</table>
    </div>
    
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
