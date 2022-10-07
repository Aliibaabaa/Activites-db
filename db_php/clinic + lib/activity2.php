<?php 
    include_once('connections/con1.php'); 
    connection2();

   $conn = connection2();

    $sql = "SELECT * FROM lib_db ORDER BY Year ASC";
    $lib = $conn -> query($sql) or die($conn -> error);

    $row = $lib -> fetch_assoc();

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
    <title>ACTIVITY 09/06/2022 - LD</title>
</head>

<body>
    <br/>
        <h1>LIBRARY DATABASE</h1>
    <br/> 
    <table>
        <thead>
            <tr>
                <th>BooK ID </th>
                <th>Book Title</th>
                <th>Author ID</th>
                <th>Author Name</th>
                <th>Publisher</th>
                <th>Year</th>
            </tr>
        </thead>
        <tbody>
            <?php do{ ?> 
                <tr>
                    <td style="text-align:center"> <?php echo $row['Book_ID']; ?> </td>
                    <td > <?php echo $row['Book_Title']; ?> </td>
                    <td style="text-align:center"> <?php echo $row['Author_ID']; ?> </td>
                    <td > <?php echo $row['Author_Name']; ?> </td>
                    <td > <?php echo $row['Publisher']; ?> </td>
                    <td style="text-align:center"> <?php echo $row['Year']; ?> </td>
                </tr>
            <?php } while($row = $lib -> fetch_assoc()) ?>
        </tbody>
    </table>
    <br/>
    <br/>
    <a href="activity2-ins.php" class="insertbtn"> Insert New Book </a>
    <br/>  <br/>  
    <hr/>  <br/> 
</body>
</html>