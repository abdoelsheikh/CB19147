<?php
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, 'psm_information');

    if(isset($_POST['update']))
    {
        $id = $_POST['id'];
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

        $query = "UPDATE timeslot SET Lect_Name='$Lect_Name', Lect_ID='$Lect_ID', Lect_Faculty='$Lect_Faculty', Lect_Expertise='$Lect_Expertise', Date='$Date', TimeStart='$TimeStart', TimeEnd='$TimeEnd', Stud_ID='$Stud_ID', Stud_Name='$Stud_Name', Stud_Faculty='$Stud_Faculty', Stud_Course='$Stud_Course' WHERE id=$id";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
            echo '<script> alert("Data Successfully Update"); </script>';
            header("refresh:0.5; url=View_Display.php");
        }
        else
        {
            echo '<script> alert("Data Fail To Update. Please go back to the previous page"); </script>';
            header("refresh:0.5; url=View_Update.php");
        }
    }
?>