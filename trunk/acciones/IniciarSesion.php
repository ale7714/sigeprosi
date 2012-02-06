<?php
include_once "../class/class.Usuario.php";
if (isset($_POST["user"])){
	$u = new Usuario(null,null,$_POST["user"],$_POST["pass"],null,null);
    if ($u->autocompletar() != 0 || $u->get('password') != $_POST["pass"])
        echo "No encontrado";
    else {
        session_start();
        $_SESSION["correoUSB"]=$_POST["user"];
        $_SESSION["nombre"] = $u->get("nombre");
        $_SESSION["apellido"] = $u->get("apellido");
        $_SESSION["admin"] = true;
        $_SESSION['autenticado'] = true;
        header("Location: ../principal.php?content=logueado");
    }
}
?>