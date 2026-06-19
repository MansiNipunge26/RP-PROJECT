<?php
	include 'config.php';
	$stu_id = $_POST['stu_id'];
	$stu_surname = $_POST['stu_surname'];
	$stu_fname = $_POST['stu_fname'];
	$stu_lname = $_POST['stu_lname'];
	$stu_fullname = $_POST['stu_fullname'];
	$stu_mono = $_POST['stu_mono'];
	$stu_email = $_POST['stu_email'];
	$stu_course_id = $_POST['stu_course_id'];
	$select_sql = "SELECT * FROM `login` WHERE id = $stu_id";
	$query = mysqli_query($conn,$select_sql);
	if ($row = mysqli_fetch_assoc($query)) {
		if ($row['profile_img'] != "") {
			$profile_img = $row['profile_img'];
			$insert_sql = "INSERT INTO `apply_course_student`(`id`, `surname`, `fname`, `lname`, `contect_number`, `email_id`, `payment`, `profile_img`, `fullname`, `course_id`)
			VALUES ($stu_id,'$stu_surname','$stu_fname','$stu_lname',$stu_mono,'$stu_email',0,'$profile_img','$stu_fullname',$stu_course_id)";
			$query = mysqli_query($conn,$insert_sql);
		}else if ($row['profile_img'] == ""){
			$insert_sql = "INSERT INTO `apply_course_student`(`id`, `surname`, `fname`, `lname`, `contect_number`, `email_id`, `payment`, `profile_img`, `fullname`, `course_id`)
			VALUES ($stu_id,'$stu_surname','$stu_fname','$stu_lname',$stu_mono,'$stu_email',0,'','$stu_fullname',$stu_course_id)";
			$query = mysqli_query($conn,$insert_sql);
		}
		echo 1;
	}else{
		echo 0;
	}







?>
