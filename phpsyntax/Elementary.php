<?php
require_once "Student.php";
class Elementary extends Student{
    public $grade1;
 
    
    public function __construct($name,$age,$grade1){
        $this->name = $name;
        $this->age = $age;
        $this->grade1 = $grade1;
    }

    public function getGrade1() {
        echo "This is $this->name , $this->age years old.</br>
        He/She is a $this->grade1 Student.";
    }

}
?>