
<link href="ggfont.css" rel="stylesheet" type="text/css">
<div class="navbar nav_title" style="border: 0;">
              <a href="show_class.php" class="text-white"><h2><i class="fa fa-graduation-cap"></i> <span>โรงเรียนบ้านก้างปลา</span></h2></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
              <img src="school.png" alt="Profile Picture" class="img-circle profile_img">
              </div>
              <div class="profile_info">
    <h2>ยินดีต้อนรับ</h2>
    <p><?php echo $row["a_name"]; ?></p>
    <p><a href="logout.php" class="bth btn-danger btn-sm">
        <i class='bx bx-lock-open bx-flashing'></i> ออกจากระบบ
    </a></p>
</div>
              <div class="clearfix"></div>
            </div>

            <!-- /menu profile quick info -->

            <br />
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-edit"></i> ดูข้อมูลนักเรียน <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">                     
                      
                      <li><a href="show_student_t.php">เรียกดูข้อมูลนักเรียน</a></li>
                     
                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i>จัดการข้อมูลชั้นเรียน<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    <li><a href="add_class.php">เพิ่มข้อมูลในชั้นเรียน</a></li>
                    <li><a href="show_class.php">เรียกดูข้อมูลในชั้นเรียน</a></li>
                      
                      
                      
                      
                    </ul>
                  </li>
                  <li><a><i class="fa fa-bar-chart-o"></i> ดูรายงานข้อมูลนักเรียน <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="std_data.php">รายงานข้อมูลนักเรียน</a></li>
                     
                    </ul>
                  </li>
                  <li><a><i class="fa fa-file-text"></i>รายงานจบการศึกษา<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="show_graduate.php">ดูรายงานข้อมูลนักเรียนจบการศึกษา</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
              
              <div class="menu_section">
                <h3>สำหรับคุณครู</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-user"></i>จัดการข้อมูลส่วนตัว<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                     
                      <li><a href="show_teacher_t.php">ดูข้อมูลคุณครู</a></li>
                      
                      
                    </ul>
                  </li>                 
                </ul>
              </div>
              
            </div>