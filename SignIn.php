<?php

	include 'config.php';
	if (isset($_POST['login'])) {
		$login_email = $_POST['login_email'];
		$login_password = $_POST['login_password'];
		$select_sql = "SELECT * FROM `login` WHERE email = '{$login_email}' AND password = '{$login_password}' AND role = 'User' AND status = '1'";
		$query = mysqli_query($conn , $select_sql);
		$result = mysqli_fetch_assoc($query);
		if ($result['email'] == $login_email && $result['password'] == $login_password) {
			session_start();
			$_SESSION['email'] = $result['email'];
			$_SESSION['id'] = $result['id'];
			$_SESSION['username'] = $result['username'];
			$_SESSION['profile_img'] = $result['profile_img'];
		 	$_SESSION['role'] = $result['role'];
		 	$_SESSION['stu_unique_id'] = $result['unique_id'];
		 	echo "<script>alert('Login Successfully...');</script>";
			echo "<script>window.location = 'index.php';</script>";
		}else{
			$select_sql = "SELECT * FROM `login` WHERE email = '{$login_email}' AND password = '{$login_password}' AND role = 'Admin' AND status = '1'";
			$query = mysqli_query($conn , $select_sql);
			$result = mysqli_fetch_assoc($query);
			if ($result['email'] == $login_email && $result['password'] == $login_password) {
				session_start();
				$_SESSION['admin_email'] = $result['email'];
				$_SESSION['admin_id'] = $result['id'];
				$_SESSION['admin_username'] = $result['username'];
				$_SESSION['admin_profile_img'] = $result['profile_img'];
			 	$_SESSION['admin_role'] = $result['role'];
			 	$_SESSION['admin_unique_id'] = $result['unique_id'];
			 	echo "<script>alert('Login Successfully...');</script>";
				echo "<script>window.location = 'index.php';</script>";
			}else{
				echo "<script>alert('Invalid Email And Password');</script>";
				echo "<script>window.location = 'index.php';</script>";
			}
		}
	}


?>