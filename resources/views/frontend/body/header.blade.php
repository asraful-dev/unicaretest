<style>
    @media only screen and (max-width: 991px) {
        .mobile-responsive-nav .mobile-responsive-menu.mean-container a.meanmenu-reveal {
            top: -1px;
            padding: 0;
            width: 35px;
            height: 30px;
            padding-top: 5px;
            color: #e32845;
        }
    }
    .navbar-area {
        position: relative;
        padding-top: 8px;
        padding-bottom: 8px;
    }
</style>
<div class="top-header-area">
    <div class="container-fluid">
       <div class="row align-items-center">
          <div class="col-lg-6 col-md-6">
             <div class="header-left-content">
                <p>Phone: {{ get_setting('phone')->value ?? 'null' }} | Email: {{ get_setting('email')->value ?? 'null' }} | Date: {{ \Carbon\Carbon::now()->setTimezone('Asia/Dhaka')->format('j F Y, g:i A') }}</p>
             </div>
          </div>
          <div class="col-lg-6 col-md-6">
             <div class="header-right-content">
                <div class="list">
                    <ul>
                        @if(get_setting('facebook_url') && $facebookUrl = get_setting('facebook_url')->value)
                            <li><a target="_blank" href="{{ $facebookUrl }}"><i class="fab fa-facebook"></i></a></li>
                        @endif
                        @if(get_setting('twitter_url') && $twitterUrl = get_setting('twitter_url')->value)
                            <li><a target="_blank" href="{{ $twitterUrl }}"><i class="fab fa-twitter"></i></a></li>
                        @endif
                        @if(get_setting('instagram_url') && $instagramUrl = get_setting('instagram_url')->value)
                            <li><a target="_blank" href="{{ $instagramUrl }}"><i class="fab fa-instagram"></i></a></li>
                        @endif
                        @if(get_setting('linkedin_url') && $linkedinUrl = get_setting('linkedin_url')->value)
                            <li><a target="_blank" href="{{ $linkedinUrl }}"><i class="fab fa-linkedin-in"></i></a></li>
                        @endif  
                        @if(get_setting('whatsapp_url') && $whatsappUrl = get_setting('whatsapp_url')->value)
                            <li><a target="_blank" href="{{ $whatsappUrl }}"><i class="fab fa-linkedin-in"></i></a></li>
                        @endif  
                        @if(get_setting('youtube_url') && $youtubeUrl = get_setting('youtube_url')->value)
                            <li><a target="_blank" href="{{ $youtubeUrl }}"><i class="fab fa-youtube"></i></a></li>
                        @endif             
                    </ul>
                    
                </div>
             </div>
          </div>
       </div>
    </div>
</div>
<div class="navbar-area nav-bg-2 shadow-lg">
    <div class="mobile-responsive-nav">
        <div class="container">
            <div class="mobile-responsive-menu">
                <div class="logo">
                    <a href="/">
                        <img src="{{ asset(get_setting('site_logo')->value ?? 'null')}}" class="main-logo" alt="logo">
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
                        <li class="nav-item">
                            <a href="{{ route('user.dashboard') }}" class="nav-link">
                                My Profile
                            </a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link">
                                Login
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('profile.register') }}" class="nav-link">
                                Register
                            </a>
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
    {{-- <div class="others-option-for-responsive">
        <div class="container">
            <div class="dot-menu">
                <div class="inner">
                    <div class="icon">
                        <i class="ri-menu-3-fill" data-bs-toggle="modal" data-bs-target="#sidebarModal"></i>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</div>