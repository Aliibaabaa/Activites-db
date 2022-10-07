<?php

    session_start(); 

    unset($_SESSION['userlogin']);
    unset($_SESSION['useraccess']);
    echo header("Location: activity.php");

?>