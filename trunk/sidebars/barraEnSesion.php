<div class="box">
<b style="font-size:20px;">Bienvenido: </b> 
<br/>
<br/>
<b style="font-size:18px;"><?php echo $_SESSION["nombre"].' '.$_SESSION["apellido"];?></b>
 
 <table border="0">
 <tr class="bienvenida">
         
    <td>
        <a href="?content=consultaUsuario">Mi Perfil</a>
        |
        <a href="acciones/CerrarSesion.php">Cerrar Sesión</a>
    </td>
    
<!--    <td>     
 <IMG SRC="images/ICO/Config-Tools.ico" width="50" height="50" type="button" onclick='location.href="?content=consultaUsuario"' class="submitbutton" title="Consultar Perfil de Usuario" onMouseOver="javascript:this.width=60;this.height=60"  onMouseOut="javascript:this.width=50;this.height=50"> 
	</td>
 <td>
	<IMG SRC="images/ICO/Logout.ico" width="50" height="50" type="button" onclick='location.href="acciones/CerrarSesion.php"' class="submitbutton" title="Cerrar Sesion" onMouseOver="javascript:this.width=60;this.height=60"  onMouseOut="javascript:this.width=50;this.height=50"> 
</td>-->
    
 </tr>
 </table>
</div>
  <div class="news_section">
    <div class="cleaner"></div>
</div>