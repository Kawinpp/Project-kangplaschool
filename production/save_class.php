<?php
//เชื่อมต่อฐานข้อมูล
require('dbconnect.php');

//รับค่าที่ส่งมาจากฟอร์ม
$c_name = $_POST["c_name"];
//บันทึกข้อมูล
$sql = "INSERT INTO classroom (c_name) VALUE('$c_name')";

//รันคำสั่ง SQL
$result = mysqli_query($con, $sql);

//ตรวจสอบการทำงานของคำสั่ง Insert
if ($result) {
  echo "<script>";
    echo "alert(\"เพิ่มข้อมูลเรียบร้อย\");";
    //header("location:show_class.php");
    header("refresh: 1; show_class.php");
    //echo "window.history.back()";
    echo "</script>";
  exit(0);
} else {
  echo mysqli_error($con);
}
