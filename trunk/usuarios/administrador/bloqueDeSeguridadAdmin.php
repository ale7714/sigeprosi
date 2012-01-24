<?
//Inicio la sesión
//session_start();
//COMPRUEBA QUE EL USUARIO ESTA AUTENTICADO
if ($_SESSION["privilegio"] != "1") {
//si no existe, va a la página de autenticacion
header("Location: principal.php");
//salimos de este script
exit();
}
?>
