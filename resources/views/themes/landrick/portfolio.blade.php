@extends('layouts.landrick')

@section('content')
<!-- Hero Start -->
<section class="bg-home rtl-personal-hero bg-light d-flex align-items-center " style="background:url('images/personal/bg01.png') center center" id="home">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 col-md-9">
                <div class="title-heading mt-4">
                    <h1 class="display-3 fw-bold mb-3">Hi. I'm <br> <span class="text-primary typewrite" data-period="2000" data-type='[ "{{$portfolio->name}}", "{{$portfolio->title}}" ]'> <span class="wrap"></span> </span> </h1>
                    <p class="para-desc text-muted">
                        {{$portfolio->slogan}}
                    </p>
                    <div class="mt-4 pt-2">
                        <a href="#portfolio" class="btn btn-primary mt-2 me-2"><i class="uil uil-camera"></i> View Works</a>
                        <a href="#contact" class="btn btn-outline-primary mt-2"><i class="uil uil-cloud-download"></i> Hire Me</a>
                    </div>


                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
    <!--end container-->
</section>
<!--end section-->
<!-- Hero End -->

<!-- About Start -->
<section class="section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="section-title">
                    <h4 class="title">About Me</h4>
                    <h6 class="text-primary mb-4">I'm Passionate {{$portfolio->title}}</h6>
                    <p class="text-muted mb-0">{{$portfolio->bio}}</p>
                    <div class="mt-4">
                        <a href="#contact" class="btn btn-primary"><i class="uil uil-phone"></i> Contact Me</a>
                    </div>
                </div>
            </div>
            <!--end col-->
            @if(sizeof($portfolio->skills) > 0)

            <div class="col-md-6 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <div class="ms-md-4">
                    @foreach($portfolio->skills as $skill)
                    <div class="progress-box mt-4">
                        <h6 class="title text-muted">{{$skill->title}}</h6>
                        <div class="progress">
                            <div class="progress-bar position-relative bg-primary" style="width:<?php echo $skill->percentage . '%'; ?>">
                                <div class="progress-value d-block text-muted h6"> {{$skill->percentage}}%</div>
                            </div>
                            
                        </div>
                        <div id="tooltip{{$skill->id}}" class="d-none w-3/4 skillcontent rounded-lg bg-gray-900 dark:bg-indigo-900 justify-center md:w-1/4 absolute popper text-white justify-center px-2 py-3 rounded z-20 relative" role="tooltip">

                                <p>
                                    {{$skill->description}}
                                </p>
                                @if(!empty($skill->verifier_title))
                                Obtained from <a href="{{$skill->verifier_url}}">{{$skill->verifier_title}}</a>
                                @endif
                                @if(!empty($skill->url))
                                <a href="{{$skill->url}}">Learn more</a>
                                @endif
                                <div class="arrow absolute h-4 w-4 text-yellow-600 arrow-light dark:arrow-dark" data-popper-arrow></div>
                            </div>
                    </div>
                    <!--end process box-->
                    @endforeach

                </div>
            </div>
            <!--end col-->
            @endif
        </div>
        <!--end row-->
    </div>
    <!--end container-->

    <div class="container mt-100 mt-60" id="portfolio">
        <div class="row">
            <div class="col-12">
                <div class="section-title mb-4 pb-2">
                    <h4 class="title mb-4">My Work & Portfolio</h4>
                    <p class="text-muted para-desc mb-0">Let's get started on your next project. <span class="text-primary fw-bold"> <a href="#contact"><i class="uil uil-phone"></i> Contact Me</a></span> below.</p>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
        @if(sizeof($works) > 0)

        <div class="row">
            @foreach($works as $work)
            <div class="col-lg-4 col-md-6 mt-4 pt-2">
                <div class="card border-0 work-container work-modern position-relative d-block overflow-hidden rounded">
                    <div class="portfolio-box-img position-relative overflow-hidden">
                        <img class="item-container img-fluid mx-auto" src="{{url(!empty($work->header) ? $work->header : 'randoms/'.$work->randomHeader())}}" alt="1" />
                        <div class="overlay-work bg-dark"></div>
                        <div class="content">
                            <h5 class="mb-0"><a href="portfolio-detail-one.html" class="text-white title">{{$work->title}}</a></h5>
                            <h6 class="text-light tag mb-0">Branding</h6>
                        </div>
                        <div class="icons text-center">
                            <a href="{{$work->header}}" class="text-primary work-icon bg-white d-inline-block rounded-pill lightbox"><i data-feather="camera" class="fea icon-sm image-icon"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach


        </div>
        @else
        <div>
            <p>No works added.</p>
        </div>
        @endif
        <!--end row-->

        <div class="row">
            <div class="col-12 mt-4 pt-2">
                <a href="{{route('work-portfolio')}}" class="btn btn-outline-primary">See More <i class="uil uil-angle-right-b"></i></a>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
    <!--end container-->

 
