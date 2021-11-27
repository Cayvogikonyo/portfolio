@extends('layouts.landrick')

@section('title')
    {{ $post->title }}
@endsection

@section('description')
    {{ $post->excerpt }}
@endsection



@section('content')
        <!-- Start -->
        <section class="bg-half-170 d-table w-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-7">
                        <div class="card border-0 shadow rounded overflow-hidden">
                            <img src="{{$post->header}}" class="img-fluid" alt="">

                            <div class="card-body">
                                <div class="text-center">
                                    <span class="badge bg-primary">{{@$post->categories[0]->name}}</span>
                                    <h4 class="mt-3">{{$post->title}}</h4>

                                    <ul class="list-unstyled mt-3">
                                        <li class="list-inline-item user text-muted me-2"><i class="mdi mdi-account"></i> {{@$post->user->name}}</li>
                                        <li class="list-inline-item date text-muted"><i class="mdi mdi-calendar-check"></i>{{date('jS M, Y', strtotime($post->created_at))}}</li>
                                    </ul>
                                </div>

                                <div class="text-muted">
                                    {!! $post->body !!}
                                </div>
                                
                            </div>
                        </div>

      
                        @if(!empty($prev) || !empty($next))

                        <div class="card shadow rounded border-0 mt-4">
                            <div class="card-body">

                                <h5 class="card-title mb-0">Related Posts :</h5>
                                <div class="row">
                                    @if(!empty($prev))
                                    <div class="col-lg-6 mt-4 pt-2">
                                        <div class="card blog rounded border-0 shadow">
                                            <div class="position-relative">
                                                <img src="images/blog/01.jpg" class="card-img-top rounded-top" alt="...">
                                            <div class="overlay rounded-top bg-dark"></div>
                                            </div>
                                            <div class="card-body content">
                                                <h5><a href="javascript:void(0)" class="card-title title text-dark">{{$prev->title}}</a></h5>
                                                <div class="post-meta d-flex justify-content-between mt-3">
                                                  
                                                    <a href="{{url('/articles', $prev->slug)}}" class="text-muted readmore">Read More <i class="uil uil-angle-right-b align-middle"></i></a>
                                                </div>
                                            </div>
                                            <div class="author">
                                                <small class="text-light user d-block"><i class="uil uil-user"></i> {{@$prev->user->name}}</small>
                                                <small class="text-light date"><i class="uil uil-calendar-alt"></i>{{date('jS M, Y', strtotime($prev->created_at))}}</small>
                                            </div>
                                        </div>
                                    </div><!--end col-->
                                    @endif
                                    @if(!empty($next))
                                    <div class="col-lg-6 mt-4 pt-2">
                                        <div class="card blog rounded border-0 shadow">
                                            <div class="position-relative">
                                                <img src="images/blog/01.jpg" class="card-img-top rounded-top" alt="...">
                                            <div class="overlay rounded-top bg-dark"></div>
                                            </div>
                                            <div class="card-body content">
                                                <h5><a href="javascript:void(0)" class="card-title title text-dark">{{$next->title}}</a></h5>
                                                <div class="post-meta d-flex justify-content-between mt-3">
                                                  
                                                    <a href="{{url('/articles', $next->slug)}}" class="text-muted readmore">Read More <i class="uil uil-angle-right-b align-middle"></i></a>
                                                </div>
                                            </div>
                                            <div class="author">
                                                <small class="text-light user d-block"><i class="uil uil-user"></i> {{@$next->user->name}}</small>
                                                <small class="text-light date"><i class="uil uil-calendar-alt"></i>{{date('jS M, Y', strtotime($next->created_at))}}</small>
                                            </div>
                                        </div>
                                    </div><!--end col-->
                                    @endif
                                   
                                </div><!--end row-->
                            </div>
                        </div>
                        @endif

                        <div class="d-flex align-items-center justify-content-between mt-5">
                            @if(!empty($prev))
                            <a href="{{url('articles', $prev->slug)}}" class="bg-soft-primary px-2 rounded"><i class="uil uil-arrow-left h5 mb-0 align-middle"></i> Prev </a>
                            @endif
                            <a href="{{route('blog')}}" class="btn btn-pills btn-icon btn-soft-primary"><i data-feather="home" class="icons"></i></a>
                            @if(!empty($next))
                            <a href="{{url('articles', $next->slug)}}" class="bg-soft-primary px-2 rounded"> Next <i class="uil uil-arrow-right h5 mb-0 align-middle"></i></a>
                            @endif
                        </div>
                    </div><!--end col-->

                    <!-- START SIDEBAR -->
                    <div class="col-lg-4 col-md-5 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                        <div class="card border-0 sidebar sticky-bar ms-lg-4">
                            <div class="card-body p-0">
                                <!-- Author -->
                                <div class="text-center">
                                    <span class="bg-soft-dark d-block py-2 rounded shadow text-center h6 mb-0 text-muted">
                                        Author
                                    </span>

                                    <div class="mt-4">
                                        <img src="{{@$post->user->avatar}}" class="img-fluid avatar avatar-medium rounded-pill shadow-md d-block mx-auto" alt="">

                                        <a href="blog-about.html" class="text-primary h5 mt-4 mb-0 d-block">{{@$post->user->name}}</a>
                                        <small class="text-muted d-block">
                                            
                                        </small>
                                    </div>
                                </div>
                                <!-- Author -->
    
                                @if(sizeof($articleCategories) > 0)

                                    <!-- TAG CLOUDS -->
                                    <div class="widget mt-4">
                                        <span class="bg-soft-dark d-block py-2 rounded shadow text-center h6 mb-0 text-muted">
                                            Tagclouds
                                        </span>
                                        
                                        <div class="tagcloud text-center mt-4">
                                            @foreach($articleCategories as $category)
                                                <a href="javascript:void(0)" class="rounded">{{$category->name}}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                    <!-- TAG CLOUDS -->
                                @endif
                                
                                <!-- SOCIAL -->
                                <!-- <div class="widget mt-4">
                                    <span class="bg-soft-dark d-block py-2 rounded shadow text-center h6 mb-0 text-muted">
                                        Social Media
                                    </span>

                                    <ul class="list-unstyled social-icon text-center mb-0 mt-4">
                                        <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="facebook" class="fea icon-sm fea-social"></i></a></li>
                                        <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="instagram" class="fea icon-sm fea-social"></i></a></li>
                                        <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="twitter" class="fea icon-sm fea-social"></i></a></li>
                                        <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="linkedin" class="fea icon-sm fea-social"></i></a></li>
                                        <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="github" class="fea icon-sm fea-social"></i></a></li>
                                        <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="youtube" class="fea icon-sm fea-social"></i></a></li>
                                        <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="gitlab" class="fea icon-sm fea-social"></i></a></li>
                                    </ul>
                                </div> -->
                                <!-- SOCIAL -->
                            </div>
                        </div>
                    </div><!--end col-->
                    <!-- END SIDEBAR -->
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->
        <!-- End -->



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

   @endsection