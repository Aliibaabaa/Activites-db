<?php
    function connection() {
        // echo 'This is a function';

        $host = "localhost";
        $username = "root";
        $password = "kodego2022";
        $database = "student_records";
        $port = "3307";
    
        $con = new mysqli($host, $username, $password, $database, $port);
        
        if($con -> connect_error) {
            echo $con -> connect_error;
        } else {
            return $con ;
        }
    }
?>
