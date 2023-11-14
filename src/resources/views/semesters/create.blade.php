@extends('layouts.layouts')
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
            <div class="content-header-left col-md-4 col-12 mb-2">
                <h3 class="content-header-title">Thêm mới học kì</h3>
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
                                    <form class="form" action="create-semesters" method="post">
                                        @csrf
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label for="donationinput1" class="sr-only">Tên học kì</label>
                                                <input type="text" id="donationinput1" class="form-control" placeholder="Tên học kì" name="name">
                                            </div>
                                            <div class="form-group">
                                                <label for="donationinput3" class="sr-only">Thời gian bắt đầu</label>
                                                <input type="date" id="donationinput3" class="form-control" placeholder="Thời gian bắt đầu" name="start_time">
                                            </div>
                                            <div class="form-group">
                                                <label for="donationinput3" class="sr-only">Thời gian kết thúc</label>
                                                <input type="date" id="donationinput3" class="form-control" placeholder="Thời gian kết thúc" name="end_time">
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
