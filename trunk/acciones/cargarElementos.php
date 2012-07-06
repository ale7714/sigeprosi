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
        $sidx = "nombre";
    $sord = $_GET['sord'];
	$cat = $_GET['catalogo'];
    require_once "../class/class.catalogo.php";
    $total_pages = 1;
    $start = ($page - 1)*$limit;
    $catalogo = new catalogo($cat,null);
    $catalogo -> autocompletar();
    $result = $catalogo -> get('elementos');
    $N = sizeof($result);
    $count = $N;
    echo "<rows>";
    echo "<page>".$page."</page>";
    echo "<total>".$total_pages."</total>";
    echo "<records>".$count."</records>";
    for ($i=0; $i<$N; $i++)
    {
        $row = $result[$i];
        $rows = sizeof($row);
        echo "<row id='".($i+1)."'>";
        for ($j = 0; $j != $rows; $j++) 
            echo "<cell>".$row[$j]->get('nombre')."</cell>";
        echo "<cell>".($row[0]->get('desabilitado') == 0 ? "No" : "Si")."</cell>";
        echo "</row>";
    }
    echo "</rows>";
?>
