@extends('frontend.inc.base')

@section('cart')
    <!-- Ekka Cart Start -->
    <div class="ec-side-cart-overlay"></div>
    <div id="ec-side-cart" class="ec-side-cart">
        <div class="ec-cart-inner">
            <div class="ec-cart-top">
                <div class="ec-cart-title">
                    <span class="cart_title">My Cart</span>
                    <button class="ec-close">×</button>
                </div>
                <ul class="eccart-pro-items">
                    <li>
                        <a href="product-left-sidebar.html" class="sidecart_pro_img"><img
                                src="assets/images/product-image/93_1.jpg" alt="product"></a>
                        <div class="ec-pro-content">
                            <a href="single-product-left-sidebar.html" class="cart_pro_title">Mens Winter Leathers Jackets</a>
                            <span class="cart-price"><span>$49.00</span> x 1</span>
                            <div class="qty-plus-minus">
                                <input class="qty-input" type="text" name="ec_qtybtn" value="1" />
                            </div>
                            <a href="#" class="remove">×</a>
                        </div>
                    </li>
                    <li>
                        <a href="product-left-sidebar.html" class="sidecart_pro_img"><img
                                src="assets/images/product-image/96_1.jpg" alt="product"></a>
                        <div class="ec-pro-content">
                            <a href="product-left-sidebar.html" class="cart_pro_title">Running & Trekking Shoes - White</a>
                            <span class="cart-price"><span>$150.00</span> x 1</span>
                            <div class="qty-plus-minus">
                                <input class="qty-input" type="text" name="ec_qtybtn" value="1" />
                            </div>
                            <a href="#" class="remove">×</a>
                        </div>
                    </li>
                    <li>
                        <a href="product-left-sidebar.html" class="sidecart_pro_img"><img
                                src="assets/images/product-image/111_1.jpg" alt="product"></a>
                        <div class="ec-pro-content">
                            <a href="product-left-sidebar.html" class="cart_pro_title">Rose Gold Peacock Earrings</a>
                            <span class="cart-price"><span>$950.00</span> x 1</span>
                            <div class="qty-plus-minus">
                                <input class="qty-input" type="text" name="ec_qtybtn" value="1" />
                            </div>
                            <a href="#" class="remove">×</a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="ec-cart-bottom">
                <div class="cart-sub-total">
                    <table class="table cart-table">
                        <tbody>
                            <tr>
                                <td class="text-left">Sub-Total :</td>
                                <td class="text-right">$300.00</td>
                            </tr>
                            <tr>
                                <td class="text-left">VAT (20%) :</td>
                                <td class="text-right">$60.00</td>
                            </tr>
                            <tr>
                                <td class="text-left">Total :</td>
                                <td class="text-right primary-color">$360.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="cart_btn">
                    <a href="cart.html" class="btn btn-primary">View Cart</a>
                    <a href="checkout.html" class="btn btn-secondary">Checkout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Ekka Cart End -->
@endsection

@section('footer')
    <!-- Footer Start -->
