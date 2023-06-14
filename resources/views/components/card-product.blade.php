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
    $percentage = null;
    if(($item->discounted_price != null) && ($item->discounted_price > 0)){
        $harga = $item->discounted_price - $item->price;
        $percentage = ($harga / $item->discounted_price) * 100;
        $percentage = intval($percentage);
    }
    // dd($percentage);
@endphp
<div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 ec-product-content">
    <div class="ec-product-inner">
        <div class="ec-pro-image-outer">
            <div class="ec-pro-image">
                <a href="product-left-sidebar.html" class="image">
                    <img class="main-image"
                        src="{{ URL::asset('storage/images/product/'.$images) }}" alt="Product" />
                    {{-- <img class="hover-image"
                        src="assets/images/product-image/88_1.jpg" alt="Product" /> --}}
                </a>
                @if ($percentage)
                <span class="percentage">{{ $percentage }}%</span>
                @endif
                <div class="ec-pro-actions">
                    {{-- <a class="ec-btn-group wishlist" title="Wishlist"><i class="fi-rr-heart"></i></a> --}}
                    <a href="#" 
                        class="ec-btn-group quickview" 
                        data-link-action="quickview" 
                        title="Quick view"
                        data-bs-toggle="modal" 
                        data-bs-target="#ec_quickview_modal"
                        onClick="showModalProduct('{{ $item->id }}')">
                        <i class="fi-rr-eye"></i>
                    </a>
                    {{-- <a href="compare.html" class="ec-btn-group compare" title="Compare"><i class="fi fi-rr-arrows-repeat"></i></a> --}}
                    {{-- <a href="javascript:void(0)"  title="Add To Cart" data-price="{{str_replace(".","",trim(intval($item->price)))}}" class="ec-btn-group add-to-cart"><i class="fi-rr-shopping-basket"></i></a> --}}
                </div>
            </div>
        </div>
        <div class="ec-pro-content">
            <a href="{{ url('products/'.$item->id) }}"><h6 class="ec-pro-stitle">{{ $item->kategori->name }}</h6></a> 
            <h5 class="ec-pro-title"><a href="{{ url('products/'.$item->id) }}">{{ $item->name }}</a></h5>
            <div class="ec-pro-rat-price">
                {!! product_rating($item->rate) !!}   
                <span class="ec-price">
                    <span class="new-price">{!! price_format($item->price) !!}</span>
                    <span class="old-price">{!! price_format($item->discounted_price) !!}</span>
                </span>
            </div>
        </div>
    </div>
</div>

@once
    @push('modal')
    <!-- Modal -->
        <div class="modal fade" id="ec_quickview_modal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <button type="button" class="btn-close qty_close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="modal-body">
                        
                    </div>
                </div>
            </div>
        </div>
    <!-- Modal end -->
    @endpush
    @push('custom-scripts')
        <script>
            const myModalEl = document.getElementById('ec_quickview_modal')
            myModalEl.addEventListener('hidden.bs.modal', event => {
                if(typeof($('#ec-single-countdown-popup')) != 'undefined'){
                        $('#ec-single-countdown-popup').countdowntimer('destroy');
                }            
            });
                function showModalProduct(id){
                    
                    setTimeout(() => {
                        $.ajax({
                            url: "{{ route('api.product') }}",
                            method:'post',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            data:{
                                product_id: id,
                            },
                            beforeSend:function(){
                                $("#ec_quickview_modal .modal-body").html("<center>Loading...</center>");

                            }
                        }).done(function(res){
                            // console.log(res);
                            $("#ec_quickview_modal .modal-body").html(res.html);
                        });
                    }, 300);
                    
                }
        </script>
    @endpush
@endonce
