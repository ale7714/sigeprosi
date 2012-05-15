<?php
include_once "class/class.Log.php";
include_once "snippets/Tiempo.php";
class Logger {	

    private static $f_instance; 

    //Constructor de la clase 
    function __construct(){
        
    }		


    public static function getInstance(){ 
        if (!(self::$f_instance instanceof self)){ 
            self::$f_instance=new self(); 
        } 
        return self::$f_instance; 
    }

    public function log($str) {
        $log = new log($_SESSION["correoUSB"],$str,obtenerFecha());
        $log->insertar();
    }
}