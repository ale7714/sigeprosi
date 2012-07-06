<?php 
	/*	UNIVERSIDAD SIMON BOLIVAR
		PERIODO:			ENE-MAR 2012
		MATERIA: 			SISTEMAS DE INFORMACION II
		NOMBRE DEL ARCHIVO:	class.listaProyecto.php
	*/
include_once "fBaseDeDatos.php";
include_once "class.catalogo.php";

class listaCatalogo extends catalogo {

		/*	Parametros de entrada:
					NINGUNO
		Parametros de salida: 
					Objeto del tipo listaSolicitud
		Descripcion	: Constructor de la clase listaSolicitud			
		*/
        function __construct() {
        }
		
		/*	Parametros de entrada:
					$n	: 	variable del tipo int que representa el num
		Parametros de salida: 
					cliente:	Instancia del tipo solicitud si la busqueda fue exitosa
					NULL: 		De lo contrario
		Descripcion	: 
					Funcion que	realiza la busqueda de una solicitud segun un parametro
		*/		
		public function listar(){
			$fachaBD= fBaseDeDatos::getInstance();
			$nombre = array();
			$nombre[0] = "catalogo";
			$columnas = array();
			$columnas[0]= "*";
			$Busqueda= new BusquedaSimple($nombre,$columnas,null);					
			$result = $fachaBD->search($Busqueda);
			$listarray = array();
			$i=0;
			
			while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {	
				$etapa = new catalogo($row['nombre']);
				$etapa->set($row['nombre']);
				$listarray[$i] = $etapa;
				$i++;
			}
			
			return $listarray;		
		}
		
		public function filtrar($n,$p){
			$fachaBD= fBaseDeDatos::getInstance();
			$nombre = array ();
			$nombre[0] = "catalogo";
			$columnas = array();
			$columnas[0]= "*";
			$parametros= array ();
			$parametros[0] = $p;
			$valores= array();
			$valores[0]= $n;
			$Busqueda= new BusquedaSimple($nombre,$columnas,null);					
			$result = $fachaBD->search($Busqueda);
			$listarray = array();
			$i=0;
			while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {	
				//print "Hola";
				$actividad1 = new catalogo($row['nombre']);
				$listarray[$i] = $actividad1;
				$i++;
			}
			return $listarray;		
		}
        
        public function cargar($sigid,$sigord,$start,$limit,$categoria) {
            $fachaBD= fBaseDeDatos::getInstance();
            $nombre = array ();
            $nombre[0] = "catalogo as t1";
            $nombre[1] = "categoria as t2";
            $columnas = array();
            $columnas[0]= "t1.nombre as nombreCatalogo";
            $columnas[1]= "t1.id as idCat";
            $parametros= array ();
            $parametros[0] = "t1.idCategoria";
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
        
        public function obtenerEncabezado($idCatalogo) {
            $fachaBD= fBaseDeDatos::getInstance();
            $nombre = array ();
            $nombre[0] = "headercatalogo";
            $columnas = array();
            $columnas[0]= "nombre";
            $columnas[1]= "columna";
            $columnas[2]= "tipo";
            $parametros= array ();
            $parametros[0] = "idCatalogo";
            $valores= array();
			$valores[0]= $idCatalogo;
            $join = array();
            $join[0] = false;
            $Busqueda= new BusquedaConCondicion($nombre,$columnas,$parametros,$valores,"=","");
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
