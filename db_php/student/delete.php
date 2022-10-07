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

echo $id = $_GET['ID'];

if($con->connect_error) {
    die("Connection failed: " .$con->connect_error);
}

$sql = "DELETE FROM `students_list` WHERE  `ID_num` = '$id'  ";
if($con->query($sql) === TRUE) {
    echo header ("Location:index.php");
}   else {
    echo "ERROR! Student record: " .$con -> error." not Deleted";
}

?>

