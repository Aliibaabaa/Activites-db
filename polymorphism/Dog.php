<?php
require_once "CallInterface.php";
class Dog implements CallInterface{
    public function Call(){
        echo "dog says: ora ora </br>";
    }
}
?>