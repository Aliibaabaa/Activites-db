<?php

if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['useraccess']) && $_SESSION['useraccess'] == 'Admin-1') {  
    echo 'Welcome '.$_SESSION['userlogin']."<br/> <br/>";
} else {
    //echo 'Welcome Guest';
    echo header("Location: index.php");
}

include_once("connections/connections.php");

$con = connection ();

    if (isset($_POST['submit']))  {
        echo 'submitted';
        
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $gender = $_POST['gender'];
        $bday = $_POST['birthday'];
        $en_date = $_POST['enrolled_date'];

        $sql = "INSERT INTO `students_list` ( `Firstname`, `Lastname`, `Birthday`, `Gender`, `Enrolled_date`) 
        VALUES (' $fname','$lname',' $bday' , ' $gender' ,' $en_date')";

        $con->query($sql) or die ($con->error);
        echo header("Location: index.php");
    }
?>


<style> 
    <?php include "css/style.css"; ?>
</style> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Database</title>
</head>
<body>
    <form  class="form-cont" method="POST" action=""> 
        
<br/>
        <label> First Name </label>
        <input type='text' name='firstname' id='firstname'/> 
        
        <label> Last Name </label>
        <input type='text' name='lastname' id='lastname'/> 
 
        <label> Birthday </label>
        <input type='text' name='birthday' id='birthday'/> 
        
        <label> Gender </label>
        <select name="gender" id="gender"> 
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>

        <label> Enrolled Date </label>
        <input type='text' name='enrolled_date' id='enrolled_date'/> 
    <br/>
    <input type='submit' name='submit' value='Submit'/> 

    </form>
</body>
</html>