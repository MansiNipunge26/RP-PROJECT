<?php
	include 'config.php';
	$incoming_msg_id = $_POST['incoming_msg_id'];//43
	$outgoing_msg_id = $_POST['outgoing_msg_id'];//42
	$result = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `login` WHERE unique_id = $incoming_msg_id"));
	$select_sql = "SELECT * FROM `message` WHERE incoming_id = '$outgoing_msg_id' AND outgoing_id = '$incoming_msg_id' OR incoming_id = '$incoming_msg_id' AND outgoing_id = '$outgoing_msg_id' ORDER BY msg_id DESC";
	$query = mysqli_query($conn,$select_sql);
		while ($row = mysqli_fetch_assoc($query)) {
			if($row['outgoing_id'] == $outgoing_msg_id){
				echo '
					<div class="incomming_msg d-flex justify-content-end">
	                    <div class="detail">
	                      <span class="d-flex align-self-end justify-content-between">
	                      	<span id="sender_name" class="align-self-center mt-3 ml-1" style="font-size:10px;font-weight:lighter;">'.$row['time'].'</span>
	                      	<p class="bg-dark">'.$row['message'].'</p>
	                      </span>
	                    </div>
					</div>
				';
			}else{
				echo '
					<div class="outgoing_msg d-flex justify-content-start" style="word-wrap: break-word;">
						<div class="detail d-flex">';
				echo '<img class="img" src="'.$result['profile_img'].'" style="height:35px;width:35px;border-radius:50%;margin-right:8px;">
				<span class="d-flex align-self-end justify-content-between">
	              	<p>'.$row['message'].'</p>
	              	<span id="sender_name" class="align-self-center mt-3 ml-1" style="font-size:10px;font-weight:lighter;">'.$row['time'].'</span>
	              </span>';
				echo '
						</div>
					</div>
				';
			}
		}

?>