<div class="navbar-area nav-bg-1">
    <div class="mobile-responsive-nav">
        <div class="container">
            <div class="mobile-responsive-menu">
                <div class="logo">
                    <a href="/">
                        <img src="{{ asset('frontend') }}/assets/images/logo.png" class="main-logo" alt="logo">
                        <img src="{{ asset(get_setting('site_logo')->value ?? 'null')}}" class="white-logo" alt="logo">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="desktop-nav">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="/">
                    <img src="{{ asset(get_setting('site_logo')->value ?? 'null')}}" alt="logo">
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        @foreach($categories as $category) 
                            <li class="nav-item">
                                <a href="{{ url($category->slug) }}" class="nav-link">{{ $category->name ?? 'Null' }}</a>
                            </li>
                        @endforeach
                    @auth
                        <li  class="nav-item">
                            <i class="fa fm fa-user-o"></i>
                            <span>
                                <a href="/dashboard">My Profile</a>
                            </span>
                        </li>
                    @else
                        <li  class="nav-item">
                            <i class="fa fm fa-user-o"></i>
                            <span>
                                <a href="{{ route('login') }}">Login</a> | <a href="{{ route('profile.register') }}  ">Register</a>
                            </span>
                        </li>
                    @endauth
                        

                        
                    </ul>
                    {{-- <div class="others-options">
                        <div class="icon">
                            <i class="ri-menu-3-fill" data-bs-toggle="modal" data-bs-target="#sidebarModal"></i>
                        </div>
                    </div> --}}
                </div>
            </nav>
        </div>
    </div>
    <div class="others-option-for-responsive">
        <div class="container">
            <div class="dot-menu">
                <div class="inner">
                    <div class="icon">
                        <i class="ri-menu-3-fill" data-bs-toggle="modal" data-bs-target="#sidebarModal"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
