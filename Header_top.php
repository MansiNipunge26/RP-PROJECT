	<?php
		$site_qry = mysqli_query($conn,"SELECT * FROM `site_setting`"); 
		$site_data = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `site_setting`")); 
	?>
<!--Header toparea-->
	<div class="header-top">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="headertop-wrap d-flex align-items-center justify-content-between">
						<div class="phone" style="">
							<p>
								<?php
									if (mysqli_num_rows($site_qry) > 0) {
									  	echo '<span><i class="ti ti-email"></i><b id="phone">&nbsp;'.$site_data['email'].'</b></span>';
										echo '<span><i class="ti ti-mobile"></i><b id="phone">&nbsp;'.$site_data['contect_no'].'</b></span>';
									}
								 ?>
							</p>
						</div>
						<div class="social-midea mx-0">
							<p>
								<span><b>Follow Us: </b></span>
								<span><i class="ti-facebook"></i></span>
								<span><i class="ti-youtube"></i></span>
								<span><i class="ti-instagram"></i></span>
								<span><i class="ti-twitter-alt"></i></span>
								<span><i class="ti-linkedin"></i></span>
							</p>
						</div>
						<div class="d-flex align-items-center justify-content-end">
							<div class="btn-right-part">
								<span id="signin_signup_btn">
									<button type="button" id="login-btn">Sign In</button>
									<button type="button" id="register-btn">Sign Up</button>
								</span>
							</div>
							<div class="My-Account-id">
								<div class="d-flex">
										<?php
											if (isset($_SESSION['admin_email'])) {
												$email = $_SESSION['admin_email'];	
												$username = $_SESSION['admin_username'];	
											}else if (isset($_SESSION['email'])) {
												$email = $_SESSION['email'];	
												$username = $_SESSION['username'];	
											}
											$sql = "SELECT * FROM `login` WHERE email = '$email'";
											$row = mysqli_fetch_assoc(mysqli_query($conn,$sql));
											if ($row['profile_img'] != "") {
												echo '<img class="img mr-2 mt-1" src="'.$row['profile_img'].'" alt="">';
											}else{
												echo '<img class="img mr-2 mt-1" src="Admin/img/avtar3.png" alt="">';
											}
											echo '
													<a href="my_profile.php">
												    	<span class="mb-1">'.$username.'<i class="ti  ti-angle-double-down "></i></span>
												    </a>
												';
										?>
								</div>
							</div>	
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
