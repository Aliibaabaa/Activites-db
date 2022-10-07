<?php
    function connection() {
        $host = "localhost";
        $username = "root";
        $password = "kodego2022";
        $database = "clinic_appointment";
        $port = "3307";
    
        $con = new mysqli($host, $username, $password, $database, $port);
        
        if($con -> connect_error) {
            echo $con -> connect_error;
        } else {
            return $con ;
        }
    }

    function connection2() {
        $host = "localhost";
        $username = "root";
        $password = "kodego2022";
        $database = "library_database";
        $port = "3307";
    
        $conn = new mysqli($host, $username, $password, $database, $port);
        
        if($conn -> connect_error) {
            echo $conn -> connect_error;
        } else {
            return $conn ;
        }
    }
?>
