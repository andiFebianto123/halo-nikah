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
   <link rel="icon" href="assets/images/favicon/favicon-8.png" sizes="32x32" />
   <link rel="apple-touch-icon" href="assets/images/favicon/favicon-8.png" />
   <meta name="msapplication-TileImage" content="assets/images/favicon/favicon-8.png" />

   <!-- css Icon Font -->
   <link rel="stylesheet" href="assets/css/vendor/ecicons.min.css" />

   @yield('style')
   
</head>
<body>
    <div id="ec-overlay">
        <div class="ec-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    
    @include('frontend.inc.header')

    @yield('cart')

    @yield('content')

    @yield('footer')

    @yield('modal')

    @stack('scripts')
    
    @stack('custom-scripts')

</body>
</html>