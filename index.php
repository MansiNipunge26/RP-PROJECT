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
	<body  style="background: #F9F9F9;">
		<?php
			include 'config.php';
			include 'session_check.php';
			include 'RFL.php';
			include 'Header_top.php';
			include 'Navbar.php';
			include 'Header_search.php';
		?>
		<!--Carousel-->
		<div class="container-fluid px-0 carousel-section">
			<div id="demo" class="carousel slide pause" data-ride="carousel">
				<div class="carousel-inner">
					<?php
						$select_sql = "SELECT * FROM `home_page` ORDER BY id";
						$query = mysqli_query($conn,$select_sql);
						$row = mysqli_fetch_assoc($query);
						echo '
								<div class="carousel-item active">
									<img src="Admin/'.$row['img'].'" class="image-fluid w-100">
									<div class="carousel-caption">
										<div class="cheading mx-auto">
											<h3><span>'.$row['title'].'</span></h3>
											<p>'.$row['description'].'</p>
											<div class="btn-clist mb-5">
												<button type="button" id="cbtn1"><a href="All_course.php">ALL COURSE</a></button>
												<button class="ml-2" id="cbtn2" type="button"><a href="About_us.php">READ MORE</a></button>
											</div>
										</div>
									</div>
								</div>
							';
						while ($row = mysqli_fetch_assoc($query)) {
							echo '
									<div class="carousel-item">
										<img src="Admin/'.$row['img'].'" class="image-fluid w-100">
										<div class="carousel-caption">
											<div class="cheading mx-auto">
												<h3><span>'.$row['title'].'</span></h3>
												<p>'.$row['description'].'</p>
												<div class="btn-clist mb-5">
													<button type="button" id="cbtn1"><a href="All_course.php">ALL COURSE</a></button>
													<button class="ml-2" id="cbtn2" type="button"><a href="About_us.php">READ MORE</a></button>
												</div>
											</div>
										</div>
									</div>
								';
						}
					?>
				</div>
				<a class="carousel-control-prev" href="#demo" data-slide="prev">
					<span class="carousel-control-prev-icon"></span>
				</a>
				<a class="carousel-control-next" href="#demo" data-slide="next">
					<span class="carousel-control-next-icon"></span>
				</a>
			</div>
		</div>
		<!--Popular Course-->
		<div class="popular_course"  style="background: #ffffff;">
			<div class="container">
				<div class="row">
					<div class="title mx-auto">
						<div class="heading mb-0">
							<h2 class="text-center">OUR MAIN <span>COURSES</span></h2>
						</div>
						<p>
							Fusce id sem at ligula laoreet hendrerit venenatis sed purus. Ut pellentesque maximus lacus, nec pharetra augue.
						</p>
					</div>
				</div>
			</div>
		</div>
		<div class="container-fluid" style="background: #ffffff;"><div class="container text-right All_cou_link pb-2"><a href="All_course.php">View All Courses<i class="ti-angle-double-right"></i></a></div></div>
		<!--Popular Course-->
		<section  style="background: #ffffff;">
			<div class="container pt-2">
				<div class="row">
					<?php
						include 'config.php';
						$select_sql = "SELECT * FROM coursedetail LIMIT 6";
						$query = mysqli_query($conn,$select_sql) or die(mysqli_error($conn));
						if (mysqli_num_rows($query) > 0) {
							while($row = mysqli_fetch_assoc($query)) {
								echo '
									<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 align-items-center justify-content-center">
											<div class="course-item">
													<div class="course-img">
															<a href="course_detail.php?course_id='.$row['course_id'].'" class="p-overlay">
																	<img src="Admin/'.$row['course_file'].'" alt="" class="img-thumbnail img-fluid">
																	<span><i class="ti ti-link"></i></span>
															</a>
													</div>
													<div class="course-body">
															<h4>'.$row['course_title'].'</h4>
															<p>'.$row['course_detail'].'</p>
															<p><b><i class="ti-mobile"></i>'.$row['course_contect'].'</b></p>
															<h5 class="Mrp mb-1">'.$row['course_amrp'].'&nbsp;Rs.</h5>
															<p class="mb-1">M.R.P :<del>'.$row['course_amrp'].'&nbsp;$</del></p>
															<button type="button"><a href="course_detail.php?course_id='.$row['course_id'].'">Read more</a></button>
													</div>
											</div>
									</div>
								';
							}
						}
					?>
				</div>
			</div>
		</section>
		<!-- OWL COURSEL START-->
		<div class="popular_course">
			<div class="container">
				<div class="row">
					<div class="title mx-auto">
						<div class="heading mb-0">
							<h2 class="text-center pt-0">What People <span>Says</span></h2>
						</div>
						<p class="mb-3">
							Fusce id sem at ligula laoreet hendrerit venenatis sed purus. Ut pellentesque maximus lacus, nec pharetra augue.
						</p>
					</div>
				</div>
			</div>
		</div>
		<div class="container-fluid">
			<div class="container owl_main"  style="background: #F9F9F9;">
				<div class='owl-carousel owl-theme'>
					<?php
						$select_sql = "SELECT * FROM `review`";
						$query = mysqli_query($conn,$select_sql);
						while ($row = mysqli_fetch_assoc($query)) {
							$rating_star_count = $row['rating'];
							$rating_star_content = "";
							if ($rating_star_count == 5) {
								$rating_star_content = '
									<label class="fa fa-star" id="rating_icon"></label>
									<label class="fa fa-star" id="rating_icon"></label>
									<label class="fa fa-star" id="rating_icon"></label>
									<label class="fa fa-star" id="rating_icon"></label>
									<label class="fa fa-star" id="rating_icon"></label>
								';
							}else if ($rating_star_count == 4) {
								$rating_star_content = '
									<label class="fa fa-star" id="rating_icon"></label>
									<label class="fa fa-star" id="rating_icon"></label>
									<label class="fa fa-star" id="rating_icon"></label>
									<label class="fa fa-star" id="rating_icon"></label>
									<label class="fa fa-star" id="deactive_rating_icon"></label>
								';
							}else if($rating_star_count == 3){
									$rating_star_content = '
									<label class="fa fa-star" id="rating_icon"></label>
									<label class="fa fa-star" id="rating_icon"></label>
									<label class="fa fa-star" id="rating_icon"></label>
									<label class="fa fa-star" id="deactive_rating_icon"></label>
									<label class="fa fa-star" id="deactive_rating_icon"></label>
								';
							}else if($rating_star_count == 2){
									$rating_star_content = '
									<label class="fa fa-star" id="rating_icon"></label>
									<label class="fa fa-star" id="rating_icon"></label>
									<label class="fa fa-star" id="deactive_rating_icon"></label>
									<label class="fa fa-star" id="deactive_rating_icon"></label>
									<label class="fa fa-star" id="deactive_rating_icon"></label>
								';
							}else{
									$rating_star_content = '
									<label class="fa fa-star" id="rating_icon"></label>
									<label class="fa fa-star" id="deactive_rating_icon"></label>
									<label class="fa fa-star" id="deactive_rating_icon"></label>
									<label class="fa fa-star" id="deactive_rating_icon"></label>
									<label class="fa fa-star" id="deactive_rating_icon"></label>
								';
							}
					?>
						<div class="item"  style="background: #F9F9F9;">
							<div class="col-xl-12">
					    		<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 testimonial_img">
					    			<?php 
					    				if ($row['review_img'] != "") {
					    					echo '<img src="'.$row['review_img'].'" alt="" class="img-fluid img-thumbnail">';
					    				}else{
					    					echo '<img src="Admin/img/avtar3.png" alt="" class="img-fluid img-thumbnail">';
					    				}
					    			?>
					    					
					    		</div>
					    	</div>
					    	<div class="col-xl-12 feedback_msg">
					    		<div id="rating_star"><?php echo $rating_star_content; ?></div>
					    		<h4><?php echo $row['username']; ?></h4>
					    		
					    		<span id="first_de_comma" class="fas fa-quote-left"></span>	
					    		<span id="second_de_comma" class="fas fa-quote-right"></span>	
					    		<p style="color: #50505;"><?php echo $row['massage']; ?></p>
					    	</div>
					    </div>
					<?php
						}
					?>
				</div>
			</div>
		</div>			
		</div>
		<hr>
		<div class="popular_course">
			<div class="container">
				<div class="row">
					<div class="title mx-auto">
						<div class="heading mb-0">
							<h2 class="text-center pt-0 mt-2 pb-0">Write <span>Review</span></h2>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="review_form col-xl-12 mt-4">
					<form method="post">
						<div class="col-xl-12 px-0 mt-4  d-flex align-items-center justify-content-center">
							<input type="text" id='rating_count' value="1" hidden>
							<?php
								if (!isset($_SESSION['username'])) {
									echo '<div class="col-xl-3 "><input type="text" class="review_uname w-100" name="review_uname" placeholder="Enter Username"></div>';
								}else{
									echo "<div class='col-xl-3' ><input type='text' class='review_uname w-100' name='review_uname' value='".$_SESSION["username"]."' readonly></div>";
								}
								if (!isset($_SESSION['email'])) {
									echo '<div class="col-xl-3 "><input type="text" class="review_email w-100" name="review_email" placeholder="Enter Email"></div>';
								}else{
									echo "<div class='col-xl-3'><input type='text' class='review_email w-100' name='review_email' value='".$_SESSION["email"]."' readonly></div>";
								}
							?>
						</div>
						<div class="d-flex align-items-center justify-content-center">
							<div class="col-xl-6 w-100">
								<textarea rows="2" class="review_msg w-100 pt-2" name="review_msg" placeholder="Write Your Reviews..."></textarea>
								<div class="rating_star d-flex align-items-center justify-content-center">
									<label for="rating_star_1" class="fa fa-star" id="rating_star_1"></label>
									<input type="checkbox" name="rating_1" id='rating_1' hidden>
									<label for="rating_1" class="fa fa-star" id="rating_icon_1"></label>
									<input type="checkbox" name="rating_2" id='rating_2' hidden>
									<label for="rating_2" class="fa fa-star" id="rating_icon_2"></label>
									<input type="checkbox" name="rating_3" id='rating_3' hidden>
									<label for="rating_3" class="fa fa-star" id="rating_icon_3"></label>
									<input type="checkbox" name="rating_4" id='rating_4' hidden>
									<label for="rating_4" class="fa fa-star" id="rating_icon_4"></label>
								</div>
								<button id="send_review" type="submit" name="submit">SEND</button>
								<p class="note pb-3"><b>Note : </b>Please Send us Your Review That is Very Helpful and Motivational For us...</p>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- OWL COURSEL END-->
			<?php include 'footer.php'; ?>
			<script type="text/javascript" src="js/script.js"></script>
		</body>
	</html>