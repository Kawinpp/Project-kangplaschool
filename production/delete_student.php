<?php
require('dbconnect.php');

$std_id = $_GET["std_id"];

$sql = "DELETE FROM student WHERE std_id=$std_id";
$result = mysqli_query($con, $sql);

if ($result) {
    echo "<script>";
    echo "alert(\"ลบข้อมูลเรียบร้อย\");";
    header("refresh: 1; show_student.php");
    //echo "window.history.back()";
    echo "</script>";
  exit(0);
} else {
  echo "ไม่สามารถลบได้ หรือ มีข้อผิดพลาดเกิดขึ้น";
}
