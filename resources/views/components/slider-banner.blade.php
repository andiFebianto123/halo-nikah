@php
    // dd($datalist);
@endphp
<div id="custom-banner-{{ $id }}" class="ec-slider swiper-container main-slider-nav main-slider-dot">
    <!-- Main slider -->
    <div class="swiper-wrapper">
        @foreach ($datalist as $item)
        @php
            $button_text = strtoupper($item->button_text);
        @endphp
            <div class="ec-slide-item swiper-slide d-flex slide-1" 
                style="background-image:url('{{asset('storage/images/banner/'.$item->img)}}') !important; ">
                {{-- <img src="{{ asset('storage/images/banner/banner-fruits.jpeg') }}" alt="s" /> --}}
                <div class="container align-self-center">
                    <div class="row">
                        <div class="col-sm-12 align-self-center">
                            {{-- <div class="ec-slide-content slider-animation">
                                <h2 class="ec-slide-stitle">{{ $item->sub_title }}</h2>
                                <h1 class="ec-slide-title">{{ $item->title }}</h1>
                                <div class="ec-slide-desc mt-2">
                                    <p>mulai dari {!! price_format($item->price) !!}</p>

                                    @if ($item->button_text)
                                    <a href="{{ $item->url }}" class="btn btn-lg btn-primary">{{ $button_text }} <i
                                        class="ecicon eci-angle-double-right" aria-hidden="true"></i></a>
                                    @endif
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="swiper-pagination swiper-pagination-white"></div>
    <div class="swiper-buttons">
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</div>

@push('custom-styles')
    <style>
        @media only screen and (max-width: 991px){
            .ec-slider .slide-1 {
                background-size: contain !important;
            }
        }
    </style>
@endpush


@push('custom-scripts')
    <script>
        if(typeof(window.banners) != 'object'){
            window.banners = [];
        }
        banners["{{$id}}"] = new Swiper("#custom-banner-{{ $id }}", {
        loop: true,
        speed: 2000,
        effect: "slide",
        autoplay: {
            delay: 7000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },

        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        }
    });
    </script>
@endpush