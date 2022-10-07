<?php

    session_start(); 

    // include_once('connections/connections.php'); 
    // $con = connection ();

    unset($_SESSION['userlogin']);
    unset($_SESSION['useraccess']);
    echo header("Location: index.php");

?>