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
    if(isset($_SESSION['useraccess']) && $_SESSION['useraccess'] == 'User-1CA') {  
        echo "<p class='hhead'>".'Welcome '.$_SESSION['userlogin']."!";
    } else {
        echo header("Location: activity-user.php");
    }

    include_once('connections/con1.php'); 
    $con = connection();
    

    $sql = "SELECT * FROM appt_db ORDER BY Appt_Date ASC";
    $appt = $con -> query($sql) or die($con -> error);

    $row = $appt -> fetch_assoc();

?>


        <h1>CLINIC APPOINTMENTS</h1>
    <br/> 
    <form action="activity-res.php" method="get">
    <input type="text" name="search" id="search" class="searchbtn"/>
    <button type="submit"> Search </button>
    <br/>     <br/> 
    <table>
        <thead>
            <tr>
         
                <th>Appointment Date</th>
                <th>Appointment Time</th>
                <th>Appointment Type</th>
                <th>Patient ID</th>
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
                   
                    <td style="text-align:center"> <?php echo $row['Appt_Date']; ?> </td>
                    <td > <?php echo $row['Appt_Time']; ?> </td>
                    <td > <?php echo $row['Appt_Type']; ?> </td>
                    <td class="nextp"> <a href="activity-login.php?ApptNo=<?php echo $row['Appt_No.']; ?> "> << Login as Admin to view Appt ID & Patient ID >> </a></td> 
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
 
    <br/>   <br/>
    <hr/>
    <br/>
    </table>
    </form>
</body>
</html>