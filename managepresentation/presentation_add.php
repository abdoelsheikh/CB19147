<?php
$conn = mysqli_connect("localhost","root","");
$db = mysqli_select_db($conn,'psm_information');

if(isset($_POST['submit'])) 
{   

    $Lect_Name = $_POST['Lect_Name'];
    $Lect_ID = $_POST['Lect_ID'];
	$Lect_Faculty = $_POST['Lect_Faculty'];
	$Lect_Expertise = $_POST['Lect_Expertise'];
    $Date = $_POST['Date'];
    $TimeStart = $_POST['TimeStart'];
    $TimeEnd = $_POST['TimeEnd'];
    $Stud_ID = $_POST['Stud_ID'];
    $Stud_Name = $_POST['Stud_Name'];
    $Stud_Faculty = $_POST['Stud_Faculty'];
    $Stud_Course = $_POST['Stud_Course'];

    //Insert data
    $query = "INSERT INTO timeslot (`Lect_Name`, `Lect_ID`, `Lect_Faculty`, `Lect_Expertise`, `Date`, `TimeStart`, `TimeEnd`, `Stud_ID`, `Stud_Name`, `Stud_Faculty`, `Stud_Course`) VALUES ('$Lect_Name', '$Lect_ID','$Lect_Faculty','$Lect_Expertise','$Date','$TimeStart','$TimeEnd','$Stud_ID','$Stud_Name','$Stud_Faculty','$Stud_Course')";
    $query_run = mysqli_query($conn,$query);

    if($query_run){
        
        echo '<script type="text/javascript"> alert("Data Saved") </script>';
        header("refresh:0.5; url=View_Display.php");
    }
    else{
        echo '<script type="text/javascript"> alert("Data Not Saved") </script>'; 
        header("refresh:0.5; url=View_Display.php"); 
    }
}
?>