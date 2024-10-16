<!DOCTYPE html>
<html dir="rtl">
<head> 
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('themeFiles/build/images/favicon.ico')}}" type="image/ico"/>
    <title>KarApp | کار اپ</title>

    <!-- Bootstrap -->
    <link href="{{ asset('themeFile/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('themeFile/vendors/bootstrap-rtl/dist/css/bootstrap-rtl.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('themeFile/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('themeFile/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="{{ asset('themeFile/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ asset('themeFile/vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('themeFile/vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
    <!-- <script src="{{ asset('themeFile/vendors/sweet/sweetalert.css')}}"></script> -->

<!-- bootstrap-wysiwyg -->
<link href="{{ asset('themeFile/vendors/google-code-prettify/bin/prettify.min.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('themeFile/build/css/custom.min.css')}}" rel="stylesheet">
    <!-- <script src="{{ asset('themeFile/sweetalert2/sweetalert2.min.css')}}"></script> -->
</head>
<!-- /header content -->
<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col hidden-print">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="{{ url('mainpage')}}" class="site_title"><i class="fa fa-home"></i> <span>KarApp</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="{{\Auth::user()->image}}" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>خوش آمدید</span>
                        <h2>{{\Auth::user()->name}} {{\Auth::user()->last_name}}</h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->

                <br/>

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                    
                        <ul class="nav side-menu">
                            <li><a><i class="fa fa-user"></i> کاربرها <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{url('usersdata')}}">کاربرهای فعال</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-edit"></i> پست های اپ <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{url('postdata')}}">پست ها</a></li>                                
                                </ul>
                            </li>

                            <li><a><i class="fa fa-file"></i>گزارشات <span
                                    class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{url('userReport')}}"> گزارشات کاربرها</a></li>
                                    <li><a href="{{url('postReport')}}"> گزارشات پست</a></li>
                                </ul>
                                
                            </li>
                           
                            

                            <li><a><i class="fa fa-cog"></i>تنظیمات حساب<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{url('userregister')}}">ایجاد حساب</a></li>
                                    <li><a href="{{url('edituserprofile')}}">تغیر پروفایل</a></li>
                                </ul>
                            </li>
                            
                        </ul>
                    </div>

                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="تنظیمات">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="تمام صفحه" onclick="toggleFullScreen();">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="قفل" class="lock_btn">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="خروج" href="login.html">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav hidden-print">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                               aria-expanded="false">
                                <img src="../build/images/img.jpg" alt="">{{\Auth::user()->name}} {{\Auth::user()->last_name}}
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="javascript:;"> نمایه</a></li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="badge bg-red pull-right">50%</span>
                                        <span>تنظیمات</span>
                                    </a>
                                </li>
                                <li><a href="javascript:;">کمک</a></li>

                                <li><a href="{{ url('/logout') }}" onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();"><i class="fa fa-sign-out pull-right"></i> خروج</a></li>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                         {{ csrf_field() }}
                          </form>
                            </ul>
                        </li>

                        <li role="presentation" class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown"
                               aria-expanded="false">
                                <i class="fa fa-envelope-o"></i>
                                <span class="badge bg-green">6</span>
                            </a>
                            <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                                <li>
                                    <a>
                                        <span class="image"><img src="../build/images/img.jpg"
                                                                 alt="Profile Image"/></span>
                                        <span>
                          <span>مرتضی کریمی</span>
                          <span class="time">3 دقیقه پیش</span>
                        </span>
                                        <span class="message">
                          فیلمای فستیوال فیلمایی که اجرا شده یا راجع به لحظات مرده ایه که فیلمسازا میسازن. آنها جایی بودند که....
                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="image"><img src="../build/images/img.jpg"
                                                                 alt="Profile Image"/></span>
                                        <span>
                          <span>مرتضی کریمی</span>
                          <span class="time">3 دقیقه پیش</span>
                        </span>
                                        <span class="message">
                          فیلمای فستیوال فیلمایی که اجرا شده یا راجع به لحظات مرده ایه که فیلمسازا میسازن. آنها جایی بودند که....
                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="image"><img src="../build/images/img.jpg"
                                                                 alt="Profile Image"/></span>
                                        <span>
                          <span>مرتضی کریمی</span>
                          <span class="time">3 دقیقه پیش</span>
                        </span>
                                        <span class="message">
                          فیلمای فستیوال فیلمایی که اجرا شده یا راجع به لحظات مرده ایه که فیلمسازا میسازن. آنها جایی بودند که....
                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="image"><img src="../build/images/img.jpg"
                                                                 alt="Profile Image"/></span>
                                        <span>
                          <span>مرتضی کریمی</span>
                          <span class="time">3 دقیقه پیش</span>
                        </span>
                                        <span class="message">
                          فیلمای فستیوال فیلمایی که اجرا شده یا راجع به لحظات مرده ایه که فیلمسازا میسازن. آنها جایی بودند که....
                        </span>
                                    </a>
                                </li>
                                <li>
                                    <div class="text-center">
                                        <a>
                                            <strong>مشاهده تمام اعلان ها</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->