<footer class="ec-footer">
    <div class="footer-newletter section-space-footer-p">
        <div class="container">
            <div class="row">
                <div class="footer-cat-inner">
                    <div class="footer-cat-block">
                        <div class="footer-cat-stitle">Brands Directory</div>
                        <div class="block">
                            <span class="footer-cat-title">Fashion : </span>
                            <a href="shop-left-sidebar-col-3.html">T-shirt</a><span> | </span>
                            <a href="shop-left-sidebar-col-3.html">Shirts</a><span> | </span>
                            <a href="shop-left-sidebar-col-3.html">shorts & jeans </a><span> | </span>
                            <a href="shop-left-sidebar-col-3.html">jacket</a><span> | </span>
                            <a href="shop-left-sidebar-col-3.html">dress & frock</a><span> | </span>
                            <a href="shop-left-sidebar-col-3.html">innerwear</a>
                            <a href="shop-left-sidebar-col-3.html">hosiery</a>
                        </div>
                        <div class="block">
                            <span class="footer-cat-title">footwear : </span>
                            <a href="shop-left-sidebar-col-3.html">sport</a><span> | </span>
                            <a href="shop-left-sidebar-col-3.html">formal</a><span> | </span>
                            <a href="shop-left-sidebar-col-3.html">Boots</a><span> | </span>
                            <a href="shop-left-sidebar-col-3.html">casual</a><span> | </span>
                            <a href="shop-left-sidebar-col-3.html">cowboy shoes</a><span> | </span>
                            <a href="shop-left-sidebar-col-3.html">safety shoes</a><span> | </span>
                            <a href="shop-left-sidebar-col-3.html">Party wear shoes</a><span> | </span>
                            <a href="shop-left-sidebar-col-3.html">Branded</a><span> | </span>
                            <a href="shop-left-sidebar-col-3.html">Firstcopy</a><span> | </span>
                            <a href="shop-left-sidebar-col-3.html">Long shoes</a>
                        </div>
                        <div class="block">
                            <span class="footer-cat-title">jewellery : </span>
                            <a href="shop-left-sidebar-col-3.html">Necklace</a><span> | </span>
                            <a href="shop-left-sidebar-col-3.html">Earrings</a><span> | </span>
                            <a href="shop-left-sidebar-col-3.html">Couple rings</a><span> | </span>
                            <a href="shop-left-sidebar-col-3.html">Pendants</a><span> | </span>
                            <a href="shop-left-sidebar-col-3.html">Crystal</a><span> | </span>
                            <a href="shop-left-sidebar-col-3.html">Bangles</a><span> | </span>
                            <a href="shop-left-sidebar-col-3.html">bracelets</a><span> | </span>
                            <a href="shop-left-sidebar-col-3.html">nosepin</a><span> | </span>
                            <a href="shop-left-sidebar-col-3.html">chain</a><span> | </span>
                            <a href="shop-left-sidebar-col-3.html">Earrings</a><span> | </span>
                            <a href="shop-left-sidebar-col-3.html">Couple rings</a><span> | </span>
                        </div>
                        <div class="block">
                            <span class="footer-cat-title">cosmetics : </span>
                            <a href="shop-left-sidebar-col-3.html">Shampoo</a><span> | </span>
                            <a href="shop-left-sidebar-col-3.html">Bodywash</a><span> | </span>
                            <a href="shop-left-sidebar-col-3.html">Facewash</a><span> | </span>
                            <a href="shop-left-sidebar-col-3.html">makeup kit</a><span> | </span>
                            <a href="shop-left-sidebar-col-3.html">liner</a><span> | </span>
                            <a href="shop-left-sidebar-col-3.html">lipstick</a><span> | </span>
                            <a href="shop-left-sidebar-col-3.html">prefume</a><span> | </span>
                            <a href="shop-left-sidebar-col-3.html">Body shop</a><span> | </span>
                            <a href="shop-left-sidebar-col-3.html">scrub</a><span> | </span>
                            <a href="shop-left-sidebar-col-3.html">hair gel</a><span> | </span>
                            <a href="shop-left-sidebar-col-3.html">hair colors</a><span> | </span>
                            <a href="shop-left-sidebar-col-3.html">hair dye</a><span> | </span>
                            <a href="shop-left-sidebar-col-3.html">sunscreen</a><span> | </span>
                            <a href="shop-left-sidebar-col-3.html">skin loson</a><span> | </span>
                            <a href="shop-left-sidebar-col-3.html">liner</a><span> | </span>
                            <a href="shop-left-sidebar-col-3.html">lipstick</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-container">
        <div class="footer-top section-space-footer-p">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-lg-3 ec-footer-cat">
                        <div class="ec-footer-widget">
                            <h4 class="ec-footer-heading">Popular Categories</h4>
                            <div class="ec-footer-links">
                                <ul class="align-items-center">
                                    <li class="ec-footer-link"><a href="#">Fashion</a></li>
                                    <li class="ec-footer-link"><a href="#">Electronic</a></li>
                                    <li class="ec-footer-link"><a href="#">Cosmetic</a></li>
                                    <li class="ec-footer-link"><a href="#">Health</a></li>
                                    <li class="ec-footer-link"><a href="#">Watches</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-3 ec-footer-info">
                        <div class="ec-footer-widget">
                            <h4 class="ec-footer-heading">Products</h4>
                            <div class="ec-footer-links">
                                <ul class="align-items-center">
                                    <li class="ec-footer-link"><a href="#">Prices drop</a></li>
                                    <li class="ec-footer-link"><a href="#">New products</a></li>
                                    <li class="ec-footer-link"><a href="#">Best sales</a></li>
                                    <li class="ec-footer-link"><a href="contact-us.html">Contact us</a></li>
                                    <li class="ec-footer-link"><a href="#">Sitemap</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-3 ec-footer-account">
                        <div class="ec-footer-widget">
                            <h4 class="ec-footer-heading">Our Company</h4>
                            <div class="ec-footer-links">
                                <ul class="align-items-center">
                                    <li class="ec-footer-link"><a href="track-order.html">Delivery</a></li>
                                    <li class="ec-footer-link"><a href="privacy-policy.html">Legal Notice</a></li>
                                    <li class="ec-footer-link"><a href="terms-condition.html">Terms and conditions</a></li>
                                    <li class="ec-footer-link"><a href="about-us.html">About us</a></li>
                                    <li class="ec-footer-link"><a href="checkout.html">Secure payment</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-3 ec-footer-service">
                        <div class="ec-footer-widget">
                            <h4 class="ec-footer-heading">Services</h4>
                            <div class="ec-footer-links">
                                <ul class="align-items-center">
                                    <li class="ec-footer-link"><a href="#">Prices drop</a></li>
                                    <li class="ec-footer-link"><a href="#">New products</a></li>
                                    <li class="ec-footer-link"><a href="#">Best sales</a></li>
                                    <li class="ec-footer-link"><a href="contact-us.html">Contact us</a></li>
                                    <li class="ec-footer-link"><a href="#">Sitemap</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-3 ec-footer-cont-social">
                        <div class="ec-footer-contact">
                            <div class="ec-footer-widget">
                                <h4 class="ec-footer-heading">Contact</h4>
                                <div class="ec-footer-links">
                                    <ul class="align-items-center">
                                        <li class="ec-footer-link ec-foo-location"><span><i class="fi fi-rr-marker"></i></span>
                                            <p>2548 Broaddus Maple Court, Madisonville KY 4783, USA</p>
                                        </li>
                                        <li class="ec-footer-link ec-foo-call"><span><i class="fi-rr-phone-call"></i></span><a href="tel:+919999999999">+91 999 999 9999</a>
                                        </li>
                                        <li class="ec-footer-link ec-foo-mail"><span><i class="fi fi-rr-envelope"></i></span><a
                                                href="mailto:support@demo.email">support@demo.email</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="ec-footer-social">
                            <div class="ec-footer-widget">
                                <h4 class="ec-footer-heading marg-b-0 s-head">Follow Us</h4>
                                <div class="ec-footer-links">
                                    <ul class="align-items-center">
                                        <li class="ec-footer-link"><a href="#"><i class="ecicon eci-instagram"
                                                    aria-hidden="true"></i></a></li>
                                        <li class="ec-footer-link"><a href="#"><i class="ecicon eci-twitter-square"
                                                    aria-hidden="true"></i></a></li>
                                        <li class="ec-footer-link"><a href="#"><i class="ecicon eci-facebook-square"
                                                    aria-hidden="true"></i></a></li>
                                        <li class="ec-footer-link"><a href="#"><i class="ecicon eci-linkedin-square"
                                                        aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <!-- Footer payment -->
                    <div class="footer-bottom-right">
                        <div class="footer-bottom-payment d-flex justify-content-center">
                            <div class="payment-link">
                                <img src="assets/images/icons/payment.png" alt="">
                            </div>

                        </div>
                    </div>
                    <!-- Footer payment -->
                    <!-- Footer Copyright Start -->
                    <div class="footer-copy">
                        <div class="footer-bottom-copy ">
                            <div class="ec-copy">Copyright © 2023 <a class="site-name" href="index.html">Ekka</a> all
                                rights reserved. Powered by Ekka</div>
                        </div>
                    </div>
                    <!-- Footer Copyright End -->

                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Area End -->
