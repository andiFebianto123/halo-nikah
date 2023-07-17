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
            <a href="{{ url('/vendors/'.$item->id) }}" class="image">
                <div class="ec-pro-image">
                        <img class="main-image"
                            src="{{ URL::asset('storage/images/permalink/'.$images) }}" alt="Product" />
                </div>
            </a>
        </div>
        <div class="ec-pro-content">
            <a href="{{ url('/vendors/'.$item->id) }}">
                <center>
                    <h6 class="ec-pro-stitle">{{ $item->kategori->name }}</h6>
                    <h4 class="ec-pro-title">{{ $item->name }}</h4>
                    <span>{{ mb_ucfirst(strtolower($kota)) }}</span>
                    <div class="ec-pro-rat-price mt-2">
                        {!! vendor_rating($item->rate) !!} 
                    </div>
                </center>
            </a>
            
            
        </div>
    </div>
</div>
