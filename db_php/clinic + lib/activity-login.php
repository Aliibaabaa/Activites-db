<?php

    if(!isset($_SESSION)) {   
    session_start(); }

    include_once('connections/con1.php'); 
   
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
        $_SESSION['useraccess'] = $row['access'];
        // echo header("Location: activity.php");
            
            if(isset($_SESSION['useraccess']) && $_SESSION['useraccess'] == 'Admin-1CA') {  
                 echo header("Location: activity-admin.php");
                } 
            if(isset($_SESSION['useraccess']) && $_SESSION['useraccess'] == 'User-1CA') {  
                echo header("Location: activity-user.php");
                } 

        } else {
        echo '<script>alert("No user found.")</script>';
    }
}

?>

<style> 
    <?php include "css/activity.css"; ?>
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CA - Login</title>
 
</head>
        <body>
            <br/>
            <h1>Login Page</h1>
                </br>
                <form  class="form-cont" action='' method ='POST' >

                    <label class="newlabel-cont"> Username : </label>
                    <input type='text' name='username' id='username' />

                    <label class="newlabel-cont"> Password :</label>
                    <input type='password' name='password' id='password' />
                <br/>
                    <button  class="insertbtn" type='submit' name='login'> Log in as Admin</button> <br/>
                    <button  class="insertbtn" type='submit' name='login'> Log in as User</button>
                <br/>
                </form>
        </body>
</html>
