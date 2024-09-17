<?php
session_start();
require("dbconnect.php");

if (isset($_POST['username'])) {
  //รับค่าเข้ามาจากฟอร์ม login
  $username = $_POST['username'];
  $password = md5($_POST['password']); // ถอดรหัส MD5
  $a_level = $_POST['a_level'];

  $sql = "SELECT * FROM admin where a_username='" . $username . "' AND a_password='" . $password . "' AND a_level='".$a_level."' ";
  $result = mysqli_query($con, $sql);
//echo"$sql";
//exit();
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $_SESSION["a_id"] = $row["a_id"];
    $_SESSION["a_username"] = $row["a_username"] . " " . $row["a_username"];
    $_SESSION["a_level"] = $row["a_level"];
    if ($_SESSION["a_level"] == "a") { // ถ้าเป็น a ให้กระโดดไปหน้า admin_page.php
      header("location:show_class.php");
    }
    if ($_SESSION["a_level"] == "t") {
      header("location:show_teacher_t.php");
    }
  } else {
    echo "<script>";
    echo "alert(\"ชื่อเข้าระบบหรือรหัสผ่านไม่ถูกต้อง\");";
    echo "window.history.back()";
    echo "</script>";
  }
} else {
  header("location:login.php");
}
