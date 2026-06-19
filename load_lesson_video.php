<?php
	include 'config.php';
	$id = $_POST['id'];
	$slect_sql = "SELECT * FROM `course_lessons` WHERE lesson_id = $id";
	$load_video_content = "";
	$query = mysqli_query($conn,$slect_sql);
	if (mysqli_num_rows($query) != 0) {
		$row = mysqli_fetch_assoc($query);
		$load_video_content.= '
									<div class="col-xl-12 mb-3 lesson_title">
										<h4>'.$row['lesson_title'].'</h4>
									</div>
									<div class="col-xl-12 px-0 mx-auto">
										<iframe src="Admin/'.$row['lesson_video_link'].'" class="mx-auto w-100" height="500" frameborder="0"></iframe>	
									</div>
									<p class="lesson_description my-2 ml-0">'.$row['lesson_desc'].'</p>
									<hr>
								';
		echo $load_video_content;	
	}else{
		echo "<h2>Oops ! No Data Found...</h2>";
	}
	
?>