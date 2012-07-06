<?php 
	/*	UNIVERSIDAD SIMON BOLIVAR
		PERIODO:			ENE-MAR 2012
		MATERIA: 			SISTEMAS DE INFORMACION II
		NOMBRE DEL ARCHIVO:	class.listaProyecto.php
	*/
include_once "fBaseDeDatos.php";

class listaCategoria {

        public function cargar($sigid,$sigord,$start,$limit,$categoria) {
            $fachaBD= fBaseDeDatos::getInstance();
            $nombre = array ();
            $nombre[0] = "categoria as t1";
            $nombre[1] = "categoria as t2";
            $columnas = array();
            $columnas[0]= "t1.nombre as nombreCategoria";
            $columnas[1]= "t1.id as idCat";
            $parametros= array ();
            $parametros[0] = "t1.superCategoria";
            $parametros[1] = "t2.nombre";
            $valores= array();
			$valores[0]= "t2.id";
            $valores[1]= $categoria;
            $ord = array();
            $ord[0] = $sigord;
            $join = array();
            $join[0] = true;
            $join[1] = false;
            $Busqueda= new BusquedaCompleta($nombre,$columnas,$parametros,$valores,"="," AND ",
                                            $ord,$sigid,$start,$limit,$join);
            $c= $fachaBD->search($Busqueda);
            $listarray = array();
            $i=0;
            while($lista=mysql_fetch_array($c,MYSQL_ASSOC)) {
                $listarray[$i]=$lista;
                $i=$i+1;
            }
            return $listarray;		
		}
		
}
?>
