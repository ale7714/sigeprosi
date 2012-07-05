<?PHP
    require_once "../aspectos/Seguridad.php";
    $seguridad = Seguridad::getInstance();
    $seguridad->escapeSQL($_GET);
  header("Content-type: text/xml;charset=utf-8");
    echo "<?xml version='1.0' encoding='utf-8' ?>";
    $page = 1;
    $limit = 4;
	$client = $_GET['cliente'];

    require_once "../class/class.listaSeAsocia.php";
	require_once "../class/class.Proyecto.php";
    $total_pages = 1;
    $start = ($page - 1)*$limit;
    $baseProy = new listaSeAsocia();
    $resultado = $baseProy->buscar($client, 'correoUSBUsuario');
    $N = sizeof($resultado);
    $count = $N;
	$result = Array();
	for ($k=0; $k<$N; $k++){
	$proyect = new Proyecto($resultado[$k]->get('nombreProyecto'),null,null,null);
	$proyect -> autocompletar();
	$result[$k] = $proyect;
	}
    echo "<rows>";
    echo "<page>".$page."</page>";
    echo "<total>".$total_pages."</total>";
    echo "<records>".$count."</records>";
    for ($i=0; $i<$N; $i++)
    {
        $row = $result[$i];
        echo "<row id='".$i."'>";
        echo "<cell><![CDATA[". $row->get('nombre')."]]></cell>";
        echo "<cell><![CDATA[". $row->get('numeroSolicitud')."]]></cell>";
        echo "<cell>";
        if ($row->get('estado') == 0)
            echo "Inactivo";
        else if ($row->get('estado') == 1)
            echo "Activo";
        else if ($row->get('estado') == 2)
            echo "Finalizado";
        else
            echo "Implantado";
        echo "</cell>";
        echo "<cell><![CDATA[". $row->get('idEtapa')."]]></cell>";
        echo "</row>";
    }
    echo "</rows>";
?>