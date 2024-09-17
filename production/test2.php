<php>

<head>
    <title>ThaiCreate.Com PHP & MySQL Tutorial</title>
</head>

<body>
    <?php
require("dbconnect.php");
$c_id=$_REQUEST["c_id"];
    for ($i = 0; $i < count($_POST["chkupdate"]); $i++) {
        if ($_POST["chkupdate"][$i] != "") {
            $strSQL = "UPDATE student SET ";
            $strSQL .= "std_status = '" . $_POST["std_status"] . "' ";
            $strSQL .= "WHERE std_id = '" . $_POST["chkupdate"][$i] . "' ";
            $objQuery = mysqli_query($con, $strSQL);
        }
    }

    echo "อัพเดทสถานะนักเรียนเเล้ว";
    echo "<a href=detail_class.php?c_id=$c_id>back.</a>";
    mysqli_close($con);
    ?>
</body>

</php>