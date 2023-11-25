@extends('layouts.layouts')
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
            <div class="content-header-left col-md-4 col-12 mb-2">
                <h3 class="content-header-title">Chỉnh sửa thông báo</h3>
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
                                    <form action="update-notices/{{$notice['id']}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label for="donationinput3" class="sr-only">Email</label>
                                                <div data-img="" style="float:left; width: 49%; height:200px ;margin-bottom: 15px; display: none;" id="update-image-img" class="form-control"></div>
                                                <img style="float:left; width: 49%; height:200px ;margin-bottom: 15px;" id="update-image-prv" src="data:image/png;base64,{{$notice['image']}}" class="form-control">
                                                <input style="float:right ; width: 49%; margin-top: 50px;margin-bottom: 50px;" type="button" value="Thay đổi hình ảnh mới ?" onclick="viewButtonChangeImg()" id="update-image-qs" class="form-control">
                                                <input style="float:right ; width: 49%; margin-top: 50px;margin-bottom: 50px;display: none;" name="image" type="file" onclick="previewImage()" id="update-image-btn" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="donationinput1" class="sr-only">Nội dung thông báo</label>
                                                <textarea type="text" id="donationinput1" class="form-control" placeholder="Nội dung thông báo" name="name" cols="30" rows="10" >{{$notice['name']}}</textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="donationinput3" class="sr-only">Thời gian bắt đầu</label>
                                                <input type="date" id="donationinput3" class="form-control" placeholder="Thời gian bắt đầu" name="begin_time"  value="{{$notice['begin_time']}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="donationinput3" class="sr-only">Thời gian kết thúc</label>
                                                <input type="date" id="donationinput3" class="form-control" placeholder="Thời gian kết thúc" name="end_time"  value="{{$notice['end_time']}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="donationinput3" class="sr-only">Ghi chú</label>
                                                <input type="text" id="donationinput3" class="form-control" placeholder="Ghi chú" name="note"  value="{{$notice['note']}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="donationinput3" class="sr-only">Ngày tạo</label>
                                                <input type="text" id="donationinput3" class="form-control" placeholder="Ngày tạo" name="created_at" readonly value="{{$notice['created_at']}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="donationinput3" class="sr-only">Chỉnh sửa gần nhất</label>
                                                <input type="text" id="donationinput3" class="form-control" placeholder="Chỉnh sửa gần nhất" name="updated_at" readonly value="{{$notice['updated_at']}}">
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
