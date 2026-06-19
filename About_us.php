<!DOCTYPE html>
<html>
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
			include 'config.php';
			include 'session_check.php';
			include 'RFL.php';
			include 'Header_top.php';
			include 'Navbar.php';
			include 'Header_search.php';
			$query = mysqli_query($conn,"SELECT * FROM `site_setting`");
			$row = mysqli_fetch_assoc($query);
			if (mysqli_num_rows($query)) {
		?>
		<div class="container-fluid about_us">
			<div class="About_main col-xl-11 d-flex mx-auto">
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
					<img src="<?php echo "Admin/".$row['about_img']; ?>" class="img-fluid w-100 h-100" alt="">
				</div>
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
					<div class="heading">
						<h3>WHY <span>CHOOSE US ?...</span></h3>
						<p class="my-3 text-capitalize"><pre><?php echo $row['head_line']; ?></pre></p>
						<div id="line"></div>
						<p class="about_para text-capitalize"><?php echo $row['about_us']; ?></p>							
					</div>
				</div>
			</div>
		</div>
		<?php } include 'footer.php'; ?>
	</body>