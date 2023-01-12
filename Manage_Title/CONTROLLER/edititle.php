<?php
session_start();
include_once '../CONTROLLER/TitleController.php';

if(isset($_POST['save']))
{	 
  $Title_No	          = $_POST['Title_No'];
  $Title_Name	        = $_POST['Title_Name'];
  $Title_Description  = $_POST['Title_Description'];
  $Title_Status 	    = $_POST['Title_Status'];
	 $sql = "INSERT INTO title (Title_No,Title_Name,Title_Description,Title_Status)
	 VALUES ('$Title_No','$Title_Name','$Title_Description','$Title_Status')";
	 if (mysqli_query($conn, $sql)) {
		echo "New record created successfully !";
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}


if (isset($_POST["update_title"])){
    $Title_No	        = $_POST['Title_No'];
    $Title_Name	        = $_POST['Title_Name	'];
    $Title_Description  = $_POST['Title_Description'];
    $Title_Status 	    = $_POST['Title_Status'];


     if (empty($error)) {
          $sql = "UPDATE INTO title SET Title_No='$Title_No', Title_Name='$Title_Name', Title_Description='$Title_Description', Title_Status='$Title_Status'";
         
          if(mysqli_query($conn, $sql)){
            $_SESSION['status'] = "Profile updated successfully!";
            header('location: ../ViewTitleStatus.php');
        
          } else {
            $_SESSION['status'] = "There was an error in the database.";
            header('location: ../AddStudtitle.php?error=stmtdatabase');
            
          }
       
      }

}
?>