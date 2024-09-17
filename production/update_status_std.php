<php>

<head>
    <title>ThaiCreate.Com PHP & MySQL Tutorial</title>
    
</head>

<body>
    <?php
require("dbconnect.php");
/*
if (isset($_REQUEST['c_id'])) {
    $c_id = $_REQUEST['c_id'];
} else {
    // Handle the case where c_id is not provided
    echo "Error: 'c_id' is not set.";
    exit;
}
    */
    for ($i = 0; $i < count($_POST["chkupdate"]); $i++) {
        if ($_POST["chkupdate"][$i] != "") {
            $strSQL = "UPDATE student SET ";
            $strSQL .= "std_status = '" . $_POST["std_status"] . "' ";
            $strSQL .= "WHERE std_id = '" . $_POST["chkupdate"][$i] . "' ";
            $objQuery = mysqli_query($con, $strSQL);
        }
    }

    echo "อัพเดทสถานะนักเรียนเเล้ว";
    echo "<a href=show_student.php>back.</a>";

    mysqli_close($con);
    ?>
</body>

</php>