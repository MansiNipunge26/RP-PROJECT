<footer>
	<div class="fmain-content">
		<div class="left box">
			<h2>About us</h2>
			<div class="fcontent">
				<?php
					$site_data = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `site_setting`"));
				?>
				<div class="module line-clamp">
					<p><?php echo $site_data['about_us']; ?></p>
				</div>
				<button class="red_mr btn btn-sm py-2 mt-2"><a href="#" class="text-light">Read more</a></button>
				<div class="social">
					<a href=""><span class="ti ti-facebook"></span></a>
					<a href=""><span class="ti ti-twitter"></span></a>
					<a href=""><span class="ti ti-instagram"></span></a>
					<a href=""><span class="ti ti-linkedin"></span></a>
				</div>
			</div>
		</div>
		<div class="center box">
			<h2>Address</h2>
			<div class="fcontent">
				<div class="place">
					<span class="ti ti-location-pin"></span>
					<span class="text"><?php echo $site_data['address']; ?></span>
				</div>
				<div class="fphone">
					<span class="ti ti-mobile"></span>
					<span class="text"><?php echo $site_data['contect_no']; ?></span>
				</div>
				<div class="email">
					<span class="ti ti-email"></span>
					<span class="text"><?php echo $site_data['email']; ?></span>
				</div>
			</div>
		</div>
		<div class="right box">
			<h2>Contact us</h2>
			<div class="fcontent">
				<form action="#" id="f_form">
					<div class="email">
						<div class="text">Email *</div>
						<input type="text" hidden="" id="f_id" value="<?php if(isset($_SESSION['admin_id'])){echo $_SESSION['admin_id']; }else if(isset($_SESSION['id'])){ echo $_SESSION['id']; }?>" readonly>
						<input type="email" id="f_email" placeholder="Enter Your Email" value="<?php if(isset($_SESSION['admin_email'])){echo $_SESSION['admin_email']; }else if(isset($_SESSION['email'])){ echo $_SESSION['email']; }?>" readonly required>
					</div>
					<div class="msg">
						<div class="text">Message *</div>
						<textarea id="msgForm" rows="2" cols="25" placeholder="Enter Feedback" required></textarea>
						<br>
						<div class="btn">
							<button type="submit" id="send_feedback_ft">Send</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</footer>