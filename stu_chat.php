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
		<link rel="stylesheet" href="css/Chat_style.css?v=<?php echo(time()); ?>">
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
			<div class="container-fluid chat_content">
				<div class="row">
					<div class="col-xl-12 px-0 chat_main_content">
						<div class="col-xl-10 mx-auto d-flex justify-content-between">
							<div id="breadcrumbs">
								<ul>
									<li><a href="index.php"><i class="ti-home"></i>  Home</a></li>
									<li>/</li>
									<li>Chat</li>
								</ul>
							</div>
							<div id="back-button">
								<button class="btn btn-danger btn-sm"><a href="index.php" class="text-light"><i class="ti-angle-double-left"></i>  Back</a></button>
							</div>
						</div>
						<!-- CHAT AREA START -->
						<div class="col-xl-12 d-flex align-self-center justify-content-center">
							<div class="col-xl-5 col-lg-5 col-md-8 col-sm-12 col-xs-12 users_wrapper mt-1 px-0">
								<div class="account_main align-items-center px-4">
								</div>
								<script>
								loadUserself();
								function loadUserself(){
								$.ajax({
								url : 'chat_load_user_self.php',
								type : 'POST',
								success : function(data){
								//loadUserself();
								$('.account_main').html(data);
								}
								});
								}
								loadUserlist();
								function loadUserlist(){
								$.ajax({
								url : 'chat_load_user_list.php',
								type : 'POST',
								success : function(data){
								$('.user_list_main').html(data);
								}
								});
								}
								$(document).on('keyup', '#search_user', function(event) {
									event.preventDefault();
									var search_user = $('#search_user').val();
									$.ajax({
									url : 'search_user_list.php',
									type : 'POST',
									data : {search_user:search_user},
									success : function(data){
									$('.user_list_main').html(data);
									}
									});
								});
								</script>
								<div class="search_area">
									<input type="text" id="search_user" placeholder="Search User..." autocomplete="off">
								</div>
								<div class="user_list_main px-4">
								</div>
							</div>
							<!-- CHAT AREA END -->
						</div>
					</div>
				</div>
			</div>
			<?php include 'footer.php'; ?>
			<script type="text/javascript" src="js/script.js"></script>
		</body>
	</html>