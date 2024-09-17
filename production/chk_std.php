<?php
session_start();
require("dbconnect.php");

if (isset($_POST['username'])) {
  // รับค่าเข้ามาจากฟอร์ม login
  $username = $_POST['username'];
  $password = md5($_POST['password']); // เข้ารหัส MD5

  // แก้ไข SQL ให้ใช้ค่าที่ถูกต้องจากฟอร์ม
  $sql = "SELECT * FROM student WHERE std_username='" . $username . "' AND std_password='" . $password . "'";
  $result = mysqli_query($con, $sql);

  // ตรวจสอบผลลัพธ์
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $_SESSION["std_id"] = $row["std_id"];
    $_SESSION["std_username"] = $row["std_username"];
    $_SESSION["std_password"] = $row["std_password"];
    header("location:std_page.php");
  } else {
    echo "<script>";
    echo "alert(\"ชื่อเข้าระบบหรือรหัสผ่านไม่ถูกต้อง\");";
    echo "window.history.back();";
    echo "</script>";
  }
} else {
  header("location:login_std.php");
}
?>
