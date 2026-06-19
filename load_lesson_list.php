<?php
	include 'config.php';
	$course_id = $_GET['course_id'];
	$select_sql = "SELECT * FROM `course_lessons` WHERE course_id = $course_id";
	$query = mysqli_query($conn,$select_sql);
	$row = mysqli_fetch_assoc($query);
	if (mysqli_num_rows($query)) {
		echo '<p style="font-size: 22px;font-weight: 500;" class="pl-3 pt-2 mb-0">'.$row['course_title'].'<p>';	
	}
	echo '<ul>';
	$select_sql = "SELECT * FROM `course_lessons` WHERE course_id = $course_id";
	$query = mysqli_query($conn,$select_sql);
	if (mysqli_num_rows($query) != 0) {
		while ($row = mysqli_fetch_assoc($query)) {
		echo '	
				<a href="" data-lesson_link="'.$row['lesson_id'].'" class="lesson_link"><li>'.$row['lesson_title'].'</li></a>';
		}
		echo '</ul>';	
	}else{
		echo "<h5>Oops ! No Data Found...</h5>";
	}
	
	
?>