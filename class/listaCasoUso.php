<?php 
	/*	UNIVERSIDAD SIMON BOLIVAR
		PERIODO:			ENE-MAR 2012
		MATERIA: 			SISTEMAS DE INFORMACION II
		NOMBRE DEL ARCHIVO:	class.listaUsuarios.php
	*/
include_once "fBaseDeDatos.php";
include_once "class.Casodeuso.php";

class listaCasodeuso extends Casodeuso {

		/*	Parametros de entrada:
					NINGUNO
		Parametros de salida: 
					Objeto del tipo listaCasodeuso
		Descripcion	: Constructor de la clase listaCasodeuso			
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
		public function buscar($nombre,$columnas,$parametros,$valores,$simbolos,$concat, $objeto){
			$fachaBD= fBaseDeDatos::getInstance();
			$nombre = array ();
			$nombre[0] = "casodeuso";
			$columnas = array();
			$columnas[0]= "*";
            $ord = array();
            $ord[0] = $sigord;
            $join = array();
            $join[0] = false;
			$Busqueda= new BusquedaCompleta($nombre,$columnas,$parametros,$valores,"=","",
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
        
        public function cargarCasosdeuso($equipo,$sigid,$sigord,$start,$limit){
			$fachaBD= fBaseDeDatos::getInstance();
			$nombre = array ();
			$nombre[0] = "casodeuso AS t1";
            // $nombre[1] = "iteracion AS t2";
			// $nombre[1] = "proyecto o iteracion"
			$columnas = array();
			$columnas[0]= "t1.nombre as nombre";
            $columnas[1]= "t1.completitud as completitud(%)";
            $columnas[2]= "t1.descripcion as descripcion";
            //$parametros= array ();
            //$parametros[0] = ""; No los necesito porque no hay parametros por ahora.
			// $parametros[1] = "";
            // $parametros[2] = "";
			//$valores= array();
            //$valores[0]= "t1.idcu";
			//$valores[1]= '3';
            //$valores[2]= $equipo;
			$Busqueda= new Busqueda($nombre,$columnas,$parametros,$valores,$simbolos,$concat,$objeto);
            $c= $fachaBD->search($Busqueda);
            
			$listarray = array();
			$i=0;
			while($lista=mysql_fetch_array($c,MYSQL_ASSOC)) {
				$listarray[$i]=$lista;
				$i=$i+1;
			}
			return $listarray;		
		}
		
		/*	Parametros de entrada:
					$n	: 	variable del tipo int que representa el num
		Parametros de salida: 
					cliente:	Instancia del tipo solicitud si la busqueda fue exitosa
					NULL: 		De lo contrario
		Descripcion	: 
					Funcion que	realiza la busqueda de una solicitud segun un parametro
		*/		
		public function listar($n,$p){
			$fachaBD= fBaseDeDatos::getInstance();
			$nombre = array ();
			$nombre[0] = "usuario";
			$columnas = array();
			$columnas[0]= "*";
			$parametros= array ();
			$parametros[0] = $p;
			$valores= array();
			$valores[0]= $n;
			$Busqueda= new BusquedaConCondicion($nombre,$columnas,$parametros,$valores,"=","");					
			$result = $fachaBD->search($Busqueda);
			$listarray = array();
			$i=0;
			
			while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {	
				//print "Hola";
				$actividad1 = new usuario($row['nombre'],$row['apellido'],$row['correoUSB'],null,$row['correoOpcional'],$row['activo'],$row['rol'],$row['carnetOCedula']);
				$listarray[$i] = $actividad1;
				$i++;
			}
			
			return $listarray;		
		}
		
		
}
?>