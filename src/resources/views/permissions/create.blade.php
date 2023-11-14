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
                                    <form class="form" action="create-permissions" method="post">
                                        @csrf
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label for="donationinput1" class="sr-only">Tên quyền</label>
                                                <input type="text" id="donationinput1" class="form-control" placeholder="Tên quyền" name="name">
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
