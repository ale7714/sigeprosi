<?php 
include "../class/class.fachadainterfaz.php";
$email = $_POST["email"];
if (isset($email)) {
	$user = new Usuario(null,null,$email,null,null, null,null,null);
    $user->autocompletar();
	$user -> set ("nombre",$_POST["nombre"]);
    $user -> set ("apellido",$_POST["apellido"]);
    $user -> set ("correoOpcional",$_POST["correoOpt"]);
    $user -> set ("carnetOCedula",$_POST["cedula"]);
    if (isset($_POST["codigo"]) && isset($_POST["tlf"]))
        $user -> set ("telefono",$_POST["codigo"].$_POST["tlf"]);
    $user -> set ("rol",$_POST["rol"]);
    $user -> set ("activo", $_POST["group1"]);
	$user -> actualizar($user->get('correoUSB'));
	header("Location: ../principal.php?content=actualizadoUsuario");
} 
?>
