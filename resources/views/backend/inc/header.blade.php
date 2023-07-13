<header class="ec-main-header" id="header">
    <nav class="navbar navbar-static-top navbar-expand-lg">
        <!-- Sidebar toggle button -->
        <button id="sidebar-toggler" class="sidebar-toggle"></button>
        <!-- search form -->
        <div class="search-form d-lg-inline-block">
            <div class="input-group">
                <input type="text" name="query" id="search-input" class="form-control"
                    placeholder="search.." autofocus autocomplete="off" />
                <button type="button" name="search" id="search-btn" class="btn btn-flat">
                    <i class="mdi mdi-magnify"></i>
                </button>
            </div>
            <div id="search-results-container">
                <ul id="search-results"></ul>
            </div>
        </div>

        @php
            $image = auth()->user()->image;  
        @endphp

        <!-- navbar right -->
        <div class="navbar-right">
            <ul class="nav navbar-nav">
                <!-- User Account -->
                <li class="dropdown user-menu">
                    <button class="dropdown-toggle nav-link ec-drop" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        @if ($image)
                            <img src="{{ URL::asset('storage/images/permalink/'.auth()->user()->image) }}" class="user-image" alt="User Image" />
                            @else
                            <img src="{{ URL::asset('assets/img/user/user.png') }}" class="user-image" alt="User Image" />
                            @endif
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right ec-dropdown-menu">
                        <!-- User image -->
                        <li class="dropdown-header">
                            @if ($image)
                            <img src="{{ URL::asset('storage/images/permalink/'.auth()->user()->image) }}" class="img-circle" alt="User Image" />
                            @else
                            <img src="{{ URL::asset('assets/img/user/user.png') }}" class="img-circle" alt="User Image" />
                            @endif
                            <div class="d-inline-block">
                                {{ auth()->user()->name }} <small class="pt-1">{{ auth()->user()->email }}</small>
                            </div>
                        </li>
                        <li>
                            <a href="{{ url('admin/profile') }}">
                                <i class="mdi mdi-account"></i> My Profile
                            </a>
                        </li>
    
                        @if (auth()->user()->role == 'admin')
                        {{-- <li class="right-sidebar-in">
                            <a href="#"> <i class="mdi mdi-settings-outline"></i> Setting </a>
                        </li> --}}
                        @endif
                        <li class="dropdown-footer">
                            <a href="{{ url('admin/logout') }}"> <i class="mdi mdi-logout"></i> Log Out </a>
                        </li>
                    </ul>
                </li>
                
            </ul>
        </div>
    </nav>
</header>