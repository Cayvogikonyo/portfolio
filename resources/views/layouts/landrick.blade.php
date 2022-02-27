<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />

    

    @component('components.header')
        @if(isset($image))
            @slot('image')
                {{$image}}
            @endslot
        @endif
        @if(isset($title))
            @slot('title')
                {{$title}}
            @endslot
        @endif
        @if(isset($description))
            @slot('description')
                {{$description}}
            @endslot
        @endif
    @endcomponent

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <!-- favicon -->
    <link rel="shortcut icon" href="images/favicon.ico">
    <!-- Bootstrap -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- tobii css -->
    <link href="{{asset('css/all.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/tobii.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Slider -->
    <link rel="stylesheet" href="{{asset('css/tiny-slider.css')}}" />
    <!-- Icons -->
    <link href="{{asset('css/materialdesignicons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Main Css -->
    <link href="{{asset('css/style.min.css')}}" rel="stylesheet" type="text/css" id="theme-opt" />
    <link href="{{asset('css/loader.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/colors/default.css')}}" rel="stylesheet" id="color-opt">
    <style>
        .bg-nav{
            background-color: #ffffff8c !important;
        }
        .footer{
            background-color: #202942;
        }
        .bg-home{
            background-repeat: no-repeat !important;
        }
        .h-38 {
            height: 38em;
        }
        .h-full{
            height: 100vh !important;
        }

    </style>
    <script src="{{ asset('js/theme.js') }}" defer></script>

</head>

<body>
    <!-- Loader -->
    <!-- <div id="preloader">
            <div id="status">
                <div class="spinner">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>
            </div>
        </div> -->
    <!-- Loader -->

    <!-- Navbar STart -->
    <header id="topnav" class="defaultscroll sticky bg-nav">
        <div class="container">
            <!-- Logo container-->
            <a class="logo" href="index.html">
                <!-- <img src="images/logo-dark.gif" height="64" width="128" class="logo-light-mode" alt="">
                    <img src="images/logo-dark.gif" height="64" width="128" class="logo-dark-mode" alt=""> -->
            </a>

            <!-- Logo End -->

            <!-- End Logo container-->
            <div class="menu-extras">
                <div class="menu-item">
                    <!-- Mobile menu toggle-->
                    <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>
                    <!-- End mobile menu toggle-->
                </div>
            </div>

            <!--Login button Start-->
            <ul class="buy-button list-inline mb-0">
                <li class="list-inline-item mb-0">
                    <a href="javascript:void(0)" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                        <div class="btn btn-icon btn-pills btn-soft-primary"> <i class="fas fa-comment"></i></div>
                    </a>
                </li>

            </ul>
            <!--Login button End-->

            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu">
                    <li><a href="{{url('/')}}" class="sub-menu-item">Home</a></li>
                    <li><a href="{{url('portfolio')}}" class="sub-menu-item">Portofolio</a></li>
                    <li><a href="{{url('blog')}}" class="sub-menu-item">Blog</a></li>
                    <li><a href="{{url('work-portfolio')}}" class="sub-menu-item">Works</a></li>

                </ul>
                <!--end navigation menu-->
            </div>
            <!--end navigation-->
        </div>
        <!--end container-->
    </header>
    <!--end header-->
    <!-- Navbar End -->


    @yield('content')

    <!-- Footer Start -->
    @include('includes.footer')

    <!--end footer-->
    <!-- Footer End -->

    <!-- Offcanvas Start -->
    @include('includes.contactus')
    <!-- Offcanvas End -->

    <!-- Back to top -->
    <a href="#" onclick="topFunction()" id="back-to-top" class="back-to-top fs-5"><i data-feather="arrow-up" class="fea icon-sm icons align-middle"></i></a>
    <!-- Back to top -->

    <!-- javascript -->
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <!-- tobii js -->
    <script src="{{asset('js/tobii.min.js')}}"></script>
    <!-- SLIDER -->
    <script src="{{asset('js/tiny-slider.js')}} "></script>
    <!-- Contact -->
    <script src="{{asset('js/contact.js')}} "></script>
    <!-- Icons -->
    <!-- Main Js -->
    <script src="{{asset('js/plugins.init.js')}}"></script>
    <!--Note: All init js like tiny slider, counter, countdown, maintenance, lightbox, gallery, swiper slider, aos animation etc.-->
    <!-- <script src="js/app.js"></script> -->
    <script>
        //Menu
        // Toggle menu
        function toggleMenu() {
            document.getElementById('isToggle').classList.toggle('open');
            var isOpen = document.getElementById('navigation')
            if (isOpen.style.display === "block") {
                isOpen.style.display = "none";
            } else {
                isOpen.style.display = "block";
            }
        };

    </script>
    <!--Note: All important javascript like page loader, menu, sticky menu, menu-toggler, one page menu etc. -->
</body>

</html>