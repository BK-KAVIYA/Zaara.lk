<?php
session_start();

    
    session_unset();
    session_destroy($_SESSION['id']);
    header('Location: ../HTML/index.php');

?>
