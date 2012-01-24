 <?php
	/*	UNIVERSIDAD SIMON BOLIVAR
		PERIODO:			ENE-MAR 2012
		MATERIA: 			SISTEMAS DE INFORMACION II
		NOMBRE DEL ARCHIVO: Encrypter.php
	*/

class Encrypter {
		
        private $clave;
        private $id;
		
		/*	Parametros de entrada:
		Parametros de salida: 
					Objeto del tipo usuario
		Descripcion	: Constructor de la clase usuario.					
		*/
   		function __construct($clave,$id=0) {
			$this->clave    = $clave;
			$this->id       = $id;
        }

	   	/*  Parametros de entrada:
						NINGUNO
		Parametros de salida: 
					cadena encriptada unidireccionalmente
		Descripcion	: Funci�n que permite encriptar usando MD5		
		*/
        public function toMD5() {
			CRYPT_MD5 = 1;
            $result = crypt($clave, $id);
			return $result;
	   	}
		
}
?>
