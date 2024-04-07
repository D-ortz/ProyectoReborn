<?php
    session_start();

    session_destroy();
    header("Location: ../login.php"); //Regresa al login   
    exit();
?>