</section>
<!--end section-->
<!-- About End -->

<!-- Testi Start -->
<!-- <section class="section" style="background: url('images/personal/bg02.jpg') center center;">
    <div class="bg-overlay"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 text-center">
                <div class="tiny-single-item">
                    <div class="tiny-slide">
                        <div class="client-testi text-center">
                            <p class="text-light para-dark h6 fst-italic">" It seems that only fragments of the original text remain in the Lorem Ipsum texts used today. The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated in the 16th century. "</p>
                            <ul class="list-unstyled mb-0 mt-3">
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                            </ul>
                            <h6 class="text-light title-dark"> Thomas Israel </h6>
                            <img src="images/client/01.jpg" class="img-fluid avatar avatar-small mt-3 rounded-circle mx-auto shadow" alt="">
                        </div>
                    </div>

                    <div class="tiny-slide">
                        <div class="client-testi text-center">
                            <p class="text-light para-dark h6 fst-italic">" The advantage of its Latin origin and the relative meaninglessness of Lorum Ipsum is that the text does not attract attention to itself or distract the viewer's attention from the layout. "</p>
                            <ul class="list-unstyled mb-0 mt-3">
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                            </ul>
                            <h6 class="text-light title-dark"> Carl Oliver </h6>
                            <img src="images/client/02.jpg" class="img-fluid avatar avatar-small mt-3 rounded-circle mx-auto shadow" alt="">
                        </div>
                    </div>

                    <div class="tiny-slide">
                        <div class="client-testi text-center">
                            <p class="text-light para-dark h6 fst-italic">" There is now an abundance of readable dummy texts. These are usually used when a text is required purely to fill a space. These alternatives to the classic Lorem Ipsum texts are often amusing and tell short, funny or nonsensical stories. "</p>
                            <ul class="list-unstyled mb-0 mt-3">
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                            </ul>
                            <h6 class="text-light title-dark"> Barbara McIntosh </h6>
                            <img src="images/client/03.jpg" class="img-fluid avatar avatar-small mt-3 rounded-circle mx-auto shadow" alt="">
                        </div>
                    </div>

                    <div class="tiny-slide">
                        <div class="client-testi text-center">
                            <p class="text-light para-dark h6 fst-italic">" According to most sources, Lorum Ipsum can be traced back to a text composed by Cicero in 45 BC. Allegedly, a Latin scholar established the origin of the text by compiling all the instances of the unusual word 'consectetur' he could find "</p>
                            <ul class="list-unstyled mb-0 mt-3">
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                            </ul>
                            <h6 class="text-light title-dark"> Christa Smith </h6>
                            <img src="images/client/04.jpg" class="img-fluid avatar avatar-small mt-3 rounded-circle mx-auto shadow" alt="">
                        </div>
                    </div>

                   
                </div>
            </div>
        </div>
    </div>
</section> -->
<!--end section-->
<!-- Testi End -->

