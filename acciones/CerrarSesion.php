<?php
session_start();
session_destroy();
echo '<script>';
echo 'alert("Su sesi\u00f3n ha sido cerrada exitosamente.");';
echo 'location.href="../principal.php"';
echo '</script>';
?>
