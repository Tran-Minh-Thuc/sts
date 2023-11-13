@extends('layouts.layouts')
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
            <div class="content-header-left col-md-4 col-12 mb-2">
                <h3 class="content-header-title">Tất Cả Trường</h3>
            </div>

        </div>
        <div class="content-body"><!-- ../../../theme-assets/images/carousel/22.jpg -->
            <section id="content-types">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <input class="form-control" id="search" type="text" placeholder="Tìm kiếm ở đây ... ">
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">

                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Tiêu Đề</th>
                                                    <th>Điểm tối đa</th>
                                                    <th>Trạng Thái</th>
                                                    <th>Thao Tác</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($pars as $par)
                                                <tr>
                                                    <td>{{ $par['name'] }}</td>
                                                    <td>{{ $par['max_score'] }}</td>
                                                    @if ($par['status'] == 1)
                                                    <td>Đang hoạt động</td>
                                                    @else
                                                    <td>Tạm ngưng</td>
                                                    @endif
                                                    <td>
                                                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                                            <button type="button" class="btn btn-info">Chỉnh Sửa</button>
                                                            <button type="button" class="btn btn-warning">Thêm</button>
                                                            <button type="button" class="btn btn-danger">Xóa</button>
                                                        </div>
                                                    </td>
                                                </tr>

                                                @endforeach
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
        <div class="form-group">
            <button type="button" class="btn mb-1 btn-primary btn-lg btn-block">Thêm một trường mới</button>
        </div>
    </div>
</div>
@endsection