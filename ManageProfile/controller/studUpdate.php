<?php
session_start();
include_once 'dbh-inc.php';

if (isset($_POST["update_stud"])) {

    $Stud_Name	        = $_POST['Stud_Name'];
    $Stud_ID	        = $_POST['Stud_ID'];
    $Stud_PhoneNo     	= $_POST['Stud_PhoneNo'];
    $Stud_Email  	    = $_POST['Stud_Email'];
    $Stud_Add           = $_POST['Stud_Add'];
    $Stud_Faculty     	= $_POST['Stud_Faculty'];
    $Stud_Course       	= $_POST['Stud_Course'];
    $Stud_Skills        = $_POST['Stud_Skills'];
    $Stud_Interest      = $_POST['Stud_Interest'];
    $Stud_Photo         = time() . '-' . $_FILES["Stud_Photo"]["name"];

     // For image upload
     $target_dir = "controller/stud-img-upload/";
     $target_file = $target_dir . basename($Stud_Photo);

    if (empty($error)) {
        if(move_uploaded_file($_FILES["Stud_Photo"]["tmp_name"], $target_file)) {
          $sql = "INSERT INTO student SET Stud_Name='$Stud_Name', Stud_ID='$Stud_ID', Stud_PhoneNo='$Stud_PhoneNo', Stud_Add='$Stud_Add', Stud_Email='$Stud_Email', Stud_Faculty='$Stud_Faculty', Stud_Course='$Stud_Course', Stud_Skills='$Stud_Skills', Stud_Interest='$Stud_Interest', Stud_Photo='$Stud_Photo'";
          
          if(mysqli_query($conn, $sql)){
            $_SESSION['status'] = "Profile updated successfully!";
            header('location: ../studeditviewprofile.php');
        
          } else {
            $_SESSION['status'] = "There was an error in the database.";
            header('location: ../studEditForm.php?error=stmtdatabase');
            
          }
        } else {
          $_SESSION['status'] = "Form is not complete!";
          header('location: ../studEditForm.php?error=stmtfailed');
          
        }
      }
}