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

<?php
    if (isset($_GET['equipo']))
        $equipo = $_GET['equipo'];
    else
        $equipo = $_SESSION["Equipo"];
?>

<script type="text/javascript">
$(function(){ 
  $("#iteracionGrid").jqGrid({
    url: <?php echo "'acciones/cargarIteracion.php?equipo=".$equipo."'";?>,
    datatype: 'xml',
    mtype: 'GET',
    colNames:['id', 'Nombre', 'Fase', 'Estado'],
    colModel :[ 
      {name:'id', index:'id', width:10, hidden:true}, 
      {name:'nombre', index:'nombre', width:200}, 
      {name:'tipo', index:'tipo', width:100},
      {name:'estado', index:'estado', width:100, align:'right'}, 
    ],
    pager: '#iteracionPager',
    toolbar:[true,"top"],
    height: 'auto',
    rowNum:20,
    rowList:[20,40,60],
    sortname: 'tipo',
    sortorder: 'desc',
    viewrecords: true,
    gridview: true,
    ondblClickRow: function(id){
        var val = jQuery(this).getRowData(id);
		var botonoes = document.getElementsByName("group1");
		var i;
		for(i=0;i<botonoes.length;i++) if (botonoes[i].checked) window.location = "?content="+botonoes[i].value+"&nombre="+val['nombre']+"&id="+val['id'];
    },
    caption: 'Iteraciones',
  }).navGrid('#pager1',{
     edit: false,
     add: false,
     del: false
 }); 
}); 
</script>     
<div id="main_column">
   <div class="section_w701"><font size="6" face="arial"><b>Gestionar Iteraciones:</b></font>  </div>  

    <div class="section_w702">
        
        <table align="center"><tr><td>
            <table id="iteracionGrid"><tr><td/></tr></table> 
            <div id="iteracionPager"></div> <p></p>
		</table>
		<?php if (((isset($_SESSION['coordinador'])) && ($_SESSION['coordinador']))){?>
		<center><b> 
        <span class="em_text"><font size=2 >&iquest;Qu&eacute; desea realizar sobre iteraciones?</font></span>
        </b></center>
		<div align="center"><font size=2 >
                <input type="radio" name="group1" value="consultaIteracion" checked > Consultar
                <input type="radio" name="group1" value="editaIteracion" > Editar
				</font>
        </div>
		<?php } ?>
    </div> 
<?php 
if (((isset($_SESSION['coordinador'])) && ($_SESSION['coordinador']))){?>
	<div class="section_w700">
		<center>
		<IMG SRC="images/ICO/add.png" class="pointer" onclick='location.href="?content=agregarIteracion"' width="50" height="50" type="button" onclick="" title="Crear Nueva Iteracion" onMouseOver="javascript:this.width=60;this.height=60"  onMouseOut="javascript:this.width=50;this.height=50"> 
		</center>
    </div>  
<?php } ?>
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
