<?PHP
    /*require_once "../aspectos/Seguridad.php";
    $seguridad = Seguridad::getInstance();
    $seguridad->escapeSQL($_GET);*/
    header("Content-type: text/xml;charset=utf-8");
    echo "<?xml version='1.0' encoding='utf-8' ?>";
    $page =     1;
    $limit =   10;
    require_once "../class/class.listaEvaluacion.php";
    $total_pages = 1;
    $start = ($page - 1)*$limit;
    $baseAct = new listaEvaluacion();
    $result = $baseAct->listar();
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