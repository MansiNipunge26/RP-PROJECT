<!--LOGIN AND REGISTRATION-->
<!--login-->
<div class="login-main-content">
	<div class="login-content d-flex align-items-center justify-content-center">
		<div class="col-lg-5 login-right">
			<h2>Login</h2>
			<p>Don't have an account? Create your account.<br> It's take less then a minutes</p>
			<form action="SignIn.php" method="post">
				<input type="email" placeholder="Email" id="login_email" name="login_email">
				<div id="login_emailcheck"></div>
				<input type="password" placeholder="Password" id="login_password" name="login_password">
				<div id="login_passwordcheck"></div>
				<div class="mt-2">
					<input type="checkbox" class="login_checkbox mr-2">
					<label for="">Remember me ?</label><span id="login_checkbox_check"></span>
				</div>
				<button type="submit" class="login btn btn-danger mt-2 mb-4" name="login">Login</button>
			</form>
			<span id="forget_link">Forget Password ?</span>
			<span>|</span>
			<span id="create_account_link">Create new Account</span>
			<span id="login-close-btn"><i class="ti ti-close"></i></span>
		</div>
		<div class="col-lg-4 col-xl-3 login-left">
			<div class="login-heading">
				<h3>Hello...</h3>
				<p>Don't have an account? Create your account. <br>It's take less then a minutes</p>
				<h5>Login With Social Media...</h5>
				<ul>
					<li><button class="btn-primary"><i class="ti ti-facebook">  </i>Facebook</button></li>
					<li><button class="btn-danger"> <i class="ti ti-google">  </i>Google</button></li>
					<li><button class="btn-info"><i class="ti ti-twitter">  </i>Twitter</button></li>
				</ul>
			</div>
		</div>
	</div>
</div><!--Forget Password-->
<div class="Forget_pass-main-content">
	<div class="login-content d-flex align-items-center justify-content-center">
		<div class="col-lg-5 login-right">
			<h2>Forget Password</h2>
			<p class="mb-0 pb-0">Don't have an account? Create your account.<br> It's take less then a minutes</p>
			<form action="forget_password.php" method="post">
				<input type="email" placeholder="Email" name="fp_email">
				<input type="password" placeholder="New Password" name="fp_password">
				<button type="submit" class="btn btn-danger my-3" name="forget_btn">Upadte</button>
			</form>
			<span id="login_page_link">Are you a already member ? Login</span>
			<span id="forget-close-btn"><i class="ti ti-close"></i></span>
		</div>
		<div class="col-lg-4 col-xl-3 login-left">
			<div class="login-heading">
				<h3>Hello...</h3>
				<p>Don't have an account? Create your account.<br> It's take less then a minutes</p>
				<h5>Login With Social Media...</h5>
				<ul>
					<li><button class="btn-primary"><i class="ti ti-facebook">  </i>Facebook</button></li>
					<li><button class="btn-danger"> <i class="ti ti-google">  </i>Google</button></li>
					<li><button class="btn-info"><i class="ti ti-twitter">  </i>Twitter</button></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!--- Register Form--->
<div class="register-main-content">
	<div class="login-content d-flex align-items-center justify-content-center">
		<div class="col-lg-5 login-right">
			<h2>Create new Account</h2>
			<p class="mb-0 pb-0">Don't have an account? Create your account.<br> It's take less then a minutes</p>
			<form action="index.php" method="post">
				<input type="username" placeholder="Username" id="usernames" name="username">
				<div id="usercheck"></div>
				<input type="email" placeholder="Email" id="email" name="email">
				<div id="emailcheck"></div>
				<input type="password" placeholder="Password" id="password" name="password">
				<div id="passwordcheck"></div>
				<input type="password" placeholder="Confirm Password" id="c_password">
				<div id="c_passwordcheck"></div>
				<div class="mt-2">
					<input type="checkbox" class="checkbox mr-2">
					<label for="">Remember me ?</label><span id="checkbox_check"></span>
				</div>
				<button type="submit" class="register btn btn-danger my-2" name="register">Register</button>
			</form>
			<span id="login_page_link">Are you a already member ? Login</span>
			<span id="register-close-btn"><i class="ti ti-close"></i></span>
		</div>
		<div class="col-lg-4 col-xl-3 login-left">
			<div class="login-heading">
				<h3>Hello...</h3>
				<p>Don't have an account? Create your account.<br> It's take less then a minutes</p>
				<h5>Login With Social Media...</h5>
				<ul>
					<li><button class="btn-primary"><i class="ti ti-facebook">  </i>Facebook</button></li>
					<li><button class="btn-danger"> <i class="ti ti-google">  </i>Google</button></li>
					<li><button class="btn-info"><i class="ti ti-twitter">  </i>Twitter</button></li>
				</ul>
			</div>
		</div>
	</div>
</div>
