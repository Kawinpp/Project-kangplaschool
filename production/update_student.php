<?php
//เชื่อมต่อฐานข้อมูล
require('dbconnect.php');

//รับค่าที่มาจากฟอร์มแก้ไข
$std_id = $_POST["std_id"];
$std_title = $_POST["std_title"];
$std_name = $_POST["std_name"];
$std_name_en = $_POST["std_name_en"];
$std_number = $_POST["std_number"];
$std_card = $_POST["std_card"];
$std_adr = $_POST["std_adr"];
$std_parents = $_POST["std_parents"];
$std_gender = $_POST["std_gender"];
$std_birthday= $_POST["std_birthday"];
$c_id = $_POST["c_id"];
$a_id = $_POST["a_id"];



$sql = "UPDATE student SET std_title = '$std_title',std_name = '$std_name',std_name_en = '$std_name_en',std_number = '$std_number',std_card = '$std_card',std_adr = '$std_adr',std_parents = '$std_parents',std_gender = '$std_gender',std_birthday = '$std_birthday',c_id = '$c_id',a_id = '$a_id' WHERE std_id=$std_id";

/* echo "$sql";
exit(); */
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
