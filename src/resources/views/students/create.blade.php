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
                                    <form action="create-students" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label for="donationinput3" class="sr-only">Email</label>
                                                <div data-img="" style="float:left; width: 49%; height:200px ;margin-bottom:15px;" id="update-image-img" class="form-control" ></div>
                                                <input  style="float:right ; width: 49%; margin-top: 50px;margin-bottom: 50px" name="image" type="file" onclick="previewImage()" id="update-image-btn" class="form-control" >
                                            </div>
                                            <div class="form-group">
                                                <label for="donationinput1" class="sr-only">Họ và tên</label>
                                                <input type="text" id="donationinput1" class="form-control" placeholder="Họ và tên" name="full_name" value="">
                                            </div>
                                            <div class="form-group">
                                                <label for="donationinput7" class="sr-only">Lớp</label>
                                                <fieldset class="form-group">
                                                    <select class="form-control" id="basicSelect" name="class_id">
                                                    @foreach($classes as $class)
                                                    <option value="{{$class['id']}}">{{$class['name']}}</option>
                                                    @endforeach
                                                </select>
                                                </fieldset>
                                            </div>
                                            <div class="form-group">
                                                <label for="donationinput1" class="sr-only">Mã sinh viên</label>
                                                <input type="number" id="donationinput1" class="form-control" placeholder="Mã sinh viên" name="student_code" >
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
                                                <input type="date" id="donationinput3" class="form-control"  placeholder="Ngày sinh" name="date_of_birth">
                                            </div>
                                            <div class="form-group">
                                                <label for="donationinput7" class="sr-only">Giới tính</label>
                                                <fieldset class="form-group">
                                                    <select class="form-control" id="basicSelect" name="place_of_birth">
                                                        @foreach($provinces as $province)
                                                       <option value="{{$province['name']}}">{{$province['name']}}</option>
                                                        @endforeach
                                                    </select>
                                                </fieldset>
                                            </div>
                                            <div class="form-group">
                                                <label for="donationinput3" class="sr-only">Số điện thoại</label>
                                                <input type="number" id="donationinput3" class="form-control" placeholder="Số điện thoại" name="phone_number">
                                            </div>
                                            <div class="form-group">
                                                <label for="donationinput3" class="sr-only">CMND</label>
                                                <input type="number" id="donationinput3" class="form-control"  placeholder="CMND" name="id_citizent">
                                            </div>
                                            <div class="form-group">
                                                <label for="donationinput3" class="sr-only">Email</label>
                                                <input type="email" id="donationinput3" class="form-control"  placeholder="Email" name="email">
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
