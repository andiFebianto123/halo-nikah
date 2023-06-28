<!--========================================================= 
    Item Name: Ekka - Ecommerce HTML Template + Admin Dashboard.
    Author: ashishmaraviya
    Version: 3.4
    Copyright 2023
	Author URI: https://themeforest.net/user/ashishmaraviya
 ============================================================-->
 <!DOCTYPE html>
 <html lang="en">
 
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    
    <title>{{ (isset($title)) ? $title : 'Hello Nikah' }}</title>
    <meta name="keywords" content="apparel, catalog, clean, ecommerce, ecommerce HTML, electronics, fashion, html eCommerce, html store, minimal, multipurpose, multipurpose ecommerce, online store, responsive ecommerce template, shops" />
    <meta name="description" content="Best ecommerce html template for single and multi vendor store.">
    <meta name="author" content="ashishmaraviya">
    
   <!-- site Favicon -->
   <link rel="icon" href="{{ URL::asset('assets/images/logo/mini-logo.png') }}" sizes="32x32" />
   <link rel="apple-touch-icon" href="{{ URL::asset('assets/images/logo/mini-logo.png') }}" />
   <meta name="msapplication-TileImage" content="{{ URL::asset('assets/images/logo/mini-logo.png') }}" />

   <!-- css Icon Font -->
   <link rel="stylesheet" href="{{ URL::asset('assets/css/vendor/ecicons.min.css') }}" />
   <link rel="stylesheet" href="{{ URL::asset('assets/css/custom-ckeditor.css') }}" />
    <style>
        #ec-mobile-menu .ec-menu-content ul li.active > a{
            color: #c6ac71 !important;
        }
    </style>
   @yield('style')
   @stack('custom-styles')
   @vite(['resources/js/primary.js'])
</head>
<body class="body-bg-3">
    {{-- <div id="ec-overlay">
        <div class="ec-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div> --}}
    
    @include('frontend.inc.header')

    @yield('cart')

    @yield('content')

    @yield('footer')

    <!-- Whatsapp -->
    <div class="ec-style ec-right-bottom">
        <!-- Start Floating Panel Container -->
        <div class="ec-panel">
            <!-- Panel Header -->
            <div class="ec-header">
                <strong>Need Help?</strong>
                <p>Chat with us on WhatsApp</p>
            </div>
            <!-- Panel Content -->
            <div class="ec-body">
                <ul>
                    <!-- Start Single Contact List -->
                    <li>
                        <a class="ec-list" data-number="918866774266"
                            data-message="Please help me! I have got wrong product - ORDER ID is : #654321485">
                            <div class="d-flex bd-highlight">
                                <!-- Profile Picture -->
                                <div class="ec-img-cont">
                                    <img src="{{ URL::asset('assets/images/whatsapp/profile_01.jpg') }}" class="ec-user-img"
                                        alt="Profile image">
                                    <span class="ec-status-icon"></span>
                                </div>
                                <!-- Display Name & Last Seen -->
                                <div class="ec-user-info">
                                    <span>Sahar Darya</span>
                                    <p>Sahar left 7 mins ago</p>
                                </div>
                                <!-- Chat iCon -->
                                <div class="ec-chat-icon">
                                    <i class="fa fa-whatsapp"></i>
                                </div>
                            </div>
                        </a>
                    </li>
                    <!--/ End Single Contact List -->
                    
    
                    <!-- Start Single Contact List -->
                    <li>
                        <a class="ec-list" data-number="918866774266"
                            data-message="Please help me! I have got wrong product - ORDER ID is : #654321485">
                            <div class="d-flex bd-highlight">
                                <!-- Profile Picture -->
                                <div class="ec-img-cont">
                                    <img src="{{ URL::asset('assets/images/whatsapp/profile_04.jpg') }}" class="ec-user-img"
                                        alt="Profile image">
                                    <span class="ec-status-icon ec-offline"></span>
                                </div>
                                <!-- Display Name & Last Seen -->
                                <div class="ec-user-info">
                                    <span>Khadija Mehr</span>
                                    <p>Khadija left 50 mins ago</p>
                                </div>
                                <!-- Chat iCon -->
                                <div class="ec-chat-icon">
                                    <i class="fa fa-whatsapp"></i>
                                </div>
                            </div>
                        </a>
                    </li>
                    <!--/ End Single Contact List -->
                </ul>
            </div>
        </div>
        <!--/ End Floating Panel Container -->
        <!-- Start Right Floating Button-->
        <div class="ec-right-bottom">
            <div class="ec-box">
                <div class="ec-button rotateBackward">
                    <img class="whatsapp" src="{{ URL::asset('assets/images/common/whatsapp.png') }}" alt="whatsapp icon" />
                </div>
            </div>
        </div>
        <!--/ End Right Floating Button-->
    </div>
    <!-- Whatsapp end -->

    <div class="ec-nav-toolbar">
        <div class="container">
            <div class="ec-nav-panel">
                <div class="ec-nav-panel-icons">
                    <a href="#ec-mobile-menu" class="navbar-toggler-btn ec-header-btn ec-side-toggle"><i class="fi fi-rr-menu-burger"></i></a>
                </div>
                <div class="ec-nav-panel-icons">
                    <a href="#ec-side-cart" class="toggle-cart ec-header-btn ec-side-toggle"><i class="fi-rr-shopping-basket"></i><span
                            class="ec-cart-noti ec-header-count ec-cart-count cart-count-lable">0</span></a>
                </div>
                <div class="ec-nav-panel-icons">
                    <a href="index.html" class="ec-header-btn"><i class="fi-rr-home"></i></a>
                </div>
                {{-- <div class="ec-nav-panel-icons">
                    <a href="wishlist.html" class="ec-header-btn"><i class="fi-rr-heart"></i><span class="ec-cart-noti">0</span></a>
                </div> --}}
                <div class="ec-nav-panel-icons">
                    <a href="login.html" class="ec-header-btn"><i class="fi-rr-user"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer navigation panel for responsive display end -->

    <!-- Recent Purchase Popup  -->
    {{-- <div class="recent-purchase">
        <img src="assets/images/product-image/111_1.jpg" alt="payment image">
        <div class="detail">
            <p>Someone in new just bought</p>
            <h6>Rose Gold Earrings</h6>
            <p>2 Minutes ago</p>
        </div>
        <a href="javascript:void(0)" class="icon-btn recent-close">×</a>
    </div> --}}
    <!-- Recent Purchase Popup end -->

    <!-- Add to Cart successfully toast Start -->
    <div id="addtocart_toast" class="addtocart_toast">
        <div class="desc">You Have Add To Cart Successfully</div>
    </div>
    <div id="wishlist_toast" class="wishlist_toast">
        <div class="desc">You Have Add To Wishlist Successfully</div>
    </div>

    @stack('modal')

    @yield('scripts')
    
    @stack('custom-scripts')

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });
    </script>

</body>
</html>