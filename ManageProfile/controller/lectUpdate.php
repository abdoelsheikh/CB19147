<?php
session_start();
include_once 'dbh-inc.php';

if (isset($_POST["update_lect"])){
    $Lect_Name	        = $_POST['Lect_Name'];
    $Lect_ID	        = $_POST['Lect_ID'];
    $Lect_PhoneNo    	= $_POST['Lect_PhoneNo'];
    $Lect_OfficeNo  	= $_POST['Lect_OfficeNo'];
    $Lect_Email         = $_POST['Lect_Email'];
    $Lect_OfficeAdd  	= $_POST['Lect_OfficeAdd'];
    $Lect_Faculty     	= $_POST['Lect_Faculty'];
    $Lect_Position      = $_POST['Lect_Position'];
    $Lect_Expertise     = $_POST['Lect_Expertise'];
    $Lect_Photo         = time() . '-' . $_FILES["Lect_Photo"]["name"];

     // For image upload
     $target_dir = "controller/lect-img-upload/";
     $target_file = $target_dir . basename($Lect_Photo);

     if (empty($error)) {
        if(move_uploaded_file($_FILES["Lect_Photo"]["tmp_name"], $target_file)) {
          $sql = "UPDATE INTO lecturers SET Lect_Name='$Lect_Name', Lect_ID='$Lect_ID', Lect_PhoneNo='$Lect_PhoneNo', Lect_OfficeNo='$Lect_OfficeNo', Lect_Email='$Lect_Email', Lect_OfficeAdd='$Lect_OfficeAdd', Lect_Faculty='$Lect_Faculty', Lect_Position='$Lect_Position', Lect_Expertise='$Lect_Expertise', Lect_Photo='$profileImageName'";
         
          if(mysqli_query($conn, $sql)){
            $_SESSION['status'] = "Profile updated successfully!";
            header('location: ../lecteditviewprofile.php');
        
          } else {
            $_SESSION['status'] = "There was an error in the database.";
            header('location: ../lectEditForm.php?error=stmtdatabase');
            
          }
        } else {
          $_SESSION['status'] = "Form is not complete!";
          header('location: ../lectEditForm.php?error=stmtfailed');
          
        }
      }

}