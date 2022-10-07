<?php

include_once('connections/con1.php'); 
$con = connection ();

$id=$_GET['ID'];

$sql = "SELECT * FROM `appt_db` WHERE `Appt_No.` = '$id' ";
$appt = $con -> query($sql) or die($con -> error);
$row = $appt -> fetch_assoc();

    if (isset($_POST['submit']))  {
        // echo 'submitted';
        echo '<script Type="javascript">alert("Appointment added.")</script>';
        
        $ApptNum = $_POST['apptnum'];
        $ApptDate = $_POST['apptdate'];
        $ApptTime = $_POST['appttime'];
        $ApptType = $_POST['appttype'];
        $PatientID = $_POST['patientID'];
        $Fname = $_POST['firstname'];
        $Lname = $_POST['lastname'];
        $PhoneNum = $_POST['phoneNum'];
        $DoctorID = $_POST['doctorID'];
        $DoctorName = $_POST['doctorName'];

        $sql = "UPDATE `appt_db` SET `Appt_Date`='$ApptDate',`Appt_Time`=' $ApptTime',`Appt_Type`='$ApptType',`Patient_ID`='$PatientID',`Firstname`='$Fname',`Lastname`='$Lname',`Phone_no.`='$PhoneNum',`Doctor_ID`='$DoctorID',`Doctor_Name`='$DoctorName' WHERE `Appt_No.` = '$id' ";

        $con->query($sql) or die ($con->error);
        echo header('Location: activity-details.php?ID='.$id);
      
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
    <title>CA -Edit</title>
</head>
<body class="body2-cont">
</br>
    <h1>EDIT APPOINTMENT DETAILS</h1>
</br>
    <form class="form-cont" method="POST" action=""> 
        
<br/>
       
    <br/> 
        <label class="newlabel-cont"> Appointment Date :  </label>
        <input type='text' name='apptdate' id='apptdate' value='<?php echo $row['Appt_Date']; ?>'/> 
    <br/> 
        <label class="newlabel-cont"> Appointment Time :  </label>
        <input type='text' name='appttime' id='appttime' value='<?php echo $row['Appt_Time']; ?>'/> 
    <br/>    
        <label class="newlabel-cont"> Appointment Type :  </label>
        <input type='text' name='appttype' id='appttype' value='<?php echo $row['Appt_Type']; ?>'/> 
    <br/> 
        <label class="newlabel-cont"> Patient ID Number :  </label>
        <input type='text' name='patientID' id='patientID' value='<?php echo $row['Patient_ID']; ?>'/> 
    <br/>
        <label class="newlabel-cont"> Firstname :  </label>
        <input type='text' name='firstname' id='firstname' value='<?php echo $row['Firstname']; ?>'/> 
    <br/> 
        <label class="newlabel-cont"> Lastname :  </label>
        <input type='text' name='lastname' id='lastname' value='<?php echo $row['Lastname']; ?>'/> 
    <br/> 
        <label class="newlabel-cont"> Phone Number :  </label>
        <input type='text' name='phoneNum' id='phoneNum' value='<?php echo $row['Phone_no.']; ?>'/> 
    <br/>
        <label class="newlabel-cont"> Doctor's ID Number :  </label>
        <input type='text' name='doctorID' id='doctorID' value='<?php echo $row['Doctor_ID']; ?>'/> 
    <br/>
        <label class="newlabel-cont"> Doctor's Name :  </label>
        <input type='text' name='doctorName' id='doctorName' value='<?php echo $row['Doctor_Name']; ?>'/> 
    <br/>  <br/>
    <input class="insertbtn" type='submit' name='submit' value='Update'/> 
   
    <br/>  <br/>
    </form>
    <br/>
</body>
</html>