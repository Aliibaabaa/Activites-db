<?php
require_once "Cat.php";
require_once "Dog.php";
require_once "Human.php";

$dog = new Dog;
$cat = new Cat;
$human = new Human;

$dog->call();
$cat->call();
$human->call();

?>