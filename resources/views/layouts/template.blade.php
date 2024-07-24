<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="MkRqEzTGuoSx6LqJUm0OAKxSgNUYt26wTT7RMUZY">
    <link rel="manifest" href="/build/manifest.json">
    <link rel="apple-touch-icon" href="{{ asset('assets/images/favicon.ico') }}">
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">
    <meta name="theme-color" content="#e87316">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="MobileStore">
    <meta name="msapplication-TileImage" content="{{ asset('assets/images/favicon.ico') }}">
    <meta name="msapplication-TileColor" content="#FFFFFF">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Mobile Store">
    <meta name="keywords" content="Mobile Store">
    <meta name="author" content="Mobile Store">
    <link rel="preconnect" href="https://fonts.gstatic.com">

    <title>MobileStore</title>

    <link id="rtl-link" rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendors/ion.rangeSlider.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/font-awesome.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/feather-icon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/slick/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/slick/slick-theme.css') }}">
    <link id="color-link" rel="stylesheet" type="text/css" href="{{ asset('assets/css/styles.css') }}">

    @yield('styles') 

    <style>
        .h-logo {
            max-width: 180px !important;
        }

        .f-logo {
            max-width: 220px !important;
        }

        @media only screen and (max-width: 600px) {
            .h-logo {
                max-width: 110px !important;
            }
        }
    </style>
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    @stack('styles')
    
</head>

