<?PHP
    
    include_once "../class/class.listaEtapa.php";
    $page = 1;
    $total_pages = 1;
    $start = 0;
    $limit = 10;
    $baseEtapa = new listaEtapa();
    $result = $baseEtapa->cargar("ASC","nombre",$start,$limit);
    $N = sizeof($result);
    $count = $N;
    for ($i=0; $i<$N; $i++)
    {
        $row = $result[$i];
        echo $row['id']." ".$row['nombre']." ".$row['numero'];
    }
?>