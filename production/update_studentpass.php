<?php
//เชื่อมต่อฐานข้อมูล
require('dbconnect.php');

//รับค่าที่มาจากฟอร์มแก้ไข
$std_id = $_POST["std_id"];
$std_password = MD5($_POST["std_password"]);


$sql = "UPDATE student SET std_password ='$std_password' WHERE std_id=$std_id; ";

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
