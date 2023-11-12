<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>Trường Đại học Sài Gòn</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/ico/favicon.ico') }}">
  <link rel="stylesheet" href="{{ asset('css/util.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/main.css') }}" />
  <meta name="robots" content="noindex, follow">
</head>

<body>
  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <div class="login100-pic js-tilt" data-tilt="" style="transform: perspective(300px) rotateX(0deg) rotateY(0deg);">
          <img src="{{ asset('images/img-01.webp') }}" alt="IMG">
        </div>
        <form class="login100-form validate-form" name="login" method="get" action="{{ url('/admin/login') }}">
          <span class="login100-form-title">
            Admin Login
          </span>
          <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
            <input class="input100" type="text" name="username" placeholder="Tên người dùng">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-envelope" aria-hidden="true"></i>
            </span>
          </div>
          <div class="wrap-input100 validate-input" data-validate="Password is required">
            <input class="input100" type="password" name="password" placeholder="Password">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-lock" aria-hidden="true"></i>
            </span>
          </div>
          <!-- @if($resultLogin == 0)
          <div class="wrap-input100 validate-input">
            <span class="symbol-input100">
              <i class="fa fa-lock" aria-hidden="true">Vui lòng nhập lại</i>
            </span>
          </div>
          @endif -->
          <div class="container-login100-form-btn">
            <button class="login100-form-btn" type="submit">
              Login
            </button>
          </div>
          <div class="text-center p-t-12">
            <span class="txt1">
              Forgot
            </span>
            <a class="txt2" href="#">
              Username / Password?
            </a>
          </div>
          <div class="text-center p-t-136">
            <a class="txt2" href="#">
              Create your Account
              <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>