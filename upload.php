<?php
include 'config.php';
$folderPath = 'Admin/img/';

$image_parts = explode(";base64,", $_POST['image']);
$image_type_aux = explode("image/", $image_parts[0]);
$image_type = $image_type_aux[1];
$image_base64 = base64_decode($image_parts[1]);
$file = $folderPath . uniqid() . '.png';
file_put_contents($file, $image_base64);
//$conn = mysqli_connect("localhost","root","","e_learning");
$id = $_POST['id'];
//echo $id;
$sql = "UPDATE `login` SET `profile_img` = '$file' WHERE id = $id";
$query = mysqli_query($conn,$sql);
if ($query) {
	echo 1;
}else{
	echo 0;
}
?>
