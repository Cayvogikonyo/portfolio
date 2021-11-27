@extends('layouts.landrick')


@section('title')
    {{ "Work Portofolio" }}
@endsection


@section('content')
<!-- Hero Start -->
<section class="bg-half-170 bg-light d-table w-100">
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-lg-12 text-center">
                <div class="pages-heading">
                    <h4 class="title mb-0"> My Projects </h4>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->

        <div class="position-breadcrumb">
            <nav aria-label="breadcrumb" class="d-inline-block">
                <ul class="breadcrumb bg-white rounded shadow mb-0 px-4 py-2">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Works</li>
                </ul>
            </nav>
        </div>
    </div>
    <!--end container-->
</section>
<!--end section-->
<div class="position-relative">
    <div class="shape overflow-hidden text-white">
        <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
        </svg>
    </div>
</div>
<!-- Hero End -->

<!-- Start -->
<section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 mb-4 filters-group-wrap">
                <div class="filters-group">
                    <ul class="container-filter list-inline mb-0 filter-options text-center">
                        <li class="list-inline-item categories-name border text-dark rounded active" data-group="all">All</li>
                        @foreach($categories as $category)
                        <li class="list-inline-item categories-name border text-dark rounded" data-group="{{strtolower($category->slug)}}">{{$category->name}}</li>
                        @endforeach
                        <li class="list-inline-item categories-name border text-dark rounded" data-group="uncategorized">Uncategorized</li>
                    </ul>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->

        <div id="grid" class="row">
            @foreach($works as $work)
                <div class="col-lg-4 col-md-6 col-12 spacing picture-item" data-groups='["{{$work->category ? strtolower($work->category->slug) : 'uncategorized'}}"]'>
                    <div class="card border-0 work-container work-modern position-relative d-block overflow-hidden rounded">
                        <div class="card-body p-0">
                            <a href="{{route('view-work', $work->slug)}}">
                                <img src="{{ !empty($work->header) ? $work->header : asset('randoms/'.$work->randomHeader())}}" class="img-fluid" alt="work-image">
                            
                            <div class="overlay-work bg-dark"></div>
                            </a>
                            <div class="content">
                                <h5 class="mb-0"><a href="{{route('view-work', $work->slug)}}" class="text-white title">{{$work->title}}</a></h5>
                                <h6 class="text-light tag mb-0">{{$work->role}}</h6>
                            </div>
                            <div class="icons text-center">
                                <a href="{{ !empty($work->header) ? $work->header : asset('randoms/'.$work->randomHeader())}}" class="text-primary work-icon bg-white d-inline-block rounded-pill lightbox"><i data-feather="camera" class="fea icon-sm image-icon"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <!--end col-->

            <!-- <div class="col-lg-4 col-md-6 col-12 spacing picture-item" data-groups='["designing"]'>
                <div class="card border-0 work-container work-modern position-relative d-block overflow-hidden rounded">
                    <div class="card-body p-0">
                        <img src="images/work/21.jpg" class="img-fluid" alt="work-image">
                        <div class="overlay-work bg-dark"></div>
                        <div class="content">
                            <h5 class="mb-0"><a href="portfolio-detail-one.html" class="text-white title">Mockup Collection</a></h5>
                            <h6 class="text-light tag mb-0">Mockup</h6>
                        </div>
                        <div class="icons text-center">
                            <a href="images/work/21.jpg" class="text-primary work-icon bg-white d-inline-block rounded-pill lightbox"><i data-feather="camera" class="fea icon-sm image-icon"></i></a>
                        </div>
                    </div>
                </div>
            </div> -->
       
        </div>
        <!--end row-->

        <!-- PAGINATION START -->
        <!-- <div class="row">
            <div class="col-12 mt-4 pt-2">
                <ul class="pagination justify-content-center mb-0">
                    <li class="page-item"><a class="page-link" href="javascript:void(0)" aria-label="Previous">Prev</a></li>
                    <li class="page-item active"><a class="page-link" href="javascript:void(0)">1</a></li>
                    <li class="page-item"><a class="page-link" href="javascript:void(0)">2</a></li>
                    <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
                    <li class="page-item"><a class="page-link" href="javascript:void(0)" aria-label="Next">Next</a></li>
                </ul>
            </div>
        </div> -->
        <!--end row-->
        <!-- PAGINATION END -->
    </div>
    <!--end container-->
</section>
<!--end section-->
<!-- End -->
<script src="js/shuffle.min.js"></script>

@endsection