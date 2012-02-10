<?PHP
    $page = $_GET['page'];
    $limit = $_GET['rows'];
    $sidx = $_GET['sidx'];
    $sord = $_GET['sord'];
    
    include_once "class/class.listaUsuarios.php";
    $page = 1;
    $total_pages = 1;
    $start = 0;
    $limit = 10;
    $baseUsuarios = new listaUsuarios();
    $result = $baseUsuarios->buscar("ASC","nombre",$start,$limit);
    $N = sizeof($result);
    $count = $N;
    header("Content-type: text/xml;charset=utf-8");
    echo "<?xml version='1.0' encoding='utf-8'?>\n";
    echo "<rows>";
    echo "<page>".$page."</page>";
    echo "<total>".$total_pages."</total>";
    echo "<records>".$count."</records>";
    for ($i=0; $i<$N; $i++)
    {
        $row = $result[$i];
        echo "<row id='". $row['id']."'>";
        echo "<cell>". $row['id']."</cell>";
        echo "<cell>". $row['correoUSB']."</cell>";
        echo "<cell><![CDATA[". $row['nombre']."]]></cell>";
        echo "<cell><![CDATA[". $row['apellido']."]]></cell>";
        echo "</row>";
    }
    echo "</rows>";
?>