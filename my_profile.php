<!DOCTYPE html>
<html lang="en">
<head>
	<title>E Learning</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" >
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/themify-icons.css">
	<link rel="stylesheet" href="css/style.css?v=<?php echo(time()); ?>">
</head>
<body>
	<?php
		include 'session_check.php';
		include 'config.php';
		include 'Header_top.php';
		include 'RFL.php';
		include 'Navbar.php';
		include 'Header_search.php';
		if (!(isset($_SESSION['id'])) && !(isset($_SESSION['admin_id']))) {
			echo "<script>alert('Please Login Our Site...');window.location = 'index.php';</script>";
		}
	?>
	<div class="container-fluid pl-0">
		<div class="row">
			<div class="course_back_img col-xl-12 col-lg-12 col-md-12 col-sm-12">
				<img src="Admin/img/image2.jpg" alt="" class="img-fluid w-100 h-100">
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xl-12 col-sm-12 profile_heading ">
				<div class="profile_navs">
					<nav>
						<ul class="col-xs-12 profile_links d-flex align-items-center justify-content-center ml-0">
							<div class="d-flex sub_nav">
								<li id="my_profile"><i class="ti-user" ></i>&nbsp;&nbsp;My Profile</li>
								<li id="change_password"><i class="ti-key" ></i>&nbsp;&nbsp;Change Password</li>	
							</div>
							<div class="d-flex sub_nav">
								<li id="feedback"><i class="ti-comments" ></i>&nbsp;&nbsp;Feedback</li>
								<li id="my_course"><i class="ti-book" ></i>&nbsp;&nbsp;My Course</li>
							</div>
							<div class="last-child sub_nav">
								<li><i class="ti-shift-right"></i><a href="logout.php">&nbsp;&nbsp;Logout</a></li>
							</div>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid Course_wrapper">
		<div class="container Course_wrapper_child">
			<div class="row">
				<div class="my_profile_main1 col-xl-12 align-items-center justify-content-center col-sm-12">
					<div class="my_profile1 col-xl-3 col-lg-3 col-md-6 col-sm-8" id="profile">
						<!-- <img src="img/Ap3.jpg" alt="" class="img-thumbnail img-fluid"> -->
						<div class="avtar">
							<?php include 'check_user_admin_myprofile.php'; ?>
						</div>
						<div class="profile_detail w-100">
							<h5><?php if(isset($_SESSION['admin_username'])){echo $_SESSION['admin_username']; }else if(isset($_SESSION['username'])){ echo $_SESSION['username']; }?></h5>

							<p>Student Id : <?php if(isset($_SESSION['admin_id'])){echo $_SESSION['admin_id']; }else if(isset($_SESSION['id'])){ echo $_SESSION['id']; }?></p>
							<hr>
							<p>Email Id : <br><?php if(isset($_SESSION['admin_email'])){echo $_SESSION['admin_email']; }else if(isset($_SESSION['email'])){ echo $_SESSION['email']; }?></p>
						</div>
					</div>
					<div class="my_profile2 col-xl-9 col-lg-9 col-md-12 col-sm-12 align-self-start">
						<div class="profile_main_content px-4 m-0">
							<h4><i class="ti-user"></i>&nbsp;&nbsp;My Profile</h4><hr>
							<p><h6>Hello , <?php if(isset($_SESSION['admin_username'])){echo $_SESSION['admin_username']; }else if(isset($_SESSION['username'])){ echo $_SESSION['username']; }?> Your Email id is <?php if(isset($_SESSION['admin_email'])){echo $_SESSION['admin_email']; }else if(isset($_SESSION['email'])){ echo $_SESSION['email']; }?><br><br> And You are Login as <?php if(isset($_SESSION['admin_role'])){echo $_SESSION['admin_role']; }else if(isset($_SESSION['role'])){ echo $_SESSION['role']; }?></h6></p>
						</div>
					</div>
				</div>
				<div class="col-xl-12 col-sm-12 my_profile_main3 align-items-center justify-content-center">
					<div class="my_profile1 col-xl-3 col-lg-3 col-md-6 col-sm-8">
						<div class="avtar">
							<?php include 'check_user_admin_myprofile.php'; ?>
						</div>
						<div class="profile_detail w-100">
							<h5><?php if(isset($_SESSION['admin_username'])){echo $_SESSION['admin_username']; }else if(isset($_SESSION['username'])){ echo $_SESSION['username']; }?></h5>

							<p>Student Id : <?php if(isset($_SESSION['admin_id'])){echo $_SESSION['admin_id']; }else if(isset($_SESSION['id'])){ echo $_SESSION['id']; }?></p>
							<hr>
							<p>Email Id : <br><?php if(isset($_SESSION['admin_email'])){echo $_SESSION['admin_email']; }else if(isset($_SESSION['email'])){ echo $_SESSION['email']; }?></p>
						</div>
					</div>
					<div class="my_profile2 col-xl-9 col-lg-9 col-md-12 col-sm-12 align-self-start">
						<div class="profile_main_content px-4 m-0">
							<div class="feedback_heading">
								<h4>Reset Password</h4>
							</div>
							<div>
								<form action="" id="chg_pass">
									<input type="text" id="chng_email" value="<?php if(isset($_SESSION['admin_id'])){echo $_SESSION['admin_id']; }else if(isset($_SESSION['id'])){ echo $_SESSION['id']; }?>" readonly>
									<input type="password" value="" id="chng_pass" placeholder="Enter New Password">
									<button type="submit" id="chng_password"><i class="ti-pencil-alt"></i>&nbsp;&nbsp;Update</button>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-12 my_profile_main4 align-items-center justify-content-center">
					<div class="my_profile1 col-xl-3 col-lg-3 col-md-6 col-sm-8">
						<div class="avtar">
							<?php include 'check_user_admin_myprofile.php'; ?>
						</div>
						<div class="profile_detail w-100">
							<h5><?php if(isset($_SESSION['admin_username'])){echo $_SESSION['admin_username']; }else if(isset($_SESSION['username'])){ echo $_SESSION['username']; }?></h5>

							<p>Student Id : <?php if(isset($_SESSION['admin_id'])){echo $_SESSION['admin_id']; }else if(isset($_SESSION['id'])){ echo $_SESSION['id']; }?></p>
							<hr>
							<p>Email Id : <br><?php if(isset($_SESSION['admin_email'])){echo $_SESSION['admin_email']; }else if(isset($_SESSION['email'])){ echo $_SESSION['email']; }?></p>
						</div>
					</div>
					<div class="my_profile2 col-xl-9 col-lg-9 col-md-12 col-sm-12 align-self-start">
						<div class="profile_main_content px-4 m-0">
							<div class="feedback_heading">
								<h4>Feedback</h4>
							</div>
							<div>
								<form action="" id="feedback_form">
									<input type="text" id="feedback_id" value="<?php if(isset($_SESSION['admin_id'])){echo $_SESSION['admin_id']; }else if(isset($_SESSION['id'])){ echo $_SESSION['id']; }?>" readonly>
									<input type="text" id="feedback_email" value="<?php if(isset($_SESSION['admin_email'])){echo $_SESSION['admin_email']; }else if(isset($_SESSION['email'])){ echo $_SESSION['email']; }?>" readonly>
									<textarea name="" id="feedback_msg" rows="4" placeholder="Write Your Feedback..."></textarea>
									<button type="submit" id="send_feedback"><i class="ti-share"></i>&nbsp;&nbsp;Send</button>
								</form>
							</div>
						</div>
					</div>
				</div>

				<div class="col-xl-12 my_profile_main2 align-items-center justify-content-center">
					<div class="my_profile1 col-xl-3 col-lg-3 col-md-6 col-sm-8 align-self-start mx-auto">
						<div class="avtar">
							<?php include 'check_user_admin_myprofile.php'; ?>
						</div>
						<div class="profile_detail w-100">
							<h5><?php if(isset($_SESSION['admin_username'])){echo $_SESSION['admin_username']; }else if(isset($_SESSION['username'])){ echo $_SESSION['username']; }?></h5>

							<p>Student Id : <?php if(isset($_SESSION['admin_id'])){echo $_SESSION['admin_id']; }else if(isset($_SESSION['id'])){ echo $_SESSION['id']; }?></p>
							<hr>
							<p>Email Id : <br><?php if(isset($_SESSION['admin_email'])){echo $_SESSION['admin_email']; }else if(isset($_SESSION['email'])){ echo $_SESSION['email']; }?></p>
						</div>
					</div>
					<div class="mx-auto col-xl-9 col-lg-9 col-md-12 col-sm-12 px-0 py-0 align-self-start" style="flex-direction: column;">
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
					<div>
			</div>
		</div>
	</div>
	<?php
		include 'profile_pic.php';
	 ?>
	<?php
		include 'config.php';
		include 'footer.php';
	?>
