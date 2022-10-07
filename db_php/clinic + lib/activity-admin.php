<?php 
    if(!isset($_SESSION)){
        session_start();
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
    <title>CA - Admin</title>

</head>

<body>
<br/>


    <?php if(isset($_SESSION['userlogin'])) { ?> 
        <a class="linkk" href="activity-logout.php"> Log out </a>  
   <?php } else { ?>
          <a class="linkk" href="activity-login.php"> Log In </a> 
   <?php } ?> 

   <?php
    if(isset($_SESSION['useraccess']) && $_SESSION['useraccess'] == 'Admin-1CA') {  
        echo "<p class='hhead'>".'Welcome '.$_SESSION['userlogin']."!</p>";
    } else {
        echo header("Location: activity.php");
    }

    include_once('connections/con1.php'); 
    $con = connection(); 
?> 

<?php
    $sql = "SELECT * FROM appt_db ORDER BY Appt_Date ASC";
    $appt = $con -> query($sql) or die($con -> error);

    $row = $appt -> fetch_assoc();
?>

        <h1>CLINIC APPOINTMENTS</h1>
    <br/> 
<form action="activity-res.php" method="get">
    <input type="text" name="search" id="search" class="searchbtn"/>
    <button type="submit"> Search </button>
    <br/> 
    <table>
        <thead>
            <tr>
                <th> </th>
               
                
                <th>Appointment Type</th>
            
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Phone Number</th>
                <th>Doctor's ID Number</th>
                <th>Doctor's Name</th>
            </tr>
        </thead>
        <tbody>
            <?php do{ ?> 
                <tr>
                <td> <a href="activity-details.php?ID=<?php echo $row['Appt_No.'];?> "> View Details </a></td>
                    
                  
                    <td > <?php echo $row['Appt_Type']; ?> </td>
                   
                    <td > <?php echo $row['Firstname']; ?> </td>
                    <td > <?php echo $row['Lastname']; ?> </td>
                    <td > <?php echo $row['Phone_no.']; ?> </td>
                    <td style="text-align:center"> <?php echo $row['Doctor_ID']; ?> </td>
                    <td style="text-align:center"> <?php echo $row['Doctor_Name']; ?> </td>
                </tr>
            <?php } while($row = $appt -> fetch_assoc()) ?>
        </tbody>
    </table>
     <br/>
     <br/>
    <a href="activity-ins.php" class="insertbtn"> Schedule New Appointment</a>
    <br/>   <br/>
    <hr/>
    <br/>
    </table>
            </form>

</body>
</html>