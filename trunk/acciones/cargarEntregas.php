<?PHP
    header("Content-type: text/xml;charset=utf-8");
    echo "<?xml version='1.0' encoding='utf-8' ?>";
    $id =       mysql_real_escape_string($_GET['id']);
    $page =     mysql_real_escape_string($_GET['page']);
    $limit =    mysql_real_escape_string($_GET['rows']);
    $sidx =     mysql_real_escape_string($_GET['sidx']);
    if ($sidx == "invid")
        $sidx = "nombre";
    $sord =     mysql_real_escape_string($_GET['sord']);
    require_once "../class/class.listaCalificacion.php";
    $total_pages = 1;
    $start = ($page - 1)*$limit;
    $baseAct = new listaCalificacion();
    $result = $baseAct->cargar($id,$sord,$sidx,$start,$limit);
    //$result = $baseEtapa->cargar($sord,$sidx,$start,$limit);
    $N = sizeof($result);
    $count = $N;
    echo "<rows>";
    echo "<page>".$page."</page>";
    echo "<total>".$total_pages."</total>";
    echo "<records>".$count."</records>";
    for ($i=0; $i<$N; $i++)
    {
        $row = $result[$i];
        echo "<row id='".$row['id']."'>";
        echo "<cell>".$row['id']."</cell>";
        echo "<cell>".$row['nombre']."</cell>";
        echo "<cell>".$row['apellido']."</cell>";
        echo "<cell>".$row['nota']."</cell>";
        echo "<cell>"." "."</cell>";
        echo "</row>";
    }
    echo "</rows>";
?>