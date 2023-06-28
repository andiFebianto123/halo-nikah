@php
    $index = 5;
@endphp
<div id="ec-cat-slider" class="ec-cat-slider owl-carousel">
    @foreach ($dataset as $item)
        <?php //$index++; ?>
        <div class="ec_cat_content ec_cat_content_{{ $index }}">
            <div class="ec_cat_inner ec_cat_inner-{{ $index }}">
                <div class="ec-category-image">
                    <img src="{{ URL::asset('storage/images/permalink/'.$item->image) }}" class="svg_img" alt="drink" />
                </div>
                <div class="ec-category-desc">
                    <h3>{{ $item->name }}<span title="Category Items">({{ $item->count_product }})</span></h3>
                    <a href="{{ url('products?kategori%5B%5D='.$item->id) }}" class="cat-show-all">Show All <i class="ecicon eci-angle-double-right"
                            aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    @endforeach
</div>
@push('custom-scripts')
    
@endpush

@push('custom-styles')
<style>
    .ec_cat_inner {
        background-color: #fff !important;
    }
</style>
@endpush