<!-- page content -->
<div class="right_col" role="">
    <div class="">
        <div class="row top_tiles">
<!-- users -->
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-user-circle-o"></i></div>
                    <div class="count">{{$userss}}</div>
                    <h3> کاربر های فعال</h3>
                    <p> تعداد کاربرهای فعال</p>
                </div>
            </div>
<!-- app posts -->
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-edit"></i></div>
                    <div class="count">{{$posts}}</div>
                    <h3> پست ها اپ</h3>
                    <p>تعداد پست اپلیکیشن</p>
                </div>
            </div>
<!-- admin posts -->
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-file"></i></div>
                    <div class="count">{{$reportsu}}</div>
                    <h3>گزارشات کاربرها</h3>
                    <p>تعداد گزارشات در رابطه به کاربران</p>
                </div>
            </div>
            <!-- token -->
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-file"></i></div>
                    <div class="count">{{$reportsp}}</div>
                    <h3>گزارشات پست ها</h3>
                    <p>تعداد گزارشات در رابطه به پست</p>
                </div>
            </div>
        </div>

<div>
    
                    <section >
                        @yield('content')
                    </section>
                </div>
    </div>
    
</div>
            
<!-- /page content -->


        <!-- footer content -->
        <footer class="hidden-print">
            <div class="pull-left">
                
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>
<div id="lock_screen">
    <table>
        <tr>
            <td>
                <div class="clock"></div>
                <span class="unlock">
                    <span class="fa-stack fa-5x">
                      <i class="fa fa-square-o fa-stack-2x fa-inverse"></i>
                      <i id="icon_lock" class="fa fa-lock fa-stack-1x fa-inverse"></i>
                    </span>
                </span>
            </td>
        </tr>
    </table>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.css" rel="stylesheet" type="text/css">

<script src="https://code.jquery.com/jquery-3.4.1.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.js"></script>
<!-- jQuery -->
<script src="{{ asset('themeFile/vendors/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{ asset('themeFile/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{ asset('themeFile/vendors/fastclick/lib/fastclick.js')}}"></script>
<!-- NProgress -->
<script src="{{ asset('themeFile/vendors/nprogress/nprogress.js')}}"></script>
<!-- bootstrap-progressbar -->
<script src="{{ asset('themeFile/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
<!-- iCheck -->
<script src="{{ asset('themeFile/vendors/iCheck/icheck.min.js')}}"></script>

<!-- <script src="{{ asset('themeFile/vendors/sweet/sweetalert.js')}}"></script>
<script src="{{ asset('themeFile/vendors/sweet/sweetalert.min.js')}}"></script> -->


<!-- bootstrap-daterangepicker -->
<script src="{{ asset('themeFile/vendors/moment/min/moment.min.js')}}"></script>
<!-- <script src="{{ asset('themeFile/sweetalert2/sweetalert2.min.js')}}"></script> -->

<script src="{{ asset('themeFile/vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

<!-- bootstrap-wysiwyg -->
<script src="{{ asset('themeFile/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js')}}"></script>
<script src="{{ asset('themeFile/vendors/jquery.hotkeys/jquery.hotkeys.js')}}"></script>
<script src="{{ asset('themeFile/vendors/google-code-prettify/src/prettify.js')}}"></script>

<!-- Custom Theme Scripts -->
<script src="{{ asset('themeFile/build/js/custom.min.js')}}"></script>

</body>
</html>
