<?php 
	/*	UNIVERSIDAD SIMON BOLIVAR
		PERIODO:			ENE-MAR 2012
		MATERIA: 			SISTEMAS DE INFORMACION II
		NOMBRE DEL ARCHIVO:	class.listaProyecto.php
	*/
include_once "fBaseDeDatos.php";

class listaCalificacion {

		/*	Parametros de entrada:
					NINGUNO
		Parametros de salida: 
					Objeto del tipo listaSolicitud
		Descripcion	: Constructor de la clase listaSolicitud			
		*/
        function __construct() {
        }
		
        
        public function cargar($idEntrega,$sigid,$sigord,$start,$limit) {
            $fachaBD= fBaseDeDatos::getInstance();
            $nombre = array ();
            $nombre[0] = "calificacion as cs";
            $nombre[1] = "usuario as us";
            $columnas = array();
            $columnas[0]= "cs.id as id";
            $columnas[1]= "us.nombre as nombre";
            $columnas[2]= "us.apellido as apellido";
            $columnas[3]= "cs.nota as nota";
            $parametros= array ();
            $parametros[0] = "cs.idEntrega";
            $parametros[1] = "cs.correoUSB";
            $valores= array();
            $valores[0]= $idEntrega;
            $valores[1]= "us.correoUSB";
            $ord = array();
            $ord[0] = $sigord;
            $join = array();
            $join[0] = false;
            $join[1] = true;
            $Busqueda= new BusquedaCompleta($nombre,$columnas,$parametros,$valores,"=","AND",
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
