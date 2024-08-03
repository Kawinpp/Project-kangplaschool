<?php
session_start();
require("dbconnect.php");
if ($_SESSION['a_level'] != "a") {
  echo "<center>หน้าสำหรับผู้ดูแลระบบ <a href=index.php>กรุณาเข้าสู่ระบบก่อน</a></center>";
  exit();
}
if (!$_SESSION["a_id"]) {
  header("location:index.php");
} else {

  $sqllogin = "SELECT * FROM admin WHERE a_id='" . $_SESSION["a_id"] . "'";
  $result = mysqli_query($con, $sqllogin);
  $row = mysqli_fetch_assoc($result);


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>โรงเรียนบ้านก้างปลา</title>

    <!-- Bootstrap -->
    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
<!-- Datatables -->
    
<link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            

            <!-- sidebar menu -->
 <?php include"menu_left.php";?>
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                
            </div>
          </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>แสดงข้อมูลครู</h3>
              </div>

             
            </div>

            <div class="clearfix"></div>

            <div class="row1">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>ข้อมูลครู</h2>
                    <ul class="nav navbar-right panel_toolbox">                   
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <?php
$sql1 = "SELECT * FROM admin"; //เลือกข้อมูลจากตาราง admin ออกมาแสดง
$result1 = mysqli_query($con, $sql1); //รันคำสั่งที่ถูกเก็บไว้ในตัวแปร $sql

$count1 = mysqli_num_rows($result1); //เก็บผลที่ได้จากคำสั่ง $result เก็บไว้ในตัวแปร $count
$order1 = 1; //ให้เริ่มนับแถวจากเลข 1
?>
                  <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th width="10%">ลำดับ</th>
                          <th>ข้อมูลคุณครู</th>
                          <th width="10%">สถานะ</th>
                          <th width="10%">รูปภาพ</th>
                          <th width="10%">แก้ไขชื่อเข้าระบบ</th>
                          <th width="10%">เเก้ไขข้อมูล</th>
                          <th width="10%">ลบข้อมูล</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php while ($row1 = mysqli_fetch_assoc($result1)) {
        ?><tr>
        <td><?php echo $order1++; ?></td>
        <td><a href="detail_teacher.php?a_id=<?php echo $row1["a_id"];?>"><?php echo $row1["a_name"];?><br><?php echo $row1["a_name_en"];?></td>
        <td>
          <?php 
        if($row1["a_level"] == "t"){
          echo "คุณครู";
        } else{
          echo "ผู้ดูเเละระบบ";
        }
               ?></td>
         <td><a href="edit_teapicture.php?a_id=<?php echo $row1["a_id"] ?>"><img src="pic/<?php echo $row1["a_upload"] ?>" width="90px" height="100px" class="image-fluid rounded"></a> </td>       
        <td><a href="edit_pass.php?a_id=<?php echo $row1["a_id"] ?>" class="btn btn-warning"><i class="fa fa-lock"></i></a> </td>
        <td><a href="edit_teacher.php?a_id=<?php echo $row1["a_id"] ?>" class="btn btn-success"><i class="fa fa-edit"></i></a> </td>
        <td><a href="delete_teacher.php?a_id=<?php echo $row1["a_id"] ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a> </td>
      </tr> 
                          <?php } ?>                      
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            <a href="https://www.youtube.com/@user-mh3vi2kn4g">โรงเรียนบ้านก้างปลา อำเภอเมืองเลย จังหวัดเลย</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
      <!-- Datatables -->
      <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
    <?php  } ?>
  </body>
</html>
