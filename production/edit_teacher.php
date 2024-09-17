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

  $a_id = $_GET["a_id"];

  //$sql2 = "SELECT * FROM  admin  WHERE a_id=$a_id";
  //$result2 = mysqli_query($con, $sql2);
  //$objQuery3 = mysqli_query($con, $sql2);
  //$objResult3 = mysqli_fetch_assoc($objQuery3);//$objResult3 = mysqli_fetch_array($objQuery3);

  
  
/*
  $sqlclassroom = "SELECT * FROM classroom"; //เลือกข้อมูลจากตาราง employee ออกมาแสดง
  $resultclassroom = mysqli_query($con, $sqlclassroom); //รันคำสั่งที่ถูกเก็บไว้ในตัวแปร $sql
  */
  $strSQL3 = "SELECT * FROM  admin  WHERE a_id=$a_id";
  $objQuery3 = mysqli_query($con, $strSQL3);
  $objResult3 = mysqli_fetch_array($objQuery3);
  
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
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">

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
                <h3>เพิ่มข้อมูลครู</h3>
              </div>

             
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>เเก้ไขข้อมูลคุณครู</h2>
                    <ul class="nav navbar-right panel_toolbox">                   
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <br />
									<form method="POST" action="update_teacher.php" class="form-horizontal form-label-left"> 
                    <input type="hidden" value="<?php echo $objResult3["a_id"]; ?>" name="a_id"> <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">คำนำหน้า<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">

                                            <select class="form-control" name="a_title">
					<option value="นาย" <?php if($objResult3["a_title"]=="นาย") { echo"selected";}?> >นาย</option>
          <option value="นางสาว" <?php if($objResult3["a_title"]=="นางสาว") { echo"selected";}?>>นางสาว</option>
          <option value="นาง" <?php if($objResult3["a_title"]=="นาง") { echo"selected";}?>>นาง</option>  
												</select>
                      
                      </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">ชื่อ-สกุล<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" id="a_name" name="a_name" required="required" value="<?php echo $objResult3["a_name"]; ?>">
                                            </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">ชื่อ-สกุล ภาษาอังกฤษ<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" data-validate-length-range="6" data-validate-words="2" id="a_name_en" name="a_name_en" required="required" value="<?php echo $objResult3["a_name_en"]; ?>">
                                            </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">ตำเเหน่ง<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                            <input type="text" id="a_positsion" name="a_positsion" required="required" class="form-control" value="<?php echo $objResult3["a_positsion"]; ?>"></div>
                                        </div>
                                       
                                        <div class="field item form-group">        
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">ครูประจำชั้น<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">

                                            <?php
                        $strDefault = $objResult3['c_id'];
                        //echo"$strDefault";
                        ?>

<select class="form-control" name="c_id">

                          <?php 
                          $sqlclassroom = "SELECT * FROM classroom"; //เลือกข้อมูลจากตาราง employee ออกมาแสดง
                          $resultclassroom = mysqli_query($con, $sqlclassroom); //รันคำสั่งที่ถูกเก็บไว้ในตัวแปร $sql
                          while ($rowclassroom = mysqli_fetch_assoc($resultclassroom )) {
                            if ($strDefault == $rowclassroom["c_id"]) {
                              $sel = "selected";
                            } else {
                              $sel = "";
                            }
        ?>
													<option value="<?php echo $rowclassroom["c_id"] ?>" <?php echo"$sel";?>><?php echo $rowclassroom["c_name"] ?>
                        </option>
													
                          <?php } ?>       
												</select>
                      </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">เบอร์โทรศัพท์<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                            <input type="text" id="a_tell" name="a_tell" required="required" class="form-control" value="<?php echo $objResult3["a_tell"]; ?>" /></div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">ที่อยู่ปัจจุบัน<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <textarea class="form-control" required="required"id="a_adr" name='a_adr'> <?php echo $objResult3["a_adr"]; ?></textarea></div>
                                        </div>
                                        
                              
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">ระดับผู้ใช้งาน<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                            <select class="form-control" id="a_level"  name="a_level">
													<option value="t">คุณครู</option>
													<option value="a">ผู้ดูเเลระบบ</option>
												</select></div>
                                        </div>
                                        <div class="ln_solid"></div>
                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-3">
                                                    <button type='submit' class="btn btn-primary">บันทึกข้อมูล</button>
                                                    <button type='reset' class="btn btn-danger">ยกเลิก</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
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
    
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
    <?php  } ?>
  </body>
</html>
