@extends('layouts.layouts')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
            <div class="content-header-left col-md-4 col-12 mb-2">
                <h3 class="content-header-title">Chi tiết đánh giá {{$student_info['student_name']}}</h3>
                <h3 class="content-header-title">{{$student_info['student_code']}}</h3>
            </div>

        </div>
        <div class="content-body"><!-- ../../../theme-assets/images/carousel/22.jpg -->
            <section id="content-types">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            {{-- <div class="card-header">
                                <div class="form-group">
                                    <a type="button" href="create-transcripts" class="btn mb-1 btn-primary btn-lg btn-block">Thêm một quyền mới</a>
                                </div>
                                <input class="form-control" id="search" type="text" placeholder="Tìm kiếm ở đây ... ">
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            </div> --}}
                            <div class="card-content collapse show">
                                <div class="card-body">

                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Chỉ mục</th>
                                                    <th>Điểm lớp đánh giá</th>
                                                    <th>Điểm tự đánh giá</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($transcripts as $transcripts)
                                                <tr id="{{$transcripts['id']}}">
                                                    <td>{{$transcripts['criteria_name']}}</td>
                                                    <td>{{$transcripts['self_score']}}</td>
                                                    <td>{{$transcripts['class_score']}}</td>
                                                    {{-- <td>
                                                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                                            <a type="button" href="/admin/detail-transcripts/' . $row->id . '" class="btn btn-info">Chi tiết</a>
                                                            <button type="button" value="' . $row->id . '" id="delete"  class="btn btn-danger">Xóa</button>
                                                        </div>
                                                    </td> --}}
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
