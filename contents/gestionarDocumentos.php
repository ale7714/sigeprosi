<?php
 if (!(isset($_SESSION["estudiante"])) || !(isset($_SESSION["coordinador"])) || (((isset($_SESSION["coordinador"])) || (isset($_SESSION["estudiante"]))) && (!($_SESSION["coordinador"]) || !($_SESSION["estudiante"])))){
	 include "contents/areaRestringida.php";
	 echo '<script>';
	 echo 'alert("No tiene permisos para acceder a esta area del sistema.");';
	echo 'location.href="principal.php"';
	 echo '</script>';
 }
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
?>
<script type="text/javascript">
$(function(){ 
  $("#documentoGrid").jqGrid({
    url:<?php echo "'acciones/cargarDocumentos.php?Equipo=".$_SESSION["Equipo"]."'"?>,
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
   <div class="section_w701"><font size="6" face="arial"><b>Agregar Documento:</b></font>  </div>  

		<form action="../sigeprosi/acciones/agregarDocumento.php" method="post" enctype="multipart/form-data">
    <div class="section_w702">
			<table align="center">
				<tr>
					<td align="right"><LABEL for="documento"><b>*¿Desea agregar un documento? </b><br> (Formatos aceptados: pdf, doc)<br/>(Sólo un documento, Máx. 2 MB)</LABEL> </td>
					<td align="left"><input type="file" name="adjunto" size="35" title="Presione click para buscar el archivo"></td>
				
			</tr>
			</table>
    </div>
		<input type="hidden" name="Equipo" <?php echo 'value="'.$_SESSION["Equipo"].'"';?>> 
	<div class="section_w700">
		<div class="section_w701">
		<table border="0"  width="62%" id="tableOperaciones">
			<tr >
                <td  colspan="2" >
		<input type="hidden" name="submitRegistration" value="true"/>
		<input type="image" width="50" height="50" id="guardar" name="guardar" src="images/ICO/guardar.png" alt="Enviar" class="submitbutton" title="Subir archivo" onMouseOver="javascript:this.width=60;this.height=60"  onMouseOut="javascript:this.width=50;this.height=50" />
	</td>
            </tr>
		</table>
	</div>

    </div>
		</form>

<div class="section_w701"><font size="6" face="arial"><b>Documentos del Equipo:</b></font>  </div>  

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
<!--falta que si es estudiante-->
		<?php if ((isset($_SESSION['coordinador']) || isset($_SESSION["estudiante"])) && ($_SESSION['coordinador'] || $_SESSION["estudiante"])){?>

		<center><b> 
        <span class="em_text"><!--font size=2 >&iquest;Qu&eacute; desea realizar con el documento?</font--></span>
        </b></center>
		<div align="center"><font size=2 >
                <input type="hidden" name="group1" value=<?php echo "'../sigeprosi/documentos/".$_SESSION["Equipo"]."/'";?> checked >
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
