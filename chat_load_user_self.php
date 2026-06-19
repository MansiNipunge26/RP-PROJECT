<?php
	session_start();
	include 'config.php';
	if (isset($_SESSION['stu_unique_id'])) {$unique_id = $_SESSION['stu_unique_id'];}else if (isset($_SESSION['admin_unique_id'])) {$unique_id = $_SESSION['admin_unique_id'];}
	$query = mysqli_query($conn,"SELECT * FROM `login` WHERE unique_id = $unique_id");
	if (mysqli_num_rows($query) != 0) {
		$row = mysqli_fetch_assoc($query);
		echo '
				<div class="account_holder_title text-dark d-flex align-items-center justify-content-between" id="load_ac_self">
				<div class="d-flex">
					<div>
	                  <img class="img" src="'.$row['profile_img'].'" alt="">  
	                </div>
	                <div>
	                  <p>'.$row['username'].'</p>
	                  <p>'.$row['chat_status'].'</p>                        
	                </div>
				</div>
				<div class="d-flex justify-content-end"><a href="chat_grup.php"><span class="fas fa-users" style="color:#25D366;"></span><span class="fas fa-plus-circle" style="color:#25D366;font-size:14px;padding-left:2px;"></span></a></div>
				</div>
				
			';
	}

?>