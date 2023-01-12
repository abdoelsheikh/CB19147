<?php
session_start();
include_once 'dbh-inc.php';

if (isset($_POST["save_lect"])) {

    $Lect_Name	        = $_POST['Lect_Name'];
    $Lect_ID	          = $_POST['Lect_ID'];
    $Lect_PhoneNo     	= $_POST['Lect_PhoneNo'];
    $Lect_OfficeNo    	= $_POST['Lect_OfficeNo'];
    $Lect_Email         = $_POST['Lect_Email'];
    $Lect_OfficeAdd   	= $_POST['Lect_OfficeAdd'];
    $Lect_Faculty     	= $_POST['Lect_Faculty'];
    $Lect_Position      = $_POST['Lect_Position'];
    $Lect_Expertise     = $_POST['Lect_Expertise'];
    $Lect_Photo         = time() . '-' . $_FILES["Lect_Photo"]["name"];

     // For image upload
     $target_dir = "lect-img-upload/";
     $target_file = $target_dir . basename($Lect_Photo);

    if (empty($error)) {
        if(move_uploaded_file($_FILES["Lect_Photo"]["tmp_name"], $target_file)) {
          $sql = "INSERT INTO lecturers SET Lect_Name='$Lect_Name', Lect_ID='$Lect_ID', Lect_PhoneNo='$Lect_PhoneNo', Lect_OfficeNo='$Lect_OfficeNo', Lect_Email='$Lect_Email', Lect_OfficeAdd='$Lect_OfficeAdd', Lect_Faculty='$Lect_Faculty', Lect_Position='$Lect_Position', Lect_Expertise='$Lect_Expertise', Lect_Photo='$Lect_Photo'";

          if(mysqli_query($conn, $sql)){
            $_SESSION['status'] = "Profile created successfully!";
            $_SESSION['USERID'] = $Lect_ID;
            $_SESSION['STATUS'] = true;
            $_SESSION['ROLE'] = "Lecturer";
            header('location: ../lecteditviewprofile.php');
        
          } else {
            $_SESSION['status'] = "There was an error in the database.";
            header('location: ../lectCreateForm.php?error=stmtdatabase');
            
          }
        } else {
          $_SESSION['status'] = "Form is not complete!";
          header('location: ../lectCreateForm.php?error=stmtfailed');
          
        }
      }
}