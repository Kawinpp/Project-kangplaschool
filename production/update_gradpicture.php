<?php
//เชื่อมต่อฐานข้อมูล
require('dbconnect.php');

//รับค่าที่มาจากฟอร์มแก้ไข
$grad_id = $_POST["grad_id"];
$grad_upload = $_FILES["grad_upload"]; //รับค่าไฟล์จากฟอร์ม	
 //echo"$grad_upload";
//exit();
//ฟังก์ชั่นวันที่
date_default_timezone_set('Asia/Bangkok');
$date = date("Ymd");	
//ฟังก์ชั่นสุ่มตัวเลข
       $numrand = (mt_rand());
//เพิ่มไฟล์
$grad_upload=$_FILES['grad_upload'];
if($std_upload <> '') {   //not select file
//โฟลเดอร์ที่จะ upload file เข้าไป 
$path="pic/";  

//เอาชื่อไฟล์เก่าออกให้เหลือแต่นามสกุล
$type = strrchr($_FILES['grad_upload']['name'],".");

//ตั้งชื่อไฟล์ใหม่โดยเอาเวลาไว้หน้าชื่อไฟล์เดิม
$newname = $date.$numrand.$type;
$path_copy=$path.$newname;
$path_link="grad_upload/".$newname;

//คัดลอกไฟล์ไปเก็บที่เว็บเซริ์ฟเวอร์
move_uploaded_file($_FILES['grad_upload']['tmp_name'],$path_copy);  	
}
// เพิ่มไฟล์เข้าไปในตาราง uploadfile


$sql = "UPDATE graduate SET grad_upload = '$newname' WHERE grad_id=$grad_id";

 //echo "$sql";
//exit();  
$result = mysqli_query($con, $sql);

if ($result) {
  echo "<script>";
  echo "alert(\"เเก้ไขข้อมูลเรียบร้อย\");";
  header("refresh: 1; show_graduate.php");
  //echo "window.history.back()";
  echo "</script>";
exit(0);
} else {
  echo "ไม่สามารถแก้ไขข้อมูลได้" . mysqli_error($con);
}