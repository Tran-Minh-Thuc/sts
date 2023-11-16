@extends('layouts.layoutuser')
@section('content')
<div class="container-fluid py-5 mb-5">
    <div class="container">
        <div class="contact-detail position-relative p-5">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeIn" data-wow-delay=".5s">
                    <div class="p-5 rounded contact-form">
                        <div class="mb-4">
                            <input type="text" class="form-control border-0 py-3" placeholder="Tên của bạn">
                        </div>
                        <div class="mb-4">
                            <input type="email" class="form-control border-0 py-3" placeholder="Email của bạn">
                        </div>
                        <div class="mb-4">
                            <input type="text" class="form-control border-0 py-3" placeholder="Tiêu đề sự cố">
                        </div>
                        <div class="mb-4">
                            <textarea class="w-100 form-control border-0 py-3" rows="6" cols="10" placeholder="Mô tả chi tiết"></textarea>
                        </div>
                        <div class="text-start">
                            <button class="btn bg-primary text-white py-3 px-5" type="button">Báo cáo sự cố</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection