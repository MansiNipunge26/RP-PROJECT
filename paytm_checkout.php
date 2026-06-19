<!DOCTYPE html>
<html lang="en">
	<head>
		<title>E Learning</title>
		<meta charset="utf-8">
		<meta name="GENERATOR" content="Evrsoft First Page">
		<meta name="viewport" content="width=device-width, initial-scale=1" >
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="css/themify-icons.css">
		<link rel="stylesheet" href="css/style.css?v=<?php echo(time()); ?>">
</head>
<body>
<?php
	include 'session_check.php';
	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");
	if (!(isset($_SESSION['id'])) && !(isset($_SESSION['admin_id']))) {
		echo "<script>alert('Please Login Our Site...');window.location = 'index.php';</script>";
	}
	include 'config.php';
	include 'Header_top.php';
	include 'RFL.php';
	include 'Navbar.php';
	include 'Header_search.php';
	include 'config.php';
	
	
	$course_id = $_GET['course_id'];
	$sql = "SELECT * FROM `coursedetail` WHERE course_id = $course_id";
	$row = mysqli_fetch_assoc(mysqli_query($conn,$sql));
	$course_price = $row['course_amrp'];
	$stu_id = $_SESSION['id'];
	$stu_username = $_SESSION['username'];
	$stu_email = $_SESSION['email'];
?>
	<div class="container-fluid quiz_content">
		<div class="row">
			<div class="col-xl-12 quiz_main_content">
				<div class="d-flex justify-content-between">
					<div id="breadcrumbs">
						<ul>
							<li><a href="index.php"><i class="ti-home"></i>  Home</a></li>
							<li>/</li>
							<li>Add Quiz</li>
						</ul>
					</div>
					<div id="back-button">
						<button class="btn btn-danger btn-sm"><a href="AP-Dashbord.php" class="text-light"><i class="ti-angle-double-left"></i>  Back</a></button>
					</div>							
				</div>
				<div class="col-xl-10 mx-auto quiz_heading">
					<h4>Check Out</h4>
				</div>
				<div class="col-xl-12">
					<div class="col-xl-6 bg-light mx-auto">
						<form method="post" action="PaytmKit/pgRedirect.php?course_id=<?php echo($course_id);?>" id="checkout_form">
							<input type="text" name="stu_id" value="<?php echo($stu_id) ?>" hidden>
							<input type="text" name="stu_username" value="<?php echo($stu_username) ?>" hidden>
							<input type="text" name="stu_email" value="<?php echo($stu_email) ?>" hidden>
							<p>ORDER ID</p>
							<input id="ORDER_ID" tabindex="1" maxlength="20" size="20"
						name="ORDER_ID" autocomplete="off"
						value="<?php echo  "ORDS" . rand(10000,99999999)?>">
							<p>Costmer Id</p>
							<input id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="CUST001">
							<p>Industry Type Id</p>
							<input id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail">
							<p>Chanel</p>
							<input id="CHANNEL_ID" tabindex="4" maxlength="12"
						size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
							<p>Txn Amoount</p>
							<input title="TXN_AMOUNT" tabindex="10"
						type="text" name="TXN_AMOUNT"
						value="<?php echo($course_price);?>">
						<input value="CheckOut" class="btn btn-info btn-sm mt-3" type="submit"	onclick="">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="js/script.js"></script>
</body>
<html>
