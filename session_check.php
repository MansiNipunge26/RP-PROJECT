<?php
	session_start();
	include 'config.php';
	if((!isset($_SESSION['admin_email'])) && (!isset($_SESSION['email']))) {
		echo "<script>";
		echo "$(document).ready(function(){
			$('.btn-right-part').fadeIn();
		});";
		echo "</script>";
	}else if((isset($_SESSION['admin_email'])) || (isset($_SESSION['email']))){
		echo "<script>";
		echo "$(document).ready(function(){
			$('.My-Account-id').fadeIn();
		});";
		echo "</script>";
	 }
	if(isset($_POST['register'])){
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$sql = "SELECT * FROM `login` WHERE email = '$email'";
			$query = mysqli_query($conn,$sql);
			$result = mysqli_num_rows($query);
			if ($result != 0) {
				echo "<script>alert('This Email Aleready Exists.');</script>";
				echo "<script>";
				echo "$(document).ready(function(){
					$('.register-main-content').fadeIn();
				});";
				echo "</script>";
			}else{
				$unique_id = rand(time(),100000);
    			$status = "Active Now";
				$insert_sql = "INSERT INTO `login`(`id`, `unique_id`, `chat_status`, `username`, `email`, `password`, `role`, `status`, `profile_img`) VALUES (NULL,$unique_id,'$status','$username','$email','$password','User','1','Admin/img/avtar3.png')";
				$query = mysqli_query($conn , $insert_sql);
				if ($query) {
					$query = mysqli_query($conn,"SELECT * FROM `login` WHERE email = '$email' AND password = '$password' AND role = 'User'");
					if (mysqli_num_rows($query) == 1) {
						//session_start();
						$result = mysqli_fetch_assoc($query);
						$_SESSION['email'] = $result['email'];
						$_SESSION['id'] = $result['id'];
						$_SESSION['username'] = $result['username'];
						$_SESSION['profile_img'] = $result['profile_img'];
					 	$_SESSION['role'] = $result['role'];
					 	$_SESSION['stu_unique_id'] = $result['unique_id'];
					 	echo "<script>alert('Login Successfully...');</script>";
						echo "<script>window.location = 'index.php';</script>";
					}
					// echo "<script>";
					// echo "$(document).ready(function(){
					// 	$('.login-main-content').fadeIn();
					// });";
					// echo "</script>";
				}else{
					return false;
				}
			}
	}
?>
