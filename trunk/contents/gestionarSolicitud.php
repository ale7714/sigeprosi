
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
$(function(){ 
  $("#solicitudesGrid").jqGrid({
    url:'acciones/cargarSolicitudes.php',
    datatype: 'xml',
    mtype: 'GET',
    colNames:['Nro','Unidad Administrativa', 'Email', 'Estado'],
    colModel :[ 
      {name:'nro', index:'nro', width:75}, 
      {name:'nombreUnidadAdministrativa', index:'nombreUnidadAdministrativa', width:300}, 
      {name:'email', index:'email', width:150, align:'right'}, 
      {name:'estado', index:'estado', width:100, align:'right'},
    ],
    height: 'auto',
    toolbar:[true,"top"],
    pager: '#pager',
    rowNum:20,
    rowList:[20,40,60],
    sortname: 'invid',
    sortorder: 'desc',
    viewrecords: true,
    gridview: true,
    ondblClickRow: function(id){
        var val = jQuery(this).getRowData(id);
        window.location = "acciones/consultarSolicitud2.php?nro="+id+"&email="+val['email'];
    },
    caption: 'Solicitudes',
  }).navGrid('#pager1',{
     edit: false,
     add: false,
     del: false
 }); 
}); 
</script>
<div id="main_column">
	<div class="section_w701"><font size="6" face="arial"><b>Solicitudes de requerimientos:</b></font>  </div>  
   

   
    <?php
    if ((isset($_SESSION['admin']) && $_SESSION['admin']) || (isset($_SESSION['profesor']) && $_SESSION['profesor'])){ ?>
        <div class="section_w702">
		 
		<table align="center"><tr><td>
			<table id="solicitudesGrid"><tr><td/></tr></table> 
			<div id="etapasPager"></div> <p></p></td></tr>
		</table>
		</div> 
        <div id="pager"></div> <p></p>
    <?php } ?>
	<div class="section_w701"><font size="4" face="arial"><b>Consultar Solicitudes:</b></font>  </div> 
	 <div class="section_w702">
        
		
        <form action="acciones/consultarSolicitud.php" method="post">
			<table border="0" width="<?php if (isset($_GET['error'])) 	echo'100%'; else echo '70%';?>">
			<tr>
				<td>
					<input type="text" value="Número solicitud..." name="numSol" size="10" maxlength="20" class="inputfield" title="Número solicitud" onfocus="clearText(this)" onblur="clearText(this)" onkeypress="return onlyAlfaNumbers(event)"/>
				</td>
				<td>
					<input type="text" value="Correo electrónico..." name="email" size="10" class="inputfield" title="Correo electrónico" onfocus="clearText(this)" onblur="clearText(this)" />
				</td>
			<!--<input type="submit" name="entrar" value="Consultar" alt="Consultar" class="submitbutton_left" title="Consultar solicitud" />-->
				<td>
					<input type="image" width="50" height="50" id="enviar" name="enviar" src="images/ICO/Find.ico" alt="Consultar Solicitud" class="submitbutton" title="Consultar Solicitud"  />
				</td>
				<?php    if (isset($_GET['error'])) echo '<td><font size="3" face="arial"><b>La solicitud no existe.</b></font></td>';?>
			</tr>
			
			</table>
        </form>

    </div>        
	<?php if (!isset($_SESSION['admin'])){ ?>
    <div class="section_w700">
		<center>
		<IMG SRC="images/ICO/Symbol-Add.ico" onclick='location.href="?content=previoSolicitud"' width="50" height="50" type="button" onclick="" title="Crear Solicitud" onMouseOver="javascript:this.width=60;this.height=60"  onMouseOut="javascript:this.width=50;this.height=50"> 
		</center>
    </div>        
	<?php }?>
    <div class="margin_bottom_20"></div>
    <div class="cleaner"></div>
</div> <!-- end of main column -->
<!-- end of side column 1 -->     
<div class="side_column_w200">

    <!-- barra lateral -->
    <?php
    if (isset($_SESSION['admin']))
        include 'sidebars/barraEnSesion.php';
    else
        include 'sidebars/barraInicioSesion.php';
    ?>
</div> <!-- end of right side column -->
<div class="cleaner"></div>