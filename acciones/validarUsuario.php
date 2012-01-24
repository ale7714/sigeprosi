<?
//vemos si el usuario y contraseña no son vacios
if ($_POST["user"]!="Usuario..." && $_POST["user"]!="" && $_POST["pass"]!="Contraseña..." && $_POST["pass"]!=""){
    
    include_once "../class/class.BusquedaConCondicion.php";
    include_once "../class/fBaseDeDatos.php";
    include_once "../class/class.BusquedaSimple.php";
    $nombre[0] = "usuario";
    $columna[0] = "id";
    $columna[1] = "nombre";
    $columna[2] = "apellido";
    $columna[3] = "correoUSB";
    $columna[4] = "password";
    $columna[5] = "activo";
    $param[0] = "correoUSB";
    $val[0] = $_POST["user"];
    $simbolo = "=";
    $baseD = new fBaseDeDatos();
    $busq = new BusquedaConCondicion($nombre, $columna, $param, $val, $simbolo, NULL);
    $user = mysql_fetch_array($baseD->search($busq));
    
    if ($user != null) {
        //Verifica si está desactivada la cuenta
        if ($user["activo"] == "0"){
            header("Location: ../principal.php?content=".$_POST['content']."&error=cuentaDesactivada");
        }
        //Verificamos contraseñas
        else if ($user["password"] == $_POST["pass"]) {
            
            
            //Iniciamos sesión
            session_start();
            $_SESSION["nombre"] = $user["nombre"];
            $_SESSION["apellido"] = $user["apellido"];
            $_SESSION["correoUSB"] = $user["correoUSB"];
            $_SESSION["privilegio"] = 1;
            $_SESSION["autenticado"] = "SI";
            
            header("Location: ../usuarios/principal.php");
          
        } else { 
            
            header("Location: ../principal.php?content=".$_POST['content']."&error=errorPass");
        }
    } else {
        header("Location: ../principal.php?content=".$_POST['content']."&error=noRegistrado&user=".$_POST["user"]);
    }
}

/*if ($_POST["usuario"]=="usuario" && $_POST["contrasena"]=="123"){
//usuario y contraseña válidos
//se define una sesion y se guarda el dato session_start();
$_SESSION["autenticado"]= "SI";
header ("Location: aplicacion.php");
}*/
else {
//si son vacios se va a login.php
header("Location: ../principal.php?content=".$_POST['content']."&error=datosVacios");
}
?>