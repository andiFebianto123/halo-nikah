<!-- Header start  -->
<header class="ec-header">
    <div class="header-top">
        <div class="container">
            <div class="row align-items-center">
                <!-- Header Top social Start -->
                <div class="col text-left header-top-left d-none d-lg-block">
                    <div class="header-top-social">
                        <span class="social-text text-upper">Follow us on:</span>
                        <ul class="mb-0">
                            <li class="list-inline-item"><a class="hdr-facebook" href="#"><i class="ecicon eci-facebook"></i></a></li>
                            <li class="list-inline-item"><a class="hdr-twitter" href="#"><i class="ecicon eci-twitter"></i></a></li>
                            <li class="list-inline-item"><a class="hdr-instagram" href="#"><i class="ecicon eci-instagram"></i></a></li>
                            <li class="list-inline-item"><a class="hdr-linkedin" href="#"><i class="ecicon eci-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!-- Header Top social End -->
                <!-- Header Top Category Toggle Start -->
                {{-- <a href="#ec-mobile-sidebar" class="ec-header-btn ec-sidebar-toggle d-lg-none">
                    <i class="fi fi-rr-apps"></i>
                </a> --}}
                <!-- Header Top Category Toggle End -->
                <!-- Header Top Message Start -->
                {{-- <div class="col text-center header-top-center">
                    <div class="header-top-message text-upper">
                        <span>Free Shipping</span>This Week Order Over - $75
                    </div>
                </div> --}}
                <!-- Header Top Message End -->
                <!-- Header Top Language Currency -->
                <div class="col header-top-right d-none d-lg-block">
                    <div class="header-top-lan-curr d-flex justify-content-end">
                        <!-- Currency Start -->
                        <div class="header-top-curr dropdown">
                            <button class="dropdown-toggle text-upper" data-bs-toggle="dropdown">Currency <i
                                    class="ecicon eci-caret-down" aria-hidden="true"></i></button>
                            <ul class="dropdown-menu">
                                <li class="active"><a class="dropdown-item" href="#">USD $</a></li>
                                <li><a class="dropdown-item" href="#">EUR €</a></li>
                            </ul>
                        </div>
                        <!-- Currency End -->
                        <!-- Language Start -->
                        <div class="header-top-lan dropdown">
                            <button class="dropdown-toggle text-upper" data-bs-toggle="dropdown">Language <i
                                    class="ecicon eci-caret-down" aria-hidden="true"></i></button>
                            <ul class="dropdown-menu">
                                <li class="active"><a class="dropdown-item" href="#">English</a></li>
                                <li><a class="dropdown-item" href="#">Italiano</a></li>
                            </ul>
                        </div>
                        <!-- Language End -->

                    </div>
                </div>
                <!-- Header Top Language Currency -->
                <!-- Header Top responsive Action -->
                <div class="col d-lg-none ">
                    <div class="ec-header-bottons">
                        <!-- Header User Start -->
                        <div class="ec-header-user dropdown">
                            <button class="dropdown-toggle" data-bs-toggle="dropdown"><i class="fi-rr-user"></i></button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a class="dropdown-item" href="register.html">Register</a></li>
                                <li><a class="dropdown-item" href="checkout.html">Checkout</a></li>
                                <li><a class="dropdown-item" href="login.html">Login</a></li>
                            </ul>
                        </div>
                        <!-- Header User End -->
                        <!-- Header Cart Start -->
                        {{-- <a href="wishlist.html" class="ec-header-btn ec-header-wishlist">
                            <div class="header-icon"><i class="fi-rr-heart"></i></div>
                            <span class="ec-header-count">0</span>
                        </a> --}}
                        <!-- Header Cart End -->
                        <!-- Header Cart Start -->
                        <a href="#ec-side-cart" class="ec-header-btn ec-side-toggle">
                            <div class="header-icon"><i class="fi-rr-shopping-basket"></i></div>
                            <span class="ec-header-count ec-cart-count cart-count-lable">0</span>
                        </a>
                        <!-- Header Cart End -->
                        <!-- Header menu Start -->
                        <a href="#ec-mobile-menu" class="ec-header-btn ec-side-toggle d-lg-none">
                            <i class="fi-rr-menu-burger"></i>
                        </a>
                        <!-- Header menu End -->
                    </div>
                </div>
                <!-- Header Top responsive Action -->
            </div>
        </div>
    </div>
    <!-- Ec Header Top  End -->
    <!-- Ec Header Bottom  Start -->
    <div class="ec-header-bottom d-none d-lg-block">
        <div class="container position-relative">
            <div class="row">
                <div class="ec-flex">
                    <!-- Ec Header Logo Start -->
                    <div class="align-self-center">
                        <div class="header-logo">
                            
                            <a href="{{ url('/') }}"><img src="{{ URL::asset('assets/images/logo/HELLOGO.png') }}" alt="Site Logo" /><img
                                class="dark-logo" src="{{ URL::asset('assets/images/logo/HELLOGO.png') }}" alt="Site Logo"
                                style="display: none;" /></a>
                        </div>
                    </div>
                    <!-- Ec Header Logo End -->

                    <!-- Ec Header Search Start -->
                    <div class="align-self-center">
                        <div class="header-search">
                            <form class="ec-btn-group-form" method="GET" action="{{ url('products') }}">
                                <input class="form-control" name="search" placeholder="Enter Your Product Name..." type="text">
                                <button class="submit" type="submit"><i class="fi-rr-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <!-- Ec Header Search End -->

                    <!-- Ec Header Button Start -->
                    <div class="align-self-center">
                        <div class="ec-header-bottons">

                            <!-- Header User Start -->
                            <div class="ec-header-user dropdown">
                                <button class="dropdown-toggle" data-bs-toggle="dropdown"><i class="fi-rr-user"></i></button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a class="dropdown-item" href="register.html">Register</a></li>
                                    <li><a class="dropdown-item" href="checkout.html">Checkout</a></li>
                                    <li><a class="dropdown-item" href="login.html">Login</a></li>
                                </ul>
                            </div>
                            <!-- Header User End -->
                            <!-- Header wishlist Start -->
                            {{-- <a href="wishlist.html" class="ec-header-btn ec-header-wishlist">
                                <div class="header-icon"><i class="fi-rr-heart"></i></div>
                                <span class="ec-header-count">0</span>
                            </a> --}}
                            <!-- Header wishlist End -->
                            <!-- Header Cart Start -->
                            <a href="#ec-side-cart" class="ec-header-btn ec-side-toggle">
                                <div class="header-icon"><i class="fi-rr-shopping-basket"></i></div>
                                <span class="ec-header-count ec-cart-count cart-count-lable">0</span>
                            </a>
                            <!-- Header Cart End -->
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- Ec Header Button End -->
    <!-- Header responsive Bottom  Start -->
    <div class="ec-header-bottom d-lg-none">
        <div class="container position-relative">
            <div class="row ">

                <!-- Ec Header Logo Start -->
                <div class="col">
                    <div class="header-logo">
                        <a href="{{ url('/') }}"><img src="{{ URL::asset('assets/images/logo/HELLOGO.png') }}" alt="Site Logo" /><img
                            class="dark-logo" src="{{ URL::asset('assets/images/logo/HELLOGO.png') }}" alt="Site Logo"
                            style="display: none;" /></a>
                    </div>
                </div>
                <!-- Ec Header Logo End -->
                <!-- Ec Header Search Start -->
                <div class="col">
                    <div class="header-search">
                        <form class="ec-btn-group-form" action="#">
                            <input class="form-control" placeholder="Enter Your Product Name..." type="text">
                            <button class="submit" type="submit"><i class="fi-rr-search"></i></button>
                        </form>
                    </div>
                </div>
                <!-- Ec Header Search End -->
            </div>
        </div>
    </div>
    <!-- Header responsive Bottom  End -->
    <!-- EC Main Menu Start -->
    <div id="ec-main-menu-desk" class="d-none d-lg-block sticky-nav">
        <div class="container position-relative">
            <div class="row">
                <div class="col-md-12 align-self-center">
                    <div class="ec-main-menu">
                        <ul>
                            <li class="{{ (request()->is('home*')) ? 'active' : '' }}"><a href="{{ url('/') }}">Home</a></li>
                            <li class="{{ (request()->is('products*')) ? 'active' : '' }}"><a href="{{ url('/products') }}">Products</a></li>
                            <li class="{{ (request()->is('package*')) ? 'active' : '' }}"><a href="{{ url('/package') }}">Products Package</a></li>
                            <li class="{{ (request()->is('vendors*')) ? 'active' : '' }}"><a href="{{ url('/vendors') }}">Vendors</a></li>
                            <li class="{{ (request()->is('blog*')) ? 'active' : '' }}"><a href="{{ url('/blog') }}">Blog</a></li>
                            <li class="{{ (request()->is('cart*')) ? 'active' : '' }}"><a href="{{ url('/cart') }}">Keranjang Anda</a></li>
                            {{-- <li class="dropdown"><a href="javascript:void(0)">Pages</a>
                                <ul class="sub-menu">
                                    <li><a href="about-us.html">About Us</a></li>
                                    <li><a href="contact-us.html">Contact Us</a></li>
                                    <li><a href="cart.html">Cart</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                    <li><a href="compare.html">Compare</a></li>
                                    <li><a href="faq.html">FAQ</a></li>
                                    <li><a href="login.html">Login</a></li>
                                    <li><a href="register.html">Register</a></li>
                                    <li><a href="track-order.html">Track Order</a></li>
                                    <li><a href="terms-condition.html">Terms Condition</a></li>
                                    <li><a href="privacy-policy.html">Privacy Policy</a></li>
                                </ul>
                            </li> --}}
                            {{-- <li class="dropdown"><span class="main-label-note-new" data-toggle="tooltip"
                                    title="NEW"></span><a href="javascript:void(0)">Others</a>
                                <ul class="sub-menu">
                                    <li class="dropdown position-static"><a href="javascript:void(0)">Mail
                                            Confirmation
                                            <i class="ecicon eci-angle-right"></i></a>
                                        <ul class="sub-menu sub-menu-child">
                                            <li><a href="email-template-confirm-1.html">Mail Confirmation 1</a></li>
                                            <li><a href="email-template-confirm-2.html">Mail Confirmation 2</a></li>
                                            <li><a href="email-template-confirm-3.html">Mail Confirmation 3</a></li>
                                            <li><a href="email-template-confirm-4.html">Mail Confirmation 4</a></li>
                                            <li><a href="email-template-confirm-5.html">Mail Confirmation 5</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown position-static"><a href="javascript:void(0)">Mail Reset
                                            password
                                            <i class="ecicon eci-angle-right"></i></a>
                                        <ul class="sub-menu sub-menu-child">
                                            <li><a href="email-template-forgot-password-1.html">Reset password 1</a>
                                            </li>
                                            <li><a href="email-template-forgot-password-2.html">Reset password 2</a>
                                            </li>
                                            <li><a href="email-template-forgot-password-3.html">Reset password 3</a>
                                            </li>
                                            <li><a href="email-template-forgot-password-4.html">Reset password 4</a>
                                            </li>
                                            <li><a href="email-template-forgot-password-5.html">Reset password 5</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown position-static"><a href="javascript:void(0)">Mail
                                            Promotional
                                            <i class="ecicon eci-angle-right"></i></a>
                                        <ul class="sub-menu sub-menu-child">
                                            <li><a href="email-template-offers-1.html">Offer mail 1</a></li>
                                            <li><a href="email-template-offers-2.html">Offer mail 2</a></li>
                                            <li><a href="email-template-offers-3.html">Offer mail 3</a></li>
                                            <li><a href="email-template-offers-4.html">Offer mail 4</a></li>
                                            <li><a href="email-template-offers-5.html">Offer mail 5</a></li>
                                            <li><a href="email-template-offers-6.html">Offer mail 6</a></li>
                                            <li><a href="email-template-offers-7.html">Offer mail 7</a></li>
                                            <li><a href="email-template-offers-8.html">Offer mail 8</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown position-static">
                                        <span class="label-note-hot"></span>
                                        <a href="javascript:void(0)">Vendor account pages
                                            <i class="ecicon eci-angle-right"></i></a>
                                        <ul class="sub-menu sub-menu-child">
                                            <li><a href="vendor-dashboard.html">Vendor Dashboard</a></li>
                                            <li><a href="vendor-profile.html">Vendor Profile</a></li>
                                            <li><a href="vendor-uploads.html">Vendor Uploads</a></li>
                                            <li><a href="vendor-settings.html">Vendor Settings</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown position-static">
                                        <span class="label-note-trending"></span>
                                        <a href="javascript:void(0)">User account pages
                                            <i class="ecicon eci-angle-right"></i></a>
                                        <ul class="sub-menu sub-menu-child">
                                            <li><a href="user-profile.html">User Profile</a></li>
                                            <li><a href="user-history.html">History</a></li>
                                            <li><a href="wishlist.html">Wishlist</a></li>
                                            <li><a href="track-order.html">Track Order</a></li>
                                            <li><a href="user-invoice.html">Invoice</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown position-static"><a href="javascript:void(0)">Construction
                                            pages
                                            <i class="ecicon eci-angle-right"></i></a>
                                        <ul class="sub-menu sub-menu-child">
                                            <li><a href="404-error-page.html">404 error page</a></li>
                                            <li><a href="under-maintenance.html">maintanence page</a></li>
                                            <li><a href="coming-soon.html">Coming soon page</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown position-static">
                                        <span class="label-note-new"></span>
                                        <a href="javascript:void(0)">Vendor Catalog pages
                                            <i class="ecicon eci-angle-right"></i></a>
                                        <ul class="sub-menu sub-menu-child">
                                            <li><a href="catalog-single-vendor.html">Catalog Single Vendor</a></li>
                                            <li><a href="catalog-multi-vendor.html">Catalog Multi Vendor</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li> --}}
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ec Main Menu End -->
    <!-- ekka Mobile Menu Start -->
    <div id="ec-mobile-menu" class="ec-side-cart ec-mobile-menu">
        <div class="ec-menu-title">
            <span class="menu_title">My Menu</span>
            <button class="ec-close">×</button>
        </div>
        <div class="ec-menu-inner">
            <div class="ec-menu-content">
                <ul>
                    <li class="{{ (request()->is('home*')) ? 'active' : '' }}"><a href="{{ url('/') }}">Home</a></li>
                    {{-- <li><a href="javascript:void(0)">Categories</a>
                        <ul class="sub-menu">
                            <li>
                                <a href="javascript:void(0)">Classic Variation</a>
                                <ul class="sub-menu">
                                    <li><a href="shop-left-sidebar-col-3.html">Left sidebar 3 column</a></li>
                                    <li><a href="shop-left-sidebar-col-4.html">Left sidebar 4 column</a></li>
                                    <li><a href="shop-right-sidebar-col-3.html">Right sidebar 3 column</a></li>
                                    <li><a href="shop-right-sidebar-col-4.html">Right sidebar 4 column</a></li>
                                    <li><a href="shop-full-width.html">Full width 4 column</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)">Classic Variation</a>
                                <ul class="sub-menu">
                                    <li><a href="shop-banner-left-sidebar-col-3.html">Banner left sidebar 3
                                            column</a></li>
                                    <li><a href="shop-banner-left-sidebar-col-4.html">Banner left sidebar 4
                                            column</a></li>
                                    <li><a href="shop-banner-right-sidebar-col-3.html">Banner right sidebar 3
                                            column</a></li>
                                    <li><a href="shop-banner-right-sidebar-col-4.html">Banner right sidebar 4
                                            column</a></li>
                                    <li><a href="shop-banner-full-width.html">Banner Full width 4 column</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)">Columns Variation</a>
                                <ul class="sub-menu">
                                    <li><a href="shop-full-width-col-3.html">3 Columns full width</a></li>
                                    <li><a href="shop-full-width-col-4.html">4 Columns full width</a></li>
                                    <li><a href="shop-full-width-col-5.html">5 Columns full width</a></li>
                                    <li><a href="shop-full-width-col-6.html">6 Columns full width</a></li>
                                    <li><a href="shop-banner-full-width-col-3.html">Banner 3 Columns</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)">List Variation</a>
                                <ul class="sub-menu">
                                    <li><a href="shop-list-left-sidebar.html">Shop left sidebar</a></li>
                                    <li><a href="shop-list-right-sidebar.html">Shop right sidebar</a></li>
                                    <li><a href="shop-list-banner-left-sidebar.html">Banner left sidebar</a></li>
                                    <li><a href="shop-list-banner-right-sidebar.html">Banner right sidebar</a></li>
                                    <li><a href="shop-list-full-col-2.html">Full width 2 columns</a></li>
                                </ul>
                            </li>
                            <li><a class="p-0" href="shop-left-sidebar-col-3.html"><img class="img-responsive"
                                        src="assets/images/menu-banner/1.jpg" alt=""></a>
                            </li>
                        </ul>
                    </li> --}}         
                    <li class="{{ (request()->is('products*')) ? 'active' : '' }}"><a href="{{ url('/products') }}">Products</a></li>   
                    <li class="{{ (request()->is('package*')) ? 'active' : '' }}"><a href="{{ url('/package') }}">Products Package</a></li>
                    <li class="{{ (request()->is('vendors*')) ? 'active' : '' }}"><a href="{{ url('/vendors') }}">Vendors</a></li>
                    <li class="{{ (request()->is('blog*')) ? 'active' : '' }}"><a href="{{ url('/blog') }}">Blog</a></li>
                    <li class="{{ (request()->is('cart*')) ? 'active' : '' }}"><a href="{{ url('/cart') }}">Keranjang Anda</a></li>        
                </ul>
            </div>
            <div class="header-res-lan-curr">
                <div class="header-top-lan-curr">
                </div>
                <!-- Social Start -->
                <div class="header-res-social">
                    <div class="header-top-social">
                        <ul class="mb-0">
                            {{-- <li class="list-inline-item"><a class="hdr-facebook" href="#"><i class="ecicon eci-facebook"></i></a></li> --}}
                            
                        </ul>
                    </div>
                </div>
                <!-- Social End -->
            </div>
        </div>
    </div>
    <!-- ekka mobile Menu End -->
</header>
<!-- Header End  -->