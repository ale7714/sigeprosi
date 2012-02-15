<?php
session_start();
session_destroy();
echo '<script>';
echo 'alert("Su sesion ha sido cerrada exitosamente.");';
echo 'location.href="../principal.php"';
echo '</script>';
?>
