@extends('frontend.inc.blank')
@section('content')
    <!-- Ec breadcrumb start -->
    <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row ec_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="ec-breadcrumb-title">Shop</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="ec-breadcrumb-item active">Shop</li>
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
        $images = null;
        if($item->product_image_1){
            $images = $item->product_image_1;
        }else if($item->product_image_2){
            $images = $item->product_image_2;
        }else if($item->product_image_3){
            $images = $item->product_image_3;
        }else if($item->product_image_4){
            $images = $item->product_image_4;
        }
        $percentage = null;
        if(($item->discounted_price != null) && ($item->discounted_price > 0)){
            $harga = $item->discounted_price - $item->price;
            $percentage = ($harga / $item->discounted_price) * 100;
            $percentage = intval($percentage);
        }
        // dd($percentage);
    @endphp

    <!-- Sart Single product -->
    <section class="ec-page-content section-space-p">
        <div class="container">
            <div class="row">
                <div class="ec-pro-rightside ec-common-rightside col-lg-12 col-md-12">

                    <!-- Single product content Start -->
                    <div class="single-pro-block">
                        <div class="single-pro-inner">
                            <div class="row">
                                <div class="single-pro-img single-pro-img-no-sidebar">
                                    <div class="single-product-scroll">
                                        <div class="single-product-cover">
                                            @if ($images == null)
                                            <?php $images = 'product-default.jpg'; ?>
                                            <div class="single-slide zoom-image-hover">
                                                <img class="img-responsive" src="{{ URL::asset('storage/images/product/product-default.jpg') }}"
                                                    alt="">
                                            </div>
                                            @endif
                                            @if ($item->product_image_1)
                                                <div class="single-slide zoom-image-hover">
                                                    <img class="img-responsive" src="{{ URL::asset('storage/images/product/'.$item->product_image_1) }}"
                                                        alt="">
                                                </div>
                                            @endif

                                            @if ($item->product_image_2)
                                                <div class="single-slide zoom-image-hover">
                                                    <img class="img-responsive" src="{{ URL::asset('storage/images/product/'.$item->product_image_2) }}"
                                                        alt="">
                                                </div>
                                            @endif

                                            @if ($item->product_image_3)
                                                <div class="single-slide zoom-image-hover">
                                                    <img class="img-responsive" src="{{ URL::asset('storage/images/product/'.$item->product_image_3) }}"
                                                        alt="">
                                                </div>
                                            @endif

                                            @if ($item->product_image_4)
                                                <div class="single-slide zoom-image-hover">
                                                    <img class="img-responsive" src="{{ URL::asset('storage/images/product/'.$item->product_image_4) }}"
                                                        alt="">
                                                </div>
                                            @endif
                                            
                                        </div>
                                        <div class="single-nav-thumb">
                                            @if ($images == null)
                                                <div class="single-slide">
                                                    <img class="img-responsive" src="{{ URL::asset('storage/images/product/product-default.jpg') }}"
                                                        alt="">
                                                </div>
                                            @endif
    
                                            @if ($item->product_image_1)
                                                <div class="single-slide">
                                                    <img class="img-responsive" src="{{ URL::asset('storage/images/product/'.$item->product_image_1) }}"
                                                        alt="">
                                                </div>
                                            @endif

                                            @if ($item->product_image_2)
                                                <div class="single-slide">
                                                    <img class="img-responsive" src="{{ URL::asset('storage/images/product/'.$item->product_image_2) }}"
                                                        alt="">
                                                </div>
                                            @endif
                                            
                                            @if ($item->product_image_3)
                                                <div class="single-slide">
                                                    <img class="img-responsive" src="{{ URL::asset('storage/images/product/'.$item->product_image_3) }}"
                                                        alt="">
                                                </div>
                                            @endif

                                            @if ($item->product_image_4)
                                                <div class="single-slide">
                                                    <img class="img-responsive" src="{{ URL::asset('storage/images/product/'.$item->product_image_4) }}"
                                                        alt="">
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="single-pro-desc single-pro-desc-no-sidebar">
                                    <div class="single-pro-content">
                                        <h5 class="ec-single-title">{{ $item->name }} @if ($special_product != null) - <strong><span class="badge" style="background-color:#FFD700 !important;">{{ strtoupper($special_product->type) }}</span></strong> @endif</h5>
                                        <div class="mb-1">
                                            <span>
                                                by
                                                <a href="/id/waktutemu-id" class="projectname strong is-have-project">{{ $item->vendor->name }}</a>
                                                — {{ $item->vendor->service }}
                                            </span>
                                        </div>
                            
                                        <div class="ec-single-rating-wrap">
                                            <div class="ec-single-rating">
                                                {!! product_rating_2($item->rate) !!}
                                            </div>
                        
                                        </div>

                                        @php
                                          $cart_open = true;  
                                        @endphp
                                        
                                        @if (($special_product != null) && ($special_product->is_permanently != 1))
                                            @php
                                                $start_date = \Carbon\Carbon::create($special_product->date_start);
                                                $end_date = \Carbon\Carbon::create($special_product->date_end);
                                                $today = \Carbon\Carbon::now();
                                            @endphp
                                            
                                            @if ($end_date->gt($today) || $end_date->isSameDay($today))
                                                <div class="ec-single-sales">
                                                    <div class="ec-single-sales-inner">
                                                        <div class="ec-single-sales-title">sales accelerators</div>
                                                        <div class="ec-single-sales-visitor">
                                                            Penawaran berakhir di :
                                                        </div>
                                                        
                                                        <div class="ec-single-sales-countdown">
                                                            <div class="ec-single-countdown"><span
                                                                    id="ec-single-countdown"></span></div>
                                                        </div>
                                                    </div>
                                                </div>

                                                @push('custom-scripts')
                                                    <script>
                                                        /*----------------------------- single product countdowntimer  ------------------------------ */
                                                        $("#ec-single-countdown").countdowntimer({
                                                            startDate : "{{ $today->format('Y/m/d H:i:s') }}",
                                                            dateAndTime : "{{ $end_date->format('Y/m/d H:i:s') }}",
                                                            labelsFormat : true,
                                                            displayFormat : "DHMS",
                                                            timeUp : function(){
                                                                $('#custom-buy-product-2').remove();
                                                            },
                                                        });
                                                    </script>
                                                @endpush
                                            @else
                                                <?php $cart_open = false; ?>
                                                <div class="ec-single-sales">
                                                    <div class="ec-single-sales-inner">
                                                        <div class="ec-single-sales-title">sales accelerators</div>
                                                        <div class="ec-single-sales-visitor">
                                                            Maaf Penawaran Produk ini telah berakhir tunggu kesempatan lain kali ya...
                                                        </div>
                                                        
                                                        <div class="ec-single-sales-countdown">
                                                            <div class="ec-single-countdown"><span
                                                                    id="ec-single-countdown"></span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endif
                                        

                                        <div>
                                            <span class="percentage">Hemat {{ $percentage }}%</span>
                                        </div>

                                        <div class="ec-spe-price mb-2">
                                            <span class="new-price">{!! price_format($item->price) !!}</span>
                                            @if($item->discounted_price > 0)<span class="old-price">{!! price_format($item->discounted_price) !!}</span>@endif
                                        </div>
                                        {{-- <div class="ec-single-price-stoke">
                                            <div class="ec-single-price">
                                                <span class="ec-single-ps-title">As low as</span>
                                                <span class="new-price">$68.00</span>
                                            </div>
                                            <div class="ec-single-stoke">
                                                <span class="ec-single-ps-title">IN STOCK</span>
                                                <span class="ec-single-sku">SKU#: WH12</span>
                                            </div>
                                        </div> --}}
                                        @if ($cart_open)
                                            <div id="custom-buy-product-2" class="ec-single-qty">
                                                <div id="form-detail-product-2" class="qty-plus-minus">
                                                    <input id="images" type="hidden" value="{{ URL::asset('storage/images/product/'.$images) }}" name="images" />
                                                    <input type="hidden" name="name" id="name" value="{{ $item->name }}">
                                                    <input type="hidden" id="price" name="price" value="{{str_replace(".","",trim(intval($item->price)))}}" />
                                                    <input class="qty-input" type="text" id="qty" name="ec_qtybtn" value="1" />
                                                </div>
                                                <div class="ec-single-cart ">
                                                    <button class="btn btn-primary" onclick="addToCartCustom_2()">Add To Cart</button>
                                                </div>
                                                
                                            </div>
                                        @endif
                                        
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Single product content End -->
                    <!-- Single product tab start -->
                    <div class="ec-single-pro-tab">
                        <div class="ec-single-pro-tab-wrapper">
                            <div class="ec-single-pro-tab-nav">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab"
                                            data-bs-target="#ec-spt-nav-details" role="tablist">Detail</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#ec-spt-nav-info"
                                            role="tablist">Syarat & Ketentuan
                                        </a>
                                    </li>
                                   
                                </ul>
                            </div>
                            <div class="tab-content  ec-single-pro-tab-content">
                                <div id="ec-spt-nav-details" class="tab-pane fade show active">
                                    <div class="ec-single-pro-tab-desc">
                                        <pre>{{ $item->detail }}</pre>
                                    </div>
                                </div>
                                <div id="ec-spt-nav-info" class="tab-pane fade">
                                    <div class="ec-single-pro-tab-moreinfo">
                                        <pre>{{ $item->terms_and_condition }}</pre>
                                    </div>
                                </div>

                                
                            </div>
                        </div>
                    </div>
                    <!-- product details description area end -->
                </div>

            </div>
        </div>
    </section>
    <!-- End Single product -->

    <!-- Related Product Start -->
    <section class="section ec-releted-product section-space-p">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title">
                        <h2 class="ec-bg-title">Produk Rekomendasi</h2>
                        <h2 class="ec-title">Produk Rekomendasi</h2>
                        {{-- <p class="sub-title">telusuri Koleksi Produk Teratas</p> --}}
                    </div>
                </div>
            </div>
            <div class="row margin-minus-b-30 mb-3">
                @foreach ($product_recomended as $t_product)
                    <x-card-product 
                        :id="$t_product->id"
                        :item="$t_product"
                    />
                @endforeach     
            </div>
        </div>
    </section>
    <!-- Related Product end -->
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
        .new-price {
            color: #ff909d;
            font-weight: 700;
            font-size: 20px;
            letter-spacing: 0
        }
        .old-price {
            font-size: 20px;
            margin: 0 10px;
            text-decoration: line-through;
            color: #777;
            font-weight: 300;
            letter-spacing: 0
        }
        .percentage {
            z-index: 8;
            top: 15px;
            left: 15px;
            font-size: 13px;
            font-weight: 500;
            line-height: 19px;
            padding: 0 7px;
            text-align: center;
            text-transform: uppercase;
            color: #fff;
            /* display: ; */
            align-items: center;
            justify-content: center;
            background-color: #46c389;
            border-radius: 30px
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
@endsection

@push('custom-scripts')
    <script>
        /*----------------------------- Product Image Zoom --------------------------------*/
        $('.zoom-image-hover').zoom();
        
        /*----------------------------- single product Slider  ------------------------------ */
        $('.single-product-cover').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: false,
            asNavFor: '.single-nav-thumb',
        });

        $('.single-nav-thumb').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            asNavFor: '.single-product-cover',
            dots: false,
            arrows: true,
            focusOnSelect: true
        });
    </script>
    <script>
        if(typeof addToCart == 'undefined'){
            function addToCartCustom_2(){
                // get an image url
                var img_url = $('#form-detail-product-2').find("#images").val();
                var p_name = $('#form-detail-product-2').find('#name').val();
                var p_price = $('#form-detail-product-2').find('#price').val();
                var qty = $('#form-detail-product-2').find('#qty').val();
                demo8.addToCart(img_url, p_name, p_price, qty);
            }
            demo8.refreshActionQty();
        }
    </script>
@endpush