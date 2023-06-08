
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
                <div class="qty-plus-minus">
                    <div class="dec ec_qtybtn">-</div>
                    <input type="hidden" name="price[]" value="{{ $item->price }}" />
                    <input class="qty-input" type="text" name="ec_qtybtn[]" value="1" />
                    <div class="inc ec_qtybtn">+</div>
                </div>
                <div class="ec-quickview-cart">
                    <button class="btn btn-primary">Add To Cart</button>
                </div>
            </div>
        </div>
    </div>
</div>

@push('custom-scripts')
    @if (request()->ajax()) @endpush @endif
    <script>
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

                // var QtyPlusMinus = $(".qty-plus-minus");

                // QtyPlusMinus.prepend('<div class="dec ec_qtybtn">-</div>');
                // QtyPlusMinus.append('<div class="inc ec_qtybtn">+</div>');
                $(".ec_qtybtn").off("click");
                $(".ec_qtybtn").on("click", function() {
                    var $qtybutton = $(this);
                    var QtyoldValue = $qtybutton.parent().find(".qty-input").val();
                    if ($qtybutton.text() === "+") {
                        var QtynewVal = parseFloat(QtyoldValue) + 1;
                    } else {

                        if (QtyoldValue > 1) {
                            var QtynewVal = parseFloat(QtyoldValue) - 1;
                        } else {
                            QtynewVal = 1;
                        }
                    }
                    $qtybutton.parent().find(".qty-input").val(QtynewVal);
                });

            }
        }
        loadSlickModalProduct();
    </script>
@if (!request()->ajax()) @endpush @endif
