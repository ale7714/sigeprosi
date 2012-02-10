<?PHP
    $page = $_GET['page']; // get the requested page
    $limit = $_GET['rows']; // get how many rows we want to have into the grid
    $sidx = $_GET['sidx']; // get index row - i.e. user click to sort
    $sord = $_GET['sord']; // get the direction 
    echo "here";
    header("Content-type: text/xml;charset=utf-8");
    include_once "class/class.listaUsuarios.php";
    
    $page = 1;
    $total_pages = 1;
    $start = 0;
    $limit = 10;
    $baseUsuarios = new listaUsuarios();
    $result = $baseUsuarios->buscar("ASC","nombre",$start,$limit);
    $N = sizeof($result);
    $count = $N;
    echo "<?xml version='1.0' encoding='utf-8'?$et\n";
    echo "<rows>";
    echo "<page>".$page."</page>";
    echo "<total>".$total_pages."</total>";
    echo "<records>".$count."</records>";
    
    for ($i=0; $i<$N; $i++) {
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