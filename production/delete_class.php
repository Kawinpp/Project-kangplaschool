<?php
require('dbconnect.php');

$c_id = $_GET["c_id"];

$sql = "DELETE FROM classroom WHERE c_id=$c_id";
$result = mysqli_query($con, $sql);

if ($result) {
    echo "<script>";
    echo "alert(\"ลบข้อมูลเรียบร้อย\");";
    header("refresh: 1; show_class.php");
    //echo "window.history.back()";
    echo "</script>";
  exit(0);
} else {
  echo "ไม่สามารถลบได้ หรือ มีข้อผิดพลาดเกิดขึ้น";
}
