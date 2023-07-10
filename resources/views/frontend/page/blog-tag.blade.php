@extends('frontend.inc.blank')
@section('content')
    <!-- Ec breadcrumb start -->
    <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row ec_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="ec-breadcrumb-title">Blogs</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                <li class="ec-breadcrumb-item active">Blogs</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="ec-page-content section-space-p">
        <div class="container">
            <div class="row">
                <div class="ec-blogs-rightside col-lg-12 col-md-12">
                    <h2 class="mb-5">{{ $tag }}</h2>
                    <!-- Blog content Start -->
                    <div class="ec-blogs-content">
                        <div class="ec-blogs-inner" style="background-color: transparent !important;">
                            <div class="row">
                                @foreach ($blogs as $blog)
                                    <?php
                                        $time = \Carbon\Carbon::parse($blog->date)->format('M d, Y');
                                    ?>
                                    <div class="col-lg-4 col-md-6 col-sm-12 mb-6 ec-blog-block">
                                        <div class="ec-blog-inner">
                                            <div class="ec-blog-image">
                                                <a href="{{ url('blog/'.$blog->slug) }}">
                                                    <img class="blog-image" src="{{ URL::asset('storage/images/permalink/'.$blog->image) }}" alt="Blog" style="width:360px; height:206px;">
                                                </a>
                                            </div>
                                            <div class="ec-blog-content">
                                                <h5 class="ec-blog-title"><a href="{{ url('blog/'.$blog->slug) }}">{!! title_blog($blog->title, 35) !!}</a></h5>
                                                <div class="ec-blog-date">By <span>{{ $blog->user->name }}</span> / {{ $time }}</div>
                                            
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <x-pagination 
                            :total="$pagination['total']"
                            :limit="$pagination['limit']"
                            :page="$pagination['page']"
                            :offset="$pagination['offset']"
                            :draw="$pagination['draw']"
                        />
                    </div>
                    <!--Blog content End -->
                </div>
            </div>
        </div>
    </section>
@endsection

@push('pop-up')
<!-- Newsletter Modal Start -->
<div id="ec-popnews-bg"></div>
<div id="ec-popnews-box">
    <div id="ec-popnews-close"><i class="ecicon eci-close"></i></div>
    <div class="row">
        <div class="col-md-7 disp-no-767">
            <img src="assets/images/banner/newsletter-8.png" alt="newsletter">
        </div>
        <div class="col-md-5">
            <div id="ec-popnews-box-content">
                <h2>Masukan Ke Keranjang Sekarang !!!</h2>
                {{-- <p>Subscribe the ekka ecommerce to get in touch and get the future update. </p> --}}
                {{-- <form id="ec-popnews-form" action="#" method="post">
                    <input type="email" name="newsemail" placeholder="Email Address" required />
                    <button type="button" class="btn btn-primary" name="subscribe">Subscribe</button>
                </form> --}}
                <button type="button" class="btn btn-primary" name="subscribe">Subscribe</button>

            </div>
        </div>
    </div>
</div>
<!-- Newsletter Modal end -->
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

            .blog-image {
                width:100% !important; 
                /* height:206px; */
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
            .blog-image {
                width:100% !important; 
                height:18% !important;
            }
        }

        .list-view-50 .ec-pro-content {
            padding-left: 30px;
            padding-top: 12px;
        }
        .filter__label:nth-child(1):before {
            content: "";
        }
        .filter__label:nth-child(3):before {
            content: "";
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