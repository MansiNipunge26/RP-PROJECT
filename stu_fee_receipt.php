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
								if (isset($_SESSION['admin_id'])) {
									$stu_id = $_SESSION['admin_id'];
								}else if (isset($_SESSION['id'])) {
									$stu_id = $_SESSION['id'];
								}
								$select_sql = "SELECT * FROM `fee_recipe` WHERE stu_id = $stu_id ORDER BY id DESC";
								$query = mysqli_query($conn,$select_sql);
								$table_content = "";
								if (mysqli_num_rows($query) > 0) {
									$table_content.="
												<table class='table table-hover mt-3'>
													<tr>
														<th>StuId</th>
														<th>ORDERID</th>
														<th>TXNID</th>
														<th>TXNAMO.</th>
														<th>PAYMENT<br>MODE</th>
														<th>CURRENCY</th>
														<th>TXNDATE</th>
														<th>STATUS</th>
														<th>BNKTXNID</th>
														<th>BNK</th>
													</tr>
													";
									while ($row = mysqli_fetch_assoc($query)) {
										$table_content.= '<tr>
															  <td>'.$row['stu_id'].'</td>
															  <td>'.$row['order_id'].'</td>
															  <td>'.$row['txnid'].'</td>
															  <td>'.$row['txnamount'].'</td>
															  <td>'.$row['payment_mode'].'</td>
															  <td>'.$row['currency'].'</td>
															  <td>'.$row['txn_date'].'</td>
															  <td>'.$row['status'].'</td>
															  <td>'.$row['banktxnid'].'</td>
															  <td>'.$row['bankname'].'</td>
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
