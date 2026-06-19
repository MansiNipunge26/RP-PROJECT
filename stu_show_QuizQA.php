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
			$quiz_id = $_GET['quiz_id'];
			$stu_email = $_SESSION["email"];
			$result = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `quiz_score` WHERE stu_email = '$stu_email' AND quiz_id = $quiz_id"));
			if ($result != 0) {
				echo "<script>
						if(confirm('You Can not Give Quiz Second Time..')){
							window.location = 'stu_all_result.php';
						}else{
							window.location = 'stu_show_quizs.php';
						}
					  </script>	";
			}
		?>
		<div class="container-fluid quiz_content">
			<div class="col-xl-11 mx-auto">
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
							<button class="btn btn-danger btn-sm"><a href="stu_show_Quizs.php" class="text-light"><i class="ti-angle-double-left"></i>  Back</a></button>
						</div>							
					</div>
					<div class="quiz_heading">
						<h4>Java Script</h4>
					</div>
					<div class="col-xl-12 quiz_area h-100">
						<form action="stu_check_QuizQA.php?quiz_id=<?php echo($_GET['quiz_id']);?>" method="post">
							<?php
							include 'config.php';
								$quiz_id = $_GET['quiz_id'];
								$sql = "SELECT * FROM `quiz_que` WHERE quiz_id = $quiz_id LIMIT 1";
								$query = mysqli_query($conn,$sql);
								if (mysqli_num_rows($query)) {
									$row = mysqli_fetch_assoc($query);
									$first_que_count = $row['quation_id'];
									//echo "<h2>".$first_que_count."</h2>";

									$sql = "SELECT * FROM `quiz_que` WHERE quiz_id = $quiz_id ORDER BY quation_id DESC LIMIT 1";
									$query = mysqli_query($conn,$sql);
									$row = mysqli_fetch_assoc($query);
									$last_que_count = $row['quation_id'];
									//echo "<h2>".$last_que_count."</h2>";
									$j = 0;
									for ($i= $first_que_count; $i <= $last_que_count; $i++) { 
										$j = $j + 1;
										$select_sql = "SELECT * FROM `quiz_que` WHERE quation_id = $i";
										$query = mysqli_query($conn,$select_sql);
										while ($row = mysqli_fetch_assoc($query)) {
										?>
										<div class="mt-3 font-weight-bold text-capitalize"><?php echo $j.". ".$row['quation_text']; ?></div>
										<?php
										}
										$select_sql = "SELECT * FROM `quiz_ans` WHERE aquation_id = $i";
										$query = mysqli_query($conn,$select_sql);
										while ($row = mysqli_fetch_assoc($query)) {
										?>
										<div class="my-2 text-capitalize">
											<div><input type="radio" id="selected_choice" class="mr-1" value="<?php echo $row['ans_id']; ?>" name="quizcheck['<?php echo($i);?>']">
											<?php echo $row['ans_text']; ?></div>
										</div>
										<?php
										}
									}	
									echo '
											<div class="submit_btn d-flex justify-content-center">
												<button class="btn py-2 px-3 my-5" style="background:#E66030;color:#fff; border-radius:0;" id="send_result" name="send_result" type="submit"><i class="ti-upload"></i>&nbsp; Submit</button>					
											</div>
										';
								}else{
									echo "<h3>Oops ! No Data Found..</h3>";
								}
							?>
						</form>
					</div>	
				</div>
			</div>				
			</div>
		</div>
		<?php
			$row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `quiz_description` WHERE qid = $quiz_id"));
			//echo "<script>alert(".$row['end_time'].")</script>";
			$quiz_time = $row['end_time'];
			$timer = $quiz_time*60000;
			//echo "<script>alert(".$quiz_time.")</script>";
			echo '
					<script>
			    		$(document).ready(function(){
			    			setTimeout(function(){
			    				$("#send_result").trigger("click");},'.$timer.');
			    		});
			    	</script>
				';
		?>
		<?php include 'footer.php'; ?>
		<script type="text/javascript" src="js/script.js"></script>
	</body>
</html>
