<?php
require('dbconnect.php');

$a_id = $_GET["a_id"];

$sql = "DELETE FROM admin WHERE a_id=$a_id";
$result = mysqli_query($con, $sql);

if ($result) {
    echo "<script>";
    echo "alert(\"ลบข้อมูลเรียบร้อย\");";
    header("refresh: 1; show_teacher.php");
    //echo "window.history.back()";
    echo "</script>";
  exit(0);
} else {
  echo "ไม่สามารถลบได้ หรือ มีข้อผิดพลาดเกิดขึ้น";
}
