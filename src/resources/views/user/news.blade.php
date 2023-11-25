@extends('layouts.layoutuser')
@section('content')
<div class="container-fluid py-5 mb-5">
    <div class="container">
        <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px; visibility: visible; animation-delay: 0.3s; animation-name: fadeIn;">
            <h1>Tin Tức</h1>
        </div>
        <div class="row g-5 justify-content-center">
            @foreach($notices as $notice)
            <div class="col-lg-6 col-xl-4 wow fadeIn" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeIn;">
                <div style="" class="blog-item position-relative bg-light rounded">
                    <img style="max-height: 100px" src="data:image/png;base64,{{ $notice->image }}" class="img-fluid w-100 rounded-top" alt="">
                    <div class="blog-content text-center position-relative px-3">
                        <a href="#" class="text-secondary">{{$notice->begin_time}} @if($notice->end_time) - {{$notice->end_time}} @endif</a>
                        <p class="py-2">{{$notice->name}}</p>
                    </div>
                    <div class="blog-coment d-flex justify-content-between px-4 py-2 border bg-primary rounded-bottom">
                        @if ($notice->note)
                        <a href="{{$notice->note}}" class="text-white"><small><i class="fa fa-comments me-2 text-secondary"></i>Chi tiết</small></a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection