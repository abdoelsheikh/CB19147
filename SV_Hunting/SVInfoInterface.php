<?php
    include 'dbconn.php';
?>

<!DOCTYPE html>
<html>
<head>

<style>

.svlist table {
    border:1px solid Green;
    background-color: white;
  }
  .svlist th, td {
    border:1px solid white;
    text-align: left;
    padding: 10px;
    font-family: Arial, Helvetica, sans-serif;
  }

  /* Style the header with a grey background and some padding */
.header {
  overflow: hidden;
  background-color: #f1f1f1;
  padding: 0px 0px;
}

/* Style the header links */
.header a {
  float: left;
  color: black;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px;
  line-height: 25px;
  border-radius: 4px;
}

/* Style the logo link (notice that we set the same value of line-height and font-size to prevent the header to increase when the font gets bigger */
.header a.logo {
  font-size: 25px;
  font-weight: bold;
}

/* Change the background color on mouse-over */
.header a:hover {
  background-color: #ddd;
  color: black;
}

/* Style the active/current link*/
.header a.active {
  background-color: dodgerblue;
  color: white;
}

/* Float the link section to the right */
.header-right {
  float: right;
  padding: 30px 0px;
}

/* Add media queries for responsiveness - when the screen is 500px wide or less, stack the links on top of each other */
@media screen and (max-width: 500px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
  }
  .header-right {
    float: none;
  }
}


</style>

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

$Lect_Name = mysqli_real_escape_string($conn, $_GET['Lect_Name']);
$Lect_Expertise = mysqli_real_escape_string($conn, $_GET['Lect_Expertise']);

  $sql = "SELECT * FROM `lecturers`
  INNER JOIN `supervisor` ON `lecturers`.`Lect_ID` = `supervisor`.`Lect_ID`
  INNER JOIN `supervisor slot` ON `supervisor`.`SV_ID` = `supervisor slot`.`SV_ID`
  WHERE Lect_Name='$Lect_Name' AND Lect_Expertise='$Lect_Expertise'";
  $result = mysqli_query($conn, $sql);
  $queryResult = mysqli_num_rows($result);

  if($queryResult==0){
    echo '<script language="javascript">';
    echo 'alert("Supervisor Data Missing")';
    echo '</script>';
  } else {
    if ($row = mysqli_fetch_assoc($result)){
        
        ?> 

<div class="svlist">
<table style="width:100%">
  <tr>
    <td style="text-align:" rowspan="1"><u>Biography</u><br><br>
    <?php echo $row['Lect_Name']; ?><br>
      <?php echo $row['Lect_Expertise']; ?><br>
       <?php echo $row['Lect_Faculty']; ?><br>
    </td>
    <td rowspan="4" style="width:35%;"><?php echo $row['Lect_Photo']; ?></td>
  </tr>
  <tr>
    <td rowspan="3"><u>Career & Achievement</u><br><br>
    <?php echo $row['SV_Achievement']; ?></td>
  </tr>
  <tr><tr></tr>
    <td colspan="2"><hr></td>
  </tr>
  <tr>
    <td colspan="2"><u>Contact</u><br><br>
      <?php echo $row['Lect_PhoneNo']; ?><br>
      <?php echo $row['Lect_Email']; ?><br>
      <?php echo $row['Lect_OfficeAdd']; ?><br>
    </td>
  </tr>
  <tr><tr></tr>
    <td colspan="2"><hr></td>
  </tr>
  <tr>
    <td colspan="2"><u>SLOT</u><br><br>
    Supervisor Slot Status: <?php echo $row['SV_SlotStatus']; ?><br><br>

    <?php
    
    $SV_SlotStatus = $row['SV_SlotStatus'];


    if($SV_SlotStatus=="Full"){ 
      echo '<script language="javascript">';
      echo 'alert("Supervisor Slot is Full")';
      echo '</script>';

      ?>

      <form action="SVBookSlotController.php" method="POST">
      <fieldset disabled="disabled">
          <label for="fname">Supervisor ID :</label> &nbsp
          <input type="text" id="SV_ID" name="SV_ID"><br><br>
          <label for="lname">Slot Number For Booking:</label> &nbsp
          <input type="number" min="1" max="7" id="SV_SlotNo " name="SV_SlotNo"><br><br>
          <input type="submit" name="submit-slot" value="Book">
          </fieldset>
          </form> 

    <?php

    } else {

    ?>

<form action="SVBookSlotController.php" method="POST">

  <label for="fname">Supervisor ID :</label> &nbsp
  <input type="text" id="SV_ID" name="SV_ID"  value="<?php echo $row['SV_ID']; ?>" readonly><br><br>
  <label for="fname">Supervisor Slot ID: </label>
  <input type="text" id="SV_SlotID" name="SV_SlotID"><br><br>
  <label for="lname">Slot Number For Booking:</label> &nbsp
  <input type="number" min="1" max="7" id="SV_SlotNo" name="SV_SlotNo"><br><br>
  <input type="hidden" name="SV_SlotStatus" value="<?php echo $SV_SlotStatus; ?>">
  <input type="submit" name="submit-slot" value="Book">
</form> 
    </td>
  </tr>
  
</table>
</div>

<?php
    }
  }
  }
    ?>

</body>
</html>

