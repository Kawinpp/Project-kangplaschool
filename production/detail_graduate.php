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

  $grad_id = $_GET["grad_id"];

  //$sql2 = "SELECT * FROM  admin  WHERE a_id=$a_id";
  //$result2 = mysqli_query($con, $sql2);
  //$objQuery3 = mysqli_query($con, $sql2);
  //$objResult3 = mysqli_fetch_assoc($objQuery3);//$objResult3 = mysqli_fetch_array($objQuery3);

  
  
/*
  $sqlclassroom = "SELECT * FROM classroom"; //เลือกข้อมูลจากตาราง employee ออกมาแสดง
  $resultclassroom = mysqli_query($con, $sqlclassroom); //รันคำสั่งที่ถูกเก็บไว้ในตัวแปร $sql
  */
  $strSQL3 = "SELECT * FROM  student inner join classroom on student.c_id=classroom.c_id inner join admin on student.a_id=admin.a_id WHERE student.std_id=$std_id";
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
                    <h2>เเสดงข้อมูลนักเรียน</h2>
                    <ul class="nav navbar-right panel_toolbox">                   
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <br/>
                  <form method="POST" action="save_graduate.php"
                  enctype="multipart/form-data" class="form-horizontal form-label-left">

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">ชื่อ-สกุล<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                            <?php echo $objResult3["grad_title"] ?><?php echo $objResult3["grad_name"] ?>
                                            </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">ชื่อ-สกุล ภาษาอังกฤษ<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                            <?php echo $objResult3["grad_name_en"] ?>  
                                            </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">เพศ<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                           <?php if($objResult3["grad_gender"]=="w"){
                                            echo"หญิง";
                                           }else{
                                            echo"ชาย";
                                           }?>
                      
                      </div>
                                        </div>
                                        
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">รหัสประจำตัวประชาชน<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                          <?php echo $objResult3["grad_card"] ?></div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">รหัสประจำตัวนักเรียน<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                           <?php echo $objResult3["grad_number"] ?></div>
                                        </div>
                                       
                                        <div class="field item form-group">        
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">ระดับชั้น<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                            <?php echo $objResult3["c_name"] ?>

                      </div>
                                        </div>  
                                        <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">วันเดือนปีเกิด <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
											<?php echo $objResult3["grad_birthday"] ?>
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
                                           <?php echo $objResult3["grad_adr"]; ?>
                                          </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">ชื่อบิดา<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                            <?php echo $objResult3["grad_parents"] ?> </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">ชื่อมารดา<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                            <?php echo $objResult3["grad_parents"] ?> </div>
                                        </div>
                                       
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">คุณครูประจำชั้น<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                            <?php echo $objResult3["a_name"] ?>
                                                
												</select>
                      
                      </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">รูปภาพ<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                            <input type="file" name="grad_upload"></div>
                                        </div>
                                        </div>
                                        <div class="ln_solid"></div>
                                           
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
