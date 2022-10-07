<?php

include_once('connections/con1.php'); 
$conn = connection2();

    if (isset($_POST['submit']))  {
        echo 'submitted';
        
        $BookID = $_POST['bookID'];
        $BkTitle = $_POST['bookTitle'];
        $AuthID = $_POST['authorID'];
        $AuthName = $_POST['authorName'];
        $Publ = $_POST['pub'];
        $Yearr = $_POST['year'];

        $sql = "INSERT INTO `lib_db`(`Book_ID`, `Book_Title`, `Author_ID`, `Author_Name`, `Publisher`, `Year`) 
        VALUES ('$BookID','$BkTitle','$AuthID',' $AuthName','$Publ','$Yearr')";

        $conn->query($sql) or die ($conn->error);
        echo header("Location: activity2.php");   
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
    <title>Library Database</title>
</head>
<body class="body2-cont">
</br>
    <h1>NEW BOOK DETAILS</h1>
</br>
    <form class="form-cont" method="POST" action=""> 
        
<br/>
        <label class="newlabel-cont"> Book ID : </label>
        <input type='text' name='bookID' id='bookID'/> 
    <br/> 
        <label class="newlabel-cont"> Book Title :  </label>
        <input type='text' name='bookTitle' id='bookTitle'/> 
    <br/> 
        <label class="newlabel-cont"> Author ID :  </label>
        <input type='text' name='authorID' id='authorID'/> 
    <br/>    
        <label class="newlabel-cont"> Author Name  : </label>
        <input type='text' name='authorName' id='authorName'/> 
    <br/> 
        <label class="newlabel-cont"> Publisher :  </label>
        <input type='text' name='pub' id='pub'/> 
    <br/>
        <label class="newlabel-cont"> Year :  </label>
        <input type='text' name='year' id='year'/> 
    <br/>  <br/>
    <input class="insertbtn" type='submit' name='submit' value='Submit'/> 
    <br/>  <br/>
    </form>
    <br/>
</body>
</html>