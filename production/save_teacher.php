<?php
//เชื่อมต่อฐานข้อมูล
require('dbconnect.php');

//รับค่าที่ส่งมาจากฟอร์ม
$a_title = $_POST["a_title"];
$a_name = $_POST["a_name"];
$a_positsion = $_POST["a_positsion"];
$a_name_en = $_POST["a_name_en"];
$a_adr = $_POST["a_adr"];
$a_tell = $_POST["a_tell"];
$a_username = $_POST["a_username"];
$a_password = MD5($_POST["a_password"]);
$c_id = $_POST["c_id"];
$a_level = $_POST["a_level"];
$a_upload = $_FILES["a_upload"]; //รับค่าไฟล์จากฟอร์ม	


$a_username = $_REQUEST["a_username"];
	 
	//Check a_username for dupplicate 		
	$check = "SELECT * FROM admin  WHERE  a_username = '$a_username'";
	$result = mysqli_query($con,$check) or die(mysqli_error());
	$num=mysqli_num_rows($result); 
        if($num > 0)   		
        {
             echo "<script>";
			 echo "alert('รายชื่อนี้มีการลงทะเบียนไปแล้วครับ !!!');";
			 echo "window.location='add_teacher.php';";
          	 echo "</script>";
 
		}else{


//ฟังก์ชั่นวันที่
date_default_timezone_set('Asia/Bangkok');
$date = date("Ymd");	
//ฟังก์ชั่นสุ่มตัวเลข
$numrand = (mt_rand());
//เพิ่มไฟล์
$a_upload=$_FILES['a_upload'];
if($a_upload <> '') {   //not select file
//โฟลเดอร์ที่จะ upload file เข้าไป 
$path="pic/";  

//เอาชื่อไฟล์เก่าออกให้เหลือแต่นามสกุล
$type = strrchr($_FILES['a_upload']['name'],".");

//ตั้งชื่อไฟล์ใหม่โดยเอาเวลาไว้หน้าชื่อไฟล์เดิม
$newname = $date.$numrand.$type;
$path_copy=$path.$newname;
$path_link="a_upload/".$newname;

//คัดลอกไฟล์ไปเก็บที่เว็บเซริ์ฟเวอร์
move_uploaded_file($_FILES['a_upload']['tmp_name'],$path_copy);  	
}
// เพิ่มไฟล์เข้าไปในตาราง uploadfile
//บันทึกข้อมูล
$sql = "INSERT INTO admin (a_title, a_name, a_positsion, a_adr, a_name_en, a_tell, a_username, a_password, c_id, a_level, a_upload) VALUE ('$a_title', '$a_name', '$a_positsion', '$a_adr', '$a_name_en', '$a_tell', '$a_username', '$a_password', '$c_id', '$a_level','$newname')";

$result = mysqli_query($con, $sql);

//ตรวจสอบการทำงานของคำสั่ง Insert
if ($result) {
  echo "<script>";
    echo "alert(\"เพิ่มข้อมูลเรียบร้อย\");";
    header("refresh: 1; show_teacher.php");
    //echo "window.history.back()";
    echo "</script>";
  exit(0);
} else {
  echo mysqli_error($con);
}
} 
?>
   
