@php
    $index = 0;
@endphp
<div id="ec-cat-slider" class="ec-cat-slider owl-carousel">
    @foreach ($dataset as $item)
        <?php $index++; ?>
        <div class="ec_cat_content ec_cat_content_{{ $index }}">
            <div class="ec_cat_inner ec_cat_inner-{{ $index }}">
                <div class="ec-category-image">
                    <img src="{{ URL::asset('storage/images/permalink/'.$item->image) }}" class="svg_img" alt="drink" />
                </div>
                <div class="ec-category-desc">
                    <h3>{{ $item->name }}<span title="Category Items">({{ $item->count_product }})</span></h3>
                    <a href="#" class="cat-show-all">Show All <i class="ecicon eci-angle-double-right"
                            aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    @endforeach
</div>
@push('custom-scripts')
    <script>
        $('#ec-cat-slider').owlCarousel({
            margin:10,
            loop: true,
            dots:false,
            nav:false,
            smartSpeed: 1000,
            autoplay:true,
            items:3,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    nav:false
                },
                576: {
                    items: 2,
                    nav:false
                },
                768: {
                    items: 2,
                    nav:false
                },
                992: {
                    items: 3,
                    nav:false
                },
                1200: {
                    items:4,
                    nav:false
                },
                1367: {
                    items: 4,
                    nav:false
                }
            }
        }); 
    </script>
@endpush