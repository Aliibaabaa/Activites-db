<?php
require_once "CallInterface.php";
class Cat implements CallInterface{
    public function Call(){
        echo "cat says: nya nya </br>";
    }
}
?>