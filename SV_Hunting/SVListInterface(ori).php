<!--search result start-->
    
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="SVListInterface.css">
</head>
<body>

<div class="svlist">
    
<?php

$button = $_GET ['submit'];
$search = $_GET ['search'];

$servername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "psm_information";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
	die("Connection failed: ".mysqli_connect_error());
}

$search_sql = "SELECT * FROM `sv hunting information`
  RIGHT JOIN supervisor ON `sv hunting information`.SV_ID = supervisor.SV_ID
  LEFT JOIN lecturers ON supervisor.Lect_ID = lecturers.Lect_ID
  UNION
  SELECT * FROM `sv hunting information`
  LEFT JOIN supervisor ON `sv hunting information`.SV_ID = supervisor.SV_ID
  RIGHT JOIN lecturers ON supervisor.Lect_ID = lecturers.Lect_ID
  UNION
  SELECT * FROM `sv hunting information`
  LEFT JOIN supervisor ON `sv hunting information`.SV_ID = supervisor.SV_ID
  RIGHT JOIN lecturers ON supervisor.Lect_ID = lecturers.Lect_ID
  WHERE  lecturers.Lect_Expertise OR lecturers.Lect_Faculty OR supervisor.SV_Achievement OR lecturers.Lect_Name
  LIKE ('%" . $search . "%')";

$run = mysqli_query($conn,$search_sql);
$foundnum = mysqli_num_rows($run);

if ($foundnum==0)
{
  echo '<script language="javascript">';
  echo 'alert("Data Not Found! Please Input Different Keywords")';
  echo '</script>';
}
else{
  $search_sql = "SELECT * FROM `sv hunting information`
  RIGHT JOIN supervisor ON `sv hunting information`.SV_ID = supervisor.SV_ID
  LEFT JOIN lecturers ON supervisor.Lect_ID = lecturers.Lect_ID
  UNION
  SELECT * FROM `sv hunting information`
  LEFT JOIN supervisor ON `sv hunting information`.SV_ID = supervisor.SV_ID
  RIGHT JOIN lecturers ON supervisor.Lect_ID = lecturers.Lect_ID
  UNION
  SELECT * FROM `sv hunting information`
  LEFT JOIN supervisor ON `sv hunting information`.SV_ID = supervisor.SV_ID
  RIGHT JOIN lecturers ON supervisor.Lect_ID = lecturers.Lect_ID
  WHERE  lecturers.Lect_Expertise OR lecturers.Lect_Faculty OR supervisor.SV_Achievement OR lecturers.Lect_Name
  LIKE ('%" . $search . "%')";
  $getquery = mysqli_query($conn,$search_sql);

        while ($row=mysqli_fetch_array($getquery)){ 
          ?>     
<center>
<table style="width: 75%;">
  <tr>
    <td><?php echo ('<a href="./SVInfoInterface.php?Lect_Name='.$row['Lect_Name'].'">'.htmlentities($row['Lect_Name']).' </a>'); ?></td> <!--Lect_Name-->
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
<?php
    }
}
    ?>
</div>
</center>
    
</body>
</html>