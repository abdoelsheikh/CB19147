<?php
    include 'dbconn.php';
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="SVListInterface.css">
</head>
<body>

<div class="header">
<img src='STLogo.jpeg' style="width:100px;height:100px;">
</a>
  <div class="header-right">
    <a class="active" href="../SV Hunting/InputKeywordsInterface.php">Find a Supervisor</a>
    <a href="../Manage_Expertise/ExpertiseMainInterface.php">Lecturer Directory</a>
    <a href="../home.php">Home</a>
  </div>
</div>
  
<?php

if (isset($_POST['submit'])) {

    $search_sql = mysqli_real_escape_string($conn, $_POST['search']);
    $sql = "SELECT * FROM lecturers 
    RIGHT JOIN 
    supervisor ON lecturers.Lect_ID = supervisor.Lect_ID
    WHERE lecturers.Lect_Expertise LIKE '%$search_sql%' OR
    lecturers.Lect_Faculty LIKE '%$search_sql%' OR
    lecturers.Lect_Name LIKE '%$search_sql%' OR
    supervisor.SV_Achievement LIKE '%$search_sql%'";
    $result = mysqli_query($conn, $sql);
    $queryResult = mysqli_num_rows($result);

    echo "There are " .$queryResult." result!";

    if($queryResult==0){
        echo '<script language="javascript">';
        echo 'alert("Data Not Found! Please Input Different Keywords")';
        echo '</script>';
    } else {
        while ($row = mysqli_fetch_assoc($result)){
            
            ?> 
            
            <div class="svlist">
            <center>
            <table style="width: 75%;">
              <tr>
                <td><?php echo ("<a href='./SVInfoInterface.php?Lect_Name=".$row['Lect_Name']."&Lect_Expertise=".$row['Lect_Expertise']."'> ".htmlentities($row['Lect_Name'])." </a>"); ?></td> <!--Lect_Name-->
                <td style="width: 30%;"><?php echo $row['Lect_Email']; ?></td> <!--Lect_Email-->
              </tr>
              <tr>
                <td><?php echo $row['Lect_Position']; ?></td> <!--Lect_Position-->
                <td><?php echo $row['Lect_OfficeNo']; ?></td> <!--Lect_OfficeNo-->
              </tr>
              <tr>
                <td><?php echo $row['Lect_Faculty']; ?></td> <!--Lect_Faculty-->
                <td><?php echo $row['Lect_OfficeAdd']; ?></td> <!--Lect_OfficeAdd-->
              </tr>
              <tr>
                <td><?php echo $row['Lect_Expertise']; ?></td> <!--Lect_Expertise-->
              </tr>
              
            </table>
            </div>
            </center>
            <?php
        }
    }
}
?>
    
</body>
</html>
