<?php 
include '../CONTROLLER/TitleController.php';
include '../CONTROLLER/edititle.php';

$searchErr = '';
$employee_details='';
if(isset($_POST['save']))
{
    if(!empty($_POST['search']))
    {
        $search = $_POST['search'];
        $stmt = $con->prepare("select * from psm_information where Lect_Name like '%$search%' or name like '%$search%'");
        $stmt->execute();
        $employee_details = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //print_r($employee_details);
         
    }
    else
    {
        $searchErr = "Please enter the information";
    }
    
}
 
?>
<html>
<head>
    <link rel="stylesheet" href="titlecss.css">
</head>

<center>
<div class="header">
  <h2 > PSM  MANAGEMENT SYSTEM </h2>
</div>
</center>

<p>
  <a class="active" href="home.php">HOME</a>
  
</p>


<body style=background-color:#A9F5F2>
    
	<h2 style=text-align:center>MANAGE TITLE</h2>
    
<center>
<div class="container">
<form class="form-horizontal" action="#" method="post">    
	<div class="row">
        <div class="form-group">
            <label class="control-label col-sm-4" for="email"><b>Search Lecturer's Name:</b>:</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" name="search" placeholder="Enter lecturer's name">
            </div>
            <div class="col-sm-2">
              <button type="submit" name="save" class="btn btn-success btn-sm">Search</button>
            </div>
        </div>
        <div class="form-group">
            <span class="error" style="color:red;">* <?php echo $searchErr;?></span>
        </div>
         
    </div>
    </form>

	<h3><u>Search Result</u></h3><br/>
    <div class="table-responsive">          
      <table class="table">
        <thead>
          	<tr>
		  	<th>No</th>
			<th>Title Name</th>
			<th>Title Description</th>
			<th>Title Status<th>
          </tr>
        </thead>
        <tbody>
		<?php
			include "../CONTROLLER/TitleController.php"; // Using database connection file here
			$records = mysqli_query($db,"SELECT t.*, l.* FROM title t,lecturer l WHERE t.Lect_ID=l.Lect_ID"); // fetch data from database
			while($data = mysqli_fetch_array($records))
        {
        ?>
        	<tr>
                <td><?php echo $data['Title_No'];?></td>
                <td><?php echo $data['Title_Name'];?></td>
                <td><?php echo $data['Title_Description'];?></td>
                <td><a href="BookTitle.php?id=<?php echo $data['Title_No']; ?>">Book</a></td>
            </tr>
                         
        <?php                     
        }
        ?>
             
         </tbody>
      </table>
    </div>

</center>
</div>
</body>
</head>  
	<div class="footer">
		<p><sub>Copyright 2021, All Right Reserved</sub></p>
	</div>
	
</html>