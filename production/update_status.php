<?php
//เชื่อมต่อฐานข้อมูล
require('dbconnect.php');
/*
//รับค่าที่มาจากฟอร์มแก้ไข
$std_id = $_POST["std_id"];
$c_id = $_POST["c_id"];
$std_status = $_POST["std_status"];


$sql = "UPDATE student SET 	std_status ='$std_status' WHERE std_id=$std_id; ";

$result = mysqli_query($con, $sql);

if ($result) {
  echo "<script>";
  echo "alert(\"อัพเดทสถานะเรียบร้อย\");";
  header("refresh: 0; detail_class.php?c_id=$c_id");
  //echo "window.history.back()";
  echo "</script>";
exit(0);
} else {
  echo "ไม่สามารถอัพเดทได้" . mysqli_error($con);
}*/


	for($i=0;$i<count($_POST["chkDel"]);$i++)
	{
		if($_POST["chkDel"][$i] != "")
		{
            /*
			$strSQL = "DELETE FROM customer ";
			$strSQL .="WHERE CustomerID = '".$_POST["chkDel"][$i]."' ";
			$objQuery = mysql_query($strSQL);
            */
            $strSQL = "UPDATE student SET std_status='จบการศึกษา'";
            //$strSQ.="SET std_status=จบการศึกษา'";
			$strSQL.="WHERE std_id = '".$_POST["chkDel"][$i]."' ";
			$objQuery = mysqli_query($con,$strSQL);
		}
	}

	echo "Record Deleted.";

mysqli_close($con);
