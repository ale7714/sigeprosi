<div class="box">
<font size="5" face="arial"><b>Bienvenido: </b></font> 
<font size="3" face="arial"><?php echo $_SESSION["nombre"].' '.$_SESSION["apellido"];?></font> 
 
 <table border="0">
 <tr><td align="center" colspan=2></td><td align="center" colspan=2></td></tr>
 <tr><td>
 <IMG SRC="images/ICO/Config-Tools.ico" width="50" height="50" type="button" onclick='location.href="?content=consultaUsuario"' class="submitbutton" title="Consultar Perfil de Usuario" onMouseOver="javascript:this.width=60;this.height=60"  onMouseOut="javascript:this.width=50;this.height=50"> 
	</td>
 <td>
	<IMG SRC="images/ICO/Logout.ico" width="50" height="50" type="button" onclick='location.href="acciones/CerrarSesion.php"' class="submitbutton" title="Cerrar Sesion" onMouseOver="javascript:this.width=60;this.height=60"  onMouseOut="javascript:this.width=50;this.height=50"> 
</td></tr>
 </table>
</div>
  <div class="news_section">
    <div class="cleaner"></div>
</div>