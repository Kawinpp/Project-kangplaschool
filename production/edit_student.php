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

  $std_id = $_GET["std_id"];

  //$sql2 = "SELECT * FROM  admin  WHERE a_id=$a_id";
  //$result2 = mysqli_query($con, $sql2);
  //$objQuery3 = mysqli_query($con, $sql2);
  //$objResult3 = mysqli_fetch_assoc($objQuery3);//$objResult3 = mysqli_fetch_array($objQuery3);

  
  
/*
  $sqlclassroom = "SELECT * FROM classroom"; //เลือกข้อมูลจากตาราง employee ออกมาแสดง
  $resultclassroom = mysqli_query($con, $sqlclassroom); //รันคำสั่งที่ถูกเก็บไว้ในตัวแปร $sql
  */
  $strSQL3 = "SELECT * FROM  student WHERE std_id=$std_id";
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
                <h3>เพิ่มข้อมูลนักเรียน</h3>
              </div>

             
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>เเก้ไขข้อมูลนักเรียน</h2>
                    <ul class="nav navbar-right panel_toolbox">                   
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <br/>
									<form method="POST" action="update_student.php" enctype="multipart/form-data" class="form-horizontal form-label-left">
                  <input type="hidden" value="<?php echo $objResult3["std_id"];
                   ?>"name="std_id">
                  <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">คำนำหน้า<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">

                                            <select class="form-control" name="std_title">
					<option value="เด็กชาย" <?php if($objResult3["std_title"]=="เด็กชาย") { echo"selected";}?> >เด็กชาย</option>
          <option value="เด็กหญิง" <?php if($objResult3["std_title"]=="เด็กหญิง") { echo"selected";}?>>เด็กหญิง</option>
          <option value="นาย" <?php if($objResult3["std_title"]=="นาย") { echo"selected";}?>>นาย</option>
          <option value="นางสาว" <?php if($objResult3["std_title"]=="นางสาว") { echo"selected";}?>>นางสาว</option>           
												</select>
                      
                      </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">ชื่อ-สกุล<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" data-validate-length-range="6" data-validate-words="2" id="std_name" name="std_name" required="required" value="<?php echo $objResult3["std_name"] ?>">
                                            </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">ชื่อ-สกุล ภาษาอังกฤษ<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" data-validate-length-range="6" data-validate-words="2" id="std_name_en" name="std_name_en" required="required" value="<?php echo $objResult3["std_name_en"] ?>">
                                            </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">เพศ<span class="required" 
                                            value="<?php echo $objResult3["std_gender"] ?>" >
                                            *</span></label>
                                            <div class="col-md-6 col-sm-6">
                                            <select class="form-control" name="std_gender">
					<option value="m" <?php if($objResult3["std_gender"]=="m") { echo"selected";}?>>ชาย</option>
          <option value="w" <?php if($objResult3["std_gender"]=="w") { echo"selected";}?>>หญิง</option>
                  
												</select>
                      
                      </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">รหัสประจำตัวประชาชน<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                            <input type="text" id="std_card" name="std_card" required="required" class="form-control" value="<?php echo $objResult3["std_card"] ?>"></div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">รหัสประจำตัวนักเรียน<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                            <input type="text" id="std_number" name="std_number" required="required" class="form-control" value="<?php echo $objResult3["std_number"] ?>"></div>
                                        </div>
                                       
                                        <div class="field item form-group">        
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">ระดับชั้น<span class="required">*</span></label>
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
                                        <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">วันเดือนปีเกิด <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input id="birthday" name="std_birthday" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required"
                         type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)" value="<?php echo $objResult3["std_birthday"] ?>"> 
												<script>
													function timeFunctionLong(input) {
														setTimeout(function() {
															input.type = 'text';
														}, 60000);
													}
												</script>
											</div>
										</div>                    
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">ที่อยู่ปัจจุบัน<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                            <textarea class="form-control" required="required"id="std_adr" name='std_adr'><?php echo $objResult3["std_adr"]; ?></textarea>
                                          </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">ชื่อบิดา<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                            <input type="text" id="std_parents" name="std_parents"  class="form-control" required="required" value="<?php echo $objResult3["std_parents"] ?>"> </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">ชื่อมารดา<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                            <input type="text" id="std_parents" name="std_parents" class="form-control" required="required" value="<?php echo $objResult3["std_parents"] ?>"> </div>
                                        </div>           
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">คุณครูประจำชั้น<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                       
                                            <?php
                        $strDefault = $objResult3['a_id'];
                        //echo"$strDefault";
                        ?>

<select class="form-control" name="a_id">

                          <?php 
                          $sqladmin = "SELECT * FROM admin"; //เลือกข้อมูลจากตาราง employee ออกมาแสดง
                          $resultadmin = mysqli_query($con, $sqladmin); //รันคำสั่งที่ถูกเก็บไว้ในตัวแปร $sql
                          while ($rowadmin = mysqli_fetch_assoc($resultadmin )) {
                            if ($strDefault == $rowadmin["a_id"]) {
                              $sel = "selected";
                            } else {
                              $sel = "";
                            }
        ?>
													<option value="<?php echo $rowadmin["a_id"] ?>" <?php echo"$sel";?>><?php echo $rowadmin["a_name"] ?>
                        </option>
													
                          <?php } ?>       
												</select>

                      </div> 
                      </div>
                      <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">สถานะ<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6"
                                            value="<?php echo $objResult3["std_status"] ?>" >
                                            </span></label>
                                            <select class="form-control" name="std_status">
					<option value="ปกติ" <?php if($objResult3["std_status"]=="ปกติ") { echo"selected";}?>>ปกติ</option>
          
          <option value="ลาออก" <?php if($objResult3["std_status"]=="ลาออก") { echo"selected";}?>>ลาออก</option>
          <option value="จบการศึกษา" <?php if($objResult3["std_status"]=="จบการศึกษา") { echo"selected";}?>>จบการศึกษา</option>
                  
												</select>
                      
                      </div>                                       
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
