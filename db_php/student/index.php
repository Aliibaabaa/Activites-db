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
    connection();
    
            /*TRANSFER TO CONNECTIONS.PHP :
                // $host = "localhost";
                // $username = "root";
                // $password = "kodego2022";
                // $database = "student_records";

                // $con = new mysqli($host, $username, $password, $database);
                
                // if($con -> connect_error) {
                //     echo $con -> connect_error;
                // }
            */
    
    $con = connection();
    
    $sql = "SELECT * FROM students_list ORDER BY ID_num DESC";
    $students = $con -> query($sql) or die($con -> error);

    $row = $students -> fetch_assoc();

    // print_r($row);

    // do{
    //     echo $row['Firstname']."_".$row['Lastname']."<br/>";
    // } while($row = $students -> fetch_assoc());

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
    <!-- <link rel="stylesheet" href="style.css"> -->
    <title>Student Database</title>

</head>

<body>
    

        <h1>Student Information</h1>
    <br/> 

<form action="result.php" method="get">


   <?php if(isset($_SESSION['userlogin'])) { ?> 
         <a class="linkk" href="logout.php"> Log out </a>  
    <?php } else { ?>
           <a class="linkk" href="login.php"> Log In </a> 
    <?php } ?> 

    <br/>    <br/>  

    <input type="text" name="search" id="search" class="searchbtn"/>
    <button type="submit"> Search </button>

 <br/>  <br/>  
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
    <!-- <a href="login.php"> Log In </a> -->
    <br/>
  
</form>
</body>
</html>