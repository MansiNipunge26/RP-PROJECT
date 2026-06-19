<?php
	session_start();
	include 'config.php';

	$incoming_msg_id = $_POST['incoming_msg_id'];  
	$outgoing_msg_id = $_POST['outgoing_msg_id']; 
	$message = $_POST['message'];

	$insert_sql = "INSERT INTO `message`(`msg_id`, `incoming_id`, `outgoing_id`, `message`) VALUES (NULL,'$incoming_msg_id','$outgoing_msg_id','$message')";
	$query = mysqli_query($conn,$insert_sql);
	if ($query) {
		echo 1;
	}else{
		echo 0;
	}


?>
