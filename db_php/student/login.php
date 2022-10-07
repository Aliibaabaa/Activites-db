<?php

    if(!isset($_SESSION)) {   //if true, session will start 
    session_start(); }

    include_once('connections/connections.php'); 
    connection();

$con = connection ();

if(isset($_POST['login'])) {
  
    $uname = $_POST['username'];
    $pword = $_POST['password'];

     $sql = "SELECT * FROM users WHERE username = '$uname' AND password = '$pword' ";

    $user = $con->query($sql) or die ($con->error) ;
    $row = $user->fetch_assoc();
    $total = $user->num_rows;

    if($total > 0) {
        $_SESSION['userlogin'] = $row['username'];
      //  $_SESSION['userpw'] = $row['password'];
       $_SESSION['useraccess'] = $row['access'];
        
        //echo $_SESSION['userlogin'] ;
        echo header("Location: index.php");
    }else {
        echo '<script>alert("No user found.")</script>';
    }
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
    <title>Student DB - Login</title>
 
</head>
        <body>
            <h1>Login Page</h1>
                </br>
                <form  class="form-cont" action='' method ='POST' >

                    <label class="newlabel-cont"> Username : </label>
                    <input type='text' name='username' id='username' />

                    <label class="newlabel-cont"> Password :</label>
                    <input type='password' name='password' id='password' />
                <br/>
                    <button  class="logbtn" type='submit' name='login'> Log in </button>
                <br/>
                </form>
        </body>
</html>
