<?php
session_start();
session_destroy();
echo "<script type='text/javascript'>alert('You Have been logged out.');</script>";
echo "<script type='text/javascript'>window.location='../login.php'</script>";
?>