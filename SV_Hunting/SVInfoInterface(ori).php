<?php
    include 'dbconn.php';
?>

<!DOCTYPE html>
<html>
<head>
    
<link href="/docs/5.1/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/headers/">
<!-- Custom styles for this template -->
<link href="headers.css" rel="stylesheet">

<style>
    table, th, td  {
        border:1px solid white;
  }
</style>

</head>
<body>

<?php 

$Lect_Name = ($_GET['Lect_Name']);

  $get_data = "SELECT * FROM `lecturers`
  INNER JOIN `supervisor` ON `lecturers`.`Lect_ID` = `supervisor`.`Lect_ID`
  WHERE  `$Lect_Name`";
  
$run2 = mysqli_query($conn,$get_data) or die( mysqli_error($conn));;

while ($row=mysqli_fetch_array($run2)){ 

?>

<div class="container">
    <header class="d-flex justify-content-center py-3">
      <ul class="nav nav-pills">
        <li class="nav-item"><a href="SVInfoInterface.php" class="nav-link active" aria-current="page">Career & Achievement</a></li>
        <li class="nav-item"><a href="SV_Slot.php" class="nav-link">Slot</a></li>
        <li class="nav-item"><a href="Contact.php" class="nav-link">Contact</a></li>
      </ul>
    </header>
  </div>

  <table style="width:100%">
  <tr>
    <td><?php echo $row['Lect_Name']; ?></td> <!--Lect_Name-->
    <td><?php echo $row['Lect_Expertise']; ?></td> <!--Lect_Expertise-->
  </tr>
  <tr>
    <td>Supervisor Achievement</td>
    <td><?php echo $row['SV_Achievement']; ?></td>
  </tr>
  
</table>

<?php
    }
    ?>

</body>
</html>