<script>
$(document).ready(function() {
$(document).on('click', '#chng_password', function(event) {
event.preventDefault();
var chng_email = $('#chng_email').val();
var chng_pass = $('#chng_pass').val();
if (chng_pass.length >7) {
$.ajax({
url	: 'my_profile_chng_pass.php',
type : 'POST',
data : {chng_email:chng_email,chng_pass:chng_pass},
success : function(data){
if (data == 1) {
alert('Your Password Updated...');
$('#chg_pass').trigger('reset');
}
}
});
}else{
alert('Password Must be 8 Or More Than 8 Character... ');
}
});

$(document).on('click', '#send_feedback', function(event) {
event.preventDefault();
var feedback_id = $('#feedback_id').val();
var feedback_email = $('#feedback_email').val();
var feedback_msg = $('#feedback_msg').val();
if (feedback_msg.length != 0) {
$.ajax({
url : 'feedback_send.php',
type : 'POST',
data : {feedback_id:feedback_id,feedback_email:feedback_email,feedback_msg:feedback_msg},
success : function(data){
if (data == 1) {
alert('Thank You For Feedback Us...');
$('#feedback_form').trigger('reset');
}else{
return false;
}

}
});
}else{
alert('You Can not Send Empty Feedback...');
}
});
</script>
	<script type="text/javascript" src="js/script.js"></script>
</body>
</html>
