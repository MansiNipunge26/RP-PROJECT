<!DOCTYPE html>
<html lang="en">
	<head>
		<title>E Learning</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1" >
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="css/themify-icons.css">
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<?php
			include 'session_check.php';
			include 'Header_top.php';
			include 'RFL.php';
			include 'Navbar.php';
			include 'Header_search.php';
			include 'config.php';
		?>
		<div class="container-fluid">
			<div class="row">
				<div class="col-xl-12">
					
				</div>
			</div>
			<div class="row">
				<div class="course_back_img px-0 col-xl-12 col-lg-12 col-md-12 col-sm-12">
					<img src="Admin/img/li3.jfif" alt="" class="img-fluid w-100 h-100">
				</div>
			</div>
		</div>
		<div class="container-fluid course_top">
			<div class="row">
				<div class="col-xl-12 px-0 col-lg-12 col-md-12 col-sm-12">
					<div class="course_hed">
						<h6>Course Detail And Course Application</h6>
					</div>
				</div>
			</div>
		</div>
		<div class="Course_wrapper pb-4">
			<div class="container Course_wrapper_child">
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 px-0">
						<?php
							include 'config.php';
							$stu_course_id = $_GET['course_id'];
							$select_sql = "SELECT * FROM coursedetail WHERE course_id = $stu_course_id";
							$query = mysqli_query($conn,$select_sql) or die(mysqli_error($conn));
							if (mysqli_num_rows($query) > 0) {
								$row = mysqli_fetch_assoc($query);
									$course_price = $row['course_amrp'];
									echo '
												<div class="course_card d-flex">
														<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
																<img class="mr-0" height="230" src="Admin/'.$row['course_file'].'" class="img-thumbnail img-fluid" alt="">
														</div>
														<div class="col-xl-8 col-lg-4 col-md-12 col-sm-12">
																<div class="course-body py-1">
																		<h4>'.$row['course_title'].'</h4>
																		<p>'.$row['course_detail'].'</p>
																		<p><b><i class="ti-mobile"></i>'.$row['course_contect'].'</b></p>
																		<h5 class="Mrp mb-1">'.$row['course_amrp'].'&nbsp;Rs.</h5>
																		<p class="mb-1">M.R.P :<del>'.$row['course_dmrp'].'&nbsp;$</del></p>
																		<button type="button" class="text-light Apply_btn">Apply Now</button>
																</div>
														</div>
												</div>
											';
							}
						?>
						<hr>
						<div class="course_detail col-lg-12 col-xl-12 col-sm-12 col-md-12">
							<div class="btn-tab px-0">
								<button type="button" id="Toggle-Tab-5"><i class="ti ti-info-alt">  </i>Detail</button>
								<button type="button" id="Toggle-Tab-6"><i class="ti ti-book">  </i>Syllabus</button>
								<button type="button" id="Toggle-Tab-7"><i class="ti ti-hand-point-up">  </i>Apply Now</button>
							</div>
							<div class="main_con">
								<div class="detail_box1">
									<div class="course_detail_heading">
										<h4>Course Detail</h4>
									</div>
									<div class="co_main_content5 px-4">
										<h4>Course Detail</h4>
										<?php
											$csquery = mysqli_query($conn,"SELECT * FROM `course_syllabus` WHERE c_id = $stu_course_id");
											$cs = mysqli_fetch_assoc($csquery);
											if (mysqli_num_rows($csquery) != 0) {
												echo '<p>'.$cs['c_detail'].'</p>';
											}else{
												echo '<p>'.$row['course_detail'].'</p>';
											}
										?>
									</div>
								</div>
								<div class="detail_box2">
									<div class="course_detail_heading">
										<h4>Course Syllabus</h4>
									</div>
									<div class="co_main_content5 px-4">
										<h4>Course Syllabus</h4>
										<?php
											if (mysqli_num_rows($csquery) != 0) {
												echo '<p>'.$cs['course_syllabus'].'</p>';
											}else{
												echo '<p>'.$row['course_title'].'</p>';
											}
										?>
									</div>
								</div>
								<div class="detail_box3">
									<div class="course_detail_heading">
										<h4>Application Form</h4>
									</div>
									<div class="co_main_content7 px-4">
										<div class="col-xl-12 d-flex">
											<div class="col-xl-12 d-flex align-items-center justify-content-between course_register_form">
												<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 px-0">
													<span id="load_usr_img"></span>
													<div class="stu_profile_detail">
														<h5><?php if(isset($_SESSION['admin_username'])){echo $_SESSION['admin_username']; }else if(isset($_SESSION['username'])){ echo $_SESSION['username']; }?></h5>
														<span>User Id : <?php if(isset($_SESSION['admin_id'])){echo $_SESSION['admin_id']; }else if(isset($_SESSION['id'])){ echo $_SESSION['id']; }?></span>
														<hr>
														<span>Email : <br><span><?php if(isset($_SESSION['admin_email'])){echo $_SESSION['admin_email']; }else if(isset($_SESSION['email'])){ echo $_SESSION['email']; }?></span></span>
													</div>
												</div>
												<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col9div mt-3">
													<form id="usr_apply_course_data" action="usr_apply_course_data.php" method="post">
														<input type="number" value="<?php if(isset($_SESSION['admin_id'])){echo $_SESSION['admin_id']; }else if(isset($_SESSION['id'])){ echo $_SESSION['id']; }?>" name="stu_id" id="stu_id" readonly ><br>
														<input type="text" value="" name="stu_surname" id="stu_surname" placeholder="Enter Your Surname"><br>
														<input type="text" value="" name="stu_fname" id="stu_fname" placeholder="Enter Your FirstName"><br>
														<input type="text" value="" name="stu_lname" id="stu_lname" placeholder="Enter Your LastName"><br>
														<input type="text" value="" name="stu_fullname" id="stu_fullname" placeholder="Enter Your FullName"><br>
														<input type="text" value="" name="stu_mono" id="stu_mono" placeholder="Enter Your Contect Number"><br>
														<input type="text" value="<?php if(isset($_SESSION['admin_email'])){echo $_SESSION['admin_email']; }else if(isset($_SESSION['email'])){ echo $_SESSION['email']; }?>" name="stu_email" id="stu_email" placeholder="Enter Your Email Id"><br>
														<input type="number" value="<?php echo $_GET['course_id'];?>" name="stu_course_id" id="stu_course_id" readonly hidden><br>
														<button class="btn btn-primary mt-2 mb-5" type="submit" id="submit_course_form"><i class="ti-pencil-alt"></i>&nbsp;&nbsp;Update</button>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<script>
				//$('#stu_fullname').attr('disabled', 'disabled');
				var stu_surname = $('#stu_surname').val();
				var stu_fname = $('#stu_fname').val();
				var stu_lname = $('#stu_lname').val();
				var stu_mono = $('#stu_mono').val();
				var stu_email = $('#stu_email').val();
				$('#stu_fullname,#stu_mono,#stu_email').focusin(function(event) {
					$('#stu_fullname').val($('#stu_surname').val() + " " + $('#stu_fname').val() + " " + $('#stu_lname').val());
				});
				$(document).on('click', '#submit_course_form', function(event) {
					event.preventDefault();
					$('#stu_fullname').val($('#stu_surname').val() + " " + $('#stu_fname').val() + " " + $('#stu_lname').val());
						$.ajax({
							url : 'usr_apply_course_data.php',
							type : 'POST',
							data : $('form input').serialize(),
							success : function(data){
								if (data == 1) {
										alert('Your Application Form is Submitted...');
										$('#usr_apply_course_data').trigger('reset');
										$('.detail_box3').fadeOut(0);
			window.location = "paytm_checkout.php?course_price=<?php echo $course_price; ?>&course_id=<?php echo $_GET['course_id']; ?>";
			}else{
			alert('Somthing Went Wrong...');
			}
			}
			});
			});
			</script>
			<?php
			echo "<script>";
			echo "$('#Toggle-Tab-7,.Apply_btn').click(function(){";
				if (!isset($_SESSION['username'])) {
					echo "alert('Please Loggin Our Site Then Afetr You can Apply this Course...');";
					echo "
							$(window).scrollTop(0);
							$('.login-main-content').fadeIn();
						";
				}else if (isset($_SESSION['username'])) {
						$stu_id = $_SESSION['id'];
						$stu_course_id = $_GET['course_id'];
						$selct_sql = "SELECT * FROM `apply_course_student` WHERE id = $stu_id AND course_id = $stu_course_id AND payment = '1'";
						$query = mysqli_query($conn,$selct_sql);
						if (mysqli_num_rows($query) != 0) {
							echo "if(confirm('You Aleready Purchase This Course ,You Want to Show...')){
								window.location = 'my_course.php';
										}";
						}else{
							echo "
									$(window).scrollTop(810);
									$('.detail_box2,.detail_box1').fadeOut(10);
									$('.detail_box3').fadeIn(10);
									$('#Toggle-Tab-7').css('border', '1px solid #ddd');
									$('#Toggle-Tab-5,#Toggle-Tab-6').css('border', 'none');
								";
						}
				}
			echo "});";
			echo "</script>";
			?>
			<script>
				$(document).ready(function() {
							/*	SELECT IMAGE FROM DATABASE */
					load_Usrimage();
					function load_Usrimage(){
						$.ajax({
							url : 'load_usr_img.php',
							type : 'post',
							success : function(data){
								$('#load_usr_img').html(data);
							}
						});
					}
				});
			</script>
		</div>
			<?php include 'footer.php'; ?>
			<script type="text/javascript" src="js/script.js"></script>
			</body>
			
		</html>