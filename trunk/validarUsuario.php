<?
//vemos si el usuario y contraseña no son vacios
if ($_POST["user"]!="Usuario..." && $_POST["pass"]!=""){
    
    include_once "class/class.BusquedaConCondicion.php";
    include_once "class/fBaseDeDatos.php";
    include_once "class/class.BusquedaSimple.php";
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
        //Verifica si está desactivada
        
        if ($user["activo"] == "0"){
            //header("Location: inicio.php?cuentaDesactivada=si");
        }
        //Verificamos contraseñas
        else if ($user["password"] == $_POST["pass"]) {
            
            
            //Iniciamos sesion
            session_start();
            $_SESSION["nombre"] = $user["nombre"];
            $_SESSION["apellido"] = $user["apellido"];
            $_SESSION["correoUSB"] = $user["correoUSB"];
            $_SESSION["privilegio"] = 1;
            $_SESSION["autenticado"] = "SI";
            
            header("Location: usuarios/inicio.php");
          
        } else { 
            
            header("Location: inicio.php?errorPass=si");
        }
    } else {
        header("Location: inicio.php?registrado=no&user=".$_POST["user"]);
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
header("Location: inicio.php?datosVacios=si");
}
?>