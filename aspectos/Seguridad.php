<?php
class Seguridad {	

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

    public function escapeSQL($arr) {
        if (ISSET($arr) && $arr != null)
            for ($i = sizeof($arr) - 1; $i != 0; $i--)
                if (ISSET($arr[$i])) $arr[$i] = mysql_real_escape_string($arr[$i]);
    }
}