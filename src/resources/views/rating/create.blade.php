@extends('layouts.layouts')
@section('content')
<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-wrapper-before"></div>
    <div class="content-header row">
      <div class="content-header-left col-md-4 col-12 mb-2">
        <h3 class="content-header-title">Thêm mới field</h3>
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
                  <form class="form" action="create-criterias" method="post">
                    <div class="form-body">
                      <div class="form-group">
                        <label for="donationinput1" class="sr-only">Tiêu đề</label>
                        <input type="text" id="donationinput1" class="form-control" placeholder="Tiêu đề" name="name">
                      </div>
                      <div class="form-group">
                        <label for="donationinput2" class="sr-only">Thuộc trường</label>
                        <fieldset class="form-group">
                          <select class="form-control" id="parent_criteria_id" name="parent_criteria_id">
                            <option>Thuộc Trường</option>
                            @foreach($critetias as $value)
                            @if($value['field_level'] != 3)
                            <option value="{{$value['id']}}">{{$value['name']}}</option>
                            @endif
                            @endforeach
                          </select>
                        </fieldset>
                      </div>
                      <div class="form-group">
                        <label for="donationinput3" class="sr-only">Điểm tối đa</label>
                        <input type="email" id="donationinput3" class="form-control" placeholder="Điểm tối đa" name="max_score">
                      </div>

                      <div class="form-group">
                        <label for="donationinput4" class="sr-only">Điểm mặc định</label>
                        <input type="text" id="donationinput4" class="form-control" placeholder="Điểm mặc định" name="default_score">
                      </div>
                      <div class="form-group">
                        <label for="donationinput7" class="sr-only">Loại điểm</label>
                        <fieldset class="form-group">
                          <select class="form-control" id="basicSelect">
                            <option>Chọn loại điểm</option>
                            <option value="0">Điểm Cộng</option>
                            <option value="1">Điểm Trừ</option>
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