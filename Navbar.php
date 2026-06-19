	<!--Navigation_Bar Start-->
	<div class="container-fluid">
		<div class="row">
			<div class="navbar d-flex align-self-center justify-content-around">
				<div class="logo">
					<?php include 'config.php'; $site_data = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `site_setting`")); 
						echo '<a href="index.php"><img src="Admin/'.$site_data['site_logo'].'" height="60px" width="200px" alt=""></a>';
					?>
					
				</div>
				<div class="nav">
					<nav>
						<ul class="nav-links text-center">
							<li><a href="index.php">Home</a></li>
							<?php
								
								if (isset($_SESSION['admin_email'])) {
									echo '<li><a href="Admin/AP-Dashbord.php">Dashbord</a></li>';
								}
								$site_data = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `site_setting`"));
							?>
							<li id="Mega-Link"><a>All Page</a><i class="ti ti-angle-double-down"></i></li>
							<li><a href="All_course.php">All Course</a></li>
							<li><a href="stu_chat.php">Chat</a></li>
							<li><a href="stu_show_quizs.php">Quiz</a></li>
							<li><a href="About_us.php">About Us</a></li>
							<li><a id="feedback_link">Contect us</a></li>
							<div class="Menu-Icon">
								<div></div>
								<div></div>
								<div></div>
							</div>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>
	<div class="Mega-Box container pb-2" style="z-index: 900; top: 120px;">
		<div class="row">
					<h5 class="col-xl-7 ml-5 pl-1 float-right text-center text-dark mt-2 ml-4">All Pages</h5>
			<div class="mega-menu col-xl-12 d-flex align-items-center my-0">
				<div class="col-md-3">
					<div class="part">
						<img src="Admin/img/mega.jpg" height="140px" width="200px" class="img-fluid mb-2 mx-auto" alt="">
						<span class="mega-span">education master</span>
						<button class="btn btn-sm btn-primary ml-4"><a href="About_us.php" class="text-light">Read more</a></button>
					</div>
				</div>
				<div class="col-md-3">
					<div class="part py-0">
						<ul class="my-0 py-0">
							<li><i class="ti-angle-right"></i><a href="index.php">Home</a></li>
							<li><i class="ti-angle-right"></i><a href="About_us.php">About Us</a></li>
							<li><i class="ti-angle-right"></i><a href="my_course.php">My Courses</a></li>
							<li><i class="ti-angle-right"></i><a href="my_profile.php">My Profile</a></li>
							<?php if (isset($_SESSION['admin_email'])) {
									echo '
										<h5 class="text-dark mt-2 mb-1">Admin Panel</h5>
										<li><i class="ti  ti-angle-right "></i><a href="Admin/AP-Dashbord.php">Dashbord</a></li>
										<li><i class="ti  ti-angle-right "></i><a href="Admin/Ap_site_setting.php">Site Setting</a></li>
										<li><i class="ti  ti-angle-right "></i><a href="Admin/Ap_slider_setting.php">Slider Setting</a></li>
										<li><i class="ti  ti-angle-right "></i><a href="Admin/Ap_all_student.php">Loggedin Users</a></li>
										<li><i class="ti  ti-angle-right "></i><a href="Admin/Ap_login_user.php">All Students</a></li>
										<li><i class="ti  ti-angle-right "></i><a href="Admin/Ap_show_all_course.php">All Courses</a></li>
									';
							} ?>
							
							
						</ul>
					</div>
				</div>
				<div class="col-md-3">
					<div class="part">
						<ul class="my-0 py-0">
							<li><i class="ti-angle-right"></i><a href="stu_chat.php">Chat</a></li>
							<li><i class="ti-angle-right"></i><a href="All_Course.php">All Course</a></li>
							<li><i class="ti-angle-right"></i><a href="stu_show_Quizs.php">Quiz</a></li>
							<li><i class="ti-angle-right"></i><a href="stu_all_result.php">Student Result</a></li>
							<?php if (isset($_SESSION['admin_email'])) {
									echo '
										<h5 class="text-dark mt-2 mb-1">Admin Panel</h5>
										<li><i class="ti  ti-angle-right "></i><a href="Admin/Ap-Add-Course.php">Add Courses</a></li>
										<li><i class="ti  ti-angle-right "></i><a href="Admin/Ap_Edit_Course.php">Edit Courses</a></li>
										<li><i class="ti  ti-angle-right "></i><a href="Admin/Ap_add_search_lesson.php">Add Course Lessons</a></li>
										<li><i class="ti  ti-angle-right "></i><a href="Admin/Ap_add_search_lesson.php">Edit Course Lessons</a></li>
										<li><i class="ti  ti-angle-right "></i><a href="Admin/Ap_all_quiz.php">All Quiz</a></li>
										<li><i class="ti  ti-angle-right "></i><a href="Admin/Ap_add_quiz.php">Add Quiz</a></li>
									';
							} ?>
						</ul>
					</div>
				</div>
				<div class="col-md-3">
					<div class="part">
						<ul class="my-0 py-0">
							<li><i class="ti-angle-right"></i><a href="my_profile.php">Change Profile</a></li>
							<li><i class="ti-angle-right"></i><a href="my_course.php">Watch Lessons</a></li>
							<li><i class="ti-angle-right"></i><a href="my_profile.php">Feedback</a></li>
							<li><i class="ti-angle-right"></i><a href="stu_fee_receipt.php">Student Fee Receipt</a></li>
							<?php if (isset($_SESSION['admin_email'])) {
									echo '
										<h5 class="text-dark mt-2 mb-1">Admin Panel</h5>
										<li><i class="ti  ti-angle-right "></i><a href="Admin/Ap_all_quiz.php">Activate Quiz</a></li>
										<li><i class="ti  ti-angle-right "></i><a href="Admin/Ap_quiz_result.php">Quiz Result</a></li>
										<li><i class="ti  ti-angle-right "></i><a href="Admin/Ap_fee_recipe.php">Fee Receipt</a></li>
										<li><i class="ti  ti-angle-right "></i><a href="Admin/Ap_check_fee_recipe.php">Check Fee Receipt</a></li>
										<li><i class="ti  ti-angle-right "></i><a href="Admin/Ap_show_feedback.php">Feedback</a></li>
										<li><i class="ti  ti-angle-right "></i><a href="Admin/Ap_show_review.php">Review</a></li>
									';
							} ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--  For Mobile Screen Side Part Start .Mobile-Nav .Nav-List .Mobile-Navlinks-->
	<div class="Mobile-Nav">
		<div class="Nav-List">
			<div class="Close-Icon">
				<div></div>
				<div></div>
			</div>
			<div class="Mobile-Navlinks">
				<ul>
					<h5>Sign In/Sign Up</h5>
					<a id="login-btn"><li><i class="ti  ti-angle-right "></i>Sign In</li></a>
					<a id="register-btn"><li><i class="ti  ti-angle-right "></i>Sign Un</li></a>
					<a href="logout.php"><li><i class="ti-angle-right"></i>Logout</li></a>
				</ul>
			</div>
			<?php if (isset($_SESSION['admin_email'])) {
			?>
				<div class="Mobile-Navlinks">
					<ul>
						<h5>Admin Panel</h5>
						<a href="index.php"><li><i class="ti  ti-angle-right "></i>Home</li></a>
						<a href="my_profile.php"><li><i class="ti  ti-angle-right "></i>My Profile</li></a>
						<a href="Admin/AP-Dashbord.php"><li><i class="ti  ti-angle-right "></i>Dashbord</li></a>
						<a href="Admin/Ap_site_setting.php"><li><i class="ti  ti-angle-right "></i>Site Setting</li></a>
						<a href="Admin/Ap_slider_setting.php"><li><i class="ti  ti-angle-right "></i>Slider Setting</li></a>
						<a href="Admin/Ap_all_student.php"><li><i class="ti  ti-angle-right "></i>Loggedin Users</li></a>
						<a href="Admin/Ap_login_user.php"><li><i class="ti  ti-angle-right "></i>All Students</li></a>
						<a href="Admin/Ap_show_all_course.php"><li><i class="ti  ti-angle-right "></i>All Courses</li></a>
						<a href="Admin/Ap-Add-Course.php"><li><i class="ti  ti-angle-right "></i>Add Courses</li></a>
						<a href="Admin/Ap_Edit_Course.php"><li><i class="ti  ti-angle-right "></i>Edit Courses</li></a>
						<a href="Admin/Ap_add_search_lesson.php"><li><i class="ti  ti-angle-right "></i>Add Course Lessons</li></a>
						<a href="Admin/Ap_add_search_lesson.php"><li><i class="ti  ti-angle-right "></i>Edit Course Lessons</li></a>
						<a href="Admin/Ap_all_quiz.php"><li><i class="ti  ti-angle-right "></i>All Quiz</li></a>
						<a href="Admin/Ap_add_quiz.php"><li><i class="ti  ti-angle-right "></i>Add Quiz</li></a>
						<a href="Admin/Ap_all_quiz.php"><li><i class="ti  ti-angle-right "></i>Activate Quiz</li></a>
						<a href="Admin/Ap_quiz_result.php"><li><i class="ti  ti-angle-right "></i>Quiz Result</li></a>
						<a href="Admin/Ap_fee_recipe.php"><li>Fee Receipt</li></a>
						<a href="Admin/Ap_check_fee_recipe.php"><li>Check Fee Receipt</li></a>
						<a href="Admin/Ap_show_feedback.php"><li><i class="ti  ti-angle-right "></i>Feedback</li></a>
						<a href="Admin/Ap_show_review.php"><li><i class="ti  ti-angle-right "></i>Review</li></a>

					</ul>
				</div>
			<?php
			} ?>
			<div class="Mobile-Navlinks">
				<ul>
					<h5>All Pages</h5>
					<a href="index.php"><li><i class="ti-angle-right"></i>Home</li></a>
					<a href="About_us.php"><li><i class="ti-angle-right"></i>About Us</li></a>
					<a href="stu_chat.php"><li><i class="ti-angle-right"></i>Chat</li></a>
					<a href="my_profile.php"><li><i class="ti-angle-right"></i>My Profile</li></a>
					<a href="All_Course.php"><li><i class="ti-angle-right"></i>All Course</li></a>
					<a href="stu_show_Quizs.php"><li><i class="ti-angle-right"></i>Quiz</li></a>
					<a href="stu_all_result.php"><li><i class="ti-angle-right"></i>Student Result</li></a>
					<a href="my_profile.php"><li><i class="ti-angle-right"></i>Change Profile</li></a>
					<a id="rate_us"><li><i class="ti-angle-right"></i>Rate Us</li></a>
					<a href="my_profile.php"><li><i class="ti-angle-right"></i>Feedback</li></a>
					<a id="show_review"><li><i class="ti-angle-right"></i>Show Review</li></a>
				</ul>
			</div>
		</div>
	</div>
	<!--Navigation_Bar End-->
	