<body class="theme-color4 light ltr">
    <style>
        header .profile-dropdown ul li {
            display: block;
            padding: 5px 20px;
            border-bottom: 1px solid #ddd;
            line-height: 35px;
        }

        header .profile-dropdown ul li:last-child {
            border-color: #fff;
        }

        header .profile-dropdown ul {
            padding: 10px 0;
            min-width: 250px;
        }

        .name-usr {
            background: #e87316;
            padding: 8px 12px;
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
            line-height: 24px;
        }

        .name-usr span {
            margin-right: 10px;
        }

        @media (max-width:600px) {
            .h-logo {
                max-width: 150px !important;
            }

            i.sidebar-bar {
                font-size: 22px;
            }

            .mobile-menu ul li a svg {
                width: 20px;
                height: 20px;
            }

            .mobile-menu ul li a span {
                margin-top: 0px;
                font-size: 12px;
            }

            .name-usr {
                padding: 5px 12px;
            }
        }
    </style>
    <header class="header-style-2" id="home">
        <div class="main-header navbar-searchbar">
            <div class="container-fluid-lg">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-menu">
                            <div class="menu-left">
                                <div class="brand-logo">
                                    <a href="{{ route('app.index') }}">
                                        <img src="{{ asset('assets/images/logo.png') }}" class="h-logo img-fluid blur-up lazyload"
                                            alt="logo">
                                    </a>
                                </div>

                            </div>
                            <nav>
                                <div class="main-navbar">
                                    <div id="mainnav">
                                        <div class="toggle-nav">
                                            <i class="fa fa-bars sidebar-bar"></i>
                                        </div>
                                        <ul class="nav-menu">
                                            <li class="back-btn d-xl-none">
                                                <div class="close-btn">
                                                    Menu
                                                    <span class="mobile-back"><i class="fa fa-angle-left"></i>
                                                    </span>
                                                </div>
                                            </li>
                                            <li><a href="{{ route('app.index') }}" class="nav-link menu-title">Home</a></li>
                                            <li><a href="{{ route('shop.index') }}" class="nav-link menu-title">Shop</a></li>
                                            <li><a href="{{ route('cart.index') }}" class="nav-link menu-title">Cart</a></li>
                                            <li><a href="{{ route('about.index') }}" class="nav-link menu-title">About Us</a></li>
                                            <li><a href="{{ route('contact.index') }}" class="nav-link menu-title">Contact Us</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                            <div class="menu-right">
                                <ul>
                                    <li>
                                        <div class="search-box theme-bg-color">
                                            <i data-feather="search"></i>
                                        </div>
                                    </li>
                                    <li class="onhover-dropdown wislist-dropdown">
                                        <div class="cart-media">
                                            <a href="{{ route('wishlist.list') }}">
                                                <i data-feather="heart"></i>
                                                <span id="wishlist-count" class="label label-theme rounded-pill">
                                                    {{ Cart::instance("wishlist")->content()->count() }}
                                                </span>
                                            </a>
                                        </div>
                                    </li>
                                    <li class="onhover-dropdown wislist-dropdown">
                                        <div class="cart-media">
                                            <a href="{{ route('cart.index') }}">
                                                <i data-feather="shopping-cart"></i>
                                                <span id="cart-count" class="label label-theme rounded-pill">
                                                    {{ Cart::instance('cart')->content()->count() }}
                                                </span>
                                            </a>
                                        </div>
                                    </li>

                                    <li class="onhover-dropdown">
                                        <a href="{{ route('profile.detail') }}"><div class="cart-media name-usr">
                                            @auth <span>{{ Auth::user()->name }}</span> @endauth <i data-feather="user"></i>
                                        </div>
                                    </a>
                                        <div class="onhover-div profile-dropdown">
                                            <ul>
                                                @if(Route::has('login'))
                                                    @auth
                                                        @if(Auth::user()->utype === 'ADM')
                                                            <li>
                                                                <a href="{{route('admin.index')}}" class="d-block">Admin Dashboard</a>
                                                                <a href="{{ route('admin.categories.index') }}" class="d-block">Categories</a>
                                                                <a href="{{ route('admin.brands.index') }}" class="d-block">Brands</a>
                                                                <a href="{{ route('admin.features.index') }}" class="d-block">Features</a>

                                                                <a href="{{ route('admin.products.index') }}" class="d-block">Products</a>
                                                                <a href="{{ route('admin.changelogs.index') }}" class="d-block">Changelogs</a>

                                                            </li>
                                                        @elseif (Auth::user()->utype === 'MGR')
                                                            <li>
                                                                <a href="{{route('manager.index')}}" class="d-block">Manager Dashboard</a>
                                                                <a href="{{route('manager.admins.index')}}" class="d-block">Admins</a>
                                                            </li>
                                                        @else
                                                            <li>
                                                                <a href="{{route('user.index')}}" class="d-block">My Account</a>
                                                            </li>
                                                        @endif
                                                        <li>
                                                            <a href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('frmlogout').submit();" class="d-block">Logout</a>
                                                            <form id="frmlogout" action="{{route('logout')}}" method="POST">
                                                                @csrf
                                                            </form>
                                                        </li>
                                                    @else
                                                        <li>
                                                            <a href="{{route('login')}}" class="d-block">Login</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{route('register')}}" class="d-block">Register</a>
                                                        </li>
                                                    @endauth                                                    
                                                @endif
                                            </ul>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                            <div class="search-full">
                                <form method="GET" class="search-full" action="http://localhost:8000/search">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i data-feather="search" class="font-light"></i>
                                        </span>
                                        <input type="text" name="q" class="form-control search-type"
                                            placeholder="Search here..">
                                        <span class="input-group-text close-search">
                                            <i data-feather="x" class="font-light"></i>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="mobile-menu d-sm-none">
        <ul>
            <li>
                <a href="{{ route('app.index') }}" class="active">
                    <i data-feather="home"></i>
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a href="{{ route('shop.index') }}">
                    <i data-feather="align-justify"></i>
                    <span>Shop</span>
                </a>
            </li>
            <li>
                <a href="{{ route('cart.index') }}">
                    <i data-feather="shopping-bag"></i>
                    <span>Cart</span>
                </a>
            </li>
            <li>
                <a href="{{ route('wishlist.list') }}">
                    <i data-feather="heart"></i>
                    <span>Wishlist</span>
                </a>
            </li>
            <li>
                <a href="{{ route('profile.detail') }}">
                    <i data-feather="user"></i>
                    <span>Account</span>
                </a>
            </li>
        </ul>
    </div>

    @yield('content')

    <div id="qvmodal"></div>

    <footer class="footer-sm-space mt-5">
        <div class="main-footer">
            <div class="container">
                {{-- <div class="footer-line my-4"></div> --}}
                <div class="row gy-3 align-items-center">
                    <!-- Copyright -->
                    <div class="col-md-4 text-md-start text-center order-md-1"> 
                        <p class="mb-0 font-dark">Copyright © 2024 Mobile Store</p>
                    </div>
                    <!-- Logo -->
                    <div class="col-md-4 text-center order-md-2">
                            <a href="{{ route('app.index') }}">
                                <img src="{{ asset('assets/images/logo.png') }}" class="f-logo img-fluid blur-up lazyload" alt="logo">
                            </a>
                    </div>
                    <!-- Footer links -->
                    <div class="col-md-4 text-md-end text-center order-md-3">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="{{ route('app.index') }}" class="font-dark">Home</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="{{ route('shop.index') }}" class="font-dark">Shop</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="{{ route('cart.index') }}" class="font-dark">Cart</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="{{ route('about.index') }}" class="font-dark">About</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="{{ route('contact.index') }}" class="font-dark">Contact</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="/credits" class="font-dark">Credits</a>
                            </li>
                        </ul>
                    </div>
                    <div>    
                </div>
            </div>
        </div>
        
    </footer>

    <div class="modal fade newletter-modal" id="newsletter">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content ">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <img id="welcome-logo" src="assets/images/logo.png" class="img-fluid blur-up lazyload" alt="">
                    <div class="modal-title">
                        <h2 class="tt-title">Welcome to Mobile Store</h2>
                        <p class="font-light">Welcome to our online store where you can find the latest mobile phones at great prices! Never miss any new mobile phones that is added on the website. </p><hr>
                        <div class="text-center">
                            <a class="btn btn-primary mb-1 button-blur" href="{{ route('shop.index') }}">Start Shopping</a><br>
                            <a class="btn btn-info mb-1 button-blur" href="{{ route('login') }}">Login</a><br>
                            <a class="btn btn-warning mb-1 button-blur" href="{{ route('register') }}">Register</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="tap-to-top">
        <a href="#home">
            <i class="fas fa-chevron-up"></i>
        </a>
    </div>
    <div class="bg-overlay"></div>
    <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/feather/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/lazysizes.min.js') }}"></script>
    <script src="{{ asset('assets/js/slick/slick.js') }}"></script>
    <script src="{{ asset('assets/js/slick/slick-animation.min.js') }}"></script>
    <script src="{{ asset('assets/js/slick/custom_slick.js') }}"></script>
    <script src="{{ asset('assets/js/price-filter.js') }}"></script>
    <script src="{{ asset('assets/js/ion.rangeSlider.min.js') }}"></script>
    <script src="{{ asset('assets/js/filter.js') }}"></script>
    <script src="{{ asset('assets/js/newsletter.js') }}"></script>
    <script src="{{ asset('assets/js/cart_modal_resize.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('assets/js/theme-setting.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script>
        $(function () {
            $('[data-bs-toggle="tooltip"]').tooltip()
        });
    </script>
    @stack('scripts')
</body>

</html>