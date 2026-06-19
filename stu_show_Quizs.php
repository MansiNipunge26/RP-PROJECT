<!DOCTYPE html>
<html>
	<head>
		<title>E Learning</title>
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
		<link rel="stylesheet" href="css/style.css?v=<?php echo(time()); ?>">
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
										<li>Add Quiz</li>
									</ul>
								</div>
								<div id="back-button">
									<button class="btn btn-danger btn-sm"><a href="index.php" class="text-light"><i class="ti-angle-double-left"></i>  Back</a></button>
								</div>							
							</div>
							<div class="col-xl-10 mx-auto quiz_heading">
								<h4>All Quizs</h4>
							</div>
							<?php
							if (isset($_SESSION['id'])) {
								$id = $_SESSION['id'];
							}else if (isset($_SESSION['admin_id'])) {
								$id = $_SESSION['admin_id'];
							}
							//$join_sql = "SELECT * FROM coursedetail c INNER JOIN apply_course_student a ON c.course_id = a.course_id WHERE email_id = '$stu_email'";
							$query = mysqli_query($conn,"SELECT * FROM `quiz_description` qd INNER JOIN `apply_course_student` acs ON qd.quiz_title = acs.course_id WHERE id = $id AND status = '1'");
								if (mysqli_num_rows($query)) {
									while ($row = mysqli_fetch_assoc($query)) {
										$course_id = $row['quiz_title'];
										$res = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `coursedetail` WHERE course_id = $course_id"));
										echo '
												<div class="col-xl-10 mx-auto px-0 mb-3">
													<a href="stu_show_QuizQA.php?quiz_id='.$row['qid'].'" class="text-dark font-weight-bold quiz_label d-flex align-items-center justify-content-between">
														<div class="">
															<div class="d-flex">
																<div class="mb-0">'.$row['quiz_title'].'</div>&nbsp;
																<div class="mb-0">'.$res['course_title'].'</div>
															</div>
															<div class="date d-flex justify-content-around mx-auto">
																<div class="mb-0">Date : '.$row['quiz_date'].'</div>
																<div class="mb-0 mx-4">Time : '.$row['quiz_time'].'</div>
																<div class="mb-0">You have '.$row['end_time'].'&nbsp;Minutes</div>
															</div>
														</div>
														<div>
															<button type="button" id="give_quiz_btn"><i class="ti-pencil-alt"></i>&nbsp; Give Quiz</button>
														</div>
													</a>
												</div>
											';
									}									
								}else{
									echo "<h5>Oops!,No Data Found...</h5>";
								}
							?>
						</div>
					</div>
				</div>
			<?php include 'footer.php'; ?>
			<script type="text/javascript" src="js/script.js"></script>
	</body>
</html>
