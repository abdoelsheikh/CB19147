<?php

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "psm_information";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
	die("Connection failed: ".mysqli_connect_error());
}
//echo "Connection success!";