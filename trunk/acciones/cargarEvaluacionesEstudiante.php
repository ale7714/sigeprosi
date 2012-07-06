<?php
    /*require_once "../aspectos/Seguridad.php";
    $seguridad = Seguridad::getInstance();
    $seguridad->escapeSQL($_GET);*/
    header("Content-type: text/xml;charset=utf-8");
    echo "<?xml version='1.0' encoding='utf-8' ?>";
    $page =     1;
    $limit =   2;
    require_once "../class/class.listaEvaluacion.php";
    require_once "../class/class.listaDesarrolla.php";
    require_once "../class/class.listaEsEvaluado.php";

    $proy = $_GET['proy'];
    $lista = new listaDesarrolla();
    $equipo = $lista->buscar($proy,'nombreProyecto');
    $lista = new listaesevaluado();
    $evaluaciones = $lista->buscar($equipo[0]->get('nombreEquipo'),'nombreEquipo');
    $N = sizeof($evaluaciones);
    $result = Array();
    $j = 0;
    for ($i=0; $i<$N; $i++)
    {
        $eval = new evaluacion(null,null,null,null);
        $eval->set('id',$evaluaciones[$i]->get('idEvaluacion'));
        $eval->autocompletar();
        if( ($eval->get('esPresentacion')) == 1){
            $result[$j] = $eval;
            $j++;
        }
    }
    $total_pages = 1;
    $start = ($page - 1)*$limit;
    $N = sizeof($result);
    $count = $N;
    echo "<rows>";
    echo "<page>".$page."</page>";
    echo "<total>".$total_pages."</total>";
    echo "<records>".$count."</records>";
    for ($i=0; $i<$N; $i++)
    {
        $row = $result[$i];
        echo "<row id='".$row->get('id')."'>";
        echo "<cell>".$row->get('nombre')."</cell>";
        echo "</row>";
    }
    echo "</rows>";
?>