<?php

	$db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_db = "el";
	$errors = array();
	$conn = mysqli_connect($db_host,$db_user,$db_pass,$db_db);
		if (mysqli_connect_error()) {
			array_push($errors, mysqli_connect_error());
			echo "<pre>";
			print_r($errors);
			echo "</pre>";
		}else{
			return true;
		}
?>
