<?php
require('dbconnect.php');

$grad_id = $_GET["grad_id"];

$sql = "DELETE FROM graduate WHERE grad_id=$grad_id";
$result = mysqli_query($con, $sql);

if ($result) {
    echo "<script>";
    echo "alert(\"ลบข้อมูลเรียบร้อย\");";
    header("refresh: 1; show_graduate.php");
    //echo "window.history.back()";
    echo "</script>";
  exit(0);
} else {
  echo "ไม่สามารถลบได้ หรือ มีข้อผิดพลาดเกิดขึ้น";
}
