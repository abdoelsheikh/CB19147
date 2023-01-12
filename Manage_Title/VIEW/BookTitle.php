<?php 
include '../CONTROLLER/TitleController.php';
include '../CONTROLLER/edititle.php';
?>
<html>
<head>
    <link rel="stylesheet" href="titlecss.css">
    <meta charset="utf8mb4">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
        $currentUser = $_SESSION['Stud_ID'];
                $sql = "SELECT * FROM  title t,student s WHERE s.Stud_ID=t.Stud_ID AND Stud_ID = '$currentUser'";

        $gotResult = mysqli_query($conn,$sql);
    ?>
     <div class="container">
    <div class="col-lg-4">
    <h2>Booking Title</h2>
    <form action="" name="booktitle" method="post">
    <div class="form-group">
        <label for="Stud_ID">Student ID</label>
        <input type="id" class="form-control" id="id" placeholder="Enter student ID" name="Stud_ID" value="<?= $data['Stud_ID']?>">
    </div><br>
    <div class="form-group">
        <label for="Stud_Name">Student Name</label>
        <input type="name" class="form-control" id="name" placeholder="Enter student name" name="Stud_Name" value="<?= $data['Stud_Name']?>">
    </div><br>
    <div class="form-group">
        <label for="Title_Name">Title Name</label>
        <input type="name" class="form-control" id="name" placeholder="Enter title" name="Title_Name" value="<?= $data['Title_Name']?>">
    </div>
    <br>

    <button type="submit" name="save" class="btn btn-default">Save</button>
  </form>
</div>
<br>
<br>
<a href=#home><button>HOME</button></a>
<a href=ManageTitleHomepage.php><button>BACK</button></a>
<br></br>
</center>
	<div class="footer">
		<p><sub>Copyright 2021, All Right Reserved</sub></p>
	</div>
</html>