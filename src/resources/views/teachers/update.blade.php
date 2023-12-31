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
                                    <form action="update-teachers/{{$teacher['id']}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label for="donationinput3" class="sr-only">Email</label>
                                                <div data-img="" style="float:left; width: 49%; height:200px ;margin-bottom: 15px; display: none;" id="update-image-img" class="form-control"></div>
                                                <img style="float:left; width: 49%; height:200px ;margin-bottom: 15px;" id="update-image-prv" src="data:image/png;base64,{{$teacher['image']}}" class="form-control">
                                                <input style="float:right ; width: 49%; margin-top: 50px;margin-bottom: 50px;" type="button" value="Thay đổi hình ảnh mới ?" onclick="viewButtonChangeImg()" id="update-image-qs" class="form-control">
                                                <input style="float:right ; width: 49%; margin-top: 50px;margin-bottom: 50px;display: none;" name="image" type="file" onclick="previewImage()" id="update-image-btn" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="donationinput1" class="sr-only">Họ và tên</label>
                                                <input type="text" id="donationinput1" class="form-control" placeholder="Họ và tên" name="full_name" value="{{$teacher['full_name']}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="donationinput1" class="sr-only">Mã giảng viên</label>
                                                <input type="number" id="donationinput1" class="form-control" placeholder="Mã giảng viên" name="teacher_code" value="{{$teacher['teacher_code']}}">
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
                                                <input type="date" id="donationinput3" class="form-control" value="{{$teacher['date_of_birth']}}" placeholder="Ngày sinh" name="date_of_birth">
                                            </div>
                                            <div class="form-group">
                                                <label for="donationinput7" class="sr-only">Giới tính</label>
                                                <fieldset class="form-group">
                                                    <select class="form-control" id="basicSelect" name="place_of_birth">
                                                        @foreach($provinces as $province)
                                                        @if ($teacher['place_of_birth'] == $province['name'])
                                                        <option value="{{$province['name']}}" selected>{{$province['name']}}</option>
                                                        @else
                                                        <option value="{{$province['name']}}">{{$province['name']}}</option>
                                                        @endif
                                                        @endforeach
                                                    </select>
                                                </fieldset>
                                            </div>
                                            <div class="form-group">
                                                <label for="donationinput3" class="sr-only">Số điện thoại</label>
                                                <input type="number" id="donationinput3" class="form-control" value="{{$teacher['phone_number']}}" placeholder="Số điện thoại" name="phone_number">
                                            </div>
                                            <div class="form-group">
                                                <label for="donationinput3" class="sr-only">CMND</label>
                                                <input type="number" id="donationinput3" class="form-control" value="{{$teacher['id_citizent']}}" placeholder="CMND" name="id_citizent">
                                            </div>
                                            <div class="form-group">
                                                <label for="donationinput3" class="sr-only">Email</label>
                                                <input type="email" id="donationinput3" class="form-control" value="{{$teacher['email']}}" placeholder="Email" name="email">
                                            </div>
                                            <div class="form-group">
                                                <label for="donationinput3" class="sr-only">Ngày tạo</label>
                                                <input type="text" id="donationinput3" class="form-control" value="{{$teacher['created_at']}}" placeholder="Ngày tạo" name="" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="donationinput3" class="sr-only">Chỉnh sửa gần nhất</label>
                                                <input type="text" id="donationinput3" class="form-control" value="{{$teacher['updated_at']}}" placeholder="Chỉnh sửa gần nhất" name="" readonly>
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
    function viewButtonChangeImg() {
        const btn = document.getElementById('update-image-btn');
        const qs = document.getElementById('update-image-qs');
        const prv = document.getElementById('update-image-prv');
        const img = document.getElementById('update-image-img');
        btn.style.display = "block";
        img.style.display = "block";
        qs.style.display = "none";
        prv.style.display = "none";
    }


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
</script>
@endsection
