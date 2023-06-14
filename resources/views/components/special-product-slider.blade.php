<!--  Special Section Start -->
<div class="ec-spe-section col-lg-12 col-md-12 col-sm-12 sectopn-spc-mb">
    <div class="col-md-12">
        <div class="section-title">
            <h2 class="ec-title">Penawaran Spesial</h2>
        </div>
    </div>

    <div class="ec-spe-products" id="custom-special-product-{{$id}}">
        @foreach ($datalist as $item)
            @php
                $images = 'product-default.jpg';
                if($item->product->product_image_1){
                    $images = $item->product->product_image_1;
                }else if($item->product->product_image_2){
                    $images = $item->product->product_image_2;
                }else if($item->product->product_image_3){
                    $images = $item->product->product_image_3;
                }else if($item->product->product_image_4){
                    $images = $item->product->product_image_4;
                }
            @endphp
            <div class="ec-spe-product">
                <div class="ec-spe-pro-inner">
                    <div class="ec-spe-pro-image-outer col-md-6 col-sm-12">
                        <div class="ec-spe-pro-image">
                            <img class="img-responsive" src="{{ URL::asset('storage/images/product/'.$images) }}" alt="">                                                                              
                        </div>
                    </div>
                    <div class="ec-spe-pro-content col-md-6 col-sm-12">
                        <div class="mb-3">
                            <h4><strong><span class="badge" style="background-color:#FFD700 !important;">{{ strtoupper($item->type) }}</span></strong></h4>
                        </div>
                        <div class="ec-spe-pro-rating">
                            {!! product_rating($item->product->rate) !!}   
                        </div>
                        <h5 class="ec-spe-pro-title"><a href="product-left-sidebar.html">{{ $item->product->name }}</a></h5>
                        <div class="ec-spe-pro-desc">
                            {!! str_limit($item->product->detail, 150) !!}
                        </div>
                        <div class="ec-spe-price">
                            <span class="new-price">{!! price_format($item->product->price) !!}</span>
                            <span class="old-price">{!! price_format($item->product->discounted_price) !!}</span>
                        </div>
                        <div class="ec-spe-pro-btn">
                            <a href="#" class="btn btn-lg btn-primary">Beli Sekarang</a>
                        </div>
                        {{-- <div class="ec-spe-pro-progress">
                            <span class="ec-spe-pro-progress-desc"><span>Already Sold:
                                    <b>15</b></span><span>Available: <b>40</b></span></span>
                            <span class="ec-spe-pro-progressbar"></span>
                        </div> --}}
                        @if (($item->is_permanently != 1) && (($item->date_start != null) && ($item->date_end != null)) )
                        <div class="countdowntimer">
                            <span class="ec-spe-count-desc"> Cepat! Penawaran berakhir di:</span>
                            <span id="ec-spe-count-{{ $item->id }}"></span>
                        </div>
                        @php
                            // $start_date = \Carbon\Carbon::create($item->date_start)->format('Y/m/d H:i:s');
                            $start_date = \Carbon\Carbon::now()->format('Y/m/d H:i:s');
                            $end_date = \Carbon\Carbon::create($item->date_end)->format('Y/m/d H:i:s');
                        @endphp
                        @push('custom-scripts')
                            <script>
                                $("#ec-spe-count-{{ $item->id }}").countdowntimer({
                                    startDate : "{{ $start_date }}",
                                    dateAndTime : "{{ $end_date }}",
                                    labelsFormat : true,
                                    displayFormat : "DHMS"
                                });
                            </script>
                        @endpush
                        @endif

                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@push('custom-scripts')
    <script>
        var app = @json([
            'count_product_slider' => ($datalist->count() > 1) ? true : false,
        ]);
        $('#custom-special-product-{{ $id }}').slick({
            rows: 1,
            dots: false,
            arrows: true,
            infinite: app.count_product_slider,
            autoplay: app.count_product_slider,
            autoplaySpeed: 3000,
            speed: 500,
            slidesToShow: 1,
            slidesToScroll: 1,
        });
    </script>
@endpush
<!--  Special Section End -->