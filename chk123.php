<?php
	session_start();
	include 'config.php';
	$grup_name = $_POST['grup_name'];
	$unique_ids = $_POST['unique_ids'];
	$grup_img_name = $_FILES['grup_img']['name'];
	$grup_img_tmp = $_FILES['grup_img']['tmp_name'];
	$folder_path = 'Admin/img/'.$_FILES['grup_img']['name'];
		if (move_uploaded_file($grup_img_tmp, $folder_path)) {
			$query = mysqli_query($conn,"INSERT INTO `grups`(`grup_id`, `grup_name`, `grup_img`) VALUES (NULL,'$grup_name','$folder_path')");
			if ($query) {
				if (isset($_SESSION['stu_unique_id'])) {$admin_id = $_SESSION['stu_unique_id'];}else if (isset($_SESSION['admin_unique_id'])) {$admin_id = $_SESSION['admin_unique_id'];}
				$grup_id = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `grups`"));
				$query = mysqli_query($conn,"INSERT INTO `grup_member`(`id`, `grup_id`, `member_id`, `post`) VALUES (NULL,$grup_id,$admin_id,'Admin')");
				if ($query) {
					for ($i=0; $i < count($unique_ids); $i++) { 
						//echo $unique_ids[$i];
						$query = mysqli_query($conn,"INSERT INTO `grup_member`(`id`, `grup_id`, `member_id`, `post`) VALUES (NULL,$grup_id,'$unique_ids[$i]','GrupMember')");
						if ($query) {
							header('location:stu_chat.php');
						}
					}				
				}
			}
		}else{
			echo "Not Moved";
		}
	
	// echo $grup_name;
	// echo $grup_img_name;
?>