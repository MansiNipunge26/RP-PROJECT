<!DOCTYPE html>
<html>
	<head>
		<title>RS collage home page</title>
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
						<h4>Student Result</h4>
					</div>
					<div class="col-xl-12 quiz_area h-100">
						<div class="d-flex my-2 justify-content-center">
							<?php
								include 'config.php';
								if (isset($_SESSION['admin_email'])) {
									$stu_email = $_SESSION['admin_email'];
								}else if (isset($_SESSION['email'])) {
									$stu_email = $_SESSION['email'];
								}
								$select_sql = "SELECT * FROM `quiz_score` WHERE stu_email = '$stu_email' ORDER BY quiz_id DESC";
								$query = mysqli_query($conn,$select_sql);
								$table_content = "";
								if (mysqli_num_rows($query) > 0) {
									$table_content.="
												<table class='table table-hover table-responsive mt-3'>
													<tr>
														<th><p>Student name</p></th>
														<th><p>Subject Id</p></th>
														<th><p>Subject Name</p></th>
														<th><p>Quiz Id</p></th>
														<th><p>Total Que</p></th>
														<th><p>Total Mark</p></th>
														<th><p>Student Score</p></th>
														<th><p>Attempt Quation</p></th>
														<th><p>Right Quation</p></th>
														<th><p>Wrong Quation</p></th>
														<th><p>Date & Time</p></th>
													</tr>
													";
									while ($row = mysqli_fetch_assoc($query)) {
										$table_content.= '<tr>
															  <td>'.$row['stu_name'].'</td>
															  <td>'.$row['subject_id'].'</td>
															  <td>'.$row['subject_name'].'</td>
															  <td>'.$row['quiz_id'].'</td>
															  <td>'.$row['total_que'].'</td>
															  <td>'.$row['total_mark'].'</td>
															  <td>'.$row['stu_score'].'</td>
															  <td>'.$row['attemp_que'].'</td>
															  <td>'.$row['right_que'].'</td>
															  <td>'.$row['wrong_que'].'</td>
															  <td>'.$row['date'].'</td>
														';
									}
									$table_content.="</table>";
									echo $table_content;
								}else{
									echo "<h5>Oops!,No Data Found...</h5>";
								}
							?>				
						</div>
					
					</div>	
				</div>
			</div>
		</div>
		<?php include 'footer.php'; ?>
		<script type="text/javascript" src="js/script.js"></script>
	</body>
</html>