@endsection

@section('modal')
    <!-- Modal -->
<div class="modal fade" id="ec_quickview_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="btn-close qty_close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-5 col-sm-12 col-xs-12">
                        <!-- Swiper -->
                        <div class="qty-product-cover">
                            <div class="qty-slide">
                                <img class="img-responsive" src="assets/images/product-image/94_1.jpg" alt="">
                            </div>
                            <div class="qty-slide">
                                <img class="img-responsive" src="assets/images/product-image/94_2.jpg" alt="">
                            </div>
                            <div class="qty-slide">
                                <img class="img-responsive" src="assets/images/product-image/93_1.jpg" alt="">
                            </div>
                            <div class="qty-slide">
                                <img class="img-responsive" src="assets/images/product-image/93_2.jpg" alt="">
                            </div>
                            <div class="qty-slide">
                                <img class="img-responsive" src="assets/images/product-image/94_2.jpg" alt="">
                            </div>
                        </div>
                        <div class="qty-nav-thumb">
                            <div class="qty-slide">
                                <img class="img-responsive" src="assets/images/product-image/94_1.jpg" alt="">
                            </div>
                            <div class="qty-slide">
                                <img class="img-responsive" src="assets/images/product-image/94_2.jpg" alt="">
                            </div>
                            <div class="qty-slide">
                                <img class="img-responsive" src="assets/images/product-image/93_1.jpg" alt="">
                            </div>
                            <div class="qty-slide">
                                <img class="img-responsive" src="assets/images/product-image/93_2.jpg" alt="">
                            </div>
                            <div class="qty-slide">
                                <img class="img-responsive" src="assets/images/product-image/94_2.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-12 col-xs-12">
                        <div class="quickview-pro-content">
                            <h5 class="ec-quick-title"><a href="product-left-sidebar.html">Mens Winter Leathers Jackets</a></h5>
                            <div class="ec-quickview-rating">
                                <i class="ecicon eci-star fill"></i>
                                <i class="ecicon eci-star fill"></i>
                                <i class="ecicon eci-star fill"></i>
                                <i class="ecicon eci-star fill"></i>
                                <i class="ecicon eci-star"></i>
                            </div>

                            <div class="ec-quickview-desc">Lorem Ipsum is simply dummy text of the printing and
                                typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever
                                since the 1500s,</div>
                            <div class="ec-quickview-price">
                                <span class="new-price">$199.00</span>
                                <span class="old-price">$200.00</span>
                            </div>

                            <div class="ec-pro-variation">
                                <div class="ec-pro-variation-inner ec-pro-variation-size">
                                    <span>Size</span>
                                    <div class="ec-pro-variation-content">
                                        <ul>
                                            <li><span>250 g</span></li>
                                            <li><span>500 g</span></li>
                                            <li><span>1 kg</span></li>
                                            <li><span>2 kg</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="ec-quickview-qty">
                                <div class="qty-plus-minus">
                                    <input class="qty-input" type="text" name="ec_qtybtn" value="1" />
                                </div>
                                <div class="ec-quickview-cart ">
                                    <button class="btn btn-primary">Add To Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal end -->

