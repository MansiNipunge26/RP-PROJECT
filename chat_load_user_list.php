<?php
	session_start();
	include 'config.php';
  if (isset($_SESSION['stu_unique_id'])) {if (isset($_SESSION['stu_unique_id'])) {$unique_id = $_SESSION['stu_unique_id'];}else if (isset($_SESSION['admin_unique_id'])) {$unique_id = $_SESSION['admin_unique_id'];}}else if (isset($_SESSION['admin_unique_id'])) {$unique_id = $_SESSION['admin_unique_id'];}
	if (isset($_SESSION['stu_unique_id'])) {$unique_id = $_SESSION['stu_unique_id'];}else if (isset($_SESSION['admin_unique_id'])) {$unique_id = $_SESSION['admin_unique_id'];}
  $query = mysqli_query($conn,"SELECT * FROM `grups` INNER JOIN `grup_member` ON grups.grup_id = grup_member.grup_id WHERE member_id = $unique_id");
  $o_query = mysqli_query($conn,"SELECT * FROM `grup_chat` gc INNER JOIN `login` lg ON gc.sender_id = lg.unique_id ORDER BY msg_id DESC LIMIT 1");
  $outer_msg_query = mysqli_fetch_assoc($o_query);
  while ($grup = mysqli_fetch_assoc($query)) {
    echo '
        <a href="stu_grup_chat_area.php?grup_id='.$grup['grup_id'].'" class="user_list pb-2 mb-3 text-dark d-flex justify-content-between align-items-center">
                  <div class="account_holder_title d-flex align-items-center">
                    <div>
                      <img class="img" src="'.$grup['grup_img'].'" alt="">  
                    </div>
                    <div>
                      <p>'.$grup['grup_name'].'</p>';
                        if (mysqli_num_rows($o_query)) {
                          if ($outer_msg_query['unique_id'] == $unique_id) {
                          echo '<p style="padding-left:13px;white-space:nowrap;overflow:hidden;width:400px;text-overflow:ellipsis;">'."You&nbsp;:&nbsp;".$outer_msg_query['message'].'</p>';  
                        }else{    
                        echo '<p style="padding-left:13px;white-space:nowrap;overflow:hidden;width:400px;text-overflow:ellipsis;">'.$outer_msg_query['username']."&nbsp;:&nbsp;".$outer_msg_query['message'].'</p>';        
                        }  
                      }
                  echo '</div>
                  </div>
                  <div>
                    <span class="fas fa-users" style="color:#25D366;"></span>
                  </div>
                </a>
      ';
  }
	$query = mysqli_query($conn,"SELECT * FROM login WHERE unique_id != $unique_id");
	if (mysqli_num_rows($query) != 0) {
		while ($row = mysqli_fetch_assoc($query)) {
			$outgoing_id = $row['unique_id'];
			$outer_query = mysqli_query($conn,"SELECT * FROM `message` WHERE incoming_id = $outgoing_id AND outgoing_id = $unique_id OR incoming_id = $unique_id AND outgoing_id = $outgoing_id ORDER BY msg_id DESC LIMIT 1");
			$outer_msg = mysqli_fetch_assoc($outer_query);
			echo '
				<a href="stu_chat_area.php?unique_id='.$row['unique_id'].'" class="user_list pb-2 mb-2 text-dark d-flex justify-content-between align-items-center">
                  <div class="account_holder_title d-flex align-items-center">
                    <div>
                      <img class="img" src="'.$row['profile_img'].'" alt="">  
                    </div>
                    <div>
                      <p style="white-space:nowrap;">'.$row['username'].'</p>';

                   //echo '<p>'.$row['unique_id'].'</p>';
                   if (mysqli_num_rows($outer_query) != 0) {
                   		if ($outer_msg['incoming_id'] == $unique_id) {
                   			$outg_id = $outer_msg['outgoing_id'];
                   			$outer_query = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `login` WHERE unique_id = $outg_id"));
                   			//$outer_query['username']
                   			echo '<p style="padding-left:13px;white-space:nowrap;overflow:hidden;width:400px;text-overflow:ellipsis;">'.$outer_query['username']."&nbsp;:&nbsp;".$outer_msg['message'].'</p>';	
                   		}else{
                   			echo '<p style="padding-left:13px;white-space:nowrap;overflow:hidden;width:400px;text-overflow:ellipsis;">You&nbsp;:&nbsp;'.$outer_msg['message'].'</p>';
                   		}
                   		
                   }                        
                   echo ' </div>
                  </div>
                </a>
			';
		}
	}
?>