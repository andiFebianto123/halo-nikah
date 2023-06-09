@extends('frontend.inc.blank')
@section('content')
    <!-- Ec breadcrumb start -->
    <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row ec_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="ec-breadcrumb-title">Paket Produk</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                <li class="ec-breadcrumb-item active">Paket Produk</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <!-- Main Slider Start -->
    <div class="ec-main-slider section section-space-pb">
        <div class="container">
            <x-slider-banner id="custom" />
        </div>
    </div>
    <!-- Main Slider End --> --}}

    @php
        $min_ = (request()->min != null) ? request()->min : null;
        $max_ = (request()->max != null) ? request()->max : null;
    @endphp

    <section>
        <div class="container mb-4">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div id="range_price_">
                        <div class="logo">
                            <i class="fi-rr-usd-circle"></i>
                        </div>
                        <div class="select">
                            <select name="" id="range_price" class="form-select">
                                <option value="0" selected>Select Range Price</option>
                                @foreach ($range_price as $price)
                                    <?php
                                        $min = $price->min;
                                        if($min > 0){
                                            $min -= 1;
                                        }
                                    ?>
                                    <option value="{{ $min }}-{{ $price->max }}"  
                                        @if($min_ == $min && $max_ == $price->max) selected @endif
                                    >{!! price_format($min) !!}  -  {!! price_format($price->max) !!}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </section>


    <!-- Sart Shop -->
    <section class="ec-page-content-bnr section-space-pb">
        <div class="container">
            <div class="row">
                <div class="ec-shop-rightside col-lg-12 col-md-12">
                    
                    <!-- Shop content Start -->
                    <div class="shop-pro-content">
                        <div class="shop-pro-inner">
                            <div class="row mb-6">
                                @foreach ($products as $product)
                                    <x-card-product 
                                            :id="$product->id"
                                            :item="$product"
                                    />
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
                    <!--Shop content End -->
                </div>
                

            </div>
        </div>
    </section>
    <!-- End Shop -->
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
    <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/slick.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/nouislider.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/owl.carousel.min.css') }}" />
   <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/owl.theme.default.min.css') }}" />

    <!-- Main Style -->
    @vite(['resources/scss/frontend/demo8.scss'])

    <style>
        .ec-product-csc{
            border-radius: 16px;
        }
    </style>

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

    <script src="https://unpkg.com/@develoka/angka-rupiah-js/index.min.js"></script>

    <!-- Main Js -->
    <script src="{{ URL::asset('assets/js/vendor/index.js') }}"></script>
    <script src="{{ URL::asset('assets/js/demo-8.js') }}"></script>
    <script src="{{ URL::asset('assets/js/URI.js') }}"></script>
    {{-- <script src="{{ URL::asset('assets/js/main.js')}}"></script> --}}
    <script>
        $('#range_price').change(function(e){
            e.preventDefault();
            var url = "{{ url('/package') }}";
            let value = $(this).val();
            value = value.split('-'); // array

            var URL = URI(url);
            URL.addSearch({ min:value[0].trim(), max:value[1].trim() });
            window.location.href = URL;
        });
    </script>


@endsection