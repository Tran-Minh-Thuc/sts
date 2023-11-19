@extends('layouts.layouts')
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
            <div class="content-header-left col-md-4 col-12 mb-2">
                <h3 class="content-header-title">Chỉnh sửa field</h3>
            </div>
        </div>
        <div class="content-body">
            <section id="content-types">
                <div class="row">
                    <div class="col-12 mt-3 mb-1">

                    </div>
                </div>
                <div class="row match-height">
                    <div class="col-xl-6 col-md-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <form action="create-teachers" method="post" enctype="multipart/form-data" id="formCreateTecher">
                                        @csrf
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label for="donationinput3" class="sr-only">Hình ảnh</label>
                                                <div data-img="" style="float:left; width: 49%; height:200px ;margin-bottom:15px;" id="update-image-img" class="form-control"></div>
                                                <input style="float:right ; width: 49%; margin-top: 50px;margin-bottom: 50px" name="image" type="file" onclick="previewImage()" id="update-image-btn" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="donationinput1" class="sr-only">Họ và tên</label>
                                                <input type="text" id="donationinput1" class="form-control" placeholder="Họ và tên" name="full_name" value="">
                                            </div>
                                            <div class="form-group">
                                                <label for="donationinput2" class="sr-only">Mã giảng viên</label>
                                                <input type="number" id="donationinput2" class="form-control" placeholder="Mã giảng viên" name="teacher_code" onblur="checkTeacherCode()">
                                            </div>
                                            <div class="form-group">
                                                <label for="donationinput7" class="sr-only">Giới tính</label>
                                                <fieldset class="form-group">
                                                    <select class="form-control" id="basicSelect" name="sex">
                                                        <option value="Nam">Nam</option>
                                                        <option value="Nữ">Nữ</option>
                                                    </select>
                                                </fieldset>
                                            </div>
                                            <div class="form-group">
                                                <label for="donationinput3" class="sr-only">Ngày sinh</label>
                                                <input type="date" id="donationinput3" class="form-control" placeholder="Ngày sinh" name="date_of_birth">
                                            </div>
                                            <div class="form-group">
                                                <label for="donationinput7" class="sr-only">Nơi sinh</label>
                                                <fieldset class="form-group">
                                                    <select class="form-control" id="basicSelect2" name="place_of_birth">
                                                        @foreach($provinces as $province)
                                                        <option value="{{$province['name']}}">{{$province['name']}}</option>
                                                        @endforeach
                                                    </select>
                                                </fieldset>
                                            </div>
                                            <div class="form-group">
                                                <label for="donationinput3" class="sr-only">Số điện thoại</label>
                                                <input type="number" id="donationinput4" class="form-control" placeholder="Số điện thoại" name="phone_number">
                                            </div>
                                            <div class="form-group">
                                                <label for="donationinput3" class="sr-only">CMND</label>
                                                <input type="number" id="donationinput5" class="form-control" placeholder="CMND" name="id_citizent">
                                            </div>
                                            <div class="form-group">
                                                <label for="donationinput3" class="sr-only">Email</label>
                                                <input type="email" id="donationinput6" class="form-control" placeholder="Email" name="email">
                                            </div>

                                        </div>
                                        <div class="form-actions center">
                                            <button type="submit" class="btn btn-outline-primary">Send</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<script>
    var teacherData = @json($teachers);
    $(document).ready(function() {
        $('form').submit(function(event) {
            event.preventDefault();

            var fullName = $('#donationinput1').val();
            var teacherCode = $('#donationinput2').val();
            var sex = $('#basicSelect').val();
            var dateOfBirth = $('#donationinput3').val();
            var placeOfBirth = $('#basicSelect2').val();
            var phoneNumber = $('#donationinput4').val();
            var id = $('#donationinput5').val();
            var email = $('#donationinput6').val();

            if (fullName.trim() === '') {
                alert('Vui lòng nhập Họ và tên.');
                return;
            }

            if (teacherCode.trim() === '' || isNaN(teacherCode)) {
                alert('Vui lòng nhập Mã giảng viên là một số.');
                return;
            }

            if (sex.trim() === '') {
                alert('Vui lòng chọn giới tính.');
                return;
            }

            if (dateOfBirth.trim() === '') {
                alert('Vui lòng nhập Ngày sinh.');
                return;
            }

            if (placeOfBirth.trim() === '') {
                alert('Vui lòng chọn Nơi sinh.');
                return;
            }

            if (phoneNumber.trim() === '' || isNaN(phoneNumber)) {
                alert('Vui lòng nhập Số điện thoại là một số.');
                return;
            }

            if (id.trim() === '' || isNaN(id)) {
                alert('Vui lòng nhập CMND là một số.');
                return;
            }

            if (email.trim() === '' || !isValidEmail(email)) {
                alert('Vui lòng nhập Email hợp lệ.');
                return;
            }

            // Nếu tất cả các kiểm tra qua, bạn có thể tiếp tục submit form.
            $('form').unbind('submit').submit();
        });

        // Hàm kiểm tra email hợp lệ
        function isValidEmail(email) {
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }
    });


    function previewImage() {
        const inputFile = document.querySelector('#update-image-btn');
        const imgArea = document.querySelector('#update-image-img');
        inputFile.addEventListener('change', function() {
            const image = this.files[0];
            console.log(image);
            const reader = new FileReader();
            reader.onload = () => {
                const allImg = imgArea.querySelectorAll('img');
                allImg.forEach(item => item.remove());
                const imgUrl = reader.result;
                const img = document.createElement('img');
                img.style.width = "100%";
                img.style.height = "100%";
                img.src = imgUrl;
                imgArea.appendChild(img);
                imgArea.classList.add('active');
                imgArea.dataset.img = image.name;
            }
            reader.readAsDataURL(image)

        })
    }

    function checkTeacherCode() {
        var teacherCode = document.getElementById('donationinput2').value;
        var exists = teacherData.some(function(item) {
            return item.teacher_code == teacherCode;
        });
        if (exists) {
            alert('Mã giảng viên đã tồn tại');
            document.getElementById('donationinput2').value = '';
        }
    }
</script>
@endsection