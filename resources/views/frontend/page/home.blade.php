@extends('frontend.inc.blank')
@section('content')
@php
    // dd($title);
@endphp
<!-- Main Slider Start -->
<div class="ec-main-slider section section-space-pb">
    <div class="container">
        <x-slider-banner id="top" />
    </div>
</div>
<!-- Main Slider End -->

<!--  category Section Start -->
<section class="section ec-category-section section-space-p">
    <div class="container">
        <div class="row d-none">
            <div class="col-md-12">
                <div class="section-title">
                    <h2 class="ec-title">Top Category</h2>
                </div>
            </div>
        </div>
        <div class="row margin-minus-b-15 margin-minus-t-15">
            <x-categorie-slider />
        </div>
    </div>
</section>
<!--category Section End -->

<!-- Product tab Area Start -->
<section class="section ec-product-tab section-space-p">
    <div class="container">
        <div class="row">

            <!-- Sidebar area start -->
            <div class="ec-side-cat-overlay"></div>

            <!-- Product area start -->
            <div class="col col-md-12">

                @php
                    $index_kat = 0;  
                @endphp
                @foreach ($kategori as $kat)
                    <div class="row {{ ($index_kat > 0) ? 'space-t-50' : '' }}">
                        <x-product-categorie-slider :id="$kat->id" />
                    </div>
                    <?php $index_kat++; ?>
                @endforeach

                <!-- Deal of the day Start -->
                <div class="row space-t-50" data-animation="fadeIn">
                    <!--  Special Section Start -->
                    <x-special-product-slider id="1" />
                    <!--  Special Section End -->
                </div>
                <!-- Deal of the day end -->

            </div>
        </div>
    </div>
</section>
<!-- ec Product tab Area End -->

<section id="banner-simulasi" data-animation="fadeIn" class="section ec-offer-section section-space-p section-space-m" style="background-image:url('{{asset('assets/images/offer-image/111.jpg')}}') !important;">
        
        <div class="container row justify-content-end">
            <div class="panel col-lg-4">
                <h2 class="ec-title-rds"><span>Simulasi Pilihan Paket Harga</span></h2>
                @foreach ($range_price as $range)
                    @php
                        $price_min = $range->min;
                        $price_max = $range->max;
                        if($price_min > 0){
                            $price_min -= 1;
                        }
                    @endphp
                    <a href="{{ url("/package?min=".$price_min."&max=".$price_max) }}" onclick='goToPackage("{{ url("/package?min=".$price_min."&max=".$price_max) }}")' >
                        <div class="btn-list">
                            <div class="btn-price">
                                {!! price_format($price_min) !!}  -  {!! price_format($price_max) !!}
                            </div>
                            <div class="slider"></div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
        
</section>

<section class="section ec-product-tab section-space-p">
    <div class="container">
        <div class="row">
            <!-- Sidebar area start -->
            <div class="ec-side-cat-overlay"></div>

            <!-- Product area start -->
            <div class="col col-md-12">
                <!-- Product tab area start -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2 class="ec-title">Produk Pilihan Terbaik</h2>
                        </div>
                    </div>

                    <!-- Tab Start -->
                    <div class="col-md-12 ec-pro-tab">
                        <ul class="ec-pro-tab-nav nav justify-content-end">
                            <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab"
                                    href="#all">All</a></li>
                        </ul>
                    </div>
                    <!-- Tab End -->
                </div>
                <div class="row margin-minus-b-15">
                    <div class="col">
                        <div class="tab-content">
                            <!-- 1st Product tab start -->
                            <div class="tab-pane fade show active" id="all">
                                <div class="row">
                                    @foreach ($top_products as $t_product)
                                        <x-card-product 
                                            :id="$t_product->product->id"
                                            :item="$t_product->product"
                                        />
                                    @endforeach
                                    
                                </div>
                            </div>
                            <!-- ec 1st Product tab end -->
                            <!-- ec 2nd Product tab start -->
                            
                        </div>
                    </div>
                </div>
                <!-- Product tab area end -->
            </div>
        </div>
    </div>
</section>

