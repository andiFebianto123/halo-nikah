@php

    $images = 'default-vendor.jpg';
    if($item->image_profile){
        $images = $item->image_profile;
    }

    $kota = strtolower($item->kota->name);
    $kota = trim(str_replace('kota', '', $kota));

@endphp
<div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 ec-product-content">
    <div class="ec-product-inner">
        <div class="ec-pro-image-outer">
            <div class="ec-pro-image">
                <a href="product-left-sidebar.html" class="image">
                    <img class="main-image"
                        src="{{ URL::asset('storage/images/permalink/'.$images) }}" alt="Product" />
                    {{-- <img class="hover-image"
                        src="assets/images/product-image/88_1.jpg" alt="Product" /> --}}
                </a>
                {{-- <span class="percentage">12%</span> --}}
            </div>
        </div>
        <div class="ec-pro-content">
            <center>
                <a href="{{ url('products/'.$item->id) }}"><h6 class="ec-pro-stitle">{{ $item->kategori->name }}</h6></a> 
                <a href="{{ url('products/'.$item->id) }}"><h4 class="ec-pro-title">{{ $item->name }}</h4></a>
                <span>{{ mb_ucfirst(strtolower($kota)) }}</span>
                <div class="ec-pro-rat-price mt-2">
                    {!! vendor_rating($item->rate) !!} 
                </div>
            </center>
            
        </div>
    </div>
</div>
