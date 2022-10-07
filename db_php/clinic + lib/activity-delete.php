<?php
 if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['useraccess']) && $_SESSION['useraccess'] == 'Admin-1CA') {  
    echo "<p class='hhead'>".'Welcome '.$_SESSION['userlogin']."!</p>";
} else {
    echo header("Location: activity-admin.php");
}

include_once('connections/con1.php'); 
$con = connection ();

 echo $id = $_GET['ID'];

if($con->connect_error) {
    die("Connection failed: " .$con->connect_error);
}

$sql = "DELETE FROM `appt_db` WHERE  `Appt_No.` = '$id'  ";
if($con->query($sql) === TRUE) {
        echo '<script>
            alert("Appointment record deleted");
            window.location.href="activity-admin.php";
        </script>';
    

}   else {
    echo "ERROR! Appointment record: " .$con -> error." not Deleted";
}

// echo $_POST['ID'];
// //print_r($_POST);

// if(isset($_POST['delete'])) {
//     $id = $_POST['ID'];
//     $sql = "DELETE FROM `appt_db` WHERE  `Appt_No.` = '$id'  ";

//     $con->query($sql) or die ($con->error);
//     echo header("Location: activity-admin.php");
// }

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
    <title>Admin - Delete</title>
</head>
<body>

</body>
</html>