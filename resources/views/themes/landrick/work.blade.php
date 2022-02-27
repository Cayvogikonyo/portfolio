@extends('layouts.landrick')

@section('image')
{{ $image }}
@endsection

@section('description')
{{ $description }}
@endsection

@section('title')
{{ $title }}
@endsection


@section('content')
<div>
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

    <!-- Hero Start -->
    <section class="bg-half-170 bg-light d-table w-100">
        <div class="container">
            <div class="row mt-5 justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="pages-heading">
                        <h4 class="title"> {{$work->title}} </h4>
                        <ul class="list-unstyled mt-4 mb-0">
                            @if($work->client)
                            <li class="list-inline-item h6 user text-muted me-2"> <span class="text-dark">Client :</span> {{$work->client->name}}</li>
                            @endif
                            @if($work->portfolio)
                            <li class="list-inline-item h6 user text-muted me-2"> <span class="text-dark">{{$work->role}} :</span> {{$work->portfolio->name}} </li>
                            @endif
                            <li class="list-inline-item h6 date text-muted"> <span class="text-dark">Date :</span> {{date('d M, Y', strtotime($work->created_at))}}</li>
                        </ul>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->

            <div class="position-breadcrumb">
                <nav aria-label="breadcrumb" class="d-inline-block">
                    <ul class="breadcrumb bg-white rounded shadow mb-0 px-4 py-2">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('work-portfolio')}}">Works</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Work Detail</li>
                    </ul>
                </nav>
            </div>
        </div>
        <!--end container-->
    </section>
    <!--end section-->
    <!-- Hero End -->

    <!-- Shape Start -->
    <div class="position-relative">
        <div class="shape overflow-hidden text-white">
            <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
            </svg>
        </div>
    </div>
    <!--Shape End-->

    <!-- Start Work Detail -->
    <section class="section">
        <div class="container">
            <div class="row ">
                <!-- WORK START -->
                <div class="row col-md-9 mx-auto">
                    <div class="col-lg-5 col-md-6">
                        <div class="port-images sticky-sidebar">
                            <img src="{{ !empty($work->header) ? $work->header : asset('randoms/'.$work->randomHeader())}}" class="w-100 opacity-100 bg-white  transition duration-500 ease-in-out hover:opacity-80 rounded-lg shadow-lg" alt="{{$work->header_alt}}" class="img-fluid mx-auto d-block rounded">

                        </div>
                    </div>
                    <!--end col-->

                    <div class="col-lg-5 mx-auto mt-4 pt-2">
                        <div class="card work-details rounded bg-light border-0">
                            <div class="card-body">
                                <h5 class="card-title border-bottom pb-3 mb-3">Project Info :</h5>
                                <dl class="row mb-0">
                                    @if($work->client)
                                    <dt class="col-md-4 col-5">Client :</dt>
                                    <dd class="col-md-8 col-7 text-muted">{{$work->client->name}}</dd>
                                    @endif
                                    @if($work->category)

                                    <dt class="col-md-4 col-5">Category :</dt>
                                    <dd class="col-md-8 col-7 text-muted">{{$work->category->name}}</dd>
                                    @endif
                                    <dt class="col-md-4 col-5">Date :</dt>
                                    <dd class="col-md-8 col-7 text-muted">{{date('d M, Y', strtotime($work->created_at))}}</dd>

                                    <dt class="col-md-4 col-5">Website :</dt>
                                    <dd class="col-md-8 col-7 text-muted">{{$work->url}}</dd>


                                </dl>
                            </div>
                        </div>
                    </div>
                <!--end col-->
                </div>

            </div>
            <div class="row">

                <div class="col-lg-8 col-md-6 mt-4 mt-sm-0 pt-2 pt-sm-0 mx-auto">
                    <div class="sticky-bar">
                        <div class="row ms-lg-4">
                            <div class="col-lg-12">
                                <div class="work-details">
                                    <p class="text-muted">{!! $work->description !!}</p>
                                </div>
                            </div>
                            <!--end col-->


                        </div>
                        <!--end row-->
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->


        </div>
        <!--end container-->
        <hr>
        <div class="container mt-100 mt-60">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <div class="section-title mb-4 pb-2">
                        <h4 class="title mb-3">Other Projects. </h4>
                        <p class="text-muted mx-auto para-desc mb-0">I'm a Web Designer & Developer and I enjoy crafting great works.</p>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->

            <div class="row">
                @foreach($works as $item)
                <div class="col-lg-4 col-md-6 mt-4 pt-2">
                    <div class="card blog rounded border-0 shadow overflow-hidden">
                        <div class="position-relative">
                            <img src="{{ !empty($item->header) ? $item->header : asset('randoms/'.$item->randomHeader())}}" class="card-img-top" alt="...">
                            <div class="overlay rounded-top bg-dark"></div>
                        </div>
                        <div class="card-body content">
                            <h5><a href="javascript:void(0)" class="card-title title text-dark">{{$item->title}}</a></h5>
                            <div class="post-meta d-flex justify-content-between mt-3">

                                <a href="{{route('view-work', $item->slug)}}" class="text-muted readmore">Read More <i class="uil uil-angle-right-b align-middle"></i></a>
                            </div>
                        </div>
                        <div class="author">
                            <small class="text-light user d-block"><i class="uil uil-user"></i>{{$item->user->name}}</small>
                            <small class="text-light date"><i class="uil uil-calendar-alt"></i> {{date('d M, Y', strtotime($item->created_at))}}</small>
                        </div>
                    </div>
                </div>
                <!--end col-->
                @endforeach

            </div>
            <!--end row-->
            <div class="row">
                <!-- PAGINATION START -->
                <!-- <div class="col-12 mt-4 pt-2">
                        <ul class="pagination justify-content-center mb-0">
                            <li class="page-item"><a class="page-link" href="javascript:void(0)" aria-label="Previous">Prev</a></li>
                            
                            <li class="page-item active"><a class="page-link" href="javascript:void(0)">1</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0)">2</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0)" aria-label="Next">Next</a></li>
                        </ul>
                    </div> -->
                <!--end col-->
                <!-- PAGINATION END -->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </section>
    <!--end section-->
    <!-- End Work Detail -->


</div>

@endsection