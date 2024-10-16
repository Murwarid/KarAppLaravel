
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
      @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
        <div class="animate form login_form">
          <section class="login_content">
            <form method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
              <h1> ورود</h1>
              <div>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus />
              
              </div>
              <div>
                <input id="password" type="password" class="form-control" name="password" required />
                @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
              </div>
              <div>
                  <button type="submit" class="btn btn-default">
                      وارد شدن
                  </button>
                <!-- <a class="reset_pass" href="#reset">رمز ورود را از دست دادید؟</a> -->
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-home"></i>KarApp</h1>
                  <p>به پنل مدیریتی اپلکیشن KarApp خوش آمدید.</p>
                  
                </div>
              </div>
            </form>
          </section>
        </div>
        
       
      </div>
    </div>
  </body>
</html>

