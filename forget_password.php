<?php
	include 'config.php';

	if (isset($_POST['forget_btn'])) {
		$fp_email = $_POST['fp_email'];
		$fp_password = $_POST['fp_password'];

		$sql = "SELECT * FROM `login` WHERE email = '$fp_email'";
		echo $sql;
		$query = mysqli_query($conn,$sql) or die(mysqli_error($conn));
		if (mysqli_num_rows($query) == 1) {
			$sql = "UPDATE `login` SET `password`='$fp_password' WHERE email = '$fp_email'";
			$query = mysqli_query($conn,$sql) or die(mysqli_error($conn));
			if ($query) {
				echo "<script>alert('Password Updated,Now You can Login.');</script>";
				echo "<script>window.location = 'index.php';</script>";
			}
		}
	}
?>