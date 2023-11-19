@extends('layouts.layoutuser')
@section('content')
<div class="container-fluid py-5 mb-5">
    <div class="container">
        <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px; visibility: visible; animation-delay: 0.3s; animation-name: fadeIn;">
            <h1>Tin Tức</h1>
        </div>
        <div class="row g-5 justify-content-center">
            <div class="col-lg-6 col-xl-4 wow fadeIn" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeIn;">
                <div class="blog-item position-relative bg-light rounded">
                    <img src="{{ asset('images/carousel-1.jpg') }}" class="img-fluid w-100 rounded-top" alt="">
                    <div class="blog-content text-center position-relative px-3">
                        <a href="#" class="text-secondary">24 March 2023</a>
                        <p class="py-2">Lorem ipsum dolor sit amet elit. Sed efficitur quis purus ut interdum. Aliquam dolor eget urna ultricies tincidunt libero sit amet</p>
                    </div>
                    <div class="blog-coment d-flex justify-content-between px-4 py-2 border bg-primary rounded-bottom">
                        <a href="" class="text-white"><small><i class="fas fa-share me-2 text-secondary"></i>5324 Share</small></a>
                        <a href="" class="text-white"><small><i class="fa fa-comments me-2 text-secondary"></i>5 Comments</small></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection