<?php
include_once "../class/class.fachadainterfaz.php";
$fecha=date("d-m-Y");
$hora=date("H:i:s");
$destino="javierrodriguez9@gmail.com";
$asunto= "Comentario";
$desde = "From: " .$_POST[email];
$comentario = "
\n
Nombre: $_POST[name]\n
Email: $_POST[email]\n
Consulta: $_POST[message_input]\n
Enviado: $fecha a las $hora\n
\n
";
mail($destino, $asunto, $comentario, $desde);
echo "";
?>