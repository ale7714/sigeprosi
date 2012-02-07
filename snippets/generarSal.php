<?php
    function generarSal($msg) {
        $u = 0;
        for ( $i = 0; $i < strlen($msg); $i++) {
            $j = ($i % 4) << 3;
            $y = ord($msg[$i]) << $j;
            $u = $u ^ $y;
        }
        return $u;
    }
?>