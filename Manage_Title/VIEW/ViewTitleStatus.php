<html>
<head>
<link rel="stylesheet" href="titlecss.css">
</head>

<body>
<center>
<div class="topnav">
  <a class="active" href="../../home.php">HOME</a>
  <a href="../../ManageTitleLectHomepage.php">MANAGE TITLE HOMEPAGE</a>
</div>

</center>
<center>
    <h2 align="center"></h2>
    <?php 
        include '../CONTROLLER/TitleController.php';
        include '../CONTROLLER/edititle.php';
		$query = mysqli_query($conn,"SELECT t.*, s.* FROM title t,student s
        WHERE s.Stud_ID=t.Stud_ID" )
    ?>

    <div style="width: 800px;margin: 0px auto;">
    </div><br/><br/>
	<h3>PSM TITLE STATUS</h3>
	
    <table border="1" cellpadding="10">
        <thead>
            <tr>
	<th>Title No.</th>
    <th>Student ID</th>
    <th>Student Name</th>
	<th>Title Name</th>
    <th>Title Status</th>
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
            <td><?php echo $no?></td>
            <td><?php echo $row["Title_No"];?></td>
            <td><?php echo $row["Stud_ID"];?></td>
            <td><?php echo $row["Stud_Name"];?></td>
            <td><?php echo $row["Title_Name"];?></td>
            <td><?php echo $row["Title_Status"];?></td>
        </tr>
		
			<?php $no++;}?>
      <?php } ?>
        </tbody>
    </table>
    </table>
<br>
<br>
<a href=#../../home.php><button>HOME</button></a>
<a href=../../ManageTitleLectHomepage.php><button>BACK</button></a>
<br></br>
</center>
	<div class="footer">
		<p><sub>Copyright 2021, All Right Reserved</sub></p>
	</div>
</html>