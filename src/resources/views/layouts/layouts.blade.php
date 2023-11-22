<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
  <title>Trường Đại học Sài Gòn</title>
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/ico/favicon.ico') }}">
  <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700" rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/vendors.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/app-lite.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/core/menu/menu-types/vertical-menu.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/core/colors/palette-gradient.css') }}" />
  <!-- Thư viện jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Thư viện jQuery Validate -->
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.19.3/jquery.validate.min.js"></script>


  <!-- Thư viện Bootstrap CSS và JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>

<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-gradient-x-purple-blue" data-col="2-columns">
  <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light">
    <div class="navbar-wrapper">
      <div class="navbar-container content">
        <ul class="nav navbar-nav float-right">
          <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown"> <span class="avatar avatar-online"><img src="data:image/png;base64, {{session('user_info')->image}}" alt="avatar"><i></i></span></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="arrow_box_right"><a class="dropdown-item" href="#"><span class="avatar avatar-online"><img src="data:image/png;base64, {{session('user_info')->image}}" alt="avatar"><span class="user-name text-bold-700 ml-1">{{session('user_info')->full_name}}</span></span></a>
                <div class="dropdown-divider"></div><a class="dropdown-item" href="/logout"><i class="ft-power"></i> Logout</a>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
    </div>
  </nav>
  <div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true" data-img="theme-assets/images/backgrounds/02.jpg">
    <div class="navbar-header">
      <ul class="nav navbar-nav flex-row">
        <li class="nav-item mr-auto"><a class="navbar-brand" href="index.html"><img class="brand-logo" alt="Chameleon admin logo" src="{{ asset('images/logo/logo.png') }}" />
            <h3 class="brand-text">Đại học Sài Gòn</h3>
          </a></li>
        <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
      </ul>
    </div>
    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <li class=" nav-item"><a href="accounts"><i class="la la-user"></i><span class="menu-title" data-i18n="">Tài khoản</span></a>
        </li>
        <li class=" nav-item"><a href="students"><i class="la la-graduation-cap"></i><span class="menu-title" data-i18n="">Sinh Viên</span></a>
        </li>
        <!-- active -->
        <li class=" nav-item"><a href="teachers"><i class="la la-certificate"></i><span class="menu-title" data-i18n="">Giảng viên</span></a>
        </li>
        <li class=" nav-item"><a href="classes"><i class="la la-headphones"></i><span class="menu-title" data-i18n="">Lớp học</span></a>
        </li>
        <li class=" nav-item"><a href="notices"><i class="la la-newspaper-o"></i><span class="menu-title" data-i18n="">Thông báo</span></a>
        </li>
        <li class=" nav-item"><a href="criterias"><i class="la la-newspaper-o"></i><span class="menu-title" data-i18n="">Trường đánh giá</span></a>
        </li>
        <li class=" nav-item"><a href="courses"><i class="la la-volume-up"></i><span class="menu-title" data-i18n="">Khóa học</span></a>
        </li>
        <li class=" nav-item"><a href="permissions"><i class="la la-volume-up"></i><span class="menu-title" data-i18n="">Quyền</span></a>
        </li>
        <li class=" nav-item"><a href="semesters"><i class="la la-volume-up"></i><span class="menu-title" data-i18n="">Học kì</span></a>
        </li>
        <li class=" nav-item"><a href="transcripts"><i class="la la-volume-up"></i><span class="menu-title" data-i18n="">Đánh giá</span></a>
        </li>
        <li class=" nav-item"><a href="reports"><i class="la la-volume-up"></i><span class="menu-title" data-i18n="">Báo cáo</span></a>
        </li>
        <li class=" nav-item"><a href="action"><i class="la la-volume-up"></i><span class="menu-title" data-i18n="">Nhập liệu</span></a>
        </li>
      </ul>
    </div>
    <div class="navigation-background"></div>
  </div>
  @yield('content')
  <!--content -->
  <footer class="footer footer-static footer-light navbar-border navbar-shadow">
    <div class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">Lê Đức Thành - Trần Minh Thức <a class="text-bold-800 grey darken-2" href="#" target="_blank"></a></span>
    </div>
  </footer>
  <script src="{{ asset('js/core/app-lite.js') }}" type="text/javascript"></script>
</body>

</html>
