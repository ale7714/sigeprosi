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
<script src="jscripts/js/i18n/grid.locale-en.js" type="text/javascript"></script>
<script src="jscripts/js/jquery.jqGrid.min.js" type="text/javascript"></script>

<!--?php
    if (isset($_GET['equipo']))
        $equipo = $_GET['equipo'];
    else
        if (isset($_SESSION["Equipo"])) $equipo = $_SESSION["Equipo"];
?-->

<?php
    /*if ($_SERVER['SERVER_ADDR'] == "127.0.0.1")
                  $root = $_SERVER['DOCUMENT_ROOT']."/sigeprosi";
          else
                  $root = "/home/ps6116-02/public_html/sigeprosi";
    */
    $root = $_SERVER['DOCUMENT_ROOT']."/sigeprosi";
		$team = $_GET["Equipo"];
?>

<script type="text/javascript">
$(function(){ 
  $("#documentoGrid").jqGrid({
    url:<?php echo "'acciones/cargarDocumentos.php?Equipo=".$team."'"?>,
    datatype: 'xml',
    mtype: 'GET',
		colNames:['equipo', 'Nombre', 'ruta'],
    colModel :[ 
      {name:'nombreEquipo', index:'nombreEquipo', width:100, hidden:true }, 
      {name:'Nombre', index:'Nombre', width:400}, 
      {name:'ruta', index:'ruta', width:100, hidden:true },
    ],
    pager: '#documentoPager',
    toolbar:[true,"top"],
    height: 'auto',
    rowNum:20,
    rowList:[20,40,60],
    sortname: 'nombre',
    sortorder: 'asc',
    viewrecords: true,
    gridview: true,
    ondblClickRow: function(id){
        var val = jQuery(this).getRowData(id);
				var botonoes = document.getElementsByName("group1");
				var i;
				for(i=0;i<botonoes.length;i++) 
					if (botonoes[i].checked) window.location = botonoes[i].value+val['Nombre'];
    },
    caption: 'Documentos',
  }).navGrid('#pager1',{
     edit: false,
     add: false,
     del: false
 }); 
});  
</script>     

<div id="main_column">

	<div class="section_w701"><font size="6" face="arial"><b>Documentos del Equipo<p></p> <?php echo $team;?>:</b></font>  </div>  

    <div class="section_w702">
      <table align="center">
				<tr>
					<td>
           	<table id="documentoGrid">
							<tr>
								<td/>
							</tr>
						</table> 
          <div id="documentoPager">
					</div> 
				<p></p>
			</table>
		<?php if (((isset($_SESSION['profesor'])) && ($_SESSION['profesor']))){?>
		<center><b> 
        <span class="em_text"><font size=2 ></font></span>
        </b></center>
		<div align="center"><font size=2 >
                <input type="hidden" name="group1" value=<?php echo "'../sigeprosi/documentos/".$team."/'"; ?> checked >
                <!--input type="radio" name="group1" value="editaIteracion" > Editar-->
				</font>
        </div>
		<?php } ?>
		
    </div> 

</div> <!-- end of main column -->
	
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
