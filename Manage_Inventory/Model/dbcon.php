<?php

		define("DB_SERVER", "localhost");
		define("DB_USER", "root");
		define("DB_PASSWORD", null);
		define("DB_DATABASE", "psm_information");
		$conn = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE) or die("Could not connect to mysql");
		mysqli_select_db($conn, "psm_information") or die(mysqli_error());

		if (mysqli_connect_errno())
		{
		 echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}else{
			
		}
		
?>