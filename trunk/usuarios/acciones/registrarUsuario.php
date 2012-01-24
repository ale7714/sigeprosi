<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->

<?php 
    //Verificamos que no haya campos obligatorios vacios.
    if ($_POST["username"]=="" || $_POST["name"]=="" || $_POST["surname"]=="" ||
        $_POST["pass1"]=="" || $_POST["pass2"]=="" || $_POST["email"]==""){
        header("Location: ../principal.php?content=registrar&error=camposVacios");
    }
    else{
        $resultCarnet = sscanf($_POST["officialCode"], "%d-%d",$cohorte,$numero);
        $patronCorreo = "/\w(@usb\.ve){1}$/"; //Patron para validar correo.
        //$resultEmail = sscanf($_POST["email"], "%s@%s.%s",$email,$usb,$ve);
        
        //Verificamos el formato de carnet, si fue escrito. 
        if($_POST["officialCode"]!="" && strlen($cohorte)!=2 && strlen($numero)!=5){
            header("Location: ../principal.php?content=registrar&error=formatoCarnet");
        }
        //Verificamos contraseñas coincidan.
        else if($_POST["pass1"]!=$_POST["pass2"]){
            header("Location: ../principal.php?content=registrar&error=passNoCoinciden");
        }
        //Verificamos el formato de correo. 
        else if(!preg_match($patronCorreo, $_POST["email"])){
            header("Location: ../principal.php?content=registrar&error=formatoCorreo");
        }/* */
        else{
            $user = $_POST["username"];
            include ("../../BD/basedatos.php");
            $base = new basedatos();
            if(!$base->existePerfil($user)){
                $registro = $base->agregarUsuario($user, $_POST["name"], $_POST["surname"]
                        ,$_POST["officialCode"], $_POST["pass1"], $_POST["email"]);
                if($registro){
                    header("Location: ../principal.php?content=usuarioExitoso&email=".$_POST['email']."&pass1=".$_POST['pass1']);
                }
            }
            else{
                header("Location: ../principal.php?content=registrar&error=userExist");
            }    
        }
        
    }
    
?>