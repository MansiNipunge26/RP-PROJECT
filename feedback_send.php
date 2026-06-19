<?php
	include 'config.php';
	$feedback_id = $_POST['feedback_id'];
	$feedback_email = $_POST['feedback_email'];
	$feedback_msg = $_POST['feedback_msg'];

	$insert_sql = "INSERT INTO `feedback`(`id`, `email`, `feedback_msg`) VALUES ('$feedback_id','$feedback_email','$feedback_msg')";
	$query = mysqli_query($conn , $insert_sql) or die(mysqli_error($conn));
	if ($query) {
		echo 1;
	}else{
		echo 0;
	}
?>