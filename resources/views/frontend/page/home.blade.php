@extends('frontend.inc.blank')
@section('content')
@php
    // dd($title);
@endphp
<!-- Main Slider Start -->
<div class="ec-main-slider section section-space-pb">
    <div class="container">
        <x-slider-banner id="top" />
    </div>
</div>
<!-- Main Slider End -->

<!--  category Section Start -->
<section class="section ec-category-section section-space-p">
    <div class="container">
        <div class="row d-none">
            <div class="col-md-12">
                <div class="section-title">
                    <h2 class="ec-title">Top Category</h2>
                </div>
            </div>
        </div>
        <div class="row margin-minus-b-15 margin-minus-t-15">
            <x-categorie-slider />
        </div>
    </div>
</section>
<!--category Section End -->

<!-- Product tab Area Start -->
<section class="section ec-product-tab section-space-p">
    <div class="container">
        <div class="row">

            <!-- Sidebar area start -->
            <div class="ec-side-cat-overlay"></div>

            <!-- Product area start -->
            <div class="col col-md-12">

                @php
                    $index_kat = 0;  
                @endphp
                @foreach ($kategori as $kat)
                    <div class="row {{ ($index_kat > 0) ? 'space-t-50' : '' }}">
                        <x-product-categorie-slider :id="$kat->id" />
                    </div>
                    <?php $index_kat++; ?>
                @endforeach

                <!-- Deal of the day Start -->
                <div class="row space-t-50" data-animation="fadeIn">
                    <!--  Special Section Start -->
                    <x-special-product-slider id="1" />
                    <!--  Special Section End -->
                </div>
                <!-- Deal of the day end -->

                <!-- Product tab area start -->
                <div class="row space-t-50">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2 class="ec-title">Produk Pilihan Terbaik</h2>
                        </div>
                    </div>

                    <!-- Tab Start -->
                    <div class="col-md-12 ec-pro-tab">
                        <ul class="ec-pro-tab-nav nav justify-content-end">
                            <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab"
                                    href="#all">All</a></li>
                        </ul>
                    </div>
                    <!-- Tab End -->
                </div>
                <div class="row margin-minus-b-15">
                    <div class="col">
                        <div class="tab-content">
                            <!-- 1st Product tab start -->
                            <div class="tab-pane fade show active" id="all">
                                <div class="row">
                                    @foreach ($top_products as $t_product)
                                        <x-card-product 
                                            :id="$t_product->id"
                                            :item="$t_product"
                                        />
                                    @endforeach
                                    
                                </div>
                            </div>
                            <!-- ec 1st Product tab end -->
                            <!-- ec 2nd Product tab start -->
                            {{-- <div class="tab-pane fade" id="clothes">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 ec-product-content">
                                        <div class="ec-product-inner">
                                            <div class="ec-pro-image-outer">
                                                <div class="ec-pro-image">
                                                    <a href="product-left-sidebar.html" class="image">
                                                        <img class="main-image"
                                                            src="assets/images/product-image/94_1.jpg" alt="Product" />
                                                        <img class="hover-image"
                                                            src="assets/images/product-image/94_2.jpg" alt="Product" />
                                                    </a>
                                                    <div class="ec-pro-actions">
                                                        <a class="ec-btn-group wishlist" title="Wishlist"><i class="fi-rr-heart"></i></a>
                                                        <a href="#" class="ec-btn-group quickview" data-link-action="quickview" title="Quick view"
                                                            data-bs-toggle="modal" data-bs-target="#ec_quickview_modal"><i class="fi-rr-eye"></i></a>
                                                        <a href="compare.html" class="ec-btn-group compare" title="Compare"><i class="fi fi-rr-arrows-repeat"></i></a>
                                                        <a href="javascript:void(0)"  title="Add To Cart" class="ec-btn-group add-to-cart"><i class="fi-rr-shopping-basket"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ec-pro-content">
                                                <a href="shop-left-sidebar-col-3.html"><h6 class="ec-pro-stitle">Jackets</h6></a>
                                                <h5 class="ec-pro-title"><a href="product-left-sidebar.html">Mens Winter Leathers Jackets</a></h5>
                                                <div class="ec-pro-rat-price">
                                                    <span class="ec-pro-rating">
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star"></i>
                                                    </span>
                                                    <span class="ec-price">
                                                        <span class="new-price">$59.00</span>
                                                        <span class="old-price">$87.00</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 ec-product-content">
                                        <div class="ec-product-inner">
                                            <div class="ec-pro-image-outer">
                                                <div class="ec-pro-image">
                                                    <a href="product-left-sidebar.html" class="image">
                                                        <img class="main-image"
                                                            src="assets/images/product-image/95_1.jpg" alt="Product" />
                                                        <img class="hover-image"
                                                            src="assets/images/product-image/95_2.jpg" alt="Product" />
                                                    </a>
                                                    <span class="flags">
                                                        <span class="sale">Sale</span>
                                                    </span>
                                                    <div class="ec-pro-actions">
                                                        <a class="ec-btn-group wishlist" title="Wishlist"><i class="fi-rr-heart"></i></a>
                                                        <a href="#" class="ec-btn-group quickview" data-link-action="quickview" title="Quick view"
                                                            data-bs-toggle="modal" data-bs-target="#ec_quickview_modal"><i class="fi-rr-eye"></i></a>
                                                        <a href="compare.html" class="ec-btn-group compare" title="Compare"><i class="fi fi-rr-arrows-repeat"></i></a>
                                                        <a href="javascript:void(0)"  title="Add To Cart" class="ec-btn-group add-to-cart"><i class="fi-rr-shopping-basket"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ec-pro-content">
                                                <a href="shop-left-sidebar-col-3.html"><h6 class="ec-pro-stitle">Shorts</h6></a>
                                                <h5 class="ec-pro-title"><a href="product-left-sidebar.html">Better Basics French Terry Sweatshorts</a></h5>
                                                <div class="ec-pro-rat-price">
                                                    <span class="ec-pro-rating">
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star"></i>
                                                        <i class="ecicon eci-star"></i>
                                                    </span>
                                                    <span class="ec-price">
                                                        <span class="new-price">$78.00</span>
                                                        <span class="old-price">$85.00</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 ec-product-content">
                                        <div class="ec-product-inner">
                                            <div class="ec-pro-image-outer">
                                                <div class="ec-pro-image">
                                                    <a href="product-left-sidebar.html" class="image">
                                                        <img class="main-image"
                                                            src="assets/images/product-image/88_1.jpg" alt="Product" />
                                                        <img class="hover-image"
                                                            src="assets/images/product-image/88_1.jpg" alt="Product" />
                                                    </a>
                                                    <span class="flags">
                                                        <span class="sale">Sale</span>
                                                    </span>
                                                    <div class="ec-pro-actions">
                                                        <a class="ec-btn-group wishlist" title="Wishlist"><i class="fi-rr-heart"></i></a>
                                                        <a href="#" class="ec-btn-group quickview" data-link-action="quickview" title="Quick view"
                                                            data-bs-toggle="modal" data-bs-target="#ec_quickview_modal"><i class="fi-rr-eye"></i></a>
                                                        <a href="compare.html" class="ec-btn-group compare" title="Compare"><i class="fi fi-rr-arrows-repeat"></i></a>
                                                        <a href="javascript:void(0)"  title="Add To Cart" class="ec-btn-group add-to-cart"><i class="fi-rr-shopping-basket"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ec-pro-content">
                                                <a href="shop-left-sidebar-col-3.html"><h6 class="ec-pro-stitle">T-Shirt</h6></a> 
                                                <h5 class="ec-pro-title"><a href="product-left-sidebar.html">Relaxed Short full Sleeve T-Shirt</a></h5>
                                                <div class="ec-pro-rat-price">
                                                    <span class="ec-pro-rating">
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star"></i>
                                                        <i class="ecicon eci-star"></i>
                                                    </span>
                                                    <span class="ec-price">
                                                        <span class="new-price">$58.00</span>
                                                        <span class="old-price">$65.00</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 ec-product-content">
                                        <div class="ec-product-inner">
                                            <div class="ec-pro-image-outer">
                                                <div class="ec-pro-image">
                                                    <a href="product-left-sidebar.html" class="image">
                                                        <img class="main-image"
                                                            src="assets/images/product-image/89_1.jpg" alt="Product" />
                                                        <img class="hover-image"
                                                            src="assets/images/product-image/89_1.jpg" alt="Product" />
                                                    </a>
                                                    <span class="flags">
                                                        <span class="new">New</span>
                                                    </span>
                                                    <div class="ec-pro-actions">
                                                        <a class="ec-btn-group wishlist" title="Wishlist"><i class="fi-rr-heart"></i></a>
                                                        <a href="#" class="ec-btn-group quickview" data-link-action="quickview" title="Quick view"
                                                            data-bs-toggle="modal" data-bs-target="#ec_quickview_modal"><i class="fi-rr-eye"></i></a>
                                                        <a href="compare.html" class="ec-btn-group compare" title="Compare"><i class="fi fi-rr-arrows-repeat"></i></a>
                                                        <a href="javascript:void(0)"  title="Add To Cart" class="ec-btn-group add-to-cart"><i class="fi-rr-shopping-basket"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ec-pro-content">
                                                <a href="shop-left-sidebar-col-3.html"><h6 class="ec-pro-stitle">top</h6></a>
                                                <h5 class="ec-pro-title"><a href="product-left-sidebar.html">Girls pnk Embro design Top</a></h5>
                                                <div class="ec-pro-rat-price">
                                                    <span class="ec-pro-rating">
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star"></i>
                                                        <i class="ecicon eci-star"></i>
                                                        <i class="ecicon eci-star"></i>
                                                    </span>
                                                    <span class="ec-price">
                                                        <span class="new-price">$45.00</span>
                                                        <span class="old-price">$50.00</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 ec-product-content">
                                        <div class="ec-product-inner">
                                            <div class="ec-pro-image-outer">
                                                <div class="ec-pro-image">
                                                    <a href="product-left-sidebar.html" class="image">
                                                        <img class="main-image"
                                                            src="assets/images/product-image/90_1.jpg" alt="Product" />
                                                        <img class="hover-image"
                                                            src="assets/images/product-image/90_2.jpg" alt="Product" />
                                                    </a>
                                                    <span class="flags">
                                                        <span class="new">New</span>
                                                    </span>
                                                    <div class="ec-pro-actions">
                                                        <a class="ec-btn-group wishlist" title="Wishlist"><i class="fi-rr-heart"></i></a>
                                                        <a href="#" class="ec-btn-group quickview" data-link-action="quickview" title="Quick view"
                                                            data-bs-toggle="modal" data-bs-target="#ec_quickview_modal"><i class="fi-rr-eye"></i></a>
                                                        <a href="compare.html" class="ec-btn-group compare" title="Compare"><i class="fi fi-rr-arrows-repeat"></i></a>
                                                        <a href="javascript:void(0)"  title="Add To Cart" class="ec-btn-group add-to-cart"><i class="fi-rr-shopping-basket"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ec-pro-content">
                                                <a href="shop-left-sidebar-col-3.html"><h6 class="ec-pro-stitle">Skirt</h6></a>
                                                <h5 class="ec-pro-title"><a href="product-left-sidebar.html">Black Floral Wrap Midi Skirt</a></h5>
                                                <div class="ec-pro-rat-price">
                                                    <span class="ec-pro-rating">
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star fill"></i>
                                                    </span>
                                                    <span class="ec-price">
                                                        <span class="new-price">$25.00</span>
                                                        <span class="old-price">$35.00</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 ec-product-content">
                                        <div class="ec-product-inner">
                                            <div class="ec-pro-image-outer">
                                                <div class="ec-pro-image">
                                                    <a href="product-left-sidebar.html" class="image">
                                                        <img class="main-image"
                                                            src="assets/images/product-image/91_1.jpg" alt="Product" />
                                                        <img class="hover-image"
                                                            src="assets/images/product-image/91_2.jpg" alt="Product" />
                                                    </a>
                                                    <span class="flags">
                                                        <span class="sale">Sale</span>
                                                    </span>
                                                    <div class="ec-pro-actions">
                                                        <a class="ec-btn-group wishlist" title="Wishlist"><i class="fi-rr-heart"></i></a>
                                                        <a href="#" class="ec-btn-group quickview" data-link-action="quickview" title="Quick view"
                                                            data-bs-toggle="modal" data-bs-target="#ec_quickview_modal"><i class="fi-rr-eye"></i></a>
                                                        <a href="compare.html" class="ec-btn-group compare" title="Compare"><i class="fi fi-rr-arrows-repeat"></i></a>
                                                        <a href="javascript:void(0)"  title="Add To Cart" class="ec-btn-group add-to-cart"><i class="fi-rr-shopping-basket"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ec-pro-content">
                                                <a href="shop-left-sidebar-col-3.html"><h6 class="ec-pro-stitle">Shirt</h6></a>
                                                <h5 class="ec-pro-title"><a href="product-left-sidebar.html">Pure Garment Dyed Cotton Shirt</a></h5>
                                                <div class="ec-pro-rat-price">
                                                    <span class="ec-pro-rating">
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star"></i>
                                                    </span>
                                                    <span class="ec-price">
                                                        <span class="new-price">$45.00</span>
                                                        <span class="old-price">$56.00</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 ec-product-content">
                                        <div class="ec-product-inner">
                                            <div class="ec-pro-image-outer">
                                                <div class="ec-pro-image">
                                                    <a href="product-left-sidebar.html" class="image">
                                                        <img class="main-image"
                                                            src="assets/images/product-image/92_1.jpg" alt="Product" />
                                                        <img class="hover-image"
                                                            src="assets/images/product-image/92_2.jpg" alt="Product" />
                                                    </a>
                                                    <div class="ec-pro-actions">
                                                        <a class="ec-btn-group wishlist" title="Wishlist"><i class="fi-rr-heart"></i></a>
                                                        <a href="#" class="ec-btn-group quickview" data-link-action="quickview" title="Quick view"
                                                            data-bs-toggle="modal" data-bs-target="#ec_quickview_modal"><i class="fi-rr-eye"></i></a>
                                                        <a href="compare.html" class="ec-btn-group compare" title="Compare"><i class="fi fi-rr-arrows-repeat"></i></a>
                                                        <a href="javascript:void(0)"  title="Add To Cart" class="ec-btn-group add-to-cart"><i class="fi-rr-shopping-basket"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ec-pro-content">
                                                <a href="shop-left-sidebar-col-3.html"><h6 class="ec-pro-stitle">Jacket</h6></a>
                                                <h5 class="ec-pro-title"><a href="product-left-sidebar.html">MEN Yarn Fleece Full-Zip Jacket</a></h5>
                                                <div class="ec-pro-rat-price">
                                                    <span class="ec-pro-rating">
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star"></i>
                                                        <i class="ecicon eci-star"></i>
                                                        <i class="ecicon eci-star"></i>
                                                    </span>
                                                    <span class="ec-price">
                                                        <span class="new-price">$49.00</span>
                                                        <span class="old-price">$65.00</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 ec-product-content">
                                        <div class="ec-product-inner">
                                            <div class="ec-pro-image-outer">
                                                <div class="ec-pro-image">
                                                    <a href="product-left-sidebar.html" class="image">
                                                        <img class="main-image"
                                                            src="assets/images/product-image/93_1.jpg" alt="Product" />
                                                        <img class="hover-image"
                                                            src="assets/images/product-image/93_2.jpg" alt="Product" />
                                                    </a>
                                                    <div class="ec-pro-actions">
                                                        <a class="ec-btn-group wishlist" title="Wishlist"><i class="fi-rr-heart"></i></a>
                                                        <a href="#" class="ec-btn-group quickview" data-link-action="quickview" title="Quick view"
                                                            data-bs-toggle="modal" data-bs-target="#ec_quickview_modal"><i class="fi-rr-eye"></i></a>
                                                        <a href="compare.html" class="ec-btn-group compare" title="Compare"><i class="fi fi-rr-arrows-repeat"></i></a>
                                                        <a href="javascript:void(0)"  title="Add To Cart" class="ec-btn-group add-to-cart"><i class="fi-rr-shopping-basket"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ec-pro-content">
                                                <a href="shop-left-sidebar-col-3.html"><h6 class="ec-pro-stitle">Jacket</h6></a>
                                                <h5 class="ec-pro-title"><a href="product-left-sidebar.html">Mens Winter Leathers Jackets</a></h5>
                                                <div class="ec-pro-rat-price">
                                                    <span class="ec-pro-rating">
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star"></i>
                                                    </span>
                                                    <span class="ec-price">
                                                        <span class="new-price">$32.00</span>
                                                        <span class="old-price">$45.00</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <!-- Product tab area end -->

            </div>
        </div>
    </div>
</section>
<!-- ec Product tab Area End -->

<!--  Testimonial, Banner & Service Section Start -->
<section class="section ec-ser-spe-section section-space-p">
    <div class="container" data-animation="fadeIn">
        <div class="row">
            <!-- ec Testimonial Start -->
            <div class="ec-test-section col-lg-3 col-md-6 col-sm-12 col-xs-6 sectopn-spc-mb" data-animation="slideInRight">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="ec-title">Testimonial</h2>
                    </div>
                </div>
                <div class="ec-test-outer">
                    <ul id="ec-testimonial-slider">
                        <li class="ec-test-item">
                            <div class="ec-test-inner">
                                <div class="ec-test-img">
                                    <img alt="testimonial" title="testimonial"
                                        src="assets/images/testimonial/1.jpg" />
                                </div>
                                <div class="ec-test-content">
                                    <div class="ec-test-name">mark jofferson</div>
                                    <div class="ec-test-designation">- CEO & Founder Invision</div>
                                    <div class="ec-test-divider">
                                        <i class="fi-rr-quote-right"></i>
                                    </div>
                                    <div class="ec-test-desc">Lorem ipsum dolor sit amet consectetur Lorem ipsum
                                        dolor dolor sit amet.
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="ec-test-item">
                            <div class="ec-test-inner">
                                <div class="ec-test-img">
                                    <img alt="testimonial" title="testimonial"
                                        src="assets/images/testimonial/2.jpg" />
                                </div>
                                <div class="ec-test-content">
                                    <div class="ec-test-name">mark jofferson</div>
                                    <div class="ec-test-designation">- CEO & Founder Invision</div>
                                    <div class="ec-test-divider">
                                        <i class="fi-rr-quote-right"></i>
                                    </div>
                                    <div class="ec-test-desc">Lorem ipsum dolor sit amet consectetur Lorem ipsum
                                        dolor dolor sit amet.
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="ec-test-item">
                            <div class="ec-test-inner">
                                <div class="ec-test-img">
                                    <img alt="testimonial" title="testimonial"
                                        src="assets/images/testimonial/3.jpg" />
                                </div>
                                <div class="ec-test-content">
                                    <div class="ec-test-name">mark jofferson</div>
                                    <div class="ec-test-designation">- CEO & Founder Invision</div>
                                    <div class="ec-test-divider">
                                        <i class="fi-rr-quote-right"></i>
                                    </div>
                                    <div class="ec-test-desc">Lorem ipsum dolor sit amet consectetur Lorem ipsum
                                        dolor dolor sit amet.
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- ec Testimonial end -->
            <!-- ec Banner Start -->
            <div class="col-md-6 col-sm-12" data-animation="fadeIn">
                <div class="ec-banner-inner">
                    <div class="ec-banner-block ec-banner-block-1">
                        <div class="banner-block">
                            <div class="banner-content">
                                <div class="banner-text">
                                    <span class="ec-banner-disc">25% discount</span>
                                    <span class="ec-banner-title">Vegetables & Fruits</span>
                                    <span class="ec-banner-stitle">Starting @ $10</span>
                                </div>
                                <span class="ec-banner-btn"><a href="shop-left-sidebar-col-3.html">Shop Now <i
                                            class="ecicon eci-angle-double-right" aria-hidden="true"></i></a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ec Banner End -->
            <!--  Service Section Start -->
            <div class="ec-services-section col-lg-3 col-md-3 col-sm-3" data-animation="slideInLeft">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="ec-title">Our Services</h2>
                    </div>
                </div>
                <div class="ec_ser_block">
                    <div class="ec_ser_content ec_ser_content_1 col-sm-12">
                        <div class="ec_ser_inner">
                            <div class="ec-service-image">
                                <i class="fi fi-ts-truck-moving"></i>
                            </div>
                            <div class="ec-service-desc">
                                <h2>Worldwide Delivery</h2>
                                <p>For Order Over $100</p>
                            </div>
                        </div>
                    </div>
                    <div class="ec_ser_content ec_ser_content_2 col-sm-12">
                        <div class="ec_ser_inner">
                            <div class="ec-service-image">
                                <i class="fi fi-ts-tachometer-fast"></i>
                            </div>
                            <div class="ec-service-desc">
                                <h2>Next Day delivery</h2>
                                <p>UK Orders Only</p>
                            </div>
                        </div>
                    </div>
                    <div class="ec_ser_content ec_ser_content_3 col-sm-12">
                        <div class="ec_ser_inner">
                            <div class="ec-service-image">
                                <i class="fi fi-ts-circle-phone"></i>
                            </div>
                            <div class="ec-service-desc">
                                <h2>Best Online Support</h2>
                                <p>Hours: 8AM -11PM</p>
                            </div>
                        </div>
                    </div>
                    <div class="ec_ser_content ec_ser_content_4 col-sm-12">
                        <div class="ec_ser_inner">
                            <div class="ec-service-image">
                                <i class="fi fi-ts-badge-percent"></i>
                            </div>
                            <div class="ec-service-desc">
                                <h2>Return Policy</h2>
                                <p>Easy & Free Return</p>
                            </div>
                        </div>
                    </div>
                    <div class="ec_ser_content ec_ser_content_5 col-sm-12">
                        <div class="ec_ser_inner">
                            <div class="ec-service-image">
                                <i class="fi fi-ts-donate"></i>
                            </div>
                            <div class="ec-service-desc">
                                <h2>30% money back</h2>
                                <p>For Order Over $100</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ec Service End -->
        </div>
    </div>
</section>
<!--  End Testimonial, Banner & Service Section Start -->

<!--  Blog Section Start -->
<section class="section ec-blog-section section-space-p">
    <div class="container">
        <div class="row">
            <div class="ec-blog-slider owl-carousel" data-animation="fadeIn">
                <div class="ec-blog-block">
                    <div class="ec-blog-inner">
                        <div class="ec-blog-image">
                            <a href="blog-detail-left-sidebar.html">
                                <img class="blog-image" src="assets/images/blog-image/2.jpg"
                                    alt="Blog" />
                            </a>
                        </div>
                        <div class="ec-blog-content">
                            <div class="ec-blog-cat"><a href="blog-left-sidebar.html">Clothes</a></div>
                            <h5 class="ec-blog-title"><a
                                    href="blog-detail-left-sidebar.html">Curbside fashion Trends: How to Win the Pickup Battle.</a></h5>

                            <div class="ec-blog-date">By<span>Mr Robin</span> / Jan 18, 2022</div>
                        </div>
                    </div>
                </div>
                <div class="ec-blog-block">
                    <div class="ec-blog-inner">
                        <div class="ec-blog-image">
                            <a href="blog-detail-left-sidebar.html">
                                <img class="blog-image" src="assets/images/blog-image/3.jpg"
                                    alt="Blog" />
                            </a>
                        </div>
                        <div class="ec-blog-content">
                            <div class="ec-blog-cat"><a href="blog-left-sidebar.html">Fashion</a></div>
                            <h5 class="ec-blog-title"><a
                                    href="blog-detail-left-sidebar.html">Clothes Retail KPIs 2021 Guide for Clothes Executives.</a></h5>

                            <div class="ec-blog-date">By<span>Mr Admin</span> / Apr 06, 2022</div>
                        </div>
                    </div>
                </div>
                <div class="ec-blog-block">
                    <div class="ec-blog-inner">
                        <div class="ec-blog-image">
                            <a href="blog-detail-left-sidebar.html">
                                <img class="blog-image" src="assets/images/blog-image/4.jpg"
                                    alt="Blog" />
                            </a>
                        </div>
                        <div class="ec-blog-content">
                            <div class="ec-blog-cat"><a href="blog-left-sidebar.html">Shoes</a></div>
                            <h5 class="ec-blog-title"><a
                                    href="blog-detail-left-sidebar.html">EBT vendors: Claim Your Share of SNAP Online Revenue.</a></h5>

                            <div class="ec-blog-date">By<span>Mr Selsa</span> / Feb 10, 2022</div>
                        </div>
                    </div>
                </div>
                <div class="ec-blog-block">
                    <div class="ec-blog-inner">
                        <div class="ec-blog-image">
                            <a href="blog-detail-left-sidebar.html">
                                <img class="blog-image" src="assets/images/blog-image/5.jpg"
                                    alt="Blog" />
                            </a>
                        </div>
                        <div class="ec-blog-content">
                            <div class="ec-blog-cat"><a href="blog-left-sidebar.html">Electronics</a></div>
                            <h5 class="ec-blog-title"><a
                                    href="blog-detail-left-sidebar.html">Curbside fashion Trends: How to Win the Pickup Battle.</a></h5>

                            <div class="ec-blog-date">By<span>Mr Pawar</span> / Mar 15, 2022</div>
                        </div>
                    </div>
                </div>
                <div class="ec-blog-block">
                    <div class="ec-blog-inner">
                        <div class="ec-blog-image">
                            <a href="blog-detail-left-sidebar.html">
                                <img class="blog-image" src="assets/images/blog-image/6.jpg"
                                    alt="Blog" />
                            </a>
                        </div>
                        <div class="ec-blog-content">
                            <div class="ec-blog-cat"><a href="blog-left-sidebar.html">Glasses</a></div>
                            <h5 class="ec-blog-title"><a
                                    href="blog-detail-left-sidebar.html">6 fashion Retail Industry Digital Strategies for 2021.</a></h5>

                            <div class="ec-blog-date">By<span>Mr Natly</span> / Jun 02, 2022</div>
                        </div>
                    </div>
                </div>
                <div class="ec-blog-block">
                    <div class="ec-blog-inner">
                        <div class="ec-blog-image">
                            <a href="blog-detail-left-sidebar.html">
                                <img class="blog-image" src="assets/images/blog-image/7.jpg"
                                    alt="Blog" />
                            </a>
                        </div>
                        <div class="ec-blog-content">
                            <div class="ec-blog-cat"><a href="blog-left-sidebar.html">Jewellery</a></div>
                            <h5 class="ec-blog-title"><a
                                    href="blog-detail-left-sidebar.html">Why Should be Concerned About Instacart Patents.</a></h5>

                            <div class="ec-blog-date">By<span>Mr Admin</span> / Feb 10, 2022</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--  Blog Section End -->

<!-- Ec Instagram Start -->
<section class="section ec-instagram-section section-space-pt">
    <div class="container">
        <h2 class="d-none">Instagram</h2>
        <div class="ec-insta-wrapper" data-animation="fadeIn">
            <div class="ec-insta-outer">
                <div class="insta-auto">
                    <!-- instagram item -->
                    <div class="ec-insta-item">
                        <div class="ec-insta-inner">
                            <a href="#" target="_blank"><img src="assets/images/instragram-image/1.jpg" alt="">

                            </a>
                        </div>
                    </div>
                    <!-- instagram item -->
                    <div class="ec-insta-item">
                        <div class="ec-insta-inner">
                            <a href="#" target="_blank"><img src="assets/images/instragram-image/2.jpg" alt="">

                            </a>
                        </div>
                    </div>
                    <!-- instagram item -->
                    <div class="ec-insta-item">
                        <div class="ec-insta-inner">
                            <a href="#" target="_blank"><img src="assets/images/instragram-image/3.jpg" alt="">

                            </a>
                        </div>
                    </div>
                    <!-- instagram item -->
                    <div class="ec-insta-item">
                        <div class="ec-insta-inner">
                            <a href="#" target="_blank"><img src="assets/images/instragram-image/4.jpg" alt="">

                            </a>
                        </div>
                    </div>
                    <!-- instagram item -->
                    <!-- instagram item -->
                    <div class="ec-insta-item">
                        <div class="ec-insta-inner">
                            <a href="#" target="_blank"><img src="assets/images/instragram-image/5.jpg" alt="">

                            </a>
                        </div>
                    </div>
                    <!-- instagram item -->
                    <div class="ec-insta-item">
                        <div class="ec-insta-inner">
                            <a href="#" target="_blank"><img src="assets/images/instragram-image/6.jpg" alt="">

                            </a>
                        </div>
                    </div>
                    <!-- instagram item -->
                    <div class="ec-insta-item">
                        <div class="ec-insta-inner">
                            <a href="#" target="_blank"><img src="assets/images/instragram-image/7.jpg" alt="">

                            </a>
                        </div>
                    </div>
                    <!-- instagram item -->
                    <div class="ec-insta-item">
                        <div class="ec-insta-inner">
                            <a href="#" target="_blank"><img src="assets/images/instragram-image/3.jpg" alt="">

                            </a>
                        </div>
                    </div>
                    <!-- instagram item -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Ec Instagram End --> 
@endsection

@push('pop-up')
    <!-- Newsletter Modal Start -->
<div id="ec-popnews-bg"></div>
<div id="ec-popnews-box">
    <div id="ec-popnews-close"><i class="ecicon eci-close"></i></div>
    <div class="row">
        <div class="col-md-7 disp-no-767">
            <img src="assets/images/banner/newsletter-8.png" alt="newsletter">
        </div>
        <div class="col-md-5">
            <div id="ec-popnews-box-content">
                <h2>Subscribe Newsletter. 111</h2>
                <p>Subscribe the ekka ecommerce to get in touch and get the future update. </p>
                {{-- <form id="ec-popnews-form" action="#" method="post">
                    <input type="email" name="newsemail" placeholder="Email Address" required />
                    <button type="button" class="btn btn-primary" name="subscribe">Subscribe</button>
                </form> --}}

            </div>
        </div>
    </div>
</div>
<!-- Newsletter Modal end -->
@endpush

@section('style')
    <!-- css All Plugins Files -->
   <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/animate.css') }}" />
   <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/swiper-bundle.min.css') }}" />
   <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/jquery-ui.min.css') }}" />
   <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/countdownTimer.css') }}" />
   <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/nouislider.css') }}" />
   <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/slick.min.css') }}" />
   <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/owl.carousel.min.css') }}" />
   <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/owl.theme.default.min.css') }}" />
   <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/bootstrap.css') }}" />

   <!-- Main Style -->
   {{-- <link rel="stylesheet" href="{{ URL::asset('assets/css/demo8.css') }}" /> --}}
    @vite(['resources/scss/frontend/demo8.scss'])

   <style>
        /* .ec-all-product-block {
            margin-right: 12px;
        } */
        .ec-new-slider .slick-slide {
            margin: 0 12px;
        }

        @media only screen and (max-width: 767px){            
            .disp-no-767 {
                display: block !important;
            }
        }

        @media only screen and (max-width: 1199px)
        {
            .ec-test-section, .ec-new-product-content {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                /* width: 33.3333333333%; */
                width: 100% !important;
            }
        }

        


   </style>
@endsection


@section('scripts')
    <!-- Vendor JS -->
    <script src="{{ URL::asset('assets/js/vendor/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/vendor/popper.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/vendor/modernizr-3.11.2.min.js') }}"></script>

    <!--Plugins JS-->
    <script src="{{ URL::asset('assets/js/plugins/jquery.sticky-sidebar.js') }}"></script>
    <script src="{{ URL::asset('assets/js/plugins/swiper-bundle.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/plugins/countdownTimer.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/plugins/nouislider.js') }}"></script>
    <script src="{{ URL::asset('assets/js/plugins/scrollup.js') }}"></script>
    <script src="{{ URL::asset('assets/js/plugins/jquery.zoom.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/plugins/slick.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/plugins/owl.carousel.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/plugins/infiniteslidev2.js') }}"></script>
    <script src="{{ URL::asset('assets/js/plugins/click-to-call.js') }}"></script>

    <!-- Main Js -->
    <script src="{{ URL::asset('assets/js/vendor/index.js') }}"></script>
    <script src="{{ URL::asset('assets/js/demo-8.js') }}"></script>
@endsection