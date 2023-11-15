@extends('layouts.layouts')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
            <div class="content-header-left col-md-4 col-12 mb-2">
                <h3 class="content-header-title">Tất Cả quyền</h3>
            </div>

        </div>
        <div class="content-body"><!-- ../../../theme-assets/images/carousel/22.jpg -->
            <section id="content-types">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="form-group">
                                    <a type="button" href="create-students" class="btn mb-1 btn-primary btn-lg btn-block">Thêm một học sinh mới</a>
                                </div>
                                <input class="form-control" id="search" type="text" placeholder="Tìm kiếm ở đây ... ">
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">

                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Họ tên</th>
                                                    <th>Mã số</th>
                                                    <th>Email</th>
                                                    <th>Số điện thoại</th>
                                                    <th>Thao Tác</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
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
    $(document).ready(function() {
        fetch_customers_data();
        function fetch_customers_data(query = '') {
            $.ajax({
                url:"{{ route('action_students') }}",
                method:"GET",
                data:{query:query},
                dataType:'json',
                success:function(data){
                    $('tbody').html(data.table_data);
                }
            })
        }
        function del_data(id) {
            if(confirm('Are you sure you want to delete?')){
                $.ajax({
                    url:"/admin/delete-students/" + id,
                    method:"GET",
                    data:{query:id},
                    dataType:'json',
                    success:function(response){
                        $('#' + id).remove();
                    }
            })
            }
        }
        $(document).on('click', '#delete', function() {
            var id = $(this).val();
            del_data(id);
        });
        $(document).on('keyup', '#search', function() {
            var query = $(this).val();
            fetch_customers_data(query);
        });
    });
</script>
@endsection
