<?php 	
		include 'session_check.php';
		if (!(isset($_SESSION['id'])) && !(isset($_SESSION['admin_id']))) {
			echo "<script>alert('Please Login Our Site...');window.location = 'index.php';</script>";
		}
		//echo '<script>alert('.$_SESSION['email'].');</script>';
		// header("Pragma: no-cache");
		// header("Cache-Control: no-cache");
		// header("Expires: 0");
		
		$stu_id = $_GET['si'];
		$_SESSION['id'] = $stu_id;
		$stu_data = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `login` WHERE id = $stu_id"));
		$stu_username = $stu_data['username'];
		$_SESSION['username'] = $stu_username;
		$stu_email = $stu_data['email'];
		$_SESSION['email'] = $stu_email;
		if (isset($_SESSION['id'])) {
			include 'Header_top.php';	
		}
		
		include 'Navbar.php';
		include 'Header_search.php';
		include 'config.php';
		if (isset($_POST) && count($_POST)>0 ){
		echo "";}
 ?>
<!DOCTYPE html>
<html lang="en">
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
		<link rel="stylesheet" href="css/style.css?v=<?php echo(time()); ?>">
	<title>Document</title>
</head>
<body>
	
</body>
</html>
<?php

// following files need to be included
require_once("PaytmKit/lib/config_paytm.php");
require_once("PaytmKit/lib/encdec_paytm.php");
$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application’s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.

//echo "<script>alert(".$_POST['ORDERID'].");</<script>?";
if($isValidChecksum == "TRUE") {
	echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		echo "<b>Transaction status is success</b>" . "<br/>";
		$course_id = $_GET['course_id'];
		$update_sql = "UPDATE `apply_course_student` SET `payment`= '1' WHERE id = $stu_id AND course_id = $course_id";
		$query = mysqli_query($conn,$update_sql);
		if ($query) {
			
		} else{
			echo "query is wrong";
		}
		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
	}
	else {
		echo "<b>Transaction status is failure</b>" . "<br/>";
	}

	if (isset($_POST) && count($_POST)>0 )
	{ 
		$ORDERID = $_POST['ORDERID'];
		$TXNID = $_POST['TXNID'];
		$TXNAMOUNT = $_POST['TXNAMOUNT'];
		$PAYMENTMODE = $_POST['PAYMENTMODE'];
		$CURRENCY = $_POST['CURRENCY'];
		$TXNDATE = $_POST['TXNDATE'];
		$STATUS = $_POST['STATUS'];
		$RESPMSG = $_POST['RESPMSG'];
		$GATEWAYNAME = $_POST['GATEWAYNAME'];
		$BANKTXNID = $_POST['BANKTXNID'];
		$BANKNAME = $_POST['BANKNAME'];
		// foreach($_POST as $paramName => $paramValue) {
		// 		echo "<br/>" . $paramName . " = " . $paramValue;
		// }
		echo '<div class="container-fluid quiz_content">
				<div class="row">
					<div class="col-xl-12 pb-0 quiz_main_content">
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
						<div class="quiz_heading">
							<h4>Add Quiz</h4>
						</div>
					</div>
				</div>
				<div class="fee_div mt-0">
					<h4 class="text-secondary text-center mb-4">STUDENT REPORT</h4>	
					<table class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mx-auto table table-bordered">
					    <tbody>
					    	<tr>
					    		<td><strong>STUDENT ID</strong></td>
					    		<td>'.$stu_id.'</td>
					    	</tr>
					    	<tr>
					    		<td><strong>STUDENT NAME</strong></td>
					    		<td>'.$stu_username.'</td>
					    	</tr>
					    	<tr>
					    		<td><strong>STUDENT EMAIL ID</strong></td>
					    		<td>'.$stu_email.'</td>
					    	</tr>
					    	<tr>
					    		<td><strong>ORDER ID</strong></td>
					    		<td>'.$ORDERID.'</td>
					    	</tr>
					    	<tr>
					    		<td><strong>TXN ID</strong></td>
					    		<td>'.$TXNID.'</td>
					    	</tr>
					    	<tr>
					    		<td><strong>TXN AMOUNT</strong></td>
					    		<td>'.$TXNAMOUNT.'</td>
					    	</tr>
					    	<tr>
					    		<td><strong>PAYMENT MODE</strong></td>
					    		<td>'.$PAYMENTMODE.'</td>
					    	</tr>
					    	<tr>
					    		<td><strong>CURRENCY</strong></td>
					    		<td>'.$CURRENCY.'</td>
					    	</tr>
					    	<tr>
					    		<td><strong>TXN DATE</strong></td>
					    		<td>'.$TXNDATE.'</td>
					    	</tr>
					    	<tr>
					    		<td><strong>STATUS</strong></td>
					    		<td>'.$STATUS.'</td>
					    	</tr>
					    	<tr>
					    		<td><strong>RESPMSG</strong></td>
					    		<td>'.$RESPMSG.'</td>
					    	</tr>
					    	<tr>
					    		<td><strong>GATEWAY NAME</strong></td>
					    		<td>'.$GATEWAYNAME.'</td>
					    	</tr>
					    	<tr>
					    		<td><strong>BANKTXN ID</strong></td>
					    		<td>'.$BANKTXNID.'</td>
					    	</tr>
					    	<tr>
					    		<td><strong>BANK NAME</strong></td>
					    		<td>'.$BANKNAME.'</td>
					    	</tr>';
					    	if ($STATUS = "TXN_SUCCESS") {
					    		echo '
					    			<tr>
							    		<td><strong>CHECK COURSE</strong></td>
							    		<td><button class="btn btn-danger btn-sm py-1 px-3 my-3"><a href="my_course.php" class="text-light">CHECK COURSE</a></button></td>
							    	</tr>
					    		';
					    	}
					   echo '</tbody>
					</table>
				</div>
			</div>
		';
		$order_query = "INSERT INTO `fee_recipe`(`id`, `stu_id`, `stu_email`, `order_id`, `txnid`, `txnamount`, `payment_mode`, `currency`, `txn_date`, `status`, `respmsg`, `gatewayname`, `banktxnid`, `bankname`) VALUES (NULL,$stu_id,'$stu_email','$ORDERID','$TXNID' ,'$TXNAMOUNT', '$PAYMENTMODE', '$CURRENCY','$TXNDATE', '$STATUS', '$RESPMSG' ,'$GATEWAYNAME' ,'$BANKTXNID' ,'$BANKNAME')";
		$query = mysqli_query($conn,$order_query);
		if ($query) {
			return true;
		}else{
			echo "somethi are wrong";
		}
	}
}
else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}

?>