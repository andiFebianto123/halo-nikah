<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ec-all-product-content ec-new-product-content margin-b-30" data-animation="fadeIn">
    <div class="col-md-12">
        <div class="section-title">
            <h2 class="ec-title">{{ $kategori->name }}</h2><br>
            Lihat rekomendasi semua budget
        </div>
    </div>
    <div id="product-slider-{{ $kategori->id }}" class="ec-new-slider">
        @foreach ($products as $item)
            <div class="col-sm-12 ec-all-product-block">
                <div class="ec-all-product-inner">
                    <div class="ec-pro-image-outer">
                        <div class="ec-pro-image">
                            <a href="{{ url('products/'.$item->id) }}" class="image">
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
                                
                                <img class="main-image" src="{{ URL::asset('storage/images/product/'.$images) }}"
                                alt="Product" style="width: 140px; height:123px;"/>
                            </a>
                        </div>
                    </div>
                    <div class="ec-pro-content">
                        <h5 class="ec-pro-title"><a href="{{ url('products/'.$item->id) }}">{{ $item->name }}</a></h5>
                        <h6 class="ec-pro-stitle">
                            {!! product_rating($item->rate) !!}
                        </h6>
                        @if (intval($item->discounted_price) > 0)
                        <div class="ec-pro-rat-pri-inner mt-6">
                            <div class="ec-pro-rat-pri-inner">
                                <span class="ec-price">
                                    <span class="old-price" style="margin-left:0px;">{!! price_format($item->discounted_price) !!}</span>
                                </span>
                            </div>
                        </div>
                        @endif
                        
                        <div class="ec-pro-rat-price">
                            <div class="ec-pro-rat-pri-inner">
                                <span class="ec-price">
                                    <span class="new-price">{!! price_format($item->price) !!}</span>
                                    {{-- <span class="old-price">{!! price_format($item->discounted_price) !!}</span> --}}
                                    {{-- <span class="qty">- 2 pack</span> --}}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@if ($products->count() > 1)
@push('custom-scripts')
<script>
    $("#product-slider-{{ $kategori->id }}").slick({
        rows: 1,
        margin:30,
        dots: false,
        arrows: true,
        infinite: true,
        autoplay:false,
        speed: 500,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 768,
                settings: {
                    rows: 2,
                    slidesToScroll: 1,
                    slidesToShow: 1,
                }
            },
            {
                breakpoint: 540,
                settings: {
                    rows: 2,
                    slidesToScroll: 1,
                    slidesToShow: 1,
                }
            },
            ]
    });
</script>
@endpush
@endif

