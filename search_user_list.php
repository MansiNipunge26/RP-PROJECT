<?php
	session_start();
	include 'config.php';
	if (isset($_SESSION['stu_unique_id'])) {
		$unique_id = $_SESSION['stu_unique_id'];
	}else if (isset($_SESSION['admin_unique_id'])) {
		$unique_id = $_SESSION['admin_unique_id'];
	}
	
	$search_user = $_POST['search_user'];
		$query = mysqli_query($conn,"SELECT * FROM login WHERE unique_id != $unique_id AND username LIKE '%{$search_user}%'");
		while ($row = mysqli_fetch_assoc($query)) {
			echo '
				<a href="stu_chat_area.php?unique_id='.$row['unique_id'].'" class="user_list pb-2 mb-2 text-dark d-flex justify-content-between align-items-center">
	                  <div class="account_holder_title d-flex align-items-center">
	                    <div>
	                      <img class="img" src="Admin/'.$row['profile_img'].'" alt="">  
	                    </div>
	                    <div>
	                      <p style="white-space:nowrap;">'.$row['username'].'</p>
	                    </div>
	                  </div>
	            </a>';	
		}

?>