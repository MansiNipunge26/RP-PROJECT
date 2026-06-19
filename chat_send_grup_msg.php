<?php
	session_start();
	include 'config.php';
	if (isset($_SESSION['stu_unique_id'])) {$sender_id = $_SESSION['stu_unique_id'];}else if (isset($_SESSION['admin_unique_id'])) {$sender_id = $_SESSION['admin_unique_id'];}
	$grup_id = $_POST['grup_id'];
	$message = $_POST['message'];

	$query = mysqli_query($conn,"INSERT INTO `grup_chat`(`msg_id`, `grup_id`, `sender_id`, `message`,`time`) VALUES (NULL,$grup_id,$sender_id,'$message',NOW())");
	if ($query) {
		echo 1;
	}else{
		echo 0;
	}

?>