@php
    $cart_open = true;  
    $special_product = \App\Models\SpecialProduct::where('product_id', $item->id)->first();

    $images = 'product-default.jpg';
    if($item->product_image_1){
        $images = $item->product_image_1;
    }else if($item->product_image_2){
        $images = $item->product_image_2;
    }else if($item->product_image_3){
        $images = $item->product_image_3;
    }else if($item->product_image_4){
        $images = $item->product_image_4;
    }
@endphp
<div class="row">
    <div class="col-md-5 col-sm-12 col-xs-12">
        <!-- Swiper -->
        <div class="qty-product-cover">
            @if ($item->product_image_1)
                <div class="qty-slide">
                    <img class="img-responsive" src="{{ URL::asset('storage/images/product/'.$item->product_image_1) }}" alt="">
                </div>
            @endif
            @if ($item->product_image_2)
                <div class="qty-slide">
                    <img class="img-responsive" src="{{ URL::asset('storage/images/product/'.$item->product_image_2) }}" alt="">
                </div>
            @endif
            @if ($item->product_image_3)
                <div class="qty-slide">
                    <img class="img-responsive" src="{{ URL::asset('storage/images/product/'.$item->product_image_3) }}" alt="">
                </div>
            @endif
            @if ($item->product_image_4)
                <div class="qty-slide">
                    <img class="img-responsive" src="{{ URL::asset('storage/images/product/'.$item->product_image_4) }}" alt="">
                </div>
            @endif
            {{-- <div class="qty-slide">
                <img class="img-responsive" src="assets/images/product-image/94_1.jpg" alt="">
            </div> --}}
        </div>
        <div class="qty-nav-thumb">
            @if ($item->product_image_1)
                <div class="qty-slide">
                    <img class="img-responsive" src="{{ URL::asset('storage/images/product/'.$item->product_image_1) }}" alt="">
                </div>
            @endif
            @if ($item->product_image_2)
                <div class="qty-slide">
                    <img class="img-responsive" src="{{ URL::asset('storage/images/product/'.$item->product_image_2) }}" alt="">
                </div>
            @endif
            @if ($item->product_image_3)
                <div class="qty-slide">
                    <img class="img-responsive" src="{{ URL::asset('storage/images/product/'.$item->product_image_3) }}" alt="">
                </div>
            @endif
            @if ($item->product_image_4)
                <div class="qty-slide">
                    <img class="img-responsive" src="{{ URL::asset('storage/images/product/'.$item->product_image_4) }}" alt="">
                </div>
            @endif
            
            {{-- <div class="qty-slide">
                <img class="img-responsive" src="assets/images/product-image/94_2.jpg" alt="">
            </div> --}}
        </div>
    </div>
    <div class="col-md-7 col-sm-12 col-xs-12">
        <div class="quickview-pro-content single-pro-content">
            <h5 class="ec-quick-title"><a href="product-left-sidebar.html">{{ $item->name }}</a></h5>
            {!! product_rating_2($item->rate) !!}

            @if($special_product != null)
            <div class="mb-2">
                <strong><span class="badge" style="background-color:#FFD700 !important;">{{ strtoupper($special_product->type) }}</span></strong>
            </div>
            @endif

            <div class="ec-quickview-desc">
                {{ $item->detail }}
            </div>
            <div class="ec-quickview-price">
                <span class="new-price">{!! price_format($item->price) !!}</span>
                @if($item->discounted_price > 0)<span class="old-price">{!! price_format($item->discounted_price) !!}</span>@endif
            </div>

            @if (($special_product != null) && ($special_product->is_permanently != 1))
                @php
                    $start_date = \Carbon\Carbon::create($special_product->date_start);
                    $end_date = \Carbon\Carbon::create($special_product->date_end);
                    $today = \Carbon\Carbon::now();
                @endphp
                @if ($end_date->gt($today) || $end_date->isSameDay($today))
                    <div class="ec-single-sales" style="margin:0px;">
                        <div class="ec-single-sales-inner">
                            <div class="ec-single-sales-title">sales accelerators</div>
                            <div class="ec-single-sales-visitor">
                                Penawaran berakhir di :
                            </div>
                            
                            <div class="ec-single-sales-countdown">
                                <div class="ec-single-countdown"><span
                                        id="ec-single-countdown-popup"></span></div>
                            </div>
                        </div>
                    </div>
                        @push('custom-scripts')
                        @if (request()->ajax()) @endpush @endif
                            <script>
                                /*----------------------------- single product countdowntimer  ------------------------------ */
                                $("#ec-single-countdown-popup").countdowntimer({
                                    startDate : "{{ $today->format('Y/m/d H:i:s') }}",
                                    dateAndTime : "{{ $end_date->format('Y/m/d H:i:s') }}",
                                    labelsFormat : true,
                                    timeUp : function(){
                                        $('#custom-buy-product').remove();
                                    },
                                    displayFormat : "DHMS"
                                });
                                
                            </script>
                        @if (!request()->ajax()) @endpush @endif

                @else
                    <?php $cart_open = false; ?>
                    <div class="ec-single-sales" style="margin:0px;">
                        <div class="ec-single-sales-inner">
                            <div class="ec-single-sales-title">sales accelerators</div>
                            <div class="ec-single-sales-visitor">
                                Maaf Penawaran Produk ini telah berakhir tunggu kesempatan lain kali ya...
                            </div>
                        </div>
                    </div>
                @endif
            @endif
            @if ($cart_open) 
                <div id="custom-buy-product" class="ec-quickview-qty">
                    <div id="form-detail-product" class="qty-plus-minus">
                        <input id="images" type="hidden" value="{{ URL::asset('storage/images/product/'.$images) }}" name="images" />
                        <input type="hidden" name="name" id="name" value="{{ $item->name }}">
                        <div class="dec ec_qtybtn">-</div>
                        <input type="hidden" id="price" name="price" value="{{str_replace(".","",trim(intval($item->price)))}}" />
                        <input class="qty-input" type="text" id="qty" name="ec_qtybtn" value="1" />
                        <div class="inc ec_qtybtn">+</div>
                    </div>
                    <div class="ec-quickview-cart">
                        <button id="button-cart-popup" class="btn btn-primary" onclick="addToCartCustom()">Add To Cart</button>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

@push('custom-scripts')
    @if (request()->ajax()) @endpush @endif
    <script>

        if(typeof addToCart == 'undefined'){
            function addToCartCustom(){
                // get an image url
                var img_url = $('#form-detail-product').find("#images").val();
                var p_name = $('#form-detail-product').find('#name').val();
                var p_price = $('#form-detail-product').find('#price').val();
                var qty = $('#form-detail-product').find('#qty').val();
                demo8.addToCart(img_url, p_name, p_price, qty);
            }
        }

        if(typeof loadSlickModalProduct == 'undefined'){
            function loadSlickModalProduct(){
                $('.qty-product-cover').slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false,
                    fade: false,
                    asNavFor: '.qty-nav-thumb',
                });

                $('.qty-nav-thumb').slick({
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    asNavFor: '.qty-product-cover',
                    dots: false,
                    arrows: true,
                    focusOnSelect: true,
                    responsive: [
                    {
                        breakpoint: 479,
                        settings: {
                            slidesToScroll: 1,
                            slidesToShow: 2,
                        }
                    }
                    ]
                });

                demo8.refreshActionQty();

            }
        }
        loadSlickModalProduct();
    </script>
@if (!request()->ajax()) @endpush @endif
