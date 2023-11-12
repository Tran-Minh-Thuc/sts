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
                                <h4 class="card-title">Basic Tables</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
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
    </div>
</div>
@endsection