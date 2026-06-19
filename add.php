<?php
 
include 'config.php';
$course_title = $_POST['course_title'];
$course_detail = $_POST['course_detail'];
$course_contect = $_POST['course_contect'];
$course_amrp = $_POST['course_amrp'];
$course_dmrp = $_POST['course_dmrp'];
 
//image uploading
if($_FILES['course_file']['name']){
 
    move_uploaded_file($_FILES['course_file']['tmp_name'], "img/".$_FILES['course_file']['name']);
 
    $img = "img/".$_FILES['course_file']['name'];
 
    }
 
$sql="INSERT INTO `coursedetail`(`course_id`, `course_title`, `course_detail`, `course_contect`, `course_amrp`, `course_dmrp`, `course_file`) VALUES (NULL,'$course_title','$course_detail',$course_contect,$course_amrp,$course_dmrp,'$img')";
 
$query = mysqli_query($conn, $sql);
if ($query) {
	echo 1;
}else{
	echo 0;
}
?>