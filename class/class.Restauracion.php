 <?php
	/*	UNIVERSIDAD SIMON BOLIVAR
		PERIODO:			ENE-MAR2012
		MATERIA: 			SISTEMAS DE INFORMACION
		NOMBRE DEL ARCHIVO:	class.Restauracion.php
	*/
include_once "fBaseDeDatos.php";

class restauracion {
		
		private static $_instance;		
		/*
		Descripcion	: Constructor de la clase restauracion.
		*/
   		function __construct() {
	   }
			
		/*
			Descripcion	: Función que permite la procesar la restauracion de la base de datos
		*/
       public function procesar() {
				$fachaBD = fBaseDeDatos::getInstance();
   			$insercion=$fachaBD->restaurar();
				return $insercion;
	   	 }
}
?>
