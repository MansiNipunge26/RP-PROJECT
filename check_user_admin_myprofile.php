<?php
  if ((isset($_SESSION['id']))) {
    if ($_SESSION['id']) {
        $stu_id = $_SESSION['id'];
        $stu_email = $_SESSION['email'];
    }
    $select_sql = "SELECT * FROM `login` WHERE id = '$stu_id'";
    $query = mysqli_query($conn,$select_sql);
    if ($row = mysqli_fetch_assoc($query)) {
      if ($row['profile_img'] != "") {
        echo '<img id="profile_img" src="'.$row['profile_img'].'" alt="" class="img-thumbnail img-fluid">';
        echo '<label for="crop_img" style="border-radius:0px;" class="crop_btn btn btn-primary"><span class="fas fa-camera"></span></label>';
      }
      else{
        echo '<span class="fas fa-user"></span>';
        echo '<label for="crop_img" style="border-radius: 50%;" class="crop_btn btn btn-primary" class="crop_btn btn btn-primary"><span class="fas fa-camera"></span></label>';
      }
    }
  }else if($_SESSION['admin_id']){
      $stu_id = $_SESSION['admin_id'];
      $stu_email = $_SESSION['admin_email'];
      $select_sql = "SELECT * FROM `login` WHERE id = '$stu_id'";
      $query = mysqli_query($conn,$select_sql);
      if ($row = mysqli_fetch_assoc($query)) {
        if ($row['profile_img'] != "") {
          echo '<img id="profile_img" src="'.$row['profile_img'].'" style="border-radius:0px;" alt="" class="img-thumbnail img-fluid">';
          echo '<label for="crop_img" class="crop_btn btn btn-primary"><span class="fas fa-camera"></span></label>';
        }
        else{
          echo '<span class="fas fa-user"></span>';
          echo '<label for="crop_img" style="border-radius: 50%;" class="crop_btn btn btn-primary"><span class="fas fa-camera"></span></label>';
        }
      }
  }
  else{
    echo '<span class="fas fa-user"></span>';
    echo '<label for="crop_img" style="border-radius: 50%;" class="crop_btn btn btn-primary"><span class="fas fa-camera"></span></label>';
  }
?>
