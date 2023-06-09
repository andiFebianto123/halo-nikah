@extends('frontend.inc.blank')
@section('content')
    <!-- Ec breadcrumb start -->
    <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row ec_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="ec-breadcrumb-title">Single Vendor</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="ec-breadcrumb-item active">Single Vendor</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ec breadcrumb end -->

    <!-- Page detail section -->
    <section class="ec-bnr-detail ec-catalog-vendor-sec section-space-pt">
        <div class="ec-page-detail">
            <div class="container">
                <div class="ec-main-heading d-none">
                    <h2>Vendor <span>Detail</span></h2>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 profile-banner space-info margin-bottom-30">
                        <ul class="social-bar mb-0">
                            <li class="list-inline-item"><a class="hdr-facebook" href="#"><i class="ecicon eci-facebook"></i></a></li>
                            <li class="list-inline-item"><a class="hdr-twitter" href="#"><i class="ecicon eci-twitter"></i></a></li>
                            <li class="list-inline-item"><a class="hdr-instagram" href="#"><i class="ecicon eci-instagram"></i></a></li>
                            <li class="list-inline-item"><a class="hdr-linkedin" href="#"><i class="ecicon eci-linkedin"></i></a></li>
                        </ul>
                        <div class="ec-page-description ec-page-description-info">
                            <div class="ec-page-block">
                                <div class="ec-catalog-vendor">
                                    <img src="assets/images/vendor/5.jpg" alt="vendor img">
                                </div>
                                
                                <div class="ec-catalog-vendor-info row">
                                    <div class="col-lg-3 col-md-6 ec-catalog-name pad-15">
                                        <a href="vendor-profile.html">
                                            <h6 class="name">Neon Fashion</h6>
                                        </a>
                                        <p>( Retail Business )</p>
                                    </div>
                                    <div class="col-lg-3 col-md-6 ec-catalog-ratings pad-15">
                                        <h6>Level</h6>
                                        <p>Level : 9 out of 10</p>
                                    </div>
                                    <div class="col-lg-3 col-md-6 ec-catalog-pro-count pad-15">
                                        <h6>Seller Products</h6>
                                        <p>568 Products</p>
                                    </div>
                                    <div class="col-lg-3 col-md-6 ec-catalog-since pad-15">
                                        <h6>Seller since</h6>
                                        <p>1year and 11months</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 margin-bottom-30">
                        <div class="ec-page-description p-30">
                            <h5 class="ec-desc-title">About Our Firm</h5>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry. Lorem Ipsum has been the industry's standard dummy text ever
                                since the 1500s, when an unknown printer took a galley of type and
                                scrambled it to make a type specimen book.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ec-page-content section-space-p">
        <div class="container">
            <div class="row">
                <div class="ec-shop-rightside col-lg-9 order-lg-last col-md-12 order-md-first margin-b-30">
                    <!-- Shop Top Start -->
                    <div class="ec-pro-list-top d-flex">
                        <div class="col-md-6 ec-grid-list">
                            <div class="ec-gl-btn">
                                <button class="btn btn-grid active"><i class="fi fi-rr-apps"></i></button>
                                <button class="btn btn-list"><i class="fi fi-rr-list"></i></button>
                            </div>
                        </div>
                        <div class="col-md-6 ec-sort-select">
                            <span class="sort-by">Sort by</span>
                            <div class="ec-select-inner">
                                <select name="ec-select" id="ec-select">
                                    <option selected disabled>Position</option>
                                    <option value="1">Relevance</option>
                                    <option value="2">Name, A to Z</option>
                                    <option value="3">Name, Z to A</option>
                                    <option value="4">Price, low to high</option>
                                    <option value="5">Price, high to low</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- Shop Top End -->

                    <!-- Shop content Start -->
                    <div class="shop-pro-content">
                        <div class="shop-pro-inner">
                            <div class="row">
                               {{-- <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 mb-6 pro-gl-content">
                                    <div class="ec-product-inner">
                                        <div class="ec-pro-image-outer">
                                            <div class="ec-pro-image">
                                                <a href="product-left-sidebar.html" class="image">
                                                    <img class="main-image"
                                                        src="assets/images/product-image/6_1.jpg" alt="Product" />
                                                    <img class="hover-image"
                                                        src="assets/images/product-image/6_2.jpg" alt="Product" />
                                                </a>
                                                <span class="percentage">20%</span>
                                                <a href="#" class="quickview" data-link-action="quickview"
                                                    title="Quick view" data-bs-toggle="modal"
                                                    data-bs-target="#ec_quickview_modal"><i class="fi-rr-eye"></i></a>
                                                <div class="ec-pro-actions">
                                                    <a href="compare.html" class="ec-btn-group compare"
                                                        title="Compare"><i class="fi fi-rr-arrows-repeat"></i></a>
                                                    <button title="Add To Cart" class="add-to-cart"><i
                                                            class="fi-rr-shopping-basket"></i> Add To Cart</button>
                                                    <a class="ec-btn-group wishlist" title="Wishlist"><i
                                                            class="fi-rr-heart"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ec-pro-content">
                                            <h5 class="ec-pro-title"><a href="product-left-sidebar.html">Round Neck T-Shirt</a></h5>
                                            <div class="ec-pro-rating">
                                                <i class="ecicon eci-star fill"></i>
                                                <i class="ecicon eci-star fill"></i>
                                                <i class="ecicon eci-star fill"></i>
                                                <i class="ecicon eci-star fill"></i>
                                                <i class="ecicon eci-star"></i>
                                            </div>
                                            <div class="ec-pro-list-desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dutmmy text ever since the 1500s, when an unknown printer took a galley.</div>
                                            <span class="ec-price">
                                                <span class="old-price">$27.00</span>
                                                <span class="new-price">$22.00</span>
                                            </span>
                                            <div class="ec-pro-option">
                                                <div class="ec-pro-color">
                                                    <span class="ec-pro-opt-label">Color</span>
                                                    <ul class="ec-opt-swatch ec-change-img">
                                                        <li class="active"><a href="#" class="ec-opt-clr-img"
                                                                data-src="assets/images/product-image/6_1.jpg"
                                                                data-src-hover="assets/images/product-image/6_1.jpg"
                                                                data-tooltip="Gray"><span
                                                                    style="background-color:#e8c2ff;"></span></a></li>
                                                        <li><a href="#" class="ec-opt-clr-img"
                                                                data-src="assets/images/product-image/6_2.jpg"
                                                                data-src-hover="assets/images/product-image/6_2.jpg"
                                                                data-tooltip="Orange"><span
                                                                    style="background-color:#9cfdd5;"></span></a></li>
                                                    </ul>
                                                </div>
                                                <div class="ec-pro-size">
                                                    <span class="ec-pro-opt-label">Size</span>
                                                    <ul class="ec-opt-size">
                                                        <li class="active"><a href="#" class="ec-opt-sz"
                                                                data-old="$25.00" data-new="$20.00"
                                                                data-tooltip="Small">S</a></li>
                                                        <li><a href="#" class="ec-opt-sz" data-old="$27.00"
                                                                data-new="$22.00" data-tooltip="Medium">M</a></li>
                                                        <li><a href="#" class="ec-opt-sz" data-old="$30.00"
                                                                data-new="$25.00" data-tooltip="Large">X</a></li>
                                                        <li><a href="#" class="ec-opt-sz" data-old="$35.00"
                                                                data-new="$30.00" data-tooltip="Extra Large">XL</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 mb-6 pro-gl-content">
                                    <div class="ec-product-inner">
                                        <div class="ec-pro-image-outer">
                                            <div class="ec-pro-image">
                                                <a href="product-left-sidebar.html" class="image">
                                                    <img class="main-image"
                                                        src="assets/images/product-image/5_1.jpg" alt="Product" />
                                                    <img class="hover-image"
                                                        src="assets/images/product-image/5_2.jpg" alt="Product" />
                                                </a>
                                                <span class="flags">
                                                    <span class="new">New</span>
                                                </span>
                                                <a href="#" class="quickview" data-link-action="quickview"
                                                    title="Quick view" data-bs-toggle="modal"
                                                    data-bs-target="#ec_quickview_modal"><i class="fi-rr-eye"></i></a>
                                                <div class="ec-pro-actions">
                                                    <a href="compare.html" class="ec-btn-group compare"
                                                        title="Compare"><i class="fi fi-rr-arrows-repeat"></i></a>
                                                    <button title="Add To Cart" class="add-to-cart"><i
                                                            class="fi-rr-shopping-basket"></i> Add To Cart</button>
                                                    <a class="ec-btn-group wishlist" title="Wishlist"><i
                                                            class="fi-rr-heart"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ec-pro-content">
                                            <h5 class="ec-pro-title"><a href="product-left-sidebar.html">Leather Belt for Men</a></h5>
                                            <div class="ec-pro-rating">
                                                <i class="ecicon eci-star fill"></i>
                                                <i class="ecicon eci-star fill"></i>
                                                <i class="ecicon eci-star fill"></i>
                                                <i class="ecicon eci-star fill"></i>
                                                <i class="ecicon eci-star"></i>
                                            </div>
                                            <div class="ec-pro-list-desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dutmmy text ever since the 1500s, when an unknown printer took a galley.</div>
                                            <span class="ec-price">
                                                <span class="old-price">$15.00</span>
                                                <span class="new-price">$10.00</span>
                                            </span>
                                            <div class="ec-pro-option">
                                                <div class="ec-pro-color">
                                                    <span class="ec-pro-opt-label">Color</span>
                                                    <ul class="ec-opt-swatch ec-change-img">
                                                        <li class="active"><a href="#" class="ec-opt-clr-img"
                                                                data-src="assets/images/product-image/5_1.jpg"
                                                                data-src-hover="assets/images/product-image/5_1.jpg"
                                                                data-tooltip="Gray"><span
                                                                    style="background-color:#9e9e9e;"></span></a></li>
                                                        <li><a href="#" class="ec-opt-clr-img"
                                                                data-src="assets/images/product-image/5_2.jpg"
                                                                data-src-hover="assets/images/product-image/5_2.jpg"
                                                                data-tooltip="Orange"><span
                                                                    style="background-color:#eb8e76;"></span></a></li>
                                                    </ul>
                                                </div>
                                                <div class="ec-pro-size">
                                                    <span class="ec-pro-opt-label">Size</span>
                                                    <ul class="ec-opt-size">
                                                        <li class="active"><a href="#" class="ec-opt-sz"
                                                                data-old="$15.00" data-new="$10.00"
                                                                data-tooltip="Small">32</a></li>
                                                        <li><a href="#" class="ec-opt-sz" data-old="$17.00"
                                                                data-new="$12.00" data-tooltip="Medium">34</a></li>
                                                        <li><a href="#" class="ec-opt-sz" data-old="$20.00"
                                                                data-new="$15.00" data-tooltip="Large">36</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 mb-6 ec-product-content">
                                    <div class="ec-product-inner">
                                        <div class="ec-pro-image-outer">
                                            <div class="ec-pro-image">
                                                <a href="product-left-sidebar.html" class="image">
                                                    <img class="main-image" src="http://localhost/laravel/adminlte-laravel/public/storage/images/product/product-default.jpg" alt="Product">
                                                    
                                                </a>
                                                                <span class="percentage">16%</span>
                                                                <div class="ec-pro-actions">
                                                    
                                                    <a href="#" class="ec-btn-group quickview" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#ec_quickview_modal" onclick="showModalProduct('1')">
                                                        <i class="fi-rr-eye"></i>
                                                    </a>
                                                    
                                                    <a href="javascript:void(0)" title="Add To Cart" data-price="10000" class="ec-btn-group add-to-cart"><i class="fi-rr-shopping-basket"></i></a>
                                                </div>
                                            <div class="ec-pro-loader"></div></div>
                                        </div>
                                        <div class="ec-pro-content">
                                            <a href="shop-left-sidebar-col-3.html"><h6 class="ec-pro-stitle">Fotografi</h6></a> 
                                            <h5 class="ec-pro-title"><a href="product-left-sidebar.html">Produk 1</a></h5>
                                            <div class="ec-pro-rat-price">
                                                <span class="ec-pro-rating"><i class="ecicon eci-star fill"></i><i class="ecicon eci-star fill"></i><i class="ecicon eci-star fill"></i><i class="ecicon eci-star fill"></i><i class="ecicon eci-star"></i></span>   
                                                <span class="ec-price">
                                                    <span class="new-price">Rp 10.000</span>
                                                    <span class="old-price">Rp 12.000</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 mb-6 ec-product-content">
                                    <div class="ec-product-inner">
                                        <div class="ec-pro-image-outer">
                                            <div class="ec-pro-image">
                                                <a href="product-left-sidebar.html" class="image">
                                                    <img class="main-image" src="http://localhost/laravel/adminlte-laravel/public/storage/images/product/product-default.jpg" alt="Product">
                                                    
                                                </a>
                                                                <span class="percentage">16%</span>
                                                                <div class="ec-pro-actions">
                                                    
                                                    <a href="#" class="ec-btn-group quickview" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#ec_quickview_modal" onclick="showModalProduct('1')">
                                                        <i class="fi-rr-eye"></i>
                                                    </a>
                                                    
                                                    <a href="javascript:void(0)" title="Add To Cart" data-price="10000" class="ec-btn-group add-to-cart"><i class="fi-rr-shopping-basket"></i></a>
                                                </div>
                                            <div class="ec-pro-loader"></div></div>
                                        </div>
                                        <div class="ec-pro-content">
                                            <a href="shop-left-sidebar-col-3.html"><h6 class="ec-pro-stitle">Fotografi</h6></a> 
                                            <h5 class="ec-pro-title"><a href="product-left-sidebar.html">Produk 1</a></h5>
                                            <div class="ec-pro-rat-price">
                                                <span class="ec-pro-rating"><i class="ecicon eci-star fill"></i><i class="ecicon eci-star fill"></i><i class="ecicon eci-star fill"></i><i class="ecicon eci-star fill"></i><i class="ecicon eci-star"></i></span>   
                                                <span class="ec-price">
                                                    <span class="new-price">Rp 10.000</span>
                                                    <span class="old-price">Rp 12.000</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 mb-6 ec-product-content">
                                    <div class="ec-product-inner">
                                        <div class="ec-pro-image-outer">
                                            <div class="ec-pro-image">
                                                <a href="product-left-sidebar.html" class="image">
                                                    <img class="main-image" src="http://localhost/laravel/adminlte-laravel/public/storage/images/product/product-default.jpg" alt="Product">
                                                    
                                                </a>
                                                                <span class="percentage">16%</span>
                                                                <div class="ec-pro-actions">
                                                    
                                                    <a href="#" class="ec-btn-group quickview" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#ec_quickview_modal" onclick="showModalProduct('1')">
                                                        <i class="fi-rr-eye"></i>
                                                    </a>
                                                    
                                                    <a href="javascript:void(0)" title="Add To Cart" data-price="10000" class="ec-btn-group add-to-cart"><i class="fi-rr-shopping-basket"></i></a>
                                                </div>
                                            <div class="ec-pro-loader"></div></div>
                                        </div>
                                        <div class="ec-pro-content">
                                            <a href="shop-left-sidebar-col-3.html"><h6 class="ec-pro-stitle">Fotografi</h6></a> 
                                            <h5 class="ec-pro-title"><a href="product-left-sidebar.html">Produk 1</a></h5>
                                            <div class="ec-pro-rat-price">
                                                <span class="ec-pro-rating"><i class="ecicon eci-star fill"></i><i class="ecicon eci-star fill"></i><i class="ecicon eci-star fill"></i><i class="ecicon eci-star fill"></i><i class="ecicon eci-star"></i></span>   
                                                <span class="ec-price">
                                                    <span class="new-price">Rp 10.000</span>
                                                    <span class="old-price">Rp 12.000</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Ec Pagination Start -->
                        <div class="ec-pro-pagination">
                            <span>Showing 1-12 of 21 item(s)</span>
                            <ul class="ec-pro-pagination-inner">
                                <li><a class="active" href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a class="next" href="#">Next <i class="ecicon eci-angle-right"></i></a></li>
                            </ul>
                        </div>
                        <!-- Ec Pagination End -->
                    </div>
                    <!--Shop content End -->
                </div>
                <!-- Sidebar Area Start -->
                <div class="ec-shop-leftside ec-vendor-sidebar col-lg-3 col-md-12 order-lg-first order-md-last">
                    <div class="ec-sidebar-wrap ec-border-box">
                    
                        <!-- Sidebar Category Block -->
                        <div class="ec-sidebar-block">
                            <div class="ec-sb-title">
                                <h3 class="ec-sidebar-title">Category</h3>
                            </div>
                            <div class="ec-sb-block-content">
                                <ul>
                                    <li>
                                        <div class="ec-sidebar-block-item">
                                            <input type="checkbox" checked /> <a href="#">clothes</a><span
                                                class="checked"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item">
                                            <input type="checkbox" /> <a href="#">Bags</a><span class="checked"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item">
                                            <input type="checkbox" /> <a href="#">Shoes</a><span class="checked"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item">
                                            <input type="checkbox" /> <a href="#">cosmetics</a><span
                                                class="checked"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item">
                                            <input type="checkbox" /> <a href="#">electrics</a><span
                                                class="checked"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item">
                                            <input type="checkbox" /> <a href="#">phone</a><span class="checked"></span>
                                        </div>
                                    </li>
                                    <li id="ec-more-toggle-content" style="padding: 0; display: none;">
                                        <ul>
                                            <li>
                                                <div class="ec-sidebar-block-item">
                                                    <input type="checkbox" /> <a href="#">Watch</a><span
                                                        class="checked"></span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="ec-sidebar-block-item">
                                                    <input type="checkbox" /> <a href="#">Cap</a><span
                                                        class="checked"></span>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item ec-more-toggle">
                                            <span class="checked"></span><span id="ec-more-toggle">More
                                                Categories</span>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <!-- Sidebar Size Block -->
                        <div class="ec-sidebar-block">
                            <div class="ec-sb-title">
                                <h3 class="ec-sidebar-title">Size</h3>
                            </div>
                            <div class="ec-sb-block-content">
                                <ul>
                                    <li>
                                        <div class="ec-sidebar-block-item">
                                            <input type="checkbox" value="" checked /><a href="#">S</a><span
                                                class="checked"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item">
                                            <input type="checkbox" value="" /><a href="#">M</a><span
                                                class="checked"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item">
                                            <input type="checkbox" value="" /> <a href="#">L</a><span
                                                class="checked"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item">
                                            <input type="checkbox" value="" /><a href="#">XL</a><span
                                                class="checked"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item">
                                            <input type="checkbox" value="" /><a href="#">XXL</a><span
                                                class="checked"></span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Sidebar Color item -->
                        <div class="ec-sidebar-block ec-sidebar-block-clr">
                            <div class="ec-sb-title">
                                <h3 class="ec-sidebar-title">Color</h3>
                            </div>
                            <div class="ec-sb-block-content">
                                <ul>
                                    <li>
                                        <div class="ec-sidebar-block-item"><span
                                                style="background-color:#78a4fc;"></span></div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item"><span
                                                style="background-color:#ff8b9e;"></span></div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item"><span
                                                style="background-color:#3d3d3d;"></span></div>
                                    </li>
                                    <li class="active">
                                        <div class="ec-sidebar-block-item"><span
                                                style="background-color:#9fffad;"></span></div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item"><span
                                                style="background-color:#ff8367;"></span></div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item"><span
                                                style="background-color:#f691ff;"></span></div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item"><span
                                                style="background-color:#ffc601;"></span></div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item"><span
                                                style="background-color:#600ad6;"></span></div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item"><span
                                                style="background-color:#09e3db;"></span></div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item"><span
                                                style="background-color:#0bc27f;"></span></div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Sidebar Price Block -->
                        <div class="ec-sidebar-block">
                            <div class="ec-sb-title">
                                <h3 class="ec-sidebar-title">Price</h3>
                            </div>
                            <div class="ec-sb-block-content es-price-slider">
                                <div class="ec-price-filter">
                                    <div id="ec-sliderPrice" class="filter__slider-price" data-min="0" data-max="250"
                                        data-step="10"></div>
                                    <div class="ec-price-input">
                                        <label class="filter__label"><input type="text" class="filter__input"></label>
                                        <span class="ec-price-divider"></span>
                                        <label class="filter__label"><input type="text" class="filter__input"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Sidebar Price Block -->
                        <div class="ec-sidebar-block ec-contact-form">
                            <div class="ec-sb-title">
                                <h3 class="ec-sidebar-title">Contact With Seller</h3>
                            </div>
                            <div class="ec-sb-block-content ec-sb-block-form">
                                <form action="">
                                    <label for="fname">Your Name</label>
                                    <input type="text" id="fname" name="firstname" placeholder="Your name.."
                                        required="required">

                                    <label for="lname">Your Email Id</label>
                                    <input type="text" id="lname" name="lastname" placeholder="Your email is.."
                                        required="required">

                                    <label for="subject">Your Message</label>
                                    <textarea id="subject" name="subject" placeholder="Write Messages.." rows="4"
                                        required="required"></textarea>

                                    <button type="submit" class="btn btn-lg btn-primary" tabindex="0">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('pop-up')
    <script></script>
@endpush

@section('style')
    <!-- css All Plugins Files -->
    <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/animate.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/swiper-bundle.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/jquery-ui.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/countdownTimer.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/slick.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/nouislider.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/owl.carousel.min.css') }}" />
   <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/owl.theme.default.min.css') }}" />

    <!-- Main Style -->
    {{-- <link rel="stylesheet" href="assets/css/style.css" /> --}}
    {{-- <link rel="stylesheet" href="assets/css/responsive.css" /> --}}
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

    <!-- Background css -->
    {{-- <link rel="stylesheet" id="bg-switcher-css" href="assets/css/backgrounds/bg-4.css"> --}}
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
    <script src="{{ URL::asset('assets/js/vendor/jquery.magnific-popup.min.js') }}"></script>

    <!-- Main Js -->
    <script src="{{ URL::asset('assets/js/vendor/index.js') }}"></script>
    <script src="{{ URL::asset('assets/js/demo-8.js') }}"></script>
    {{-- <script src="{{ URL::asset('assets/js/main.js')}}"></script> --}}


    {{-- vendor detail JS --}}
    {{-- <!-- Vendor JS -->
    <script src="assets/js/vendor/jquery-3.5.1.min.js"></script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="assets/js/vendor/bootstrap.min.js"></script>
    <script src="assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
    <script src="assets/js/vendor/modernizr-3.11.2.min.js"></script>

    <!--Plugins JS-->
    <script src="assets/js/plugins/swiper-bundle.min.js"></script>
    <script src="assets/js/plugins/countdownTimer.min.js"></script>
    <script src="assets/js/plugins/scrollup.js"></script>
    <script src="assets/js/plugins/jquery.zoom.min.js"></script>
    <script src="assets/js/plugins/slick.min.js"></script>
    <script src="assets/js/plugins/infiniteslidev2.js"></script>
    <script src="assets/js/vendor/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/plugins/jquery.sticky-sidebar.js"></script>
    <script src="assets/js/plugins/nouislider.js"></script>
    <!-- Google translate Js -->
    <script src="assets/js/vendor/google-translate.js"></script>
    <script>
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({ pageLanguage: 'en' }, 'google_translate_element');
        }
    </script>
    <!-- Main Js -->
    <script src="assets/js/vendor/index.js"></script>
    <script src="assets/js/main.js"></script> --}}
@endsection