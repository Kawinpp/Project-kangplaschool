<?php
session_start();
require("dbconnect.php");
include"thaidate.php";
if ($_SESSION['std_id'] == "") {
  echo "<center>หน้าสำหรับนักเรียน <a href=login_std.php>กรุณาเข้าสู่ระบบก่อน</a></center>";
  exit();
}
if (!$_SESSION["std_id"]) {
  header("location:login_std.php");
} else {

  $sqllogin = "SELECT * FROM  student inner join classroom on student.c_id=classroom.c_id inner join admin on student.a_id=admin.a_id WHERE std_id='" . $_SESSION["std_id"] . "'";
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

    <title>เเสดงสถานะการจบการศึกษา</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/components/services/service-4/assets/css/service-4.css">
<link href="ggfont.css" rel="stylesheet" type="text/css">

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <!-- page content -->
        <div class="col-md-12">
          <div class="col-middle">
          <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h4>ตรวจสอบสถานะการจบ โรงเรียนบ้านก้างปลา อำเภอเมืองเลย จังหวัดเลย</h4>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-3 col-sm-3  profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <img class="img-responsive avatar-view" width="300px" src="pic/<?php echo $row["std_upload"] ?> "alt="Avatar" title="Change the avatar">
                        </div>
                      </div>
                      <h3><?php echo $row["std_title"] ?><?php echo $row["std_name"] ?></h3>

                      <ul class="list-unstyled user_data">
                      <li>
                          <i class="fa fa-briefcase user-profile-icon"></i> ID : <?php echo $row["std_number"] ?>
                        </li>
                        <li><i class="fa fa-map-marker user-profile-icon"></i> <?php echo $row["std_adr"] ?>
                        </li>    
                      </ul>

                    </div>
                    <div class="col-md-9 col-sm-9 ">

                      <div class="profile_title">
                        <div class="col-md-6">
                          <h2>ข้อมูลนักเรียน</h2>
                        </div>
                        <div class="col-md-6">
                          <div id="reportrange" class="pull-right" style="margin-top: 5px; background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #E6E9ED">
                            <i class="fa fa-calendar"></i>
                            <span><?php echo thai_date(date('Y-m-d'));?></span> <b class="caret"></b>
                          </div>
                        </div>
                      </div>
                  

                      <div class="" role="tabpanel" data-example-id="togglable-tabs">
                       
                        <div id="myTabContent" class="tab-content">
                          <div role="tabpanel" class="tab-pane active " id="tab_content1" aria-labelledby="home-tab">

                            <!-- start recent activity -->
                            <ul class="messages">
                              <li>
          
                                <div class="message_wrapper">
                                  <h4 class="heading"><?php echo $row["std_title"] ?><?php echo $row["std_name"] ?></h4>
                                  <blockquote class="message">ระดับชั้น <?php echo $row["c_name"] ?></blockquote>
                                  <br />
                                  <blockquote class="message">คุณครูประจำชั้น : <?php echo $row["a_name"] ?></blockquote>
                                
                                </div>
                              </li>
                            </ul>
                            <!-- end recent activity -->

                          </div>
  

                        </div>
                      </div>
                      
                    </div>
                 
                    <div class="col-md-9 col-sm-9 ">

<div class="profile_title">
  <div class="col-md-6">
    <h2>ข้อมูลการจบการศึกษา</h2>
  </div>
  <div class="col-md-6">
    <div id="reportrange" class="pull-right" style="margin-top: 5px; background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #E6E9ED">
      
    </div>
  </div>
</div>


<div class="" role="tabpanel" data-example-id="togglable-tabs">
 
  <div id="myTabContent" class="tab-content">
    <div role="tabpanel" class="tab-pane active " id="tab_content1" aria-labelledby="home-tab">

      <!-- start recent activity -->
      <ul class="messages">
        <li>

          <div class="message_wrapper">
            <h4 class="heading">สถานะ : <?php echo $row["std_status"] ?></h4>
           
          </div>
        </li>
      </ul>
              </div>
              <div class="text-center">
             <img src="school.png" class="rounded" alt="...">
</div>
      <!-- end recent activity -->
      <div class="pull-right">
            <a>สามารถตรวจสอบสถานะอีกครั้งได้ที่ห้องทะเบียน</a>
          </div>
    </div>


  </div>
</div>

</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
        <div class="text-center"> 
        <div class="col-md-6 offset-md-3">
    <a href="logout_std.php" 
     <botton class="btn btn-danger"><center>ออกจากระบบ</center></botton>
    </a>
</div>
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