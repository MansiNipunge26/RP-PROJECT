<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" >
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
		if (!(isset($_SESSION['id'])) && !(isset($_SESSION['admin_id']))) {
			echo "<script>alert('Please Login Our Site...');window.location = 'index.php';</script>";
		}
	?>
	<div class="container-fluid pl-0">
		<div class="row"><!-- 
			 -->
			<div class="col-xl-12 py-0 d-flex">
				<div class="w_slide_navs  pl-0">
					<div><button class="close_slide_btn float-right btn btn-sm"><span class="ti-arrow-left"></span></button></div>
					<div class="load_lesson_list"></div>
				</div>
				<div class="w_slide_content_are mt-0">
					<button class="slide_menu_btn"><span class="ti-arrow-right"></span></button>
					<div class="d-flex align-items-center justify-content-between mb-2">
						<div id="breadcrumbs">
							<ul>
								<li><a href="index.php"><i class="ti-home"></i>  Home</a></li>
								<li>/</li>
								<li>Watch Lessons</li>
							</ul>
						</div>
						<div id="back-button">
							<button class="btn btn-danger btn-sm"><a href="my_course.php" class="text-light"><i class="ti-angle-double-left"></i>  Back</a></button>
						</div>
					</div>
					<div class="w_video_content w_default_video">
						<div class="lesson_detail mt-2">
							<?php
								$course_id = $_GET['course_id'];
								$select_sql = "SELECT * FROM `course_lessons` WHERE course_id = $course_id ORDER BY lesson_id";
								$query = mysqli_query($conn,$select_sql);
								$row = mysqli_fetch_assoc($query);
								if (mysqli_num_rows($query) > 0) {
									echo '
										<div class="col-xl-12 mb-3 lesson_title">
											<h4>'.$row['lesson_title'].'</h4>
										</div>
										<div class="col-xl-12 px-0 mx-auto">
											<iframe src="Admin/'.$row['lesson_video_link'].'" class="mx-auto w-100" height="500" frameborder="0"></iframe>	
										</div>
										<p class="lesson_description my-2 ml-0">'.$row['lesson_desc'].'</p>	
										<hr>
									';
								}else{
									echo "<h4>Oops ! Data Not Fount...</h4>";
								}
							?>	
						</div>
					</div>
					<div class="w_video_content">
						<div class="lesson_detail mt-2">
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
		$('.slide_menu_btn').click(function(event) {
			$('.w_slide_navs').fadeIn();
		});
		$('.close_slide_btn').click(function(event) {
			$('.w_slide_navs').fadeOut();
		});
		$(document).ready(function() {
			load_lesson_list();
			function load_lesson_list(){
				$.ajax({
					url : 'load_lesson_list.php?course_id=<?php echo($_GET['course_id']); ?>',
					type : 'POST',
					success : function(data){
						$('.load_lesson_list').html(data);
					}
				});
			}
			$(document).on('click', '.lesson_link', function(event) {
				event.preventDefault();
				var id = $(this).data('lesson_link');
				$.ajax({
					url : "load_lesson_video.php",
					type : "POST",
					data : {id:id},
					success : function(data){
						$('.lesson_detail').html(data);
						$('.w_default_video').trigger('remove');
					}

				});

			});
		});
	</script>
	<?php include 'footer.php'; ?>
	<script type="text/javascript" src="js/script.js"></script>
</body>
</html>
