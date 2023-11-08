@extends('layouts.layouts')
@section('content')
<link rel="stylesheet" href="{{ asset('css/allrating.css') }}" />

<form action="create-criterias" method="post">
  @csrf
  <div class="frame-parent10">
    <div class="instance-parent">
      <div class="button-muangay-wrapper">
        <div class="button-muangay">
          <input type="submit" value="Submit" class="lu-thay-i">
        </div>
      </div>
      <div class="group-div">
        <div class="frame-parent11">
          <div class="frame-parent12">
            <div class="tiu-wrapper">
              <div class="tiu">Tiêu đề</div>
            </div>
            <div class="frame-parent13">
              <div class="frame-item"></div>
              <div class="frame-child1"></div>
              <input type="text" class="trng-mi" id="name" name="name" placeholder="trường mới" required>
            </div>
          </div>
          <div class="frame-parent14">
            <div class="tiu-wrapper">
              <div class="tiu">Thuôc trường</div>

            </div>
            <div class="frame-parent15">
              <div class="frame-parent16">
                <div class="vui-lng-nhp-phngx-wrapper">
                  <select class="thng-tin-lin" name="parent_criteria_id" id="parent_criteria_id">
                    @if($par)
                    <option value="{{$par['id']}}">{{$par['name']}}</option>
                    @else
                    <option value="NULL" selected>Không thuộc trường nào</option>
                    @endif
                    @foreach($critetias as $value)
                    @if($value['field_level'] != 3)
                    <option value="{{$value['id']}}">{{$value['name']}}</option>
                    @endif
                    @endforeach
                  </select>
                </div>
                <div class="icround-navigate-next-wrapper">
                  <img class="location-on-icon" alt="" src="./public/icroundnavigatenext.svg" />
                </div>
              </div>
            </div>
          </div>
          <div class="frame-parent14">
            <div class="tiu-wrapper">
              <div class="tiu">Điểm tối đa</div>
            </div>
            <div class="frame-parent19">
              <div class="frame-parent16">
                <div class="vui-lng-nhp-phngx-wrapper">
                  {{-- <div class="vui-lng-nhp1">
                        diwajdAAAdadmindiwajdAAAdadmin
                      </div> --}}
                  <input type="number" class="vui-lng-nhp1" id="max_score" name="max_score" min="1" max="30" required>
                </div>
                <div class="icround-navigate-next-wrapper">
                  <img class="location-on-icon" alt="" src="./public/icroundnavigatenext1.svg" />
                </div>
              </div>
            </div>
          </div>
          <div class="frame-parent22">
            <div class="tiu-wrapper">
              <div class="tiu">Điểm mạc định</div>
            </div>
            <div class="frame-parent19">
              <div class="frame-parent16">
                <div class="vui-lng-nhp-phngx-wrapper">
                  {{-- <div class="vui-lng-nhp1">1,2,3,4,5,6,,77</div> --}}
                  <input type="number" class="vui-lng-nhp1" id="default_score" name="default_score" min="1" max="30" required>
                </div>
                <div class="icround-navigate-next-frame">
                  <img class="location-on-icon" alt="" src="./public/icroundnavigatenext2.svg" />
                </div>
              </div>
            </div>
          </div>
          <div class="frame-parent14">
            <div class="tiu-wrapper">
              <div class="tiu">Loại điểm</div>
            </div>
            <div class="frame-parent19">
              <div class="frame-parent16">
                <div class="vui-lng-nhp-phngx-wrapper">
                  {{-- <div class="vui-lng-nhp1">
                        diwajdAAAdadmindiwajdAAAdadmin
                      </div> --}}
                  <select class="vui-lng-nhp1" name="is_violent" id="is_violent">
                    <option value="0">Điểm cộng</option>
                    <option value="1">Điểm trừ</option>
                  </select>
                </div>
                <div class="icround-navigate-next-wrapper">
                  <img class="location-on-icon" alt="" src="./public/icroundnavigatenext3.svg" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="thm-trng-wrapper">
      <div class="thm-trng">Thêm trường</div>
    </div>
  </div>
</form>

@endsection