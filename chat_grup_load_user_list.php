<?php
	session_start();
	include 'config.php';
	if (isset($_SESSION['stu_unique_id'])) {$unique_id = $_SESSION['stu_unique_id'];}else if (isset($_SESSION['admin_unique_id'])) {$unique_id = $_SESSION['admin_unique_id'];}
	$query = mysqli_query($conn,"SELECT * FROM login WHERE unique_id != $unique_id");
	if (mysqli_num_rows($query) != 0) {
    echo '<form action="chk123.php" method="post" id="grup_info" enctype="multipart/form-data">
      <div class="d-flex align-items-center mb-3">
                <div>
                  <label for="grupe_img" class="grupe_img btn btn-dark"><span class="fas fa-camera"></span></label>
                </div>

      <input id="grup_name" name="grup_name" type="text" placeholder="Typing grup subject here..."> 

      <input type="file" id="grupe_img" name="grup_img" hidden>        

              </div>
      <div class="d-flex justify-content-center align-items-center">
        
      </div>
      ';
		while ($row = mysqli_fetch_assoc($query)) {
			echo '
				<label class="user_list pb-2 mb-2 text-dark d-flex justify-content-between align-items-center">
                  <div class="account_holder_title d-flex align-items-center">
                  
                    <input type="checkbox" value="'.$row['unique_id'].'" class="mr-2" name="unique_ids[]">
                    
                    <div>
                      <img class="img" src="'.$row['profile_img'].'" alt="">  
                    </div>
                    <div>
                      <p>'.$row['username'].'</p>                 
                    </div>
                  </div>
                </label>
			';
		}
    echo '<button class="btn btn-dark grup_btn" type="submit" name="send" id="send_grup"><i class="fas fa-check"></i></button>
                  </form>';
  } 
?>