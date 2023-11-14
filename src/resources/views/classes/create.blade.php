@extends('layouts.layouts')
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
            <div class="content-header-left col-md-4 col-12 mb-2">
                <h3 class="content-header-title">Thêm mới lớp học</h3>
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
                                    <form class="form" action="create-classes" method="post">
                                        @csrf
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label for="donationinput1" class="sr-only">Tên lớp</label>
                                                <input type="text" id="donationinput1" class="form-control" placeholder="Tên lớp" name="name">
                                            </div>
                                            <div class="form-group">
                                                <label for="donationinput3" class="sr-only">Tên khoa</label>
                                                <input type="text" id="donationinput3" class="form-control" placeholder="Tên khoa" name="department_name">
                                            </div>
                                            <div class="form-group">
                                                <label for="donationinput2" class="sr-only">Giảng viên phụ trách</label>
                                                <fieldset class="form-group">
                                                    <select class="form-control" id="teacher_id " name="teacher_id">
                                                        @foreach($teachers as $teacher)
                                                        <option value="{{$teacher['id']}}">{{$teacher['full_name']}} {{$teacher['teacher_code']}}</option>
                                                        @endforeach
                                                    </select>
                                                </fieldset>
                                            </div>
                                            <div class="form-group">
                                                <label for="donationinput2" class="sr-only">Tên khóa học</label>
                                                <fieldset class="form-group">
                                                    <select class="form-control" id="status" name="course_id">
                                                        @foreach($courses as $course)
                                                        <option value="{{$course['id']}}">{{$course['name']}}</option>
                                                        @endforeach
                                                    </select>
                                                </fieldset>
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
@endsection
