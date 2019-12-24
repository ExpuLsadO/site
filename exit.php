<?php 
    session_start();
    session_destroy();
    header ('Location: Enter.php');
    exit();
    
?>