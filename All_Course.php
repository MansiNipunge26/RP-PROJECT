<!DOCTYPE html>
<html lang="en">
<head>
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
		<title>E Learning</title>
</head>
<body>
		<?php
			include 'session_check.php';
			include 'config.php';
			include 'Header_top.php';
			include 'RFL.php';
			include 'Navbar.php';
			include 'Header_search.php';
		?>
		<div class="popular_course">
			<div class="container">
				<div class="row">
					<div class="title mx-auto">
						<div class="heading mb-0">
							<h2 class="text-center">OUR All <span>COURSES</span></h2>
						</div>
						<p>
							Fusce id sem at ligula laoreet hendrerit venenatis sed purus. Ut pellentesque maximus lacus, nec pharetra augue.
						</p>
					</div>
				</div>
			</div>
		</div>
		<div class="container d-flex align-items-center justify-content-between">
			<div id="breadcrumbs_ac">
				<ul>
					<li><a href="index.php"><i class="ti-home"></i>  Home</a></li>
					<li><a>/</a></li>
					<li>All Course</li>
				</ul>
			</div>
			<div id="back-button">
				<button class="btn btn-danger btn-sm"><a href="index.php"><i class="ti-angle-double-left"></i>  Back</a></button>
			</div>			
		</div>
		<div class="container pt-2">
			<div class="row">
				<?php
					$select_sql = "SELECT * FROM coursedetail";
					$query = mysqli_query($conn,$select_sql) or die(mysqli_error($conn)); 
					if (mysqli_num_rows($query) > 0) {
						while($row = mysqli_fetch_assoc($query)) {
							echo '
								<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 align-items-center justify-content-center">
									<div class="course-item">
										<div class="course-img">
											<a href="course_detail.php?course_id='.$row["course_id"].'" class="p-overlay">
												<img src="Admin/'.$row['course_file'].'" alt="" class="img-thumbnail img-fluid">
												<span><i class="ti ti-link"></i></span>
											</a>
										</div>
										<div class="course-body">
											<h4>'.$row['course_title'].'</h4>
											<p>'.$row['course_detail'].'</p>
											<p><b><i class="ti-mobile"></i>'.$row['course_contect'].'</b></p>
											<h5 class="Mrp mb-1">'.$row['course_amrp'].'&nbsp;$</h5>
											<p class="mb-1">M.R.P :<del>'.$row['course_amrp'].'&nbsp;$</del></p>
											<button type="button"><a href="course_detail.php?course_id='.$row["course_id"].'">Read more</a></button>
										</div>
									</div>
								</div>
							';
						}
					}
				?>
			</div>
		</div>
		<?php include 'footer.php'; ?>
		<script type="text/javascript" src="js/script.js"></script>
</body>
</html>