<!-- Click To Call -->
<div class="ec-cc-style cc-right-bottom">
    <!-- Start Floating Panel Container -->
    <div class="cc-panel">			
        <!-- Panel Content -->
        <div class="cc-header">
            <img src="assets/images/whatsapp/profile_01.jpg" alt="profile image"/>
            <h2>John Mark</h2>
            <p>Tachnical Manager</p>
        </div>
        <div class="cc-body">
            <p><b>Hey there &#128515;</b></p>
            <p>Need help ? just give me a call.</p>
        </div>
        <div class="cc-footer">
            <a href="tel:+919099153528" class="cc-call-button">
                <span>Call me</span>
                <svg width="13px" height="10px" viewBox="0 0 13 10">
                <path d="M1,5 L11,5"></path>
                <polyline points="8 1 12 5 8 9"></polyline>
                </svg>
            </a>
        </div>
    </div>
    <!--/ End Floating Panel Container -->

    <!-- Start Right Floating Button-->
    <div class="cc-button cc-right-bottom">
        <i class="fi-rr-phone-call"></i>
    </div>
    <!--/ End Right Floating Button-->

</div>
<!-- Click To Call end -->

@stack('pop-up')

<!-- Footer navigation panel for responsive display -->
<div class="ec-nav-toolbar">
    <div class="container">
        <div class="ec-nav-panel">
            <div class="ec-nav-panel-icons">
                <a href="#ec-mobile-menu" class="navbar-toggler-btn ec-header-btn ec-side-toggle"><i class="fi fi-rr-menu-burger"></i></a>
            </div>
            <div class="ec-nav-panel-icons">
                <a href="#ec-side-cart" class="toggle-cart ec-header-btn ec-side-toggle"><i class="fi-rr-shopping-basket"></i><span
                        class="ec-cart-noti ec-header-count cart-count-lable">3</span></a>
            </div>
            <div class="ec-nav-panel-icons">
                <a href="index.html" class="ec-header-btn"><i class="fi-rr-home"></i></a>
            </div>
            <div class="ec-nav-panel-icons">
                <a href="wishlist.html" class="ec-header-btn"><i class="fi-rr-heart"></i><span class="ec-cart-noti">4</span></a>
            </div>
            <div class="ec-nav-panel-icons">
                <a href="login.html" class="ec-header-btn"><i class="fi-rr-user"></i></a>
            </div>
        </div>
    </div>
</div>
<!-- Footer navigation panel for responsive display end -->

<!-- Recent Purchase Popup  -->
<div class="recent-purchase">
    <img src="assets/images/product-image/111_1.jpg" alt="payment image">
    <div class="detail">
        <p>Someone in new just bought</p>
        <h6>Rose Gold Earrings</h6>
        <p>2 Minutes ago</p>
    </div>
    <a href="javascript:void(0)" class="icon-btn recent-close">×</a>
</div>
<!-- Recent Purchase Popup end -->

<!-- Add to Cart successfully toast Start -->
<div id="addtocart_toast" class="addtocart_toast">
    <div class="desc">You Have Add To Cart Successfully</div>
</div>
<div id="wishlist_toast" class="wishlist_toast">
    <div class="desc">You Have Add To Wishlist Successfully</div>
</div>
<!-- Add to Cart successfully toast end -->   
@endsection