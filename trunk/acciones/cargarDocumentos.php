<?php
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
		$equipo = $_GET['equipo'];
    require_once "../class/class.listaDocumentos.php";
    $total_pages = 1;
    $start = ($page - 1)*$limit;
    $baseDocs = new listaDocumentos();
    $result = $baseDocs->buscar("nombreEquipo",$equipo,$sord,$sidx,$start,$limit);
    $N = sizeof($result);
    $count = $N;
    echo "<rows>";
    echo "<page>".$page."</page>";
    echo "<total>".$total_pages."</total>";
    echo "<records>".$count."</records>";
    for ($i=0; $i<$N; $i++)
    {
        $row = $result[$i];
        echo "<row id='".$i."'>";
        echo "<cell>".$row['nombreEquipo']."</cell>";
        echo "<cell><![CDATA[". $row['nombre']."]]></cell>";
				echo "<cell><![CDATA[". $row['ruta']."]]></cell>";
        echo "</row>";
    }
    echo "</rows>";
?>
