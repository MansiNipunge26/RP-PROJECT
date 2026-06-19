<?php
	include 'config.php';
	$search_term = $_POST['search_term'];
	$query = mysqli_query($conn,"SELECT * FROM `coursedetail` WHERE course_title LIKE '%{$search_term}%'");
	if (mysqli_num_rows($query) > 0) {
		while ($row = mysqli_fetch_assoc($query)) {
			echo '<a href="course_detail.php?course_id='.$row['course_id'].'"><li>'.$row['course_title'].'</li></a>';
		}
	}else{
		echo "<h4>Oops ! No Data Found...</h4>";
	}

?>