@extends('layouts.layoutuser')
@section('content')
<div class="container-fluid py-5 mb-5">
    <div class="container">
        <div class="contact-detail position-relative p-5">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeIn" data-wow-delay=".5s">
                    <div class="p-5 rounded contact-form">
                        <form action="create-reports" method="post">
                            @csrf
                            <div class="mb-4">
                                @if($student->student_code)
                                <input type="number" class="form-control border-0 py-3" name="sender_code" value = "{{$student->student_code}}" placeholder="Mã số của bạn" required>
                                @else
                                <input type="number" class="form-control border-0 py-3" name="sender_code" placeholder="Mã số của bạn" required>
                                @endif
                            </div>
                            <div class="mb-4">
                                @if($student->email)
                                <input type="email" class="form-control border-0 py-3" name="sender_email" value = "{{$student->email}}" placeholder="Email của bạn" required>
                                @else
                                <input type="email" class="form-control border-0 py-3" name="sender_email" placeholder="Email của bạn" required>
                                @endif
                            </div>
                            <div class="mb-4">
                                <select style="background-color: white;" class="form-control" name="name" required>
                                    @if($id_user)
                                    <option value="Sự cố tại ( {{$trans->criteria_name}} )">Sự cố tại ( {{$trans->criteria_name}} )</option>
                                    @else
                                    <option value="Yêu cầu cấp tài khoản hoặc cấp lại mật khẩu">Yêu cầu cấp tài khoản hoặc cấp lại mật khẩu</option>
                                    @endif
                                </select>
                            </div>
                            <div class="mb-4">
                                <textarea class="w-100 form-control border-0 py-3" rows="6" cols="10" name="description" placeholder="Mô tả chi tiết"></textarea>
                            </div>
                            <div class="text-start">
                                <button class="btn bg-primary text-white py-3 px-5" type="submit">Báo cáo sự cố</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