<!--  Testimonial, Banner & Service Section Start -->
<section class="section ec-ser-spe-section section-space-p">
    <div class="container" data-animation="fadeIn">
        <div class="row">
            <!-- ec Testimonial Start -->
            <div class="ec-test-section col-md-12 col-sm-12 col-xs-6 sectopn-spc-mb" data-animation="slideInRight">
                <x-testimonials />
            </div>
            <!-- ec Testimonial end -->
            <!--  Service Section Start -->
            <div class="ec-services-section col-md-12 col-sm-12 space-t-50" data-animation="slideInLeft">
                <x-service />
            </div>
            <!-- ec Service End -->
        </div>
    </div>
</section>
<!--  End Testimonial, Banner & Service Section Start -->

<!--  Blog Section Start -->
<section class="section ec-blog-section section-space-p">
    <div class="container">
        <div class="row">
            <div class="ec-blog-slider owl-carousel" data-animation="fadeIn">
                <div class="ec-blog-block">
                    <div class="ec-blog-inner">
                        <div class="ec-blog-image">
                            <a href="blog-detail-left-sidebar.html">
                                <img class="blog-image" src="assets/images/blog-image/2.jpg"
                                    alt="Blog" />
                            </a>
                        </div>
                        <div class="ec-blog-content">
                            <div class="ec-blog-cat"><a href="blog-left-sidebar.html">Clothes</a></div>
                            <h5 class="ec-blog-title"><a
                                    href="blog-detail-left-sidebar.html">Curbside fashion Trends: How to Win the Pickup Battle.</a></h5>

                            <div class="ec-blog-date">By<span>Mr Robin</span> / Jan 18, 2022</div>
                        </div>
                    </div>
                </div>
                <div class="ec-blog-block">
                    <div class="ec-blog-inner">
                        <div class="ec-blog-image">
                            <a href="blog-detail-left-sidebar.html">
                                <img class="blog-image" src="assets/images/blog-image/3.jpg"
                                    alt="Blog" />
                            </a>
                        </div>
                        <div class="ec-blog-content">
                            <div class="ec-blog-cat"><a href="blog-left-sidebar.html">Fashion</a></div>
                            <h5 class="ec-blog-title"><a
                                    href="blog-detail-left-sidebar.html">Clothes Retail KPIs 2021 Guide for Clothes Executives.</a></h5>

                            <div class="ec-blog-date">By<span>Mr Admin</span> / Apr 06, 2022</div>
                        </div>
                    </div>
                </div>
                <div class="ec-blog-block">
                    <div class="ec-blog-inner">
                        <div class="ec-blog-image">
                            <a href="blog-detail-left-sidebar.html">
                                <img class="blog-image" src="assets/images/blog-image/4.jpg"
                                    alt="Blog" />
                            </a>
                        </div>
                        <div class="ec-blog-content">
                            <div class="ec-blog-cat"><a href="blog-left-sidebar.html">Shoes</a></div>
                            <h5 class="ec-blog-title"><a
                                    href="blog-detail-left-sidebar.html">EBT vendors: Claim Your Share of SNAP Online Revenue.</a></h5>

                            <div class="ec-blog-date">By<span>Mr Selsa</span> / Feb 10, 2022</div>
                        </div>
                    </div>
                </div>
                <div class="ec-blog-block">
                    <div class="ec-blog-inner">
                        <div class="ec-blog-image">
                            <a href="blog-detail-left-sidebar.html">
                                <img class="blog-image" src="assets/images/blog-image/5.jpg"
                                    alt="Blog" />
                            </a>
                        </div>
                        <div class="ec-blog-content">
                            <div class="ec-blog-cat"><a href="blog-left-sidebar.html">Electronics</a></div>
                            <h5 class="ec-blog-title"><a
                                    href="blog-detail-left-sidebar.html">Curbside fashion Trends: How to Win the Pickup Battle.</a></h5>

                            <div class="ec-blog-date">By<span>Mr Pawar</span> / Mar 15, 2022</div>
                        </div>
                    </div>
                </div>
                <div class="ec-blog-block">
                    <div class="ec-blog-inner">
                        <div class="ec-blog-image">
                            <a href="blog-detail-left-sidebar.html">
                                <img class="blog-image" src="assets/images/blog-image/6.jpg"
                                    alt="Blog" />
                            </a>
                        </div>
                        <div class="ec-blog-content">
                            <div class="ec-blog-cat"><a href="blog-left-sidebar.html">Glasses</a></div>
                            <h5 class="ec-blog-title"><a
                                    href="blog-detail-left-sidebar.html">6 fashion Retail Industry Digital Strategies for 2021.</a></h5>

                            <div class="ec-blog-date">By<span>Mr Natly</span> / Jun 02, 2022</div>
                        </div>
                    </div>
                </div>
                <div class="ec-blog-block">
                    <div class="ec-blog-inner">
                        <div class="ec-blog-image">
                            <a href="blog-detail-left-sidebar.html">
                                <img class="blog-image" src="assets/images/blog-image/7.jpg"
                                    alt="Blog" />
                            </a>
                        </div>
                        <div class="ec-blog-content">
                            <div class="ec-blog-cat"><a href="blog-left-sidebar.html">Jewellery</a></div>
                            <h5 class="ec-blog-title"><a
                                    href="blog-detail-left-sidebar.html">Why Should be Concerned About Instacart Patents.</a></h5>

                            <div class="ec-blog-date">By<span>Mr Admin</span> / Feb 10, 2022</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--  Blog Section End -->

