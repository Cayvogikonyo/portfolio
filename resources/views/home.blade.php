
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Landrick - Saas & Software Landing Page Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Premium Bootstrap 5 Landing Page Template" />
        <meta name="keywords" content="Saas, Software, multi-uses, HTML, Clean, Modern" />
        <meta name="author" content="Shreethemes" />
        <meta name="email" content="support@shreethemes.in" />
        <meta name="website" content="https://shreethemes.in" />
        <meta name="Version" content="v3.5.0" />
        <!-- favicon -->
        <link rel="shortcut icon" href="images/favicon.ico">
        <!-- Bootstrap -->
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- Icons -->
        <link href="{{asset('css/materialdesignicons.min.css')}}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.6/css/line.css">
        <!-- Slider -->               
        <link rel="stylesheet" href="{{asset('css/tiny-slider.css')}}"/>
        <!-- Tobii -->
        <link href="{{asset('css/tobii.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- Main Css -->
        <link href="{{asset('css/style.min.css')}}" rel="stylesheet" type="text/css" id="theme-opt" />
        <link href="{{asset('css/colors/default.css')}}" rel="stylesheet" id="color-opt">
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
        <header id="topnav" class="defaultscroll sticky bg-white">
            <div class="container">
                <!-- Logo container-->
                <a class="logo" href="index.html">
                    <img src="images/logo-dark.png" height="24" class="logo-light-mode" alt="">
                    <img src="images/logo-light.png" height="24" class="logo-dark-mode" alt="">
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
                    <li class="list-inline-item mb-0 pe-1">
                        <a href="javascript:void(0)" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop">
                            <i class="uil uil-search h5 text-dark align-middle"></i>
                        </a>
                    </li>

                    <li class="list-inline-item mb-0">
                        <a href="javascript:void(0)" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                            <div class="btn btn-icon btn-pills btn-soft-primary"><i data-feather="settings" class="fea icon-sm"></i></div>
                        </a>
                    </li>
                    
                    <li class="list-inline-item ps-1 mb-0">
                        <a href="https://1.envato.market/4n73n" target="_blank">
                            <div class="btn btn-icon btn-pills btn-primary"><i data-feather="shopping-cart" class="fea icon-sm"></i></div>
                        </a>
                    </li>
                </ul>
                <!--Login button End-->
        
                <div id="navigation">
                    <!-- Navigation Menu-->   
                    <ul class="navigation-menu">
                        <li><a href="index-blog.html" class="sub-menu-item">Home</a></li>

                        <li><a href="blog-about.html" class="sub-menu-item">About</a></li>

                        <li class="has-submenu parent-menu-item">
                            <a href="javascript:void(0)">Post</a><span class="menu-arrow"></span>
                            <ul class="submenu">
                                <li><a href="blog-standard-post.html" class="sub-menu-item">Standard Post</a></li>
                                <li><a href="blog-slider-post.html" class="sub-menu-item">Slider Post</a></li>
                                <li><a href="blog-gallery-post.html" class="sub-menu-item">Gallery Post</a></li>
                                <li><a href="blog-youtube-post.html" class="sub-menu-item">Youtube Post</a></li>
                                <li><a href="blog-vimeo-post.html" class="sub-menu-item">Vimeo Post</a></li>
                                <li><a href="blog-audio-post.html" class="sub-menu-item">Audio Post</a></li>
                                <li><a href="blog-blockquote-post.html" class="sub-menu-item">Blockquote</a></li>
                                <li><a href="blog-left-sidebar-post.html" class="sub-menu-item">Left Sidebar</a></li>
                            </ul>
                        </li>

                        <li><a href="javascript:void(0)" class="sub-menu-item">Lifestyle</a></li>

                        <li><a href="javascript:void(0)" class="sub-menu-item">Technology</a></li>
                    </ul><!--end navigation menu-->
                </div><!--end navigation-->
            </div><!--end container-->
        </header><!--end header-->
        <!-- Navbar End -->

        <!-- Hero Start -->
        <section class="home-slider position-relative">
            <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="3000">
                        <div class="bg-home-75vh d-flex align-items-center" style="background: url('images/blog/bg1.jpg') center center;">
                            <div class="bg-overlay"></div>
                            <div class="container">
                                <div class="row mt-5 justify-content-center">
                                    <div class="col-12">
                                        <div class="title-heading text-center">
                                            <h2 class="text-white title-dark mb-3">Weekend Travel</h2>
                                            <ul class="list-unstyled">
                                                <li class="list-inline-item small user text-light me-2"><i class="uil uil-user text-white title-dark"></i> Calvin Carlo</li>
                                                <li class="list-inline-item small date text-light"><i class="uil uil-calendar-alt text-white title-dark"></i> 25th June 2021</li>
                                            </ul>
                                            <p class="para-desc mx-auto text-white-50 mb-0">Start working with Landrick that can provide everything you need to generate awareness, drive traffic, connect.</p>
                                            <div class="mt-4">
                                                <a href="javascript:void(0)" class="btn btn-primary">Read More </a>
                                            </div>
                                        </div>
                                    </div><!--end col-->
                                </div><!--end row-->
                            </div>
                        </div><!--end slide-->
                    </div>

                    <div class="carousel-item" data-bs-interval="3000">
                        <div class="bg-home-75vh d-flex align-items-center" style="background: url('images/blog/bg2.jpg') center center;">
                            <div class="bg-overlay"></div>
                            <div class="container">
                                <div class="row mt-5 justify-content-center">
                                    <div class="col-12">
                                        <div class="title-heading text-center">
                                            <h2 class="text-white title-dark mb-3">Business Meeting</h2>
                                            <ul class="list-unstyled">
                                                <li class="list-inline-item small user text-light me-2"><i class="uil uil-user text-white title-dark"></i> Calvin Carlo</li>
                                                <li class="list-inline-item small date text-light"><i class="uil uil-calendar-alt text-white title-dark"></i> 25th June 2021</li>
                                            </ul>
                                            <p class="para-desc mx-auto text-white-50 mb-0">Start working with Landrick that can provide everything you need to generate awareness, drive traffic, connect.</p>
                                            <div class="mt-4">
                                                <a href="javascript:void(0)" class="btn btn-primary">Read More </a>
                                            </div>
                                        </div>
                                    </div><!--end col-->
                                </div><!--end row-->
                            </div>
                        </div><!--end slide-->
                    </div>

                    <div class="carousel-item" data-bs-interval="3000">
                        <div class="bg-home-75vh d-flex align-items-center" style="background: url('images/blog/bg3.jpg') center center;">
                            <div class="bg-overlay"></div>
                            <div class="container">
                                <div class="row mt-5 justify-content-center">
                                    <div class="col-12">
                                        <div class="title-heading text-center">
                                            <h2 class="text-white title-dark mb-3">Delicious & Organic</h2>
                                            <ul class="list-unstyled">
                                                <li class="list-inline-item small user text-light me-2"><i class="uil uil-user text-white title-dark"></i> Calvin Carlo</li>
                                                <li class="list-inline-item small date text-light"><i class="uil uil-calendar-alt text-white title-dark"></i> 25th June 2021</li>
                                            </ul>
                                            <p class="para-desc mx-auto text-white-50 mb-0">Start working with Landrick that can provide everything you need to generate awareness, drive traffic, connect.</p>
                                            <div class="mt-4">
                                                <a href="javascript:void(0)" class="btn btn-primary">Read More </a>
                                            </div>
                                        </div>
                                    </div><!--end col-->
                                </div><!--end row-->
                            </div>
                        </div><!--end slide-->
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </a>
            </div>
        </section><!--end section-->
        <!-- Hero End -->

        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="features-absolute blog-search">
                            <div class="row justify-content-center">
                                <div class="col-md-10">
                                    <div class="text-center subcribe-form">
                                        <form style="max-width: 800px;">
                                            <div class="mb-0">
                                                <input type="text" id="help" name="name" class="border bg-white rounded-pill" required="" placeholder="Search">
                                                <button type="submit" class="btn btn-pills btn-primary">Search</button>
                                            </div>
                                        </form>
                                    </div>
                                </div><!--end col-->
                            </div><!--end row-->
                        </div><!--end div-->
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
            
            <div class="container mt-4 mt-lg-0">
                <div class="row align-items-center mb-4 pb-2">
                    <div class="col-md-8">
                        <div class="section-title text-center text-md-start">
                            <h4 class="mb-4">Popular post</h4>
                            <p class="text-muted mb-0 para-desc">Start working with <span class="text-primary fw-bold">Landrick</span> that can provide everything you need to generate awareness, drive traffic, connect.</p>
                        </div>
                    </div><!--end col-->

                    <div class="col-md-4 mt-4 mt-sm-0">
                        <div class="text-center text-md-end">
                            <a href="javascript:void(0)" class="btn btn-soft-primary">See More <i data-feather="arrow-right" class="fea icon-sm"></i></a>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->

                <div class="row">
                    <div class="col-lg-4 col-md-6 mt-4 pt-2">
                        <div class="card blog rounded border-0 shadow overflow-hidden">
                            <div class="position-relative">
                                <img src="images/blog/01.jpg" class="card-img-top" alt="...">
                                <div class="overlay rounded-top bg-dark"></div>
                            </div>
                            <div class="card-body content">
                                <h5><a href="javascript:void(0)" class="card-title title text-dark">Design your apps in your own way</a></h5>
                                <div class="post-meta d-flex justify-content-between mt-3">
                                    <ul class="list-unstyled mb-0">
                                        <li class="list-inline-item me-2 mb-0"><a href="javascript:void(0)" class="text-muted like"><i class="uil uil-heart me-1"></i>33</a></li>
                                        <li class="list-inline-item"><a href="javascript:void(0)" class="text-muted comments"><i class="uil uil-comment me-1"></i>08</a></li>
                                    </ul>
                                    <a href="blog-detail.html" class="text-muted readmore">Read More <i class="uil uil-angle-right-b align-middle"></i></a>
                                </div>
                            </div>
                            <div class="author">
                                <small class="text-light user d-block"><i class="uil uil-user"></i> Calvin Carlo</small>
                                <small class="text-light date"><i class="uil uil-calendar-alt"></i> 25th June 2021</small>
                            </div>
                        </div>
                    </div><!--end col-->
                    
                    <div class="col-lg-4 col-md-6 mt-4 pt-2">
                        <div class="card blog rounded border-0 shadow overflow-hidden">
                            <div class="position-relative">
                                <img src="images/blog/02.jpg" class="card-img-top" alt="...">
                                <div class="overlay rounded-top bg-dark"></div>
                            </div>
                            <div class="card-body content">
                                <h5><a href="javascript:void(0)" class="card-title title text-dark">How apps is changing the IT world</a></h5>
                                <div class="post-meta d-flex justify-content-between mt-3">
                                    <ul class="list-unstyled mb-0">
                                        <li class="list-inline-item me-2 mb-0"><a href="javascript:void(0)" class="text-muted like"><i class="uil uil-heart me-1"></i>33</a></li>
                                        <li class="list-inline-item"><a href="javascript:void(0)" class="text-muted comments"><i class="uil uil-comment me-1"></i>08</a></li>
                                    </ul>
                                    <a href="blog-detail.html" class="text-muted readmore">Read More <i class="uil uil-angle-right-b align-middle"></i></a>
                                </div>
                            </div>
                            <div class="author">
                                <small class="text-light user d-block"><i class="uil uil-user"></i> Calvin Carlo</small>
                                <small class="text-light date"><i class="uil uil-calendar-alt"></i> 25th June 2021</small>
                            </div>
                        </div>
                    </div><!--end col-->
                    
                    <div class="col-lg-4 col-md-6 mt-4 pt-2">
                        <div class="card blog rounded border-0 shadow overflow-hidden">
                            <div class="position-relative">
                                <img src="images/blog/03.jpg" class="card-img-top" alt="...">
                                <div class="overlay rounded-top bg-dark"></div>
                            </div>
                            <div class="card-body content">
                                <h5><a href="javascript:void(0)" class="card-title title text-dark">Smartest Applications for Business</a></h5>
                                <div class="post-meta d-flex justify-content-between mt-3">
                                    <ul class="list-unstyled mb-0">
                                        <li class="list-inline-item me-2 mb-0"><a href="javascript:void(0)" class="text-muted like"><i class="uil uil-heart me-1"></i>33</a></li>
                                        <li class="list-inline-item"><a href="javascript:void(0)" class="text-muted comments"><i class="uil uil-comment me-1"></i>08</a></li>
                                    </ul>
                                    <a href="blog-detail.html" class="text-muted readmore">Read More <i class="uil uil-angle-right-b align-middle"></i></a>
                                </div>
                            </div>
                            <div class="author">
                                <small class="text-light user d-block"><i class="uil uil-user"></i> Calvin Carlo</small>
                                <small class="text-light date"><i class="uil uil-calendar-alt"></i> 25th June 2021</small>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->

            <div class="container mt-100 mt-60">
                <div class="row align-items-center mb-4 pb-2">
                    <div class="col-md-8">
                        <div class="section-title text-center text-md-start">
                            <h4 class="mb-4">Recent Post</h4>
                            <p class="text-muted mb-0 para-desc">Start working with <span class="text-primary fw-bold">Landrick</span> that can provide everything you need to generate awareness, drive traffic, connect.</p>
                        </div>
                    </div><!--end col-->

                    <div class="col-md-4 mt-4 mt-sm-0">
                        <div class="text-center text-md-end">
                            <a href="javascript:void(0)" class="btn btn-soft-primary">See More <i data-feather="arrow-right" class="fea icon-sm"></i></a>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->

                <div class="row">
                    <div class="col-lg-4 col-md-6 mt-4 pt-2">
                        <div class="card blog rounded border-0 shadow overflow-hidden">
                            <div class="position-relative">
                                <img src="images/blog/04.jpg" class="card-img-top" alt="...">
                                <div class="overlay rounded-top bg-dark"></div>
                            </div>
                            <div class="card-body content">
                                <h5><a href="javascript:void(0)" class="card-title title text-dark">How apps is changing the IT world</a></h5>
                                <div class="post-meta d-flex justify-content-between mt-3">
                                    <ul class="list-unstyled mb-0">
                                        <li class="list-inline-item me-2 mb-0"><a href="javascript:void(0)" class="text-muted like"><i class="uil uil-heart me-1"></i>33</a></li>
                                        <li class="list-inline-item"><a href="javascript:void(0)" class="text-muted comments"><i class="uil uil-comment me-1"></i>08</a></li>
                                    </ul>
                                    <a href="blog-detail.html" class="text-muted readmore">Read More <i class="uil uil-angle-right-b align-middle"></i></a>
                                </div>
                            </div>
                            <div class="author">
                                <small class="text-light user d-block"><i class="uil uil-user"></i> Calvin Carlo</small>
                                <small class="text-light date"><i class="uil uil-calendar-alt"></i> 25th June 2021</small>
                            </div>
                        </div>
                    </div><!--end col-->
                    
                    <div class="col-lg-4 col-md-6 mt-4 pt-2">
                        <div class="card blog rounded border-0 shadow overflow-hidden">
                            <div class="position-relative">
                                <img src="images/blog/05.jpg" class="card-img-top" alt="...">
                                <div class="overlay rounded-top bg-dark"></div>
                            </div>
                            <div class="card-body content">
                                <h5><a href="javascript:void(0)" class="card-title title text-dark">Design your apps in your own way</a></h5>
                                <div class="post-meta d-flex justify-content-between mt-3">
                                    <ul class="list-unstyled mb-0">
                                        <li class="list-inline-item me-2 mb-0"><a href="javascript:void(0)" class="text-muted like"><i class="uil uil-heart me-1"></i>33</a></li>
                                        <li class="list-inline-item"><a href="javascript:void(0)" class="text-muted comments"><i class="uil uil-comment me-1"></i>08</a></li>
                                    </ul>
                                    <a href="blog-detail.html" class="text-muted readmore">Read More <i class="uil uil-angle-right-b align-middle"></i></a>
                                </div>
                            </div>
                            <div class="author">
                                <small class="text-light user d-block"><i class="uil uil-user"></i> Calvin Carlo</small>
                                <small class="text-light date"><i class="uil uil-calendar-alt"></i> 25th June 2021</small>
                            </div>
                        </div>
                    </div><!--end col-->
                    
                    <div class="col-lg-4 col-md-6 mt-4 pt-2">
                        <div class="card blog rounded border-0 shadow overflow-hidden">
                            <div class="position-relative">
                                <img src="images/blog/06.jpg" class="card-img-top" alt="...">
                                <div class="overlay rounded-top bg-dark"></div>
                            </div>
                            <div class="card-body content">
                                <h5><a href="javascript:void(0)" class="card-title title text-dark">Smartest Applications for Business</a></h5>
                                <div class="post-meta d-flex justify-content-between mt-3">
                                    <ul class="list-unstyled mb-0">
                                        <li class="list-inline-item me-2 mb-0"><a href="javascript:void(0)" class="text-muted like"><i class="uil uil-heart me-1"></i>33</a></li>
                                        <li class="list-inline-item"><a href="javascript:void(0)" class="text-muted comments"><i class="uil uil-comment me-1"></i>08</a></li>
                                    </ul>
                                    <a href="blog-detail.html" class="text-muted readmore">Read More <i class="uil uil-angle-right-b align-middle"></i></a>
                                </div>
                            </div>
                            <div class="author">
                                <small class="text-light user d-block"><i class="uil uil-user"></i> Calvin Carlo</small>
                                <small class="text-light date"><i class="uil uil-calendar-alt"></i> 25th June 2021</small>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->

            <!-- Cta start -->
            <div class="container-fluid mt-100 mt-60">
                <div class="rounded-md shadow-md py-5 position-relative" style="background: url('images/3.jpg') center center;">
                    <div class="bg-overlay rounded-md"></div>
                    <div class="container py-5">
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="section-title text-center">
                                    <h2 class="fw-bold text-white title-dark mb-4 pb-2">People are podcasting <br> all over the world</h2>
                                    <a href="javascript:void(0)" class="btn btn-primary">Read More <i data-feather="arrow-right" class="fea icon-sm"></i></a>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!--end container-->
                </div><!--end slide-->
            </div><!--end container-->
            <!-- Cta End -->

            <div class="container mt-100 mt-60">
                <div class="row align-items-center mb-4 pb-2">
                    <div class="col-md-8">
                        <div class="section-title text-center text-md-start">
                            <h4 class="mb-4">All News or Blog Post</h4>
                            <p class="text-muted mb-0 para-desc">Start working with <span class="text-primary fw-bold">Landrick</span> that can provide everything you need to generate awareness, drive traffic, connect.</p>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->

                <div class="row">
                    <div class="col-lg-4 col-md-6 mt-4 pt-2">
                        <div class="card blog rounded border-0 shadow overflow-hidden">
                            <div class="position-relative">
                                <img src="images/blog/01.jpg" class="card-img-top" alt="...">
                                <div class="overlay rounded-top bg-dark"></div>
                            </div>
                            <div class="card-body content">
                                <h5><a href="javascript:void(0)" class="card-title title text-dark">Design your apps in your own way</a></h5>
                                <div class="post-meta d-flex justify-content-between mt-3">
                                    <ul class="list-unstyled mb-0">
                                        <li class="list-inline-item me-2 mb-0"><a href="javascript:void(0)" class="text-muted like"><i class="uil uil-heart me-1"></i>33</a></li>
                                        <li class="list-inline-item"><a href="javascript:void(0)" class="text-muted comments"><i class="uil uil-comment me-1"></i>08</a></li>
                                    </ul>
                                    <a href="blog-detail.html" class="text-muted readmore">Read More <i class="uil uil-angle-right-b align-middle"></i></a>
                                </div>
                            </div>
                            <div class="author">
                                <small class="text-light user d-block"><i class="uil uil-user"></i> Calvin Carlo</small>
                                <small class="text-light date"><i class="uil uil-calendar-alt"></i> 25th June 2021</small>
                            </div>
                        </div>
                    </div><!--end col-->
                    
                    <div class="col-lg-4 col-md-6 mt-4 pt-2">
                        <div class="card blog rounded border-0 shadow overflow-hidden">
                            <div class="position-relative">
                                <img src="images/blog/02.jpg" class="card-img-top" alt="...">
                                <div class="overlay rounded-top bg-dark"></div>
                            </div>
                            <div class="card-body content">
                                <h5><a href="javascript:void(0)" class="card-title title text-dark">How apps is changing the IT world</a></h5>
                                <div class="post-meta d-flex justify-content-between mt-3">
                                    <ul class="list-unstyled mb-0">
                                        <li class="list-inline-item me-2 mb-0"><a href="javascript:void(0)" class="text-muted like"><i class="uil uil-heart me-1"></i>33</a></li>
                                        <li class="list-inline-item"><a href="javascript:void(0)" class="text-muted comments"><i class="uil uil-comment me-1"></i>08</a></li>
                                    </ul>
                                    <a href="blog-detail.html" class="text-muted readmore">Read More <i class="uil uil-angle-right-b align-middle"></i></a>
                                </div>
                            </div>
                            <div class="author">
                                <small class="text-light user d-block"><i class="uil uil-user"></i> Calvin Carlo</small>
                                <small class="text-light date"><i class="uil uil-calendar-alt"></i> 25th June 2021</small>
                            </div>
                        </div>
                    </div><!--end col-->
                    
                    <div class="col-lg-4 col-md-6 mt-4 pt-2">
                        <div class="card blog rounded border-0 shadow overflow-hidden">
                            <div class="position-relative">
                                <img src="images/blog/03.jpg" class="card-img-top" alt="...">
                                <div class="overlay rounded-top bg-dark"></div>
                            </div>
                            <div class="card-body content">
                                <h5><a href="javascript:void(0)" class="card-title title text-dark">Smartest Applications for Business</a></h5>
                                <div class="post-meta d-flex justify-content-between mt-3">
                                    <ul class="list-unstyled mb-0">
                                        <li class="list-inline-item me-2 mb-0"><a href="javascript:void(0)" class="text-muted like"><i class="uil uil-heart me-1"></i>33</a></li>
                                        <li class="list-inline-item"><a href="javascript:void(0)" class="text-muted comments"><i class="uil uil-comment me-1"></i>08</a></li>
                                    </ul>
                                    <a href="blog-detail.html" class="text-muted readmore">Read More <i class="uil uil-angle-right-b align-middle"></i></a>
                                </div>
                            </div>
                            <div class="author">
                                <small class="text-light user d-block"><i class="uil uil-user"></i> Calvin Carlo</small>
                                <small class="text-light date"><i class="uil uil-calendar-alt"></i> 25th June 2021</small>
                            </div>
                        </div>
                    </div><!--end col-->

                    <div class="col-lg-4 col-md-6 mt-4 pt-2">
                        <div class="card blog rounded border-0 shadow overflow-hidden">
                            <div class="position-relative">
                                <img src="images/blog/04.jpg" class="card-img-top" alt="...">
                                <div class="overlay rounded-top bg-dark"></div>
                            </div>
                            <div class="card-body content">
                                <h5><a href="javascript:void(0)" class="card-title title text-dark">How apps is changing the IT world</a></h5>
                                <div class="post-meta d-flex justify-content-between mt-3">
                                    <ul class="list-unstyled mb-0">
                                        <li class="list-inline-item me-2 mb-0"><a href="javascript:void(0)" class="text-muted like"><i class="uil uil-heart me-1"></i>33</a></li>
                                        <li class="list-inline-item"><a href="javascript:void(0)" class="text-muted comments"><i class="uil uil-comment me-1"></i>08</a></li>
                                    </ul>
                                    <a href="blog-detail.html" class="text-muted readmore">Read More <i class="uil uil-angle-right-b align-middle"></i></a>
                                </div>
                            </div>
                            <div class="author">
                                <small class="text-light user d-block"><i class="uil uil-user"></i> Calvin Carlo</small>
                                <small class="text-light date"><i class="uil uil-calendar-alt"></i> 25th June 2021</small>
                            </div>
                        </div>
                    </div><!--end col-->
                    
                    <div class="col-lg-4 col-md-6 mt-4 pt-2">
                        <div class="card blog rounded border-0 shadow overflow-hidden">
                            <div class="position-relative">
                                <img src="images/blog/05.jpg" class="card-img-top" alt="...">
                                <div class="overlay rounded-top bg-dark"></div>
                            </div>
                            <div class="card-body content">
                                <h5><a href="javascript:void(0)" class="card-title title text-dark">Design your apps in your own way</a></h5>
                                <div class="post-meta d-flex justify-content-between mt-3">
                                    <ul class="list-unstyled mb-0">
                                        <li class="list-inline-item me-2 mb-0"><a href="javascript:void(0)" class="text-muted like"><i class="uil uil-heart me-1"></i>33</a></li>
                                        <li class="list-inline-item"><a href="javascript:void(0)" class="text-muted comments"><i class="uil uil-comment me-1"></i>08</a></li>
                                    </ul>
                                    <a href="blog-detail.html" class="text-muted readmore">Read More <i class="uil uil-angle-right-b align-middle"></i></a>
                                </div>
                            </div>
                            <div class="author">
                                <small class="text-light user d-block"><i class="uil uil-user"></i> Calvin Carlo</small>
                                <small class="text-light date"><i class="uil uil-calendar-alt"></i> 25th June 2021</small>
                            </div>
                        </div>
                    </div><!--end col-->
                    
                    <div class="col-lg-4 col-md-6 mt-4 pt-2">
                        <div class="card blog rounded border-0 shadow overflow-hidden">
                            <div class="position-relative">
                                <img src="images/blog/06.jpg" class="card-img-top" alt="...">
                                <div class="overlay rounded-top bg-dark"></div>
                            </div>
                            <div class="card-body content">
                                <h5><a href="javascript:void(0)" class="card-title title text-dark">Smartest Applications for Business</a></h5>
                                <div class="post-meta d-flex justify-content-between mt-3">
                                    <ul class="list-unstyled mb-0">
                                        <li class="list-inline-item me-2 mb-0"><a href="javascript:void(0)" class="text-muted like"><i class="uil uil-heart me-1"></i>33</a></li>
                                        <li class="list-inline-item"><a href="javascript:void(0)" class="text-muted comments"><i class="uil uil-comment me-1"></i>08</a></li>
                                    </ul>
                                    <a href="blog-detail.html" class="text-muted readmore">Read More <i class="uil uil-angle-right-b align-middle"></i></a>
                                </div>
                            </div>
                            <div class="author">
                                <small class="text-light user d-block"><i class="uil uil-user"></i> Calvin Carlo</small>
                                <small class="text-light date"><i class="uil uil-calendar-alt"></i> 25th June 2021</small>
                            </div>
                        </div>
                    </div><!--end col-->

                    <div class="col-12 mt-4 pt-2">
                        <div class="text-center">
                            <a href="javascript:void(0)" class="btn btn-primary">See More <i data-feather="arrow-right" class="fea icon-sm"></i></a>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->
        <!-- End -->

        <!-- Insta Post Start -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 px-0">
                    <div class="tiny-twelve-item">
                        <div class="tiny-slide">
                            <div class="work-container work-modern position-relative d-block client-testi rounded-0 overflow-hidden">
                                <div class="card-img position-relative">
                                    <img src="images/blog/travel/01.jpg" class="img-fluid" alt="">
                                    <div class="card-overlay"></div>

                                    <div class="icons text-center">
                                        <a href="images/blog/travel/01.jpg" class="text-primary work-icon bg-white d-inline-block rounded-pill lightbox"><i class="uil uil-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="tiny-slide">
                            <div class="work-container work-modern position-relative d-block client-testi rounded-0 overflow-hidden">
                                <div class="card-img position-relative">
                                    <img src="images/blog/travel/02.jpg" class="img-fluid" alt="">
                                    <div class="card-overlay"></div>

                                    <div class="icons text-center">
                                        <a href="images/blog/travel/02.jpg" class="text-primary work-icon bg-white d-inline-block rounded-pill lightbox"><i class="uil uil-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="tiny-slide">
                            <div class="work-container work-modern position-relative d-block client-testi rounded-0 overflow-hidden">
                                <div class="card-img position-relative">
                                    <img src="images/blog/travel/03.jpg" class="img-fluid" alt="">
                                    <div class="card-overlay"></div>

                                    <div class="icons text-center">
                                        <a href="images/blog/travel/03.jpg" class="text-primary work-icon bg-white d-inline-block rounded-pill lightbox"><i class="uil uil-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="tiny-slide">
                            <div class="work-container work-modern position-relative d-block client-testi rounded-0 overflow-hidden">
                                <div class="card-img position-relative">
                                    <img src="images/blog/travel/04.jpg" class="img-fluid" alt="">
                                    <div class="card-overlay"></div>

                                    <div class="icons text-center">
                                        <a href="images/blog/travel/04.jpg" class="text-primary work-icon bg-white d-inline-block rounded-pill lightbox"><i class="uil uil-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="tiny-slide">
                            <div class="work-container work-modern position-relative d-block client-testi rounded-0 overflow-hidden">
                                <div class="card-img position-relative">
                                    <img src="images/blog/travel/05.jpg" class="img-fluid" alt="">
                                    <div class="card-overlay"></div>

                                    <div class="icons text-center">
                                        <a href="images/blog/travel/05.jpg" class="text-primary work-icon bg-white d-inline-block rounded-pill lightbox"><i class="uil uil-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="tiny-slide">
                            <div class="work-container work-modern position-relative d-block client-testi rounded-0 overflow-hidden">
                                <div class="card-img position-relative">
                                    <img src="images/blog/travel/06.jpg" class="img-fluid" alt="">
                                    <div class="card-overlay"></div>

                                    <div class="icons text-center">
                                        <a href="images/blog/travel/06.jpg" class="text-primary work-icon bg-white d-inline-block rounded-pill lightbox"><i class="uil uil-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="tiny-slide">
                            <div class="work-container work-modern position-relative d-block client-testi rounded-0 overflow-hidden">
                                <div class="card-img position-relative">
                                    <img src="images/blog/travel/07.jpg" class="img-fluid" alt="">
                                    <div class="card-overlay"></div>

                                    <div class="icons text-center">
                                        <a href="images/blog/travel/07.jpg" class="text-primary work-icon bg-white d-inline-block rounded-pill lightbox"><i class="uil uil-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="tiny-slide">
                            <div class="work-container work-modern position-relative d-block client-testi rounded-0 overflow-hidden">
                                <div class="card-img position-relative">
                                    <img src="images/blog/travel/08.jpg" class="img-fluid" alt="">
                                    <div class="card-overlay"></div>

                                    <div class="icons text-center">
                                        <a href="images/blog/travel/08.jpg" class="text-primary work-icon bg-white d-inline-block rounded-pill lightbox"><i class="uil uil-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="tiny-slide">
                            <div class="work-container work-modern position-relative d-block client-testi rounded-0 overflow-hidden">
                                <div class="card-img position-relative">
                                    <img src="images/blog/travel/09.jpg" class="img-fluid" alt="">
                                    <div class="card-overlay"></div>

                                    <div class="icons text-center">
                                        <a href="images/blog/travel/09.jpg" class="text-primary work-icon bg-white d-inline-block rounded-pill lightbox"><i class="uil uil-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="tiny-slide">
                            <div class="work-container work-modern position-relative d-block client-testi rounded-0 overflow-hidden">
                                <div class="card-img position-relative">
                                    <img src="images/blog/travel/10.jpg" class="img-fluid" alt="">
                                    <div class="card-overlay"></div>

                                    <div class="icons text-center">
                                        <a href="images/blog/travel/10.jpg" class="text-primary work-icon bg-white d-inline-block rounded-pill lightbox"><i class="uil uil-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="tiny-slide">
                            <div class="work-container work-modern position-relative d-block client-testi rounded-0 overflow-hidden">
                                <div class="card-img position-relative">
                                    <img src="images/blog/travel/11.jpg" class="img-fluid" alt="">
                                    <div class="card-overlay"></div>

                                    <div class="icons text-center">
                                        <a href="images/blog/travel/11.jpg" class="text-primary work-icon bg-white d-inline-block rounded-pill lightbox"><i class="uil uil-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="tiny-slide">
                            <div class="work-container work-modern position-relative d-block client-testi rounded-0 overflow-hidden">
                                <div class="card-img position-relative">
                                    <img src="images/blog/travel/12.jpg" class="img-fluid" alt="">
                                    <div class="card-overlay"></div>

                                    <div class="icons text-center">
                                        <a href="images/blog/travel/12.jpg" class="text-primary work-icon bg-white d-inline-block rounded-pill lightbox"><i class="uil uil-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="position-absolute top-50 start-50 translate-middle d-md-block d-none">
                        <a href="#" class="btn btn-sm btn-primary text-uppercase">Follow Now</a>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
        <!-- Insta Post End -->

        <!-- Footer Start -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="footer-py-60">
                            <div class="row">
                                <div class="col-lg-4 col-12 mb-0 mb-md-4 pb-0 pb-md-2">
                                    <p>Start working with Landrick that can provide everything you need to generate awareness, drive traffic, connect.</p>
                                    <ul class="list-unstyled social-icon foot-social-icon mb-0 mt-4">
                                        <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="facebook" class="fea icon-sm fea-social"></i></a></li>
                                        <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="instagram" class="fea icon-sm fea-social"></i></a></li>
                                        <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="twitter" class="fea icon-sm fea-social"></i></a></li>
                                        <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="linkedin" class="fea icon-sm fea-social"></i></a></li>
                                    </ul><!--end icon-->
                                </div><!--end col-->
                                
                                <div class="col-lg-2 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                                    <h5 class="footer-head">Company</h5>
                                    <ul class="list-unstyled footer-list mt-4">
                                        <li><a href="javascript:void(0)" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> About us</a></li>
                                        <li><a href="javascript:void(0)" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Services</a></li>
                                        <li><a href="javascript:void(0)" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Team</a></li>
                                        <li><a href="javascript:void(0)" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Pricing</a></li>
                                        <li><a href="javascript:void(0)" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Project</a></li>
                                        <li><a href="javascript:void(0)" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Careers</a></li>
                                        <li><a href="javascript:void(0)" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Blog</a></li>
                                        <li><a href="javascript:void(0)" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Login</a></li>
                                    </ul>
                                </div><!--end col-->
                                
                                <div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                                    <h5 class="footer-head">Usefull Links</h5>
                                    <ul class="list-unstyled footer-list mt-4">
                                        <li><a href="javascript:void(0)" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Terms of Services</a></li>
                                        <li><a href="javascript:void(0)" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Privacy Policy</a></li>
                                        <li><a href="javascript:void(0)" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Documentation</a></li>
                                        <li><a href="javascript:void(0)" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Changelog</a></li>
                                        <li><a href="javascript:void(0)" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Components</a></li>
                                    </ul>
                                </div><!--end col-->
            
                                <div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                                    <h5 class="footer-head">Newsletter</h5>
                                    <p class="mt-4">Sign up and receive the latest tips via email.</p>
                                    <form>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="foot-subscribe mb-3">
                                                    <label class="form-label">Write your email <span class="text-danger">*</span></label>
                                                    <div class="form-icon position-relative">
                                                        <i data-feather="mail" class="fea icon-sm icons"></i>
                                                        <input type="email" name="email" id="emailsubscribe" class="form-control ps-5 rounded" placeholder="Your email : " required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="d-grid">
                                                    <input type="submit" id="submitsubscribe" name="send" class="btn btn-soft-primary" value="Subscribe">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div><!--end col-->
                            </div><!--end row-->
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->

            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="footer-py-30 footer-border">
                            <div class="container text-center">
                                <div class="row align-items-center">
                                    <div class="col-sm-6">
                                        <div class="text-sm-start">
                                            <a href="#" class="logo-footer">
                                                <img src="images/logo-light.png" height="24" alt="">
                                            </a>
                                        </div>
                                    </div><!--end col-->
                
                                    <div class="col-sm-6 mt-4 mt-sm-0 pt-2 pt-sm-0">
                                        <ul class="list-unstyled footer-list terms-service text-sm-end mb-0">
                                            <li class="list-inline-item mb-0"><a href="javascript:void(0)" class="text-foot me-2">Privacy</a></li>
                                            <li class="list-inline-item mb-0"><a href="javascript:void(0)" class="text-foot me-2">Terms</a></li>
                                            <li class="list-inline-item mb-0"><a href="javascript:void(0)" class="text-foot me-2">FAQs</a></li>
                                            <li class="list-inline-item mb-0"><a href="javascript:void(0)" class="text-foot">Contact</a></li>
                                        </ul>
                                    </div><!--end col-->
                                </div><!--end row-->
                            </div><!--end container-->
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->

            <div class="footer-py-30 footer-border">
                <div class="container text-center">
                    <div class="row justify-content-center">
                        <div class="col-sm-12">
                            <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> Landrick. Design with <i class="mdi mdi-heart text-danger"></i> by <a href="https://shreethemes.in/" target="_blank" class="text-reset">Shreethemes</a>.</p>
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end container-->
            </div><!--end container-->
        </footer><!--end footer-->
        <!-- Footer End -->

        <!-- Offcanvas Start -->
        <div class="offcanvas offcanvas-end bg-white shadow" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header p-4 border-bottom">
                <h5 id="offcanvasRightLabel" class="mb-0">
                    <img src="images/logo-dark.png" height="24" class="light-version" alt="">
                    <img src="images/logo-light.png" height="24" class="dark-version" alt="">
                </h5>
                <button type="button" class="btn-close d-flex align-items-center text-dark" data-bs-dismiss="offcanvas" aria-label="Close"><i class="uil uil-times fs-4"></i></button>
            </div>
            <div class="offcanvas-body p-4">
                <div class="row">
                    <div class="col-12">
                        <img src="images/contact.svg" class="img-fluid d-block mx-auto" style="max-width: 256px;" alt="">
                        <div class="card border-0 mt-5" style="z-index: 1">
                            <div class="card-body p-0">
                                <form method="post" name="myForm" onsubmit="return validateForm()">
                                    <p id="error-msg" class="mb-0"></p>
                                    <div id="simple-msg"></div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Your Name <span class="text-danger">*</span></label>
                                                <div class="form-icon position-relative">
                                                    <i data-feather="user" class="fea icon-sm icons"></i>
                                                    <input name="name" id="name" type="text" class="form-control ps-5" placeholder="Name :">
                                                </div>
                                            </div>
                                        </div>
    
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Your Email <span class="text-danger">*</span></label>
                                                <div class="form-icon position-relative">
                                                    <i data-feather="mail" class="fea icon-sm icons"></i>
                                                    <input name="email" id="email" type="email" class="form-control ps-5" placeholder="Email :">
                                                </div>
                                            </div> 
                                        </div><!--end col-->
    
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Subject</label>
                                                <div class="form-icon position-relative">
                                                    <i data-feather="book" class="fea icon-sm icons"></i>
                                                    <input name="subject" id="subject" class="form-control ps-5" placeholder="subject :">
                                                </div>
                                            </div>
                                        </div><!--end col-->
    
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Comments <span class="text-danger">*</span></label>
                                                <div class="form-icon position-relative">
                                                    <i data-feather="message-circle" class="fea icon-sm icons clearfix"></i>
                                                    <textarea name="comments" id="comments" rows="4" class="form-control ps-5" placeholder="Message :"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" id="submit" name="send" class="btn btn-primary">Send Message</button>
                                            </div>
                                        </div><!--end col-->
                                    </div><!--end row-->
                                </form>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div>

            <div class="offcanvas-footer p-4 border-top text-center">
                <ul class="list-unstyled social-icon social mb-0">
                    <li class="list-inline-item mb-0"><a href="https://1.envato.market/4n73n" target="_blank" class="rounded"><i class="uil uil-shopping-cart align-middle" title="Buy Now"></i></a></li>
                    <li class="list-inline-item mb-0"><a href="https://dribbble.com/shreethemes" target="_blank" class="rounded"><i class="uil uil-dribbble align-middle" title="dribbble"></i></a></li>
                    <li class="list-inline-item mb-0"><a href="https://www.facebook.com/shreethemes" target="_blank" class="rounded"><i class="uil uil-facebook-f align-middle" title="facebook"></i></a></li>
                    <li class="list-inline-item mb-0"><a href="https://www.instagram.com/shreethemes/" target="_blank" class="rounded"><i class="uil uil-instagram align-middle" title="instagram"></i></a></li>
                    <li class="list-inline-item mb-0"><a href="https://twitter.com/shreethemes" target="_blank" class="rounded"><i class="uil uil-twitter align-middle" title="twitter"></i></a></li>
                    <li class="list-inline-item mb-0"><a href="mailto:support@shreethemes.in" class="rounded"><i class="uil uil-envelope align-middle" title="email"></i></a></li>
                    <li class="list-inline-item mb-0"><a href="https://shreethemes.in" target="_blank" class="rounded"><i class="uil uil-globe align-middle" title="website"></i></a></li>
                </ul><!--end icon-->
            </div>
        </div>
        <!-- Offcanvas End -->

        <!-- Offcanvas Start -->
        <div class="offcanvas bg-white offcanvas-top" tabindex="-1" id="offcanvasTop">
            <div class="offcanvas-body d-flex align-items-center align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="text-center">
                                <h4>Search now.....</h4>
                                <div class="subcribe-form mt-4">
                                    <form>
                                        <div class="mb-0">
                                            <input type="text" id="help" name="name" class="border bg-white rounded-pill" required="" placeholder="Search">
                                            <button type="submit" class="btn btn-pills btn-primary">Search</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end container-->
            </div>
        </div>
        <!-- Offcanvas End -->

        <!-- Back to top -->
        <a href="#" onclick="topFunction()" id="back-to-top" class="back-to-top fs-5"><i data-feather="arrow-up" class="fea icon-sm icons align-middle"></i></a>
        <!-- Back to top -->

        <!-- javascript -->
        <script src="js/bootstrap.bundle.min.js"></script>
        <!-- Tiny slider -->
        <script src="js/tiny-slider.js"></script>
        <!-- Tobii -->
        <script src="js/tobii.min.js"></script>
        <!-- Icons -->
        <script src="js/feather.min.js"></script>
        <!-- Main Js -->
        <script src="js/plugins.init.js"></script><!--Note: All init js like tiny slider, counter, countdown, maintenance, lightbox, gallery, swiper slider, aos animation etc.-->
        <script src="js/app.js"></script><!--Note: All important javascript like page loader, menu, sticky menu, menu-toggler, one page menu etc. -->
    </body>
</html>