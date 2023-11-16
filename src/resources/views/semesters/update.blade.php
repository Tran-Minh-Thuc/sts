@extends('layouts.layouts')
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
            <div class="content-header-left col-md-4 col-12 mb-2">
                <h3 class="content-header-title">Chỉnh sửa khóa học</h3>
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
                                    <form action="update-semesters/{{$semester['id']}}" method="post">
                                        @csrf
                                        @method('put')
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label for="donationinput1" class="sr-only">Tên khóa</label>
                                                <input type="text" id="donationinput1" class="form-control" placeholder="Tên khóa" name="name" value="{{$semester['name']}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="donationinput2" class="sr-only">Thuộc trường</label>
                                                <fieldset class="form-group">
                                                  <select class="form-control" id="last_semester" name="last_semester">
                                                    <option value="{{$par_semester['id']}}" selected>{{$par_semester['name']}}</option>
                                                    @foreach($semesters as $value)
                                                    @if($value['id'] != $par_semester['id'])
                                                    <option value="{{$value['id']}}">{{$value['name']}}</option>
                                                    @endif
                                                    @endforeach
                                                  </select>
                                                </fieldset>
                                              </div>    
                                            <div class="form-group">
                                                <label for="donationinput3" class="sr-only">Thời gian bắt đầu</label>
                                                <input type="date" id="donationinput3" class="form-control" placeholder="Thời gian bắt đầu" name="start_time" value="{{$semester['start_time']}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="donationinput3" class="sr-only">Thời gian kết thúc</label>
                                                <input type="date" id="donationinput3" class="form-control" placeholder="Thời gian kết thúc" name="end_time" value="{{$semester['end_time']}}">
                                            </div>

                                            <div class="form-group">
                                                <label for="donationinput3" class="sr-only">Ngày tạo</label>
                                                <input type="text" id="donationinput3" class="form-control" placeholder="Ngày tạo" name="created_at" readonly value="{{$semester['created_at']}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="donationinput3" class="sr-only">Chỉnh sửa gần nhất</label>
                                                <input type="text" id="donationinput3" class="form-control" placeholder="Chỉnh sửa gần nhất" name="updated_at" readonly value="{{$semester['updated_at']}}">
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
