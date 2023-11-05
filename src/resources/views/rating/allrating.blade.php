@extends('layouts.layouts')
@section('content')
<link rel="stylesheet" href="{{ asset('css/allrating.css') }}" />
<div class="frame-parent7">
    <div class="frame-wrapper1">
        <div class="frame-parent8">
            <div class="frame-wrapper2">
                <div class="thm-trng-wrapper">
                    <div class="thng-tin-lin">Thêm trường</div>
                </div>
            </div>
            <div class="frame-parent9">
                <div class="tm-theo-tn-parent">
                    <div class="tm-theo-tn">Tìm theo tên</div>
                    <img class="location-on-icon" alt="" src="./public/keyboard-arrow-down.svg" />
                </div>
                <div class="frame-parent10">
                    <div class="tm-kim-theo-tn-wrapper">
                        <div class="tm-kim-theo">Tìm kiếm theo tên</div>
                    </div>
                    <div class="search-wrapper">
                        <img class="search-icon" alt="" src="./public/search.svg" />
                    </div>
                </div>
                <div class="tng-3">Tổng : 3 mục</div>
            </div>
        </div>
    </div>
    <div class="frame-parent11">
        <div class="frame-item"></div>
        <div class="frame-parent12">
            <div class="tiu-parent">
                <div class="tiu">Tiêu đề</div>
                <div class="im-ti-a">Điểm tối đa</div>
                <div class="trng-thi">trạng thái</div>
            </div>
            <div class="frame-parent13">
                @foreach ($pars as $par)
                <div class="frame-parent14">
                    <div class="instance-wrapper4">
                        <div class="instance-wrapper5">
                            <div class="nn-kinh-t-kch-thch-xu-hn-parent">
                                <div class="nn-kinh-t">
                                    {{ $par['name'] }}
                                </div>
                                <div class="frame-parent15">
                                    <div class="chnh-sa-parent">
                                        <a href="update-criterias/{{$par['id']}}" class="chnh-sa">Chỉnh sửa</a>
                                        <div class="frame-inner"></div>
                                        <a href="create-criterias/{{$par['id']}}" class="chnh-sa">thêm trường</a>
                                    </div>
                                    <div class="xem-th-parent">
                                        <div class="chnh-sa">Xem thử</div>
                                        <div class="frame-child1"></div>
                                        <div class="chnh-sa">Sửa</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="div">{{ $par['max_score'] }}</div>
                    @if ($par['status'] == 1)
                    <div class="ang-hot-ng">
                        Đang hoặt động
                    </div>
                    @else
                    <div class="ang-hot-ng" style="color:red;">
                        Ngưng hoặt động
                    </div>
                    @endif
                </div>
                @foreach ($par_childs as $par_child)
                @if ($par_child['parent_criteria_id'] == $par['id'])
                <div class="frame-parent16">
                    <div class="instance-wrapper6">
                        <div class="instance-wrapper7">
                            <div class="nn-kinh-t-kch-thch-xu-hn-parent">
                                <div class="nn-kinh-t1">{{ $par_child['name'] }}</div>
                                <div class="frame-parent15">
                                    <div class="chnh-sa-parent">
                                        <a href="update-criterias/{{$par_child['id']}}" class="chnh-sa">Chỉnh sửa</a>
                                        <div class="frame-inner"></div>
                                        <a href="create-criterias/{{$par_child['id']}}" class="chnh-sa">thêm trường</a>
                                    </div>
                                    <div class="xem-th-parent">
                                        <div class="chnh-sa">Xem thử</div>
                                        <div class="frame-child1"></div>
                                        <div class="chnh-sa">Sửa</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="div1">{{$par_child['max_score']}}</div>
                    @if($par['status'] == 0 || $par_child['status'] == 0)
                    <div class="ang-hot-ng1" style="color:red;">Ngưng hoặt động</div>
                    @else
                    <div class="ang-hot-ng1">Đang hoặt động</div>
                    @endif
                </div>
                @foreach ($childs as $child)
                @if ($child['parent_criteria_id'] == $par_child['id'])
                <div class="frame-parent14">
                    <div class="instance-wrapper8">
                        <div class="instance-wrapper5">
                            <div class="nn-kinh-t-kch-thch-xu-hn-parent">
                                <div class="nn-kinh-t">
                                    {{ $child['name'] }}
                                </div>
                                <div class="frame-parent15">
                                    <div class="chnh-sa-parent">
                                        <a href="update-criterias/{{$child['id']}}" class="chnh-sa">Chỉnh sửa</a>
                                        <div class="frame-child1"></div>
                                        <div class="sa-nhanh2">thêm trường</div>
                                    </div>
                                    <div class="xem-th-parent">
                                        <div class="chnh-sa">Xem thử</div>
                                        <div class="frame-child1"></div>
                                        <div class="chnh-sa">Sửa</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="div">{{$child['max_score']}}</div>
                    @if($par['status'] == 0 || $par_child['status'] == 0 || $child['status'] == 0)
                    <div class="ang-hot-ng" style="color:red;">Ngưng hoặt động</div>
                    @else
                    <div class="ang-hot-ng">Đang hoặt động</div>
                    @endif
                </div>
                @endif
                @endforeach
                @endif
                @endforeach
                @endforeach
            </div>
        </div>

        @endsection