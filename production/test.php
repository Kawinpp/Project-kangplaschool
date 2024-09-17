<php>

<head>
  <title>ThaiCreate.Com PHP & MySQL Tutorial</title>
</head>

<body>
  <script language="JavaScript">
    function ClickCheckAll(vol) {

      var i = 1;
      for (i = 1; i <= document.frmMain.hdnCount.value; i++) {
        if (vol.checked == true) {
          eval("document.frmMain.chkDel" + i + ".checked=true");
        } else {
          eval("document.frmMain.chkDel" + i + ".checked=false");
        }
      }
    }

    function onUpdate() {
      if (confirm('Do you want to update ?') == true) {
        return true;
      } else {
        return false;
      }
    }
  </script>
  <form name="frmMain" action="test2.php" method="post" OnSubmit="return onUpdate();">
    <?php
    $con = mysqli_connect("localhost", "root", "", "kangpha") or die("เกิดข้อผิดพลาดเกิดขึ้น");
    mysqli_set_charset($con, "utf8");

    $strSQL = "SELECT * FROM student";
    $objQuery = mysqli_query($con, $strSQL) or die("Error Query [" . $strSQL . "]");
    ?>
    <table width="600" border="1">
      <tr>
        <th width="91">
          <div align="center">stdID </div>
        </th>
        <th width="98">
          <div align="center">Name </div>
        </th>
        <th width="98">
          <div align="center">Status </div>
        </th>
        <th width="30">
          <div align="center">
            <input name="CheckAll" type="checkbox" id="CheckAll" value="Y" onClick="ClickCheckAll(this);">
          </div>
        </th>
      </tr>
      <?php
      $i = 0;
      while ($objResult = mysqli_fetch_array($objQuery)) {
        $i++;
      ?>
        <tr>
          <td>
            <input type="hidden" name="std_id<?php echo $i; ?>" size="5" value="<?php echo $objResult["std_id"]; ?>">
            <div align="center"><?php echo $objResult["std_id"]; ?></div>
          </td>
          <td><?php echo $objResult["std_name"]; ?></td>
          <td><?php echo $objResult["std_status"]; ?></td>
          <td align="center"><input type="checkbox" name="chkDel[]" id="chkDel<?php echo $i; ?>" value="<?php echo $objResult["std_id"]; ?>"></td>
        </tr>
      <?php 
      }
      ?>
      <tr>
        <td><select name="std_status">
            <option value="ปกติ">ปกติ</option>
            <option value="จบการศึกษา">จบการศึกษา</option>
            <option value="ลาออก">ลาออก</option>
          </select></td>
      </tr>
    </table>
    <?php
    mysqli_close($con);
    ?>
    <input type="submit" name="btnDelete" value="อัพเดทสถานะ">
    <input type="hidden" name="hdnCount" value="<?php echo $i; ?>">
  </form>
</body>

</php>