<?php
//เชื่อมต่อฐานข้อมูล
require('dbconnect.php');

//รับค่าที่มาจากฟอร์มแก้ไข
$a_id = $_POST["a_id"];
$a_title = $_POST["a_title"];
$a_name = $_POST["a_name"];
$a_name_en = $_POST["a_name_en"];
$a_positsion = $_POST["a_positsion"];
$a_adr = $_POST["a_adr"];
$a_tell = $_POST["a_tell"];
$c_id = $_POST["c_id"];
$a_level = $_POST["a_level"];

$sql = "UPDATE admin SET  a_title = '$a_title',a_name ='$a_name',a_name_en = '$a_name_en',a_positsion ='$a_positsion',a_adr = '$a_adr',a_tell = '$a_tell',c_id = '$c_id',a_level = '$a_level' WHERE a_id=$a_id";

/*echo "$sql";
exit(); */
$result = mysqli_query($con, $sql);

if ($result) {
  echo "<script>";
  echo "alert(\"เเก้ไขข้อมูลเรียบร้อย\");";
  header("refresh: 1; show_teacher.php");
  //echo "window.history.back()";
  echo "</script>";
exit(0);
} else {
  echo "ไม่สามารถแก้ไขข้อมูลได้" . mysqli_error($con);
}
