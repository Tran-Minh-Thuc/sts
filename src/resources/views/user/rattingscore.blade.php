@extends('layouts.layoutuser')
@section('content')
<div class="container">
    <div class="row">
        <div class="process">
            <div class="process-row nav nav-tabs">
                <div class="process-step">
                    <button onclick="openTab('tab1')" type="button" class="btn btn-info btn-circle" data-toggle="tab" href="#menu1"><i class="la la-angle-double-right fa-3x"></i></button>
                    <p><small>Ý thức<br />và kết quả học tập</small></p>
                </div>
                <div class="process-step">
                    <button onclick="openTab('tab2')" type="button" class="btn btn-default btn-circle" data-toggle="tab" href="#menu2"><i class="la la-angle-double-right fa-3x"></i></button>
                    <p><small>Ý thức<br />và kết quả chấp hành</small></p>
                </div>
                <div class="process-step">
                    <button onclick="openTab('tab3')" type="button" class="btn btn-default btn-circle" data-toggle="tab" href="#menu3"><i class="la la-angle-double-right fa-3x"></i></button>
                    <p><small>Ý thức và kết<br /> quả tham gia hoạt động</small></p>
                </div>
                <div class="process-step">
                    <button onclick="openTab('tab4')" type="button" class="btn btn-default btn-circle" data-toggle="tab" href="#menu4"><i class="la la-angle-double-right fa-3x"></i></button>
                    <p><small>Ý thức và kết quả <br /> cộng dồn trong cộng đồng</small></p>
                </div>
                <div class="process-step">
                    <button onclick="openTab('tab5')" type="button" class="btn btn-default btn-circle" data-toggle="tab" href="#menu5"><i class="fa fa-check fa-3x"></i></button>
                    <p><small>Ý thức và kết quả<br />tham gia phụ trách</small></p>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="tab1" class="row tab-content active-content">
    <div class="col-12">
        <div class="card">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
            <div style="padding-top: 25px;" class="text-center mx-auto pb-5  " style="max-width: 600px;   ">
                <h4>ĐÁNH GIÁ Ý THỨC HỌC TẬP 1</h4>
            </div>
            <div class="card-content collapse show" id="menu1">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nội Dung Đánh Giá</th>
                                    <th>Điểm Sinh Viên Tự Đánh Giá</th>
                                    <th>Điểm lớp đánh giá</th>
                                    <th>Ghi Chú</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Điểm trung bình chung học kì từ 3,60 đến 4,00</td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                </tr>
                                <tr>
                                    <td>Điểm trung bình chung học kì từ 3,60 đến 4,00</td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                </tr>
                                <tr>
                                    <td>Điểm trung bình chung học kì từ 3,60 đến 4,00</td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                </tr>
                                <tr>
                                    <td>Điểm trung bình chung học kì từ 3,60 đến 4,00</td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                </tr>
                                <tr>
                                    <td>Điểm trung bình chung học kì từ 3,60 đến 4,00</td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                </tr>
                                <tr>
                                    <td>Điểm trung bình chung học kì từ 3,60 đến 4,00</td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                </tr>
                                <tr>
                                    <td>Điểm trung bình chung học kì từ 3,60 đến 4,00</td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                </tr>
                            </tbody>
                        </table>
                        <div style="padding-top: 25px;" class="text-center mx-auto pb-5  " style="max-width: 600px;   ">
                            <button style="background-color:#0d6efd; border: none;" href="" class="btn btn-secondary text-white px-5 py-3 rounded-pill">Lưu và tiếp tục</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="tab2" class="row tab-content">
    <div class="col-12">
        <div class="card">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
            <div style="padding-top: 25px;" class="text-center mx-auto pb-5  " style="max-width: 600px;   ">
                <h4>ĐÁNH GIÁ Ý THỨC HỌC TẬP 2</h4>
            </div>
            <div class="card-content collapse show" id="menu1">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nội Dung Đánh Giá</th>
                                    <th>Điểm Sinh Viên Tự Đánh Giá</th>
                                    <th>Điểm lớp đánh giá</th>
                                    <th>Ghi Chú</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Điểm trung bình chung học kì từ 3,60 đến 4,00</td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                </tr>
                                <tr>
                                    <td>Điểm trung bình chung học kì từ 3,60 đến 4,00</td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                </tr>
                                <tr>
                                    <td>Điểm trung bình chung học kì từ 3,60 đến 4,00</td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                </tr>
                                <tr>
                                    <td>Điểm trung bình chung học kì từ 3,60 đến 4,00</td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                </tr>
                                <tr>
                                    <td>Điểm trung bình chung học kì từ 3,60 đến 4,00</td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                </tr>
                                <tr>
                                    <td>Điểm trung bình chung học kì từ 3,60 đến 4,00</td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                </tr>
                                <tr>
                                    <td>Điểm trung bình chung học kì từ 3,60 đến 4,00</td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                </tr>
                            </tbody>
                        </table>
                        <div style="padding-top: 25px;" class="text-center mx-auto pb-5  " style="max-width: 600px;   ">
                            <button style="background-color:#0d6efd; border: none;" href="" class="btn btn-secondary text-white px-5 py-3 rounded-pill">Lưu và tiếp tục</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="tab3" class="row tab-content">
    <div class="col-12">
        <div class="card">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
            <div style="padding-top: 25px;" class="text-center mx-auto pb-5  " style="max-width: 600px;   ">
                <h4>ĐÁNH GIÁ Ý THỨC HỌC TẬP 3</h4>
            </div>
            <div class="card-content collapse show" id="menu1">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nội Dung Đánh Giá</th>
                                    <th>Điểm Sinh Viên Tự Đánh Giá</th>
                                    <th>Điểm lớp đánh giá</th>
                                    <th>Ghi Chú</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Điểm trung bình chung học kì từ 3,60 đến 4,00</td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                </tr>
                                <tr>
                                    <td>Điểm trung bình chung học kì từ 3,60 đến 4,00</td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                </tr>
                                <tr>
                                    <td>Điểm trung bình chung học kì từ 3,60 đến 4,00</td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                </tr>
                                <tr>
                                    <td>Điểm trung bình chung học kì từ 3,60 đến 4,00</td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                </tr>
                                <tr>
                                    <td>Điểm trung bình chung học kì từ 3,60 đến 4,00</td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                </tr>
                                <tr>
                                    <td>Điểm trung bình chung học kì từ 3,60 đến 4,00</td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                </tr>
                                <tr>
                                    <td>Điểm trung bình chung học kì từ 3,60 đến 4,00</td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                </tr>
                            </tbody>
                        </table>
                        <div style="padding-top: 25px;" class="text-center mx-auto pb-5  " style="max-width: 600px;   ">
                            <button style="background-color:#0d6efd; border: none;" href="" class="btn btn-secondary text-white px-5 py-3 rounded-pill">Lưu và tiếp tục</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="tab4" class="row tab-content">
    <div class="col-12">
        <div class="card">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
            <div style="padding-top: 25px;" class="text-center mx-auto pb-5  " style="max-width: 600px;   ">
                <h4>ĐÁNH GIÁ Ý THỨC HỌC TẬP 4</h4>
            </div>
            <div class="card-content collapse show" id="menu1">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nội Dung Đánh Giá</th>
                                    <th>Điểm Sinh Viên Tự Đánh Giá</th>
                                    <th>Điểm lớp đánh giá</th>
                                    <th>Ghi Chú</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Điểm trung bình chung học kì từ 3,60 đến 4,00</td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                </tr>
                                <tr>
                                    <td>Điểm trung bình chung học kì từ 3,60 đến 4,00</td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                </tr>
                                <tr>
                                    <td>Điểm trung bình chung học kì từ 3,60 đến 4,00</td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                </tr>
                                <tr>
                                    <td>Điểm trung bình chung học kì từ 3,60 đến 4,00</td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                </tr>
                                <tr>
                                    <td>Điểm trung bình chung học kì từ 3,60 đến 4,00</td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                </tr>
                                <tr>
                                    <td>Điểm trung bình chung học kì từ 3,60 đến 4,00</td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                </tr>
                                <tr>
                                    <td>Điểm trung bình chung học kì từ 3,60 đến 4,00</td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                </tr>
                            </tbody>
                        </table>
                        <div style="padding-top: 25px;" class="text-center mx-auto pb-5" style="max-width: 600px;   ">
                            <button style="background-color:#0d6efd; border: none;" href="" class="btn btn-secondary text-white px-5 py-3 rounded-pill">Lưu và tiếp tục</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="tab5" class="row tab-content">
    <div class="col-12">
        <div class="card">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
            <div style="padding-top: 25px;" class="text-center mx-auto pb-5  " style="max-width: 600px;   ">
                <h4>ĐÁNH GIÁ Ý THỨC HỌC TẬP 5</h4>
            </div>
            <div class="card-content collapse show" id="menu1">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nội Dung Đánh Giá</th>
                                    <th>Điểm Sinh Viên Tự Đánh Giá</th>
                                    <th>Điểm lớp đánh giá</th>
                                    <th>Ghi Chú</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Điểm trung bình chung học kì từ 3,60 đến 4,00</td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                </tr>
                                <tr>
                                    <td>Điểm trung bình chung học kì từ 3,60 đến 4,00</td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                </tr>
                                <tr>
                                    <td>Điểm trung bình chung học kì từ 3,60 đến 4,00</td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                </tr>
                                <tr>
                                    <td>Điểm trung bình chung học kì từ 3,60 đến 4,00</td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                </tr>
                                <tr>
                                    <td>Điểm trung bình chung học kì từ 3,60 đến 4,00</td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                </tr>
                                <tr>
                                    <td>Điểm trung bình chung học kì từ 3,60 đến 4,00</td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                </tr>
                                <tr>
                                    <td>Điểm trung bình chung học kì từ 3,60 đến 4,00</td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                    <td><input type="text" class="form-control border-0 py-3" placeholder="25"></td>
                                </tr>
                            </tbody>
                        </table>
                        <div style="padding-top: 25px;" class="text-center mx-auto pb-5  " style="max-width: 600px;   ">
                            <button style="background-color:#0d6efd; border: none;" href="" class="btn btn-secondary text-white px-5 py-3 rounded-pill">Lưu và tiếp tục</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script>
    function openTab(tabId) {
        // Hide all tab contents
        var tabContents = document.querySelectorAll('.tab-content');
        tabContents.forEach(function(tabContent) {
            tabContent.classList.remove('active-content');
        });

        // Deactivate all tabs
        var tabs = document.querySelectorAll('.tab');
        tabs.forEach(function(tab) {
            tab.classList.remove('active-tab');
        });

        // Show the selected tab content
        document.getElementById(tabId).classList.add('active-content');

        // Activate the selected tab
        var activeTab = document.querySelector('.tab[data-tab="' + tabId + '"]');
        activeTab.classList.add('active-tab');
    }
</script>