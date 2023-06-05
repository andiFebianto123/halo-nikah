<!-- LEFT MAIN SIDEBAR -->
<div class="ec-left-sidebar ec-bg-sidebar">
    <div id="sidebar" class="sidebar ec-sidebar-footer">

        <div class="ec-brand">
            <a href="index.html" title="Ekka">
                <img class="ec-brand-icon" src="{{ URL::asset('assets/img/logo/ec-site-logo.png') }}" alt="" />
                <span class="ec-brand-name text-truncate">JMP</span>
            </a>
        </div>

        <!-- begin sidebar scrollbar -->
        <div class="ec-navigation" data-simplebar>
            <!-- sidebar menu -->
            <ul class="nav sidebar-inner" id="sidebar-menu">
                <!-- Dashboard -->
                <li class="{{ (request()->is('admin')) ? 'active' : '' }}">
                    <a class="sidenav-item-link" href="{{ url('admin') }}">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                    <hr>
                </li>

                {{-- Kategori --}}
                <li class="{{ (request()->is('admin/kategori*')) ? 'active' : '' }}">
                    <a class="sidenav-item-link" href="{{ url('admin/kategori') }}">
                        <i class="mdi mdi-view-grid-plus"></i>
                        <span class="nav-text">Kategori</span>
                    </a>
                </li>

                {{-- Kategori --}}
                <li class="{{ (request()->is('admin/vendor*')) ? 'active' : '' }}">
                    <a class="sidenav-item-link" href="{{ url('admin/vendor') }}">
                        <i class="mdi mdi-account-group-outline"></i>
                        <span class="nav-text">Vendor</span>
                    </a>
                </li>

                @php
                    // dd(strpos(Route::currentRouteName(), 'product.list'), Route::currentRouteName());
                @endphp
                <li class="has-sub {{ (request()->is('admin/product*')) ? 'expand active' : '' }}">
                    <a class="sidenav-item-link" href="javascript:void(0)">
                        <i class="mdi mdi-palette-advanced"></i>
                        <span class="nav-text">Products</span> <b class="caret"></b>
                    </a>
                    <div class="collapse" style="{{ (request()->is('admin/product*')) ? 'display:block;' : '' }}">
                        <ul class="sub-menu" id="products" data-parent="#sidebar-menu">
                            <li class="{{ ( strpos(Route::currentRouteName(), 'product.list') !== false ) ? 'active' : '' }}">
                                <a class="sidenav-item-link" href="{{ url('admin/product') }}">
                                    <span class="nav-text">All Product</span>
                                </a>
                            </li>
                            <li class="{{ (strpos(Route::currentRouteName(), 'product.top') !== false) ? 'active' : '' }}">
                                <a class="sidenav-item-link" href="{{ url('admin/product-top') }}">
                                    <span class="nav-text">Top Product</span>
                                </a>
                            </li>
                            <li class="{{ (strpos(Route::currentRouteName(), 'product.special') !== false) ? 'active' : '' }}">
                                <a class="sidenav-item-link" href="{{ url('admin/product-special') }}">
                                    <span class="nav-text">Special Product</span>
                                </a>
                            </li>
                            
                        </ul>
                    </div>
                </li>


                <li class="has-sub {{ (request()->is('admin/widget*')) ? 'expand active' : '' }}">
                    <a class="sidenav-item-link" href="javascript:void(0)">
                        <i class="mdi mdi-view-module"></i>
                        <span class="nav-text">Widgets</span> <b class="caret"></b>
                    </a>
                    <div class="collapse" style="{{ (request()->is('admin/widget*')) ? 'display:block;' : '' }}">
                        <ul class="sub-menu" id="widgets" data-parent="#sidebar-menu">
                            <li class="{{ ( strpos(Route::currentRouteName(), 'widget.banner') !== false ) ? 'active' : '' }}">
                                <a class="sidenav-item-link" href="{{ url('admin/widget-banner') }}">
                                    <span class="nav-text">Slider Banners</span>
                                </a>
                            </li>
                            <li class="{{ ( strpos(Route::currentRouteName(), 'widget.popup') !== false ) ? 'active' : '' }}">
                                <a class="sidenav-item-link" href="{{ url('admin/widget-popup') }}">
                                    <span class="nav-text">Pop Ups</span>
                                </a>
                            </li>
                            <li class="{{ ( strpos(Route::currentRouteName(), 'widget.testimonial') !== false ) ? 'active' : '' }}">
                                <a class="sidenav-item-link" href="{{ url('admin/widget-testimonial') }}">
                                    <span class="nav-text">Testimonial</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

            </ul>
        </div>
    </div>
</div>