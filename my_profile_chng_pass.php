<?php
	include 'config.php';
	$chng_email = $_POST['chng_email'];
	$chng_pass = $_POST['chng_pass'];
	$sql = "UPDATE `login` SET `password`='$chng_pass' WHERE id = '$chng_email'";
	$query = mysqli_query($conn,$sql) or die(mysqli_error($conn));
	if ($query) {
		echo 1;
	}else{
		echo 0;
	}
?>