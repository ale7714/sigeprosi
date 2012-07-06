<?PHP
    require_once "../aspectos/Seguridad.php";
    $seguridad = Seguridad::getInstance();
    $seguridad->escapeSQL($_GET);
    header("Content-type: text/xml;charset=utf-8");
    echo "<?xml version='1.0' encoding='utf-8' ?>";
    $page = $_GET['page'];
    $limit = $_GET['rows'];
    $sidx = $_GET['sidx'];
    if ($sidx == "invid")
        $sidx = "nombreCategoria";
    $sord = $_GET['sord'];
    $categoria = $_GET['categoria'];
    require_once "../class/class.listaCategoria.php";
    $total_pages = 1;
    $start = ($page - 1)*$limit;
    $baseEtapa = new listaCategoria();
    $result = $baseEtapa->cargar($sord,$sidx,$start,$limit,$categoria);
    $N = sizeof($result);
    $count = $N;
    echo "<rows>";
    echo "<page>".$page."</page>";
    echo "<total>".$total_pages."</total>";
    echo "<records>".$count."</records>";
    for ($i=0; $i<$N; $i++)
    {
        $row = $result[$i];
        echo "<row id='".$row['idCat']."'>";
        echo "<cell>".$row['nombreCategoria']."</cell>";
    }
    echo "</rows>";
?>
