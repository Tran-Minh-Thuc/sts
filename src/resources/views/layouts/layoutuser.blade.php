<!DOCTYPE html>
<html lang="en">

<head>
    <title>Trường Đại học Sài Gòn</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/ico/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-v5.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style_user.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style_tab.css') }}" />
</head>

<body>

    <div class="container-fluid bg-primary">
        <div class="container">
            <nav class="navbar navbar-dark navbar-expand-lg py-0">
                <a href="index.html" class="navbar-brand">
                    <img src="{{ asset('images/logo-sgu.png') }}" style="max-height: 70px;" class="img-fluid" alt="First slide">
                </a>
                <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse bg-transparent" id="navbarCollapse">
                    <div class="navbar-nav ms-auto mx-xl-auto p-0">
                        <a href="index.html" class="nav-item nav-link active text-secondary">Home</a>
                        <a href="about.html" class="nav-item nav-link">Thông báo</a>
                        @if(session('permission') == 2)
                        <a href="ratting-class" class="nav-item nav-link">Danh sách lớp</a>
                        @else
                        <a href="rattingscore" class="nav-item nav-link">Đánh giá điểm rèn luyện</a>
                        @endif
                        <a href="project.html" class="nav-item nav-link">Lịch sử đánh giá</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Tài khoản</a>
                            <div class="dropdown-menu rounded">
                                <a href="blog.html" class="dropdown-item">Xem thông tin</a>
                                <a href="team.html" class="dropdown-item">Đổi mật khẩu</a>
                                <a href="/logout" class="dropdown-item">Đăng Xuất</a>
                            </div>
                        </div>
                    </div>
                </div>

            </nav>
        </div>
    </div>
    <div class="container-fluid px-0">
        <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active" aria-current="true" aria-label="First slide"></li>
                <li data-bs-target="#carouselId" data-bs-slide-to="1" aria-label="Second slide"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img src="{{ asset('images/carousel-1.jpg') }}" class="img-fluid" alt="First slide">
                    <div class="carousel-caption">
                        <div class="container carousel-content">
                            <h3 class="mb-4 text-white fs-5 animated fadeInDown">Đại học Sài Gòn vươn tới những vì sao hihi</h3>
                            <div style="padding-top: 25px;" class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px; visibility: visible; animation-delay: 0.3s; animation-name: fadeIn;">
                                <button style="background-color:#0d6efd; border: none;" href="" class="btn btn-secondary text-white px-5 py-3 rounded-pill">Đọc Thêm</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/carousel-1.jpg') }}" class="img-fluid" alt="First slide">
                    <div class="carousel-caption">
                        <div class="container carousel-content">
                            <h3 class="mb-4 text-white fs-5 animated fadeInDown">Đại học Sài Gòn tương lai tươi sáng lạng</h3>
                            <div style="padding-top: 25px;" class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px; visibility: visible; animation-delay: 0.3s; animation-name: fadeIn;">
                                <button style="background-color:#0d6efd; border: none;" href="" class="btn btn-secondary text-white px-5 py-3 rounded-pill">Đọc Thêm</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="container-fluid py-5 mb-5">
        @yield('content')
    </div>

    <div class="container-fluid bg-primary" data-wow-delay=".3s">
        <div class="container pt-5 pb-4">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <a href="index.html">
                        <img src="{{ asset('images/logo-sgu.png') }}" style="max-height: 70px;" class="img-fluid" alt="First slide">
                    </a>
                    <p class="mt-4 text-light">Đại Học Sài Gòn là một ngôi trường củ cặc</p>
                    <div class="d-flex hightech-link">
                        <a href="" class="btn-light nav-fill btn btn-square rounded-circle me-2"><i class="fab fa-facebook-f text-primary"></i></a>
                        <a href="" class="btn-light nav-fill btn btn-square rounded-circle me-2"><i class="fab fa-twitter text-primary"></i></a>
                        <a href="" class="btn-light nav-fill btn btn-square rounded-circle me-2"><i class="fab fa-instagram text-primary"></i></a>
                        <a href="" class="btn-light nav-fill btn btn-square rounded-circle me-0"><i class="fab fa-linkedin-in text-primary"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="#" class="h3 text-secondary">Thông tin Đào tạo</a>
                    <div class="mt-4 d-flex flex-column short-link">
                        <a href="" class="mb-2 text-white"><i class="fas fa-angle-right text-secondary me-2"></i>Thông tin Đào tạo</a>
                        <a href="" class="mb-2 text-white"><i class="fas fa-angle-right text-secondary me-2"></i>Thông tin Đào tạo</a>
                        <a href="" class="mb-2 text-white"><i class="fas fa-angle-right text-secondary me-2"></i>Thông tin Đào tạo</a>
                        <a href="" class="mb-2 text-white"><i class="fas fa-angle-right text-secondary me-2"></i>Thông tin Đào tạo</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="#" class="h3 text-secondary">Khoa Công Nghệ thông tin</a>
                    <div class="mt-4 d-flex flex-column help-link">
                        <a href="" class="mb-2 text-white"><i class="fas fa-angle-right text-secondary me-2"></i>Khoa củ cặc</a>
                        <a href="" class="mb-2 text-white"><i class="fas fa-angle-right text-secondary me-2"></i>Khoa củ cặc</a>
                        <a href="" class="mb-2 text-white"><i class="fas fa-angle-right text-secondary me-2"></i>Khoa củ cặc</a>
                        <a href="" class="mb-2 text-white"><i class="fas fa-angle-right text-secondary me-2"></i>Khoa củ cặc</a>

                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="#" class="h3 text-secondary">Liên Hệ</a>
                    <div class="text-white mt-4 d-flex flex-column contact-link">
                        <a href="#" class="pb-3 text-light border-bottom border-primary"><i class="fas fa-map-marker-alt text-secondary me-2"></i> 273 ANV</a>
                        <a href="#" class="py-3 text-light border-bottom border-primary"><i class="fas fa-phone-alt text-secondary me-2"></i> 0773361533</a>
                        <a href="#" class="py-3 text-light border-bottom border-primary"><i class="fas fa-envelope text-secondary me-2"></i> sgu@sgu</a>
                    </div>
                </div>
            </div>
            <hr class="text-light mt-5 mb-4">

        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('js/scripts/main.js') }}" />
</body>

</html>