<!DOCTYPE html>
<html>
	<head>
		<title>E Learnign</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1" >
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<link rel="stylesheet" href="css/owl.carousel.css">
		<link rel="stylesheet" href="css/owl.theme.green.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<script src="js/jquery.min.js"></script>
		<script src="js/owl.carousel.min.js"></script>
		<link rel="stylesheet" href="css/themify-icons.css">
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<?php
			include 'config.php';
			include 'session_check.php';
			include 'RFL.php';
			include 'Header_top.php';
			include 'Navbar.php';
			include 'Header_search.php';
			if (!(isset($_SESSION['id'])) && !(isset($_SESSION['admin_id']))) {
				echo "<script>alert('Please Login Our Site...');</script>";
				echo "<script>window.location = 'index.php'</script>";
			}
		?>
		<div class="container-fluid quiz_content">
			<div class="row">
				<div class="col-xl-12 quiz_main_content">
					<div class="d-flex justify-content-between">
						<div id="breadcrumbs">
							<ul>
								<li><a href="index.php"><i class="ti-home"></i>  Home</a></li>
								<li>/</li>
								<li>Attend Quiz</li>
							</ul>
						</div>
						<div id="back-button">
							<button class="btn btn-danger btn-sm"><a href="AP-Dashbord.php" class="text-light"><i class="ti-angle-double-left"></i>  Back</a></button>
						</div>							
					</div>
					<div class="quiz_heading">
						<h4>Java Script</h4>
					</div>
					<div class="col-xl-12 quiz_area h-100">
						<div class="d-flex my-4 justify-content-center">
							<h4 class="text-secondary">STUDENT REPORT</h4>							
						</div>
						<?php
							if (isset($_POST['send_result'])) {
								$quiz_id = $_GET['quiz_id'];
								$sql = "SELECT * FROM `quiz_que` WHERE quiz_id = $quiz_id";
								$query = mysqli_query($conn,$sql);
								$result = mysqli_fetch_assoc($query);
								$total_que = mysqli_num_rows($query);
								//echo $total_que;
								$sql = "SELECT * FROM `quiz_description` WHERE qid = $quiz_id";
								$query = mysqli_query($conn,$sql);
								$row = mysqli_fetch_assoc($query);
								$mark_que = $row['mark_que'];
								$score = 0;
								$total_mark = $total_que * $mark_que;
									if (isset($_POST['quizcheck'])) {
										$selected_choice = $_POST['quizcheck'];
										$attempt_que = count($selected_choice);
										foreach ($selected_choice as $key => $value) {
											//$sql = "SELECT * FROM quiz_answers WHERE answer_id='$value' AND is_correct = '1'";
											$sql = "SELECT * FROM `quiz_ans` WHERE ans_id = '$value' AND is_correct = '1'";
											$query = mysqli_query($conn,$sql);
											$no_rows = mysqli_num_rows($query);
											if ($no_rows != 0) {
												$score = $score + $mark_que;
											}else{
												
											}
										}	
									}else{
										$selected_choice = 0;
										$attempt_que = 0;
										$right_que = 0;
									}
									
									$right_que = $score/$mark_que;
									$wrong_que = $total_que - $right_que;
									$sql = "SELECT * FROM `quiz_description` WHERE qid = $quiz_id";
									$result = mysqli_fetch_assoc(mysqli_query($conn,$sql));
									$quiz_title = $result['quiz_title'];
									$stu_id = $_SESSION['id'];
									$stu_username = $_SESSION['username'];
									$stu_email = $_SESSION['email'];
									$row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `coursedetail` WHERE course_id = $quiz_title"));
									$course_title = $row['course_title'];
									// echo "<h2>Your Score is=> $score</h2>";
									// echo "<h2>Total Que Is::$total_que</h2>";
									// echo "<h2>Attempt Que Is::$attempt_que</h2>";
									// echo "<h2>Right Que Is::$right_que</h2>";
									// echo "<h2>Wrong Que Is::$wrong_que</h2>";
									

									$insert_result = "INSERT INTO `quiz_score`(`id`, `stu_id`, `stu_name`, `stu_email`, `subject_id`, `subject_name`, `total_que`, `total_mark`, `stu_score`, `attemp_que`, `right_que`, `wrong_que`, `date`,`quiz_id`) VALUES (NULL,$stu_id,'$stu_username','$stu_email',$quiz_title,'$course_title',$total_que,$total_mark,$score,$attempt_que,$right_que,$wrong_que,NOW(),$quiz_id)";
									mysqli_query($conn,$insert_result);
									echo '
	                                		<table class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mx-auto table table-bordered">
											    <tbody>
											    	<tr>
											    		<td><strong>STUDENT ID</strong></td>
											    		<td>'.$stu_id.'</td>
											    	</tr>
											    	<tr>
											    		<td><strong>STUDENT NAME</strong></td>
											    		<td>'.$stu_username.'</td>
											    	</tr>
											    	<tr>
											    		<td><strong>STUDENT EMAIL ID</strong></td>
											    		<td>'.$stu_email.'</td>
											    	</tr>
											    	<tr>
											    		<td><strong>SUBJECT ID</strong></td>
											    		<td>'.$quiz_title.'</td>
											    	</tr>
											    	<tr>
											    		<td><strong>SUBJECT NAME</strong></td>
											    		<td>'.$row['course_title'].'</td>
											    	</tr>
											    	<tr>
											    		<td><strong>TOTAL QUATION</strong></td>
											    		<td>'.$total_que.'</td>
											    	</tr>
											    	<tr>
											    		<td><strong>TOTAL MARK</strong></td>
											    		<td>'.$total_mark.'</td>
											    	</tr>
											    	<tr>
											    		<td><strong>STUDENT SCORE</strong></td>
											    		<td>'.$score.'</td>
											    	</tr>
											    	<tr>
											    		<td><strong>ATTEMP QUATION</strong></td>
											    		<td>'.$attempt_que.'</td>
											    	</tr>
											    	<tr>
											    		<td><strong>RIGHT QUATION</strong></td>
											    		<td>'.$right_que.'</td>
											    	</tr>
											    	<tr>
											    		<td><strong>WRONG QUATION</strong></td>
											    		<td>'.$wrong_que.'</td>
											    	</tr>
											    </tbody>
											  </table>
										';

							}
						?>
					</div>	
				</div>
			</div>
		</div>
		<script type="text/javascript" src="js/script.js"></script>
	</body>
</html>
