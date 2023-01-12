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
  <a class="active" href="home.php">HOME</a>
  <a href="managetitlehomepage.php">MANAGE TITLE HOMEPAGE</a>
</div>

</center>
<center>
    <h2 align="center"></h2>
    <?php 
        include '../CONTROLLER/TitleController.php';
        include '../CONTROLLER/edititle.php';
		$query = mysqli_query($conn,"SELECT * FROM Title")
    ?>
    <div style="width: 800px;margin: 0px auto;">
    </div><br/><br/>
	<h3>PSM TITLE STATUS</h3>
	
    <div class="container">
    div class="col-lg-4">
    <h2>Edit Student Title</h2>
    <form action="edititle.php" name="addtitle" method="post">
    <div class="form-group">
      <label for="Title_No">No</label>
      <input type="no" class="form-control" id="no" placeholder="Enter number" name="Title_No" >
    </div>
    <div class="form-group">
      <label for="Title_Name">Title Name</label>
      <input type="name" class="form-control" id="name" placeholder="Enter title" name="Title_Name">
    </div>
    <div class="form-group">
      <label for="Title_Description">Title Description</label>
      <input type="desc" class="form-control" id="desc" placeholder="Enter the description for the title" name="Title_Description">
    </div>
    
    <button type="submit" name="save" class="btn btn-default">Save</button>
  </form>
</div>

<br>
<br>
<a href=#../../home><button>HOME</button></a>
<a href=../../ManageTitleLectHomepage.php><button>BACK</button></a>
<br></br>
</center>
	<div class="footer">
		<p><sub>Copyright 2021, All Right Reserved</sub></p>
	</div>
</html>