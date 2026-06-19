<?php
	session_start();
	include 'config.php';
	 if (isset($_SESSION['stu_unique_id'])) {$id = $_SESSION['stu_unique_id'];}else if (isset($_SESSION['admin_unique_id'])) {$id = $_SESSION['admin_unique_id'];}
	//$result = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `login` WHERE unique_id = $incoming_msg_id"));
	$select_sql = "SELECT * FROM `grup_chat` WHERE grup_id = '".$_POST['grup_id']."' ORDER BY msg_id DESC";
	$query = mysqli_query($conn,$select_sql);
		while ($row = mysqli_fetch_assoc($query)) {
			if($row['sender_id'] == $id){
				echo '
					<div class="incomming_msg d-flex justify-content-end">
	                    <div class="detail">
	                    <span class="d-flex align-self-end justify-content-between">
	                      <span id="sender_name" class="align-self-center mt-3 ml-1" style="font-size:10px;font-weight:lighter;">'.$row['time'].'</span>
	                      <p class="bg-dark mb-2">'.$row['message'].'</p>
	                    </span>
	                    </div>
					</div>
				';
			}else{
				$sender_id = $row['sender_id'];
				$query2 = mysqli_query($conn,"SELECT * FROM `login` WHERE unique_id = $sender_id");

				$result = mysqli_fetch_assoc($query2);
				if (mysqli_num_rows($query) > 0) {
					echo '
					<div class="outgoing_msg d-flex justify-content-start" style="word-wrap: break-word;">
						<div class="detail d-flex">';
				
					echo '<img class="img" src="'.$result['profile_img'].'" style="height:35px;width:35px;border-radius:50%;margin-right:8px;"><p class="mb-2"><span id="sender_name" style="color:#25D366
					;font-size:12px;font-weight:600;white-space:nowrap;">'.$result['username'].'</span><br>
					<span class="d-flex align-items-end justify-content-between">
					<span class="pr-2">'.$row['message'].'</span>
					</span>
					</p><span id="sender_name" class="align-self-center mt-3 ml-1" style="font-size:10px;font-weight:lighter;">'.$row['time'].'</span>';
					echo '
							</div>
						</div>
					';					
					}
			}
		}

?>