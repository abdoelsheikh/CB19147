<?php

$servername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "psm_information";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

	$SV_ID   = $_POST['SV_ID'];
	$SV_SlotID  = $_POST['SV_SlotID'];
    $SV_SlotNo = $_POST['SV_SlotNo'];
    $SV_SlotStatus = $_POST['SV_SlotStatus'];

    if (isset($_POST['submit-slot'])) {

        $insert_sql = mysqli_real_escape_string($conn, $_POST['SV_SlotNo']);
        $sql = "INSERT INTO `supervisor slot` (`SV_ID`, `SV_SlotID`, `SV_SlotNo`, `SV_SlotStatus`)
        values ('$SV_ID ' , 'SL2000$SV_SlotID' , '$SV_SlotNo' , '$SV_SlotStatus')"
        or die(mysqli_error());

        if (mysqli_query($conn, $sql)) {
            
            echo '<script language="javascript">';
            echo 'alert("Booking Success!")';
            echo '</script>';
            echo "<script type='text/javascript'> window.location='InputKeywordsInterface.php' </script>";
            
         } else {
             echo "Error: " . $sql . "<br>" . mysqli_error($conn);
         }
        
        $count = "SELECT COUNT(SV_SlotNo) AS TotalSlotBooking FROM `supervisor slot`" or die(mysqli_error());
        if ($count=7) {
            
            $UPDATE = "UPDATE `supervisor slot` SET SV_SlotStatus='FULL' WHERE SV_ID=$SV_ID"  or die(mysqli_error());


        } else {
            echo "Slot Status updated";
            echo "<script type='text/javascript'> window.location='InputKeywordsInterface.php' </script>";
        }
}
?>