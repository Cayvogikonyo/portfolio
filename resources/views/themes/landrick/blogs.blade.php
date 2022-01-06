@extends('layouts.landrick')

@section('title')
{{ "Blog Posts" }}
@endsection

@section('description')
    @if(sizeof($posts) > 0)
        {{$posts[0]->excerpt}}
    @else
        {{ "Blog Posts" }}
    @endif
@endsection

@section('content')
<div id="content" class="container h-full mt-100 hidden w-full flex flex-wrap">
    <div class="row justify-content-center">
        <div class="col-12 mb-4 filters-group-wrap">
            <div class="filters-group">
                <ul class="container-filter list-inline mb-0 filter-options text-center">
                    <li class="list-inline-item"> <strong>Categories:</strong> </li>

                    @foreach($categories as $key => $item)

                    <li class="list-inline-item categories-name border text-dark rounded">{{$item->name}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <!--end col-->
    </div>
    <div class="w-full md:w-5/6 ">
        @if(!empty($category))
        <div class="w-full p-6">
            <span class="font-bold text-sm underlined">Viewing category</span>

            <h4 class="font-bold capitalize text-2xl">{{$category->name}}</h4>
        </div>
        @endif
        @if(sizeof($posts) > 0)
        @foreach($posts as $key => $post)
        <div class="col-lg-4 col-md-6 mt-4 pt-2">
            <div class="card blog rounded border-0 shadow overflow-hidden">
                <div class="position-relative">
                    <img src="{{$post->header}}" class="card-img-top" alt="...">
                    <div class="overlay rounded-top bg-dark"></div>
                </div>
                <div class="card-body content">
                    <h5><a href="{{url('/articles', $post->slug)}}" class="card-title title text-dark">{{$post->title}}</a></h5>
                    <div class="post-meta d-flex justify-content-between mt-3">

                        <a href="{{url('/articles', $post->slug)}}" class="text-muted readmore">Read More <i class="mdi mdi-chevron-right"></i></a>
                    </div>
                </div>
                <div class="author">
                    <small class="text-light user d-block"><i class="mdi mdi-account"></i> {{@$post->user->name}}</small>
                    <small class="text-light date"><i class="mdi mdi-calendar-check"></i> {{date('d M, Y', strtotime($post->created_at))}}</small>
                </div>
            </div>
        </div>

        @endforeach

        {{$posts->links()}}
        @else
        <div class="sticky top-0 flex flex-wrap flex-col items-center justify-center" v-else>
            <img src="/images/norecords.png">
            <p>No articles published.</p>
        </div>
        @endif
    </div>
    <!-- <div class="w-full md:w-1/6">
            <div class="sticky top-0 py-4">
                <h4 class="text-center font-bold">
                    @if(!empty($category)) <span>Other</span> @endif Categories
                </h4>
                <ul>
                    @foreach($categories as $key => $category)
                        <a href="{{url('/blog', $category->slug)}}">
                            <li class="shadow-sm p-3 hover:bg-gray-200">
                                <i class="fa fa-angle-double-right"></i> {{$category->name}} 
                            </li>
                        </a>
                    @endforeach
                </ul>
            </div>
        </div> -->

</div>
@endsection