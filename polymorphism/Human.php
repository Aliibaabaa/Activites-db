<?php
require_once "CallInterface.php";
class Human implements CallInterface{
    public function Call(){
        echo "Budoy says: Ako Budoy";
    }
}
?>