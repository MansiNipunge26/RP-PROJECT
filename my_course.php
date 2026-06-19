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
					echo "<script>alert('Please Login Our Site...');window.location = 'index.php';</script>";
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
							<button class="btn btn-danger btn-sm"><a href="index.php" class="text-light"><i class="ti-angle-double-left"></i>  Back</a></button>
						</div>							
					</div>
					<div class="quiz_heading">
						<h4>My Courses</h4>
					</div>
					<div class="container mx-auto quiz_area h-100">
						<?php
							if(isset($_SESSION['id'])) {
							$stu_id = $_SESSION['id'];
							$stu_email = $_SESSION['email'];
							}else if (isset($_SESSION['admin_email'])) {
								$stu_id = $_SESSION['admin_id'];
								$stu_email = $_SESSION['admin_email'];
							}
							$join_sql = "SELECT * FROM coursedetail c INNER JOIN apply_course_student a ON c.course_id = a.course_id WHERE email_id = '$stu_email' AND payment = '1'";
							$query = mysqli_query($conn,$join_sql);
							while ($row = mysqli_fetch_assoc($query)) {
								echo '
										<div class="course_card d-flex mb-4" style="border: 1px solid #ddd; padding: 25px 15px; margin-left: 13px; box-shadow: 0px 4px 10px 4px rgb(0 0 0 / 8%);">
											<div class="col-xl-5 col-lg-4 col-md-12 col-sm-12">
												<img src="Admin/'.$row['course_file'].'" class="img-thumbnail img-fluid" alt="">
											</div>
											<div class="col-xl-7 col-lg-7 col-md-12 col-sm-12">
												<div class="course-body">
													<h4>'.$row['course_title'].'</h4>
													<p>'.$row['course_detail'].'</p>
													<p><b><i class="ti-mobile">'.$row['course_contect'].'</i></b></p>
													<div class="d-flex justify-content-between">
														<h5 class="Mrp mb-1">'.$row['course_amrp'].'&nbsp; Rs.</h5>
														<button type="button" class="text-light Apply_btn flex-first"><a href="watch_course.php?course_id='.$row['course_id'].'">Watch Now</a></button>
													</div>
												</div>
											</div>
										</div>
									';
							}
						?>
					</div>	
				</div>
			</div>
		</div>
		<?php include 'footer.php'; ?>
		<script type="text/javascript" src="js/script.js"></script>
	</body>
</html>
