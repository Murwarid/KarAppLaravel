
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Bootstrap -->
    <link href="{{ asset('themeFile/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('themeFile/vendors/bootstrap-rtl/dist/css/bootstrap-rtl.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('themeFile./vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('themeFile/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{ asset('themeFile/vendors/animate.css/animate.min.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('themeFile/build/css/custom.css')}}" rel="stylesheet">
  
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>
      <a class="hiddenanchor" id="reset"></a>


     

      <div class="login_wrapper">
     
        <div class="animate form login_form">
    
          <section class="login_content">
          
          <form method="POST" action="registeruser" enctype="multipart/form-data">
              <h1>فرم ورود</h1>
              <div>
              <input type="text" class="form-control" name="name" placeholder="اسم" required="" />
              </div>

              <div>
              <input type="text" class="form-control" name="last_name" placeholder="تخلص" required="" />
              </div>

              <div>
              <input type="email" id="email" class="form-control" name="email" placeholder="ایمیل" required="" />
              </div>

              <div>
              <input type="password" class="form-control" name="password" placeholder="رمز ورود" required="" />
              </div>

              <div>
              <input type="file" class="form-control" name="img"  required=""/>
              </div>

              <div style="margin-top:10px;  text-align= right; important">
                <button type="submit" style="width= 100px;" class="btn btn-primary">رجستر</>
              </div>

          
              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">در حال حاضر عضو هستید؟
                  <a href="{{url('login')}}" class="to_register"> ورود </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                <h1><i class="fa fa-home"></i> Karapp</h1>
                  <p>به پنل مدیریتی اپلکیشن Karapp خوش آمدید.</p>
                </div>
              </div>
            </form>
           
          </section>
        </div>
        <div id="register" class="animate form registration_form">
          <section class="login_content">
            
          </section>
        </div>
        
      </div>
    </div>
  </body>
</html>

