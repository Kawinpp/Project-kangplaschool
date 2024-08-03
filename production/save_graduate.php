<?php
//เชื่อมต่อฐานข้อมูล
require('dbconnect.php');

//รับค่าที่ส่งมาจากฟอร์ม
$grad_title = $_POST["grad_title"];
$grad_name = $_POST["grad_name"];
$grad_name_en = $_POST["grad_name_en"];
$grad_end = $_POST["grad_end"];
$grad_gender = $_POST["grad_gender"];
$grad_number = $_POST["grad_number"];
$grad_card = $_POST["grad_card"];
$grad_year = $_POST["grad_year"];
$grad_adr = $_POST["grad_adr"];
$grad_parents = $_POST["grad_parents"];
$grad_birthday= $_POST["grad_birthday"];
$grad_username = $_POST["grad_username"];
$grad_password = MD5($_POST["grad_password"]);
$c_id = $_POST["c_id"];
$a_id = $_POST["a_id"];
$grad_upload = $_FILES["grad_upload"]; //รับค่าไฟล์จากฟอร์ม	
 //echo"$std_upload";
//exit();
//ฟังก์ชั่นวันที่
date_default_timezone_set('Asia/Bangkok');
$date = date("Ymd");	
//ฟังก์ชั่นสุ่มตัวเลข
       $numrand = (mt_rand());
//เพิ่มไฟล์
$std_upload=$_FILES['grad_upload'];
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

//บันทึกข้อมูล
$sql = "INSERT INTO graduate (grad_title,grad_name,grad_name_en,grad_end,grad_gender,grad_number,grad_card,grad_year,grad_adr,grad_parents,grad_birthday,grad_username,grad_password,c_id,a_id,std_upload) VALUE('$grad_title','$grad_name','$grad_name_en','$grad_end','$grad_gender','$grad_number','$grad_card','$grad_year','$grad_adr','$grad_parents','$grad_birthday','$grad_username','$grad_password','$c_id','$a_id','$newname')";

echo"$sql";
exit();
//รันคำสั่ง SQL
$result = mysqli_query($con, $sql);

//ตรวจสอบการทำงานของคำสั่ง Insert
if ($result) {
  echo "<script>";
    echo "alert(\"เพิ่มข้อมูลเรียบร้อย\");";
    header("refresh: 1; show_graduate.php");
    //echo "window.history.back()";
    echo "</script>";
  exit(0);
} else {
  echo mysqli_error($con);
}
