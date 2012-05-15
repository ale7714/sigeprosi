<?php
    function obtenerFecha() {
        $arr = getdate();
        if ($arr['mon'] < 10) $mon = "0".$arr['mon'] else $mon = $arr['mon']
        if ($arr['mday'] < 10) $day = "0".$arr['mday'] else $day = $arr['mday']
        return $arr['year']."-".$mon."-".$day;
    }
?>