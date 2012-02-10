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
    for ($i=0; $i<$N; $i++)
    {
        $row = $result[$i];
        echo $row['id'];
        echo $row['correoUSB'];
        echo $row['nombre'];
        echo $row['apellido'];
    }
?>