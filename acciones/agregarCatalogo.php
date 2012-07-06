<?php
    include_once "../class/class.fachadainterfaz.php";
    require_once "../aspectos/Seguridad.php";
    $seguridad = Seguridad::getInstance();
    $seguridad->escapeSQL($_POST);
    $fachada = fachadaInterfaz::getInstance();
    if($fachada->agregarCatalogo($_POST["nombre"])==0){
        echo '<script>';
        echo 'location.href="../principal.php?content=gestionarCatalogo";';
        echo 'alert("El cat\u00e1logo fue agregado exitosamente");';
        echo '</script>';
    //header("Location: ../principal.php?content=listarElementos&nombre=".$_POST["catalogo"]."");
    }else{
        echo '<script>';
        echo 'alert("Error al intentar agregar el cat\u00e1logo");';
        echo 'location.href="../principal.php?content=gestionarCatalogo";';
        echo '</script>';
    //header("Location: ../principal.php?content=listarElementos&nombre=".$_POST["catalogo"]."&error=mp");
    }


?>
