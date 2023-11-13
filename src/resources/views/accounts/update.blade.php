@extends('layouts.layouts')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">Chỉnh sửa tài khoản</h3>
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
                                        <form action="update-accounts/{{$account['id']}}" method="post">
                                            @csrf
                                            @method('put')
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label for="donationinput1" class="sr-only">Tên đăng nhập</label>
                                                    <input type="text" id="donationinput1" class="form-control"
                                                        placeholder="Tên đăng nhập" name="user_name" value="{{$account['user_name']}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="donationinput3" class="sr-only">Mật khẩu</label>
                                                    <input type="text" id="donationinput3" class="form-control"
                                                        placeholder="Mật khẩu" name="password" value="{{$account['password']}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="donationinput2" class="sr-only">Quyền</label>
                                                    <fieldset class="form-group">
                                                        <select class="form-control" id="permission_id "
                                                            name="permission_id">
                                                            @foreach ($permissions as $value)
                                                            @if($value['id'] == $account['permission_id'])
                                                                    <option value="{{ $value['id'] }}"  selected>{{ $value['name'] }}
                                                                    </option>
                                                            @else
                                                            <option value="{{ $value['id'] }}" >{{ $value['name'] }}
                                                            </option>
                                                            @endif
                                                            @endforeach
                                                        </select>
                                                    </fieldset>
                                                </div>
                                                <div class="form-group">
                                                    <label for="donationinput2" class="sr-only">Trạng thái</label>
                                                    <fieldset class="form-group">
                                                        <select class="form-control" id="status"
                                                            name="status ">
                                                                    <option value="1">Đang hoặt động</option>
                                                                    <option value="0">Ngưng hoặt động</option>
                                                        </select>
                                                    </fieldset>
                                                </div>
                                                <div class="form-group">
                                                    <label for="donationinput4" class="sr-only">Ngày tạo</label>
                                                    <input type="text" id="donationinput4" class="form-control"
                                                        placeholder="Ngày tạo"readonly value="{{$account['created_at']}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="donationinput4" class="sr-only">Chỉnh sửa gần nhất</label>
                                                    <input type="text" id="donationinput4" class="form-control"
                                                        placeholder="Chỉnh sửa gần nhất" readonly value="{{$account['updated_at']}}">
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