<!-- Ec Instagram Start -->
<section class="section ec-instagram-section section-space-pt">
    <div class="container">
        <h2 class="d-none">Instagram</h2>
        <div class="ec-insta-wrapper" data-animation="fadeIn">
            <div class="ec-insta-outer">
                <div class="insta-auto">
                    <!-- instagram item -->
                    <div class="ec-insta-item">
                        <div class="ec-insta-inner">
                            <a href="#" target="_blank"><img src="assets/images/instragram-image/1.jpg" alt="">

                            </a>
                        </div>
                    </div>
                    <!-- instagram item -->
                    <div class="ec-insta-item">
                        <div class="ec-insta-inner">
                            <a href="#" target="_blank"><img src="assets/images/instragram-image/2.jpg" alt="">

                            </a> 
                        </div>
                    </div>
                    <!-- instagram item -->
                    <div class="ec-insta-item">
                        <div class="ec-insta-inner">
                            <a href="#" target="_blank"><img src="assets/images/instragram-image/3.jpg" alt="">

                            </a>
                        </div>
                    </div>
                    <!-- instagram item -->
                    <div class="ec-insta-item">
                        <div class="ec-insta-inner">
                            <a href="#" target="_blank"><img src="assets/images/instragram-image/4.jpg" alt="">

                            </a>
                        </div>
                    </div>
                    <!-- instagram item -->
                    <!-- instagram item -->
                    <div class="ec-insta-item">
                        <div class="ec-insta-inner">
                            <a href="#" target="_blank"><img src="assets/images/instragram-image/5.jpg" alt="">

                            </a>
                        </div>
                    </div>
                    <!-- instagram item -->
                    <div class="ec-insta-item">
                        <div class="ec-insta-inner">
                            <a href="#" target="_blank"><img src="assets/images/instragram-image/6.jpg" alt="">

                            </a>
                        </div>
                    </div>
                    <!-- instagram item -->
                    <div class="ec-insta-item">
                        <div class="ec-insta-inner">
                            <a href="#" target="_blank"><img src="assets/images/instragram-image/7.jpg" alt="">

                            </a>
                        </div>
                    </div>
                    <!-- instagram item -->
                    <div class="ec-insta-item">
                        <div class="ec-insta-inner">
                            <a href="#" target="_blank"><img src="assets/images/instragram-image/3.jpg" alt="">

                            </a>
                        </div>
                    </div>
                    <!-- instagram item -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Ec Instagram End --> 
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
                <h2>Subscribe Newsletter. 111</h2>
                <p>Subscribe the ekka ecommerce to get in touch and get the future update. </p>
                {{-- <form id="ec-popnews-form" action="#" method="post">
                    <input type="email" name="newsemail" placeholder="Email Address" required />
                    <button type="button" class="btn btn-primary" name="subscribe">Subscribe</button>
                </form> --}}

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
   <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/nouislider.css') }}" />
   <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/slick.min.css') }}" />
   <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/owl.carousel.min.css') }}" />
   <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/owl.theme.default.min.css') }}" />
   <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/bootstrap.css') }}" />

   <!-- Main Style -->
   {{-- <link rel="stylesheet" href="{{ URL::asset('assets/css/demo8.css') }}" /> --}}
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

    <!-- Main Js -->
    <script src="{{ URL::asset('assets/js/vendor/index.js') }}"></script>
    <script src="{{ URL::asset('assets/js/demo-8.js') }}"></script>

    <script>
        function goToPackage(url){
            window.location.href = url;
        }
    </script>
    
@endsection