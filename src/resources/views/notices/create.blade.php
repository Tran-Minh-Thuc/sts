@extends('layouts.layouts')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">Thêm mới thông báo</h3>
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
                                        <form class="form" action="create-notices" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label for="donationinput3" class="sr-only">Hình ảnh</label>
                                                    <div data-img=""
                                                        style="float:left; width: 49%; height:200px ;margin-bottom:15px;"
                                                        id="update-image-img" class="form-control"></div>
                                                    <input
                                                        style="float:right ; width: 49%; margin-top: 50px;margin-bottom: 50px"
                                                        name="image" type="file" onclick="previewImage()"
                                                        id="update-image-btn" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="donationinput1" class="sr-only">Tiêu đề</label>
                                                    <textarea type="text" cols="30" rows="10" id="donationinput1" class="form-control" placeholder="Tiêu đề"
                                                        name="name"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="donationinput1" class="sr-only">Thời gian bắt đầu</label>
                                                    <input type="date" id="donationinput1" class="form-control"
                                                        placeholder="Thời gian bắt đầu" name="begin_time">
                                                </div>
                                                <div class="form-group">
                                                    <label for="donationinput1" class="sr-only">Thời gian kết thúc</label>
                                                    <input type="date" id="donationinput1" class="form-control"
                                                        placeholder="Thời gian kết thúc" name="end_time">
                                                </div>
                                                <div class="form-group">
                                                    <label for="donationinput1" class="sr-only">Ghi chú</label>
                                                    <input type="text" id="donationinput1" class="form-control"
                                                        placeholder="Ghi chú" name="note">
                                                </div>
                                                <div class="form-group">
                                                    <div style="border-color: white" class="form-control">
                                                    <input style="margin-bottom: 15px; margin-top: 3px; max-width: 5%; float: left;" onclick="checkConfirmSendEmail()" type="checkbox" id="confirmSendEmail" class="form-control"
                                                    placeholder="Ghi chú" name="confirm_send_email" value="true">
                                                    <label style="max-width: 95%; float: left; margin-bottom: 15px;" for="donationinput1" class="">Xác nhận gửi thông báo qua Email ?</label>
                                                </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="donationinput2" class="sr-only">Tên khóa học</label>
                                                    <fieldset class="form-group" id="TypeSendEmail">
                                                        <select class="form-control" id="status" name="type_send_email">
                                                            <option value="student">Gửi cho toàn bộ học sinh</option>
                                                            <option value="teacher">Gửi cho toàn bộ giảng viên</option>
                                                            <option value="all">Gửi cho tất cả</option>
                                                        </select>
                                                    </fieldset>
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
        checkConfirmSendEmail()
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
        function checkConfirmSendEmail() {
            const confirm = document.querySelector('#confirmSendEmail')
            const type = document.querySelector('#TypeSendEmail')
            if(confirm.checked == true) {
                type.style.display = 'block';
            }
            if (confirm.checked == false) {
                type.style.display = 'none';
            }
        }
    </script>
@endsection
