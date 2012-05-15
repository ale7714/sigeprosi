<?php
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
        // blah blah
    }
}