<!-- Client start -->
<!-- <section class="py-4 border-bottom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-2 col-md-2 col-6 text-center py-4">
                    <img src="images/client/amazon.svg" class="avatar avatar-ex-sm" alt="">
                </div>

                <div class="col-lg-2 col-md-2 col-6 text-center py-4">
                    <img src="images/client/google.svg" class="avatar avatar-ex-sm" alt="">
                </div>

                <div class="col-lg-2 col-md-2 col-6 text-center py-4">
                    <img src="images/client/lenovo.svg" class="avatar avatar-ex-sm" alt="">
                </div>

                <div class="col-lg-2 col-md-2 col-6 text-center py-4">
                    <img src="images/client/paypal.svg" class="avatar avatar-ex-sm" alt="">
                </div>

                <div class="col-lg-2 col-md-2 col-6 text-center py-4">
                    <img src="images/client/shopify.svg" class="avatar avatar-ex-sm" alt="">
                </div>

                <div class="col-lg-2 col-md-2 col-6 text-center py-4">
                    <img src="images/client/spotify.svg" class="avatar avatar-ex-sm" alt="">
                </div>
            </div>
        </div>
    </section> -->
<!--end section-->
<!-- Client End -->

<!-- Blog Start -->
<section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="section-title mb-4 pb-2">
                    <h4 class="title mb-4">Latest Blogs</h4>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->

        <div class="row">

            @foreach($blogs as $blog)
            <div class="col-lg-4 col-md-6 mt-4 pt-2">
                <div class="card blog rounded border-0 shadow">
                    <div class="position-relative">
                        <img src="{{$blog->header}}" class="card-img-top rounded-top" alt="...">
                        <div class="overlay rounded-top bg-dark"></div>
                    </div>
                    <div class="card-body content">
                        <h5><a href="javascript:void(0)" class="card-title title text-dark">{{$blog->title}}</a></h5>
                        <div class="post-meta d-flex justify-content-between mt-3">

                            <a href="{{route('articles', $blog->slug)}}" class="text-muted readmore">Read More <i class="uil uil-angle-right-b align-middle"></i></a>
                        </div>
                    </div>
                    <div class="author">
                        <small class="text-light user d-block"><i class="uil uil-user"></i> Calvin Carlo</small>
                        <small class="text-light date"><i class="uil uil-calendar-alt"></i> 25th June 2021</small>
                    </div>
                </div>
            </div>
            @endforeach


            <!--end col-->



            <div class="col-12 mt-4 pt-2">
                <a href="{{url('blog')}}" class="btn btn-primary">See More <i class="uil uil-angle-right-b"></i></a>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
    <!--end container-->

    <div class="container mt-4" id="contact">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="section-title mb-4 pb-2">
                    <h4 class="title mb-4">Contact Me</h4>
                    <p class="text-muted para-desc mb-0">Let's get talking.</p>
                </div>
            </div>


            <!--end col-->
        </div>
        <!--end row-->

        <div class="row">
            <div class="col-lg-4 col-md-6 mt-4 pt-2">
                <div class="card rounded shadow border-0">
                    <div class="card-body">
                        <h4 class="card-title">Get In Touch !</h4>

                        <div class="custom-form mt-3">
                            <form method="post" name="myForm" onsubmit="return validateForm()">
                                <p id="error-msg" class="mb-0"></p>
                                <div id="simple-msg"></div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Your Name <span class="text-danger">*</span></label>
                                            <div class="form-icon position-relative">
                                                <i data-feather="user" class="fea icon-sm icons"></i>
                                                <input name="name" id="name" type="text" class="form-control ps-5" placeholder="Name :">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Your Email <span class="text-danger">*</span></label>
                                            <div class="form-icon position-relative">
                                                <i data-feather="mail" class="fea icon-sm icons"></i>
                                                <input name="email" id="email" type="email" class="form-control ps-5" placeholder="Email :">
                                            </div>
                                        </div>
                                    </div>
                                    <!--end col-->

                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Subject</label>
                                            <div class="form-icon position-relative">
                                                <i data-feather="book" class="fea icon-sm icons"></i>
                                                <input name="subject" id="subject" class="form-control ps-5" placeholder="subject :">
                                            </div>
                                        </div>
                                    </div>
                                    <!--end col-->

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
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </form>
                        </div>
                        <!--end custom-form-->
                    </div>
                </div>
            </div>
            <!--end col-->

            <div class="col-lg-8 col-md-6 ps-md-3 pe-md-3 mt-4">
                <div class="rounded">
                    <img src="images/login.svg" class="h-38 img-fluid d-block mx-auto" alt="" />

                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
    <!--end container-->
</section>
<!--end section-->
<!-- Blog End -->

@endsection