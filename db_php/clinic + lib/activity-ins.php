<?php

include_once('connections/con1.php'); 
$con = connection ();

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

        $sql = "INSERT INTO `appt_db`(`Appt_No.`, `Appt_Date`, `Appt_Time`, `Appt_Type`, `Patient_ID`, `Firstname`, `Lastname`, `Phone_no.`, `Doctor_ID`, `Doctor_Name`) 
        VALUES ('$ApptNum','$ApptDate','$ApptTime','$ApptType','$PatientID','$Fname','$Lname','$PhoneNum','$DoctorID','$DoctorName')";

        $con->query($sql) or die ($con->error);
        echo header("Location: activity-admin.php");
        echo '<script Type="javascript">alert("Appointment added.")</script>';  
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
    <title>CA - Insert</title>
</head>
<body class="body2-cont">
</br>
    <h1>NEW APPOINTMENT DETAILS</h1>
</br>
    <form class="form-cont" method="POST" action=""> 
        
<br/>
        <label class="newlabel-cont"> Appointment Number : </label>
        <input type='text' name='apptnum' id='apptnum'/> 
    <br/> 
        <label class="newlabel-cont"> Appointment Date :  </label>
        <input type='text' name='apptdate' id='apptdate'/> 
    <br/> 
        <label class="newlabel-cont"> Appointment Time :  </label>
        <input type='text' name='appttime' id='appttime'/> 
    <br/>    
        <label class="newlabel-cont"> Appointment Type :  </label>
        <input type='text' name='appttype' id='appttype'/> 
    <br/> 
        <label class="newlabel-cont"> Patient ID Number :  </label>
        <input type='text' name='patientID' id='patientID'/> 
    <br/>
        <label class="newlabel-cont"> Firstname :  </label>
        <input type='text' name='firstname' id='firstname'/> 
    <br/> 
        <label class="newlabel-cont"> Lastname :  </label>
        <input type='text' name='lastname' id='lastname'/> 
    <br/> 
        <label class="newlabel-cont"> Phone Number :  </label>
        <input type='text' name='phoneNum' id='phoneNum'/> 
    <br/>
        <label class="newlabel-cont"> Doctor's ID Number :  </label>
        <input type='text' name='doctorID' id='doctorID'/> 
    <br/>
        <label class="newlabel-cont"> Doctor's Name :  </label>
        <input type='text' name='doctorName' id='doctorName'/> 
    <br/>  <br/>
    <input class="insertbtn" type='submit' name='submit' value='Submit'/> 
    <br/>  <br/>
    </form>
    <br/>
</body>
</html>