<?php

// Enviamos los encabezados de hoja de calculo
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=excel.xls");
 
// Creamos la tabla
$letra = array ("","B","C","D","E","F","G","H","I","J");
echo "<table>";
for ($i=0;$i<10;$i++){
  echo "<tr>";
  for ($e=0;$e<10;$e++){
    echo "<td>Fila ".($i+1)." columna ".$letra[$e]."</td>";
  }
  echo "</tr>";
}
echo "</table>";

?>
