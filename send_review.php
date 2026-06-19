<?php
	include 'config.php';
	$review_uname = $_POST['review_uname'];
	$review_email = $_POST['review_email'];
	$review_msg = $_POST['review_msg'];
	$rating_count = $_POST['rating_count'];
	$select_sql = "SELECT * FROM `login` WHERE email = '$review_email'";
	$query = mysqli_query($conn,$select_sql);
	$row = mysqli_fetch_assoc($query);
	if (mysqli_num_rows($query) > 0) {
		$review_img = $row['profile_img'];
		if ($review_img != "") {
			$inser_sql = "INSERT INTO `review`(`username`, `email`, `massage`, `rating`, `review_img`) VALUES ('$review_uname','$review_email','$review_msg',$rating_count,'$review_img')";
			$query = mysqli_query($conn,$inser_sql);
		}else{
			$inser_sql = "INSERT INTO `review`(`username`, `email`, `massage`, `rating`, `review_img`) VALUES ('$review_uname','$review_email','$review_msg',$rating_count,'')";
			$query = mysqli_query($conn,$inser_sql);
		}
	}else{
		return false;
	}

?>