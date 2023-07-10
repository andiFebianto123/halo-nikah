@extends('frontend.inc.blank')
@section('content')
<!-- Ec breadcrumb start -->
<div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row ec_breadcrumb_inner">
                    <div class="col-md-6 col-sm-12">
                        <h2 class="ec-breadcrumb-title">Blog Page</h2>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <!-- ec-breadcrumb-list start -->
                        <ul class="ec-breadcrumb-list">
                            <li class="ec-breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="ec-breadcrumb-item active">Blog Page</li>
                        </ul>
                        <!-- ec-breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Ec breadcrumb end -->

@php
    $time = \Carbon\Carbon::parse($blog->date)->format('d M, Y');
@endphp
<!-- Ec Blog page -->
<section class="ec-page-content section-space-p">
    <div class="container">
        <div class="row">
            <div class="ec-blogs-rightside col-lg-12 col-md-12">

                <!-- Blog content Start -->
                <div class="ec-blogs-content">
                    <div class="ec-blogs-inner">
                        <div class="ec-blog-main-img">
                            <img class="blog-image" src="{{ URL::asset('storage/images/permalink/'.$blog->image) }}" alt="Blog" />
                        </div>
                        <div class="ec-blog-date mb-2">
                            <p class="date">{{ $time }} - {{ $blog->user->name }}</p>
                        </div>
                        <div class="ec-blog-detail">
                            <h3 class="ec-blog-title">{{ $blog->title }}</h3>
                            <div class="ck-content">
                                {!! $blog->content !!}
                            </div>
                        </div>
                        <div class="ec-blog-tags-custom mb-4 mt-4">
                            @foreach ($blog->tags as $tag)
                                <a href="{{ url('blog/tag/'.$tag->slug) }}">{{ $tag->name }}</a>
                            @endforeach
                        </div>
                        <div class="ec-blog-arrows">
                            <div class="inner-arrows">
                                @if ($prev_blog)
                                <a href="{{ url('blog/'.$prev_blog->slug) }}"><i class="ecicon eci-angle-left"></i> Prev
                                    Post</a>
                                @endif
                                
                                @if ($next_blog)
                                <a style="float: right;" href="{{ url('blog/'.$next_blog->slug) }}">Next Post <i
                                    class="ecicon eci-angle-right"></i></a>
                                @endif
                            </div>
                            
                            
                        </div>
                        
                    </div>
                </div>
                <!--Blog content End -->
            </div>
        </div>
    </div>
</section>
@endsection

@push('pop-up')
    <script></script>
@endpush

@section('style')
    <!-- css All Plugins Files -->
    <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/animate.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/swiper-bundle.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/jquery-ui.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/countdownTimer.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/slick.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/nouislider.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/owl.carousel.min.css') }}" />
   <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/owl.theme.default.min.css') }}" />

    <!-- Main Style -->
    @vite(['resources/scss/frontend/demo8.scss'])

    <style>
        /* .ec-all-product-block {
            margin-right: 12px;
        } */
        .ec-new-slider .slick-slide {
            margin: 0 12px;
        }

        @media only screen and (max-width: 767px){            
            .disp-no-767 {
                display: block !important;
            }
        }

        @media only screen and (max-width: 1199px)
        {
            .ec-test-section, .ec-new-product-content {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                /* width: 33.3333333333%; */
                width: 100% !important;
            }
        }
    </style>

    <style>
        .ec-pro-rating {
            margin-top: 0px !important;
        }
        .ec-blogs-inner {
            padding: 12px;
        }
        .ec-blog-tags-custom a{
            padding:8px;
            background-color: rgba(0,0,0,.05);
            margin-right: 4px;
        }
        .inner-arrows{
            display: block;
            width: 100%;
            overflow: hidden;
        }
    </style>

    <!-- Background css -->
    {{-- <link rel="stylesheet" id="bg-switcher-css" href="assets/css/backgrounds/bg-4.css"> --}}
@endsection

@section('scripts')
    <!-- Vendor JS -->
    <script src="{{ URL::asset('assets/js/vendor/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/vendor/popper.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/vendor/modernizr-3.11.2.min.js') }}"></script>

    <!--Plugins JS-->
    <script src="{{ URL::asset('assets/js/plugins/jquery.sticky-sidebar.js') }}"></script>
    <script src="{{ URL::asset('assets/js/plugins/swiper-bundle.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/plugins/countdownTimer.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/plugins/nouislider.js') }}"></script>
    <script src="{{ URL::asset('assets/js/plugins/scrollup.js') }}"></script>
    <script src="{{ URL::asset('assets/js/plugins/jquery.zoom.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/plugins/slick.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/plugins/owl.carousel.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/plugins/infiniteslidev2.js') }}"></script>
    <script src="{{ URL::asset('assets/js/plugins/click-to-call.js') }}"></script>
    <script src="{{ URL::asset('assets/js/vendor/jquery.magnific-popup.min.js') }}"></script>

    <!-- Main Js -->
    <script src="{{ URL::asset('assets/js/vendor/index.js') }}"></script>
    <script src="{{ URL::asset('assets/js/demo-8.js') }}"></script>
    {{-- <script src="{{ URL::asset('assets/js/main.js')}}"></script> --}}


@endsection