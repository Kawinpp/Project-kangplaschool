<?php
//เชื่อมต่อฐานข้อมูล
require('dbconnect.php');

//รับค่าที่มาจากฟอร์มแก้ไข
$std_id = $_POST["std_id"];
$std_upload = $_FILES["std_upload"]; //รับค่าไฟล์จากฟอร์ม	
 //echo"$std_upload";
//exit();
//ฟังก์ชั่นวันที่
date_default_timezone_set('Asia/Bangkok');
$date = date("Ymd");	
//ฟังก์ชั่นสุ่มตัวเลข
       $numrand = (mt_rand());
//เพิ่มไฟล์
$std_upload=$_FILES['std_upload'];
if($std_upload <> '') {   //not select file
//โฟลเดอร์ที่จะ upload file เข้าไป 
$path="pic/";  

//เอาชื่อไฟล์เก่าออกให้เหลือแต่นามสกุล
$type = strrchr($_FILES['std_upload']['name'],".");

//ตั้งชื่อไฟล์ใหม่โดยเอาเวลาไว้หน้าชื่อไฟล์เดิม
$newname = $date.$numrand.$type;
$path_copy=$path.$newname;
$path_link="std_upload/".$newname;

//คัดลอกไฟล์ไปเก็บที่เว็บเซริ์ฟเวอร์
move_uploaded_file($_FILES['std_upload']['tmp_name'],$path_copy);  	
}
// เพิ่มไฟล์เข้าไปในตาราง uploadfile


$sql = "UPDATE student SET std_upload = '$newname' WHERE std_id=$std_id";

 //echo "$sql";
//exit();  
$result = mysqli_query($con, $sql);

if ($result) {
  echo "<script>";
  echo "alert(\"เเก้ไขข้อมูลเรียบร้อย\");";
  header("refresh: 1; show_student.php");
  //echo "window.history.back()";
  echo "</script>";
exit(0);
} else {
  echo "ไม่สามารถแก้ไขข้อมูลได้" . mysqli_error($con);
}