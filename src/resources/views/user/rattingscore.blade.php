@extends('layouts.layoutuser')
@section('content')
<div class="container">
    <div class="row">
        <div class="process">
            <div class="process-row nav nav-tabs">
                <div class="process-step">
                    <button type="button" class="btn btn-info btn-circle" data-toggle="tab" href="#menu1"><i class="la la-angle-double-right fa-3x"></i></button>
                    <p><small>Ý thức<br />và kết quả học tập</small></p>
                </div>
                <div class="process-step">
                    <button type="button" class="btn btn-default btn-circle" data-toggle="tab" href="#menu2"><i class="la la-angle-double-right fa-3x"></i></button>
                    <p><small>Ý thức<br />và kết quả chấp hành</small></p>
                </div>
                <div class="process-step">
                    <button type="button" class="btn btn-default btn-circle" data-toggle="tab" href="#menu3"><i class="la la-angle-double-right fa-3x"></i></button>
                    <p><small>Ý thức và kết<br /> quả tham gia hoạt động</small></p>
                </div>
                <div class="process-step">
                    <button type="button" class="btn btn-default btn-circle" data-toggle="tab" href="#menu4"><i class="la la-angle-double-right fa-3x"></i></button>
                    <p><small>Ý thức và kết quả <br /> cộng dồn trong cộng đồng</small></p>
                </div>
                <div class="process-step">
                    <button type="button" class="btn btn-default btn-circle" data-toggle="tab" href="#menu5"><i class="fa fa-check fa-3x"></i></button>
                    <p><small>Ý thức và kết quả<br />tham gia phụ trách</small></p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div style="padding-top: 25px;" class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px; visibility: visible; animation-delay: 0.3s; animation-name: fadeIn;">
                <h4>ĐÁNH GIÁ Ý THỨC HỌC TẬP</h4>
            </div>

            <div class="card-content collapse show">
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
                        <div style="padding-top: 25px;" class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px; visibility: visible; animation-delay: 0.3s; animation-name: fadeIn;">
                            <button style="background-color:#0d6efd; border: none;" href="" class="btn btn-secondary text-white px-5 py-3 rounded-pill">Lưu và tiếp tục</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection