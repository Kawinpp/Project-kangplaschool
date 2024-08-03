<?php
//เชื่อมต่อฐานข้อมูล
require('dbconnect.php');

//รับค่าที่ส่งมาจากฟอร์ม
$std_title = $_POST["std_title"];
$std_name = $_POST["std_name"];
$std_name_en = $_POST["std_name_en"];
$std_number = $_POST["std_number"];
$std_card = $_POST["std_card"];
$std_adr = $_POST["std_adr"];
$std_parents = $_POST["std_parents"];
$std_gender = $_POST["std_gender"];
$std_birthday= $_POST["std_birthday"];
$std_username = $_POST["std_username"];
$std_password = MD5($_POST["std_password"]);
$c_id = $_POST["c_id"];
$a_id = $_POST["a_id"];
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

//บันทึกข้อมูล
$sql = "INSERT INTO student (std_title,std_name,std_name_en,std_number,std_card,std_adr,std_parents,std_gender,std_birthday,std_username,std_password,c_id,a_id,std_upload) VALUE('$std_title','$std_name','$std_name_en','$std_number','$std_card','$std_adr','$std_parents','$std_gender','$std_birthday','$std_username','$std_password','$c_id','$a_id','$newname')";

//echo"$sql";
//exit();
//รันคำสั่ง SQL
$result = mysqli_query($con, $sql);

//ตรวจสอบการทำงานของคำสั่ง Insert
if ($result) {
  echo "<script>";
    echo "alert(\"เพิ่มข้อมูลเรียบร้อย\");";
    header("refresh: 1; show_student.php");
    //echo "window.history.back()";
    echo "</script>";
  exit(0);
} else {
  echo mysqli_error($con);
}
