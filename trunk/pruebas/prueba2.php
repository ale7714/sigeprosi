<?php
    require_once("../Excel/excel.php");
    require_once("../Excel/excel-ext.php");
    // Consultamos los datos desde MySQL
    /*$conEmp = mysql_connect("localhost", "userDB", "passDB");
    mysql_select_db("sampleDB", $conEmp);
    $queEmp = "SELECT nombre, direccion, telefono FROM empresa";
    $resEmp = mysql_query($queEmp, $conEmp) or die(mysql_error());
    $totEmp = mysql_num_rows($resEmp);
    // Creamos el array con los datos
    while($datatmp = mysql_fetch_assoc($resEmp)) {
        $data[] = $datatmp;
    }
    // Generamos el Excel 
    createExcel("excel-mysql.xls", $data);*/
    
    $assoc = array( 
            array("Nombre"=>"Mattias", "IQ"=>250), 
            array("Nombre"=>"Tony", "IQ"=>100), 
            array("Nombre"=>"Peter", "IQ"=>100), 
            array("Nombre"=>"Edvard", "IQ"=>100)
             );
    createExcel("excel-array.xls", $assoc);
    exit;
?>
