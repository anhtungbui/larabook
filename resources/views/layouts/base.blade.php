<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>Larabook</title>

        <!-- Stylesheets -->
        <link href={{ asset("css/app.css") }} rel="stylesheet" />
        <link href={{ asset("css/sb-admin.css") }} rel="stylesheet" />
        <link href={{ asset("css/custom.css") }} rel="stylesheet" />
        @livewireStyles

        <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
        <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="nav-fixed">
        <div>
            <nav 
            class="topnav navbar navbar-expand shadow justify-content-between justify-content-sm-start navbar-light bg-white pl-5 pr-5" 
            id="sidenavAccordion"
        >
            <!-- Navbar Brand-->
            <!-- * * Tip * * You can use text or an image for your navbar brand.-->
            <!-- * * * * * * When using an image, we recommend the SVG format.-->
            <!-- * * * * * * Dimensions: Maximum height: 32px, maximum width: 240px-->
            <a class="navbar-brand text-primary" href="/">Larabook</a>
            <!-- Navbar Search Input-->
            <!-- * * Note: * * Visible only on and above the md breakpoint-->

            <livewire:navbar.search-bar />
            
            <!-- Navbar Items-->
            <ul class="navbar-nav align-items-center ml-auto">

                @auth
                    <!-- To Profile -->
                    <a
                        class="btn btn-light rounded-pill d-none d-lg-block"
                        href="{{ route('profile', [auth()->user()->username]) }}"
                        data-toggle="tooltip" 
                        data-placement="bottom" 
                        title="To Your Profile"
                    >
                        {{ auth()->user()->name }}
                    </a>
                    <!-- Notifications -->
                    <div class="nav-item dropdown no-caret pl-lg-1 dropdown-user">
                        <a
                            class="btn btn-icon btn-light"
                            href="{{ route('profile', [auth()->user()->username]) }}/notifications"
                            data-toggle="tooltip" 
                            data-placement="bottom" 
                            title="Notifications"
                        >
                            <div>
                                @if(auth()->user()->notifications->count() > 0)
                                {{ auth()->user()->notifications->count() }}<i class="far fa-bell ml-1"></i>
                                @else
                                <i class="far fa-bell"></i>
                                @endif
                            </div>
                        </a>

                    </div>
                    <!-- Create Dropdown-->
                    <li class="nav-item dropdown no-caret pl-lg-1 mr-lg-1 dropdown-user">
                        <a 
                            class="btn btn-icon btn-light dropdown-toggle" 
                            id="navbarDropdownUserImage" 
                            href="javascript:void(0);" 
                            role="button" 
                            data-toggle="dropdown" 
                            aria-haspopup="true" 
                            aria-expanded="false"
                        >
                            <i class="fas fa-plus"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownUserImage">
                            <h6 class="dropdown-header d-flex align-items-center">
                                <div class="dropdown-user-details">
                                    <div class="dropdown-user-details-name">Create</div>
                                </div>
                            </h6>
                            <div class="dropdown-divider"></div>
                            <!-- New Post -->
                            <a class="dropdown-item" href="{{ route('profile', [auth()->user()->username]) }}/posts/create">
                                <div class="dropdown-item-icon"><i class="fas fa-edit"></i></div>
                                New Post
                            </a>
                            <!-- New Group -->
                            <a class="dropdown-item" href="{{ route('profile', [auth()->user()->username]) }}/posts/create">
                                <div class="dropdown-item-icon"><i class="fa fa-users"></i></div>
                                New Group
                            </a>
                            
                        </div>
                    </li>
                    <!-- User Dropdown-->
                    <li class="nav-item dropdown no-caret mr-3 mr-lg-0 dropdown-user">
                        <a 
                            class="btn btn-icon btn-transparent-dark dropdown-toggle" 
                            id="navbarDropdownUserImage" 
                            href="javascript:void(0);" 
                            role="button" 
                            data-toggle="dropdown" 
                            aria-haspopup="true" 
                            aria-expanded="false"
                        >
                            <img class="img-fluid" src="/storage/{{ auth()->user()->profile->avatar_image }}" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownUserImage">
                            <h6 class="dropdown-header d-flex align-items-center">
                                <div class="dropdown-user-details">
                                    <div class="dropdown-user-details-name">Hi <strong>{{ auth()->user()->name }}</strong></div>
                                </div>
                            </h6>
                            <div class="dropdown-divider"></div>
                            <!-- Profile -->
                            <a class="dropdown-item" href="{{ route('profile', [auth()->user()->username]) }}">
                                <div class="dropdown-item-icon"><i class="fa fa-user"></i></div>
                                Profile
                            </a>
                            <!-- Logout -->
                            <a 
                                class="dropdown-item" 
                                href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();"
                            >
                                <div class="dropdown-item-icon"><i data-feather="log-out"></i></div>
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>     
                @endauth
                
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif
                    
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    
                @endguest
            </ul>
        </nav>
        
        <main class="pt-5">
            @yield('content')
        </main>

        </div>
        <!-- Scripts -->
        <script src={{ asset("js/app.js") }}></script>
        <script src={{ asset("js/sb-admin.js") }}></script>
        @livewireScripts
    </body>
</html>
