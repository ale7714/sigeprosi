<?PHP
require_once "../aspectos/Seguridad.php";
$seguridad = Seguridad::getInstance();
$seguridad->escapeSQL($_POST);
$seguridad->escapeSQL($_GET);
require_once "../class/class.Elemento.php";
include_once "../class/fBaseDeDatos.php";
if($_POST['oper']=='edit')
{
    $registro     = $_POST['id'] - 1;
    $id     = $_GET['idCat'];
    $cols = $_GET['cols'];
    $dehab = ($_POST['deshabilitado'] == 'Si' ? True : False);
    for ($i = 0; $i != $cols; $i++) {
        $val = $_POST['elem'.$i];
        $elem = new Elemento($id,null,$registro,$i,null);
        $elem -> autocompletar();
        $elem->set('nombre',$val);
        $elem->set('desabilitado',$dehab);
        $elem->salvar();
    }
}
else if ($_POST['oper']=='add') {
    require_once "../class/class.listaElementos.php";
    $id = $_GET['idCat'];
    $cols = $_GET['cols'];
    $fachaBD= fBaseDeDatos::getInstance();
    $registro = $fachaBD->registroMaximo(1) + 1;
    $dehab = ($_POST['deshabilitado'] == 'Si' ? True : False);
    for ($i = 0; $i != $cols; $i++) {
        $val = $_POST['elem'.$i];
        $elem = new Elemento($id,$val,$registro,$i,$dehab);
        $elem -> insertar();
    }
}
?>