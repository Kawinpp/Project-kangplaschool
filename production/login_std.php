<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>เข้าสู่ระบบโรงเรียนบ้านก้างปลา</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <link href="ggfont.css" rel="stylesheet" type="text/css">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="POST" action="chk_std.php">
            <div class="text-center">
             <img src="school.png" class="rounded" alt="...">
              </div>
              <h2>ระบบบริการนักเรียนโรงเรียนบ้านก้างปลา</h2>
              <div> 
              <input type="text" class="form-control" id="username" placeholder="username" name="username" required>
              </div>
              <div>
              <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
              </div>
              <div class="mt-5">
              <button type="submit" class="btn btn-primary">เข้าสู่ระบบ</button>
              <button type="reset" class="btn btn-danger">ยกเลิก</button>
              </div>

              <div class="clearfix"></div>
            </form>
          </section>
        </div>


      </div>
    </div>
  </body>
</html>
