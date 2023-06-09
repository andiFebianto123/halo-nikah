<!-- ec Testimonial Start -->
<div class="ec-test-section col-md-12 col-sm-12 col-xs-6 sectopn-spc-mb" data-animation="slideInRight">
    <div class="col-md-12">
        <div class="section-title">
            <h2 class="ec-title">Testimonial</h2>
        </div>
    </div>
    <div class="ec-test-outer">
        <ul id="ec-testimonial-slider">
            @foreach ($datalist as $item)
                <li class="ec-test-item">
                    <div class="ec-test-inner">
                        <div class="ec-test-img">
                            <img alt="testimonial" title="testimonial"
                                src="{{ URL::asset('storage/images/permalink/'.$item->img) }}" />
                        </div>
                        <div class="ec-test-content">
                            <div class="ec-test-name">{{ $item->name }}</div>
                            <div class="ec-test-designation">- {{ $item->title }}</div>
                            <div class="ec-test-divider">
                                <i class="fi-rr-quote-right"></i>
                            </div>
                            <div class="ec-test-desc">
                                {{ $item->description }}
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
<!-- ec Testimonial end -->