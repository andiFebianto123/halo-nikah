@php
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
        <div class="quickview-pro-content">
            <h5 class="ec-quick-title"><a href="product-left-sidebar.html">{{ $item->name }}</a></h5>
            {!! product_rating_2($item->rate) !!}

            <div class="ec-quickview-desc">
                {{ $item->detail }}
            </div>
            <div class="ec-quickview-price">
                <span class="new-price">{!! price_format($item->price) !!}</span>
                @if($item->discounted_price > 0)<span class="old-price">{!! price_format($item->discounted_price) !!}</span>@endif
            </div>
            <div class="ec-quickview-qty">
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
