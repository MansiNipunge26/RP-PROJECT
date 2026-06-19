<?php
	include 'session_check.php';
	include 'config.php';
	if (isset($_SESSION['admin_id'])) {
			$stu_id = $_SESSION['admin_id'];
	}else{
			$stu_id = $_SESSION['id'];
	}
	$select_sql = "SELECT * FROM `login` WHERE id = $stu_id";
	$query = mysqli_query($conn,$select_sql);
	if ($row = mysqli_fetch_assoc($query)) {
		if ($row['profile_img'] != "") {
			echo '
				<div>
					<img src="'.$row['profile_img'].'" alt="" height="450" class="img-thumbnail w-100 	img-fluid">
				</div>

			';
		}else{
			echo '
				<div>
					<img src="img/Ap3.jpg" alt="" height="450" class="img-thumbnail w-100 	img-fluid">
				</div>

			';
		}
	}


?>
