<?php 
    if(!isset($_SESSION)){
        session_start();
    }

    if(isset($_SESSION['userlogin'])) {  
        echo 'Welcome '.$_SESSION['userlogin'];
    } else {
        echo 'Welcome Guest';
    }

    include_once('connections/connections.php'); 
    
    $con = connection();
    $search = $_GET ['search'];

    // echo $search = $_GET ['search'];
    

    $sql = "SELECT * FROM students_list WHERE `Firstname` LIKE '%$search%' || `Lastname` LIKE '%$search%' || `Gender` LIKE '%$search%' ORDER BY ID_num DESC";
    $students = $con -> query($sql) or die($con -> error);

    $row = $students -> fetch_assoc();

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
    <form action="result.php" method="get">

        <h1>Student Information</h1>
    <br/> 


   <?php if(isset($_SESSION['userlogin'])) { ?> 
         <a class="linkk" href="logout.php"> Log out </a>  
    <?php } else { ?>
           <a class="linkk" href="login.php"> Log In </a> 
    <?php } ?> 

    <br/>   <br/>

    <input type="text" name="search" id="search" class="searchbtn"/>
    <button type="submit"> Search </button>

    <?php
// (B) PROCESS SEARCH WHEN FORM SUBMITTED
if (isset($_POST["search"])) {
  // (B1) SEARCH FOR USERS
  require "result.php";

  // (B2) DISPLAY RESULTS
  if (count($results) > 0) { foreach ($results as $r) {
    printf("<div>%s - %s</div>", $r["Firstname"], $r["Lastname"], $r["Gender"]);
  }} else { echo "No results found"; }
}
?>

    <table>
        <thead>
            <tr> 
                <th> </th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Gender</th>
            </tr>
                
        </thead>
        <tbody>
            <?php do{ ?> 
                <tr>
                    <td> <a href="details.php?ID=<?php echo $row['ID_num'];?> "> View Student Details </a></td>
                    <td> <?php echo $row['Firstname']; ?> </td>
                    <td> <?php echo $row['Lastname']; ?> </td>
                    <td> <?php echo $row['Gender']; ?> </td>
                </tr>
            <?php } while($row = $students -> fetch_assoc()) ?>
        </tbody>
    </table>

    <br/>
    <a class="linkk" href="insert.php"> Insert New </a>
    <br/>    <br/>
 
    <br/>
  
</form>
</body>
</html>