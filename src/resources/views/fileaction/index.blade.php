@extends('layouts.layouts')
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
            <div class="content-header-left col-md-4 col-12 mb-2">
                <h3 class="content-header-title">Thêm mới quyền</h3>
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
                                    <form class="form" action="import-excel" method="post"  enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label for="donationinput1" class="sr-only">File</label>
                                                <input type="file" id="donationinput1" class="form-control" placeholder="Tên quyền" name="file">
                                            </div>
                                            <div class="form-group">
                                                <label for="donationinput7" class="sr-only">Giới tính</label>
                                                <fieldset class="form-group">
                                                    <select class="form-control" id="basicSelect" name="semester_id">
                                                        @foreach($semester_ex as $semester_ex_1)
                                                       <option value="{{$semester->id}}">{{$semester_ex_1->name}}</option>
                                                       @endforeach
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
@endsection
