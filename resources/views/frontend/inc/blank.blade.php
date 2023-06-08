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
                    {{-- <li>
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
                    </li> --}}
                </ul>
            </div>
            <div class="ec-cart-bottom">
                <div class="cart-sub-total">
                    <table class="table cart-table">
                        <tbody>
                            {{-- <tr>
                                <td class="text-left">Sub-Total :</td>
                                <td class="text-right">0</td>
                            </tr> --}}
                            {{-- <tr>
                                <td class="text-left">VAT (20%) :</td>
                                <td class="text-right">0</td>
                            </tr> --}}
                            <tr>
                                <td class="text-left">Total :</td>
                                <td class="text-right primary-color">0</td>
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

