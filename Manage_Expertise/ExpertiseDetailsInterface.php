<html>
<!-- THIS PART IS VIEW LECTURER INFORMATION () METHOD -->
<!-- THIS PART , STUDENT CAN VIEW FURTHER INFORMATION ALL REQUEST THAT THEY MAKE BEFORE. -->
<head>
<link rel="stylesheet" type="text/css" href="CSS.css">
</head>
<body>
<div class="header">
  <h2> PSM MANAGEMENT SYSTEM</h2>
</div>
    <h2 align="center"></h2>
	<center>
<table width="100%" border="0" cellspacing="0" cellpadding="1">
	<tr>
		<th>
  <a class="active" href="home.php">HOME</a>&nbsp &nbsp
  <a class="active" href="profile.php">Profile</a>&nbsp &nbsp
  <a class="active" href="sv hunting.php">SV Hunting</a>&nbsp &nbsp
  <a class="active" href="manage title.php">Manage Title</a>&nbsp &nbsp
  <a class="active" href="inventory usage.php">Inventory Usage</a>&nbsp &nbsp
  <a class="active" href="meeting.php">Meeting</a>&nbsp &nbsp
  <a class="active" href="presentation.php">Presentation</a>&nbsp &nbsp
  </th>
  </tr>
  </table>

    <?php 
        include_once 'ExpertiseController.php';
	    
         $Lect_ID=$_GET['Lect_ID'];
        
	$query = mysqli_query($conn,"SELECT * FROM Lecturers where Lect_ID='$Lect_ID'");
    ?>


    <div style="width: 800px;margin: 0px auto;">
    </div><br/><br/>
	<h3>LECTURER EXPERTISE</h3>
    <table border="1" cellpadding="8">
        <thead>
            <tr>
    <th>No.</th>
	<th>Profile Image</th>
    <th>Lecturer ID</th>
    <th>Lecturer Name</th>
	<th>Lecturer Phone No.</th>
	<th>Lecturer Office No.</th>
	<th>Lecturer Email</th>
    <th>Lecturer Office Address</th>
	<th>Lecturer Faculty</th>
	<th>Lecturer Position</th>
    <th>Lecturer Expertise</th>
            </tr>
        </thead>
        <tbody>
             <?php if(mysqli_num_rows($query)>0){ ?>		
            <?php
			$no = 1;
			 while($row = mysqli_fetch_array($query))
			{
        ?>
        <tr>
		    <td> <img src="<?php echo 'controller/img-upload/' . $row['Stud_Photo'] ?>" width="90" height="90" class="rounded-circle" alt=""> </td>
            <td><?php echo $no?></td>
            <td><?php echo $row["Lect_ID"];?></td>
            <td><?php echo $row["Lect_Name"];?></td>
            <td><?php echo $row["Lect_PhoneNo"];?></td>
			<td><?php echo $row["Lect_OfficeNo"];?></td>
			<td><?php echo $row["Lect_Email"];?></td>
            <td><?php echo $row["Lect_OfficeAdd"];?></td>
            <td><?php echo $row["Lect_Faculty"];?></td>
			<td><?php echo $row["Lect_Position"];?></td>
			<td><?php echo $row["Lect_Expertise"];?></td>
        </tr>
		
			<?php $no++;}?>
      <?php } ?>
        </tbody>
    </table>
<br>
<a href=../home.php><button>HOME</button></a>
<a href=ExpertiseMainInterface.php><button>BACK</button></a>
</center>
	<div class="footer">
  <p><sub>Copyright 2021, All Right Reserved</sub></p>
</div>
</html>