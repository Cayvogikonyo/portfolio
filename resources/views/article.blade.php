@extends('layouts.applayout')

@section('content')

    <div id="content" class="w-5/6 mx-auto py-6">
        <div>
            <i class="fa fa-angle-double-right mx-2 text-red-600"></i>
            <a href="{{url('/blog')}}" title="Go to blogs">blog</a>
            @if(sizeof($post->categories)>0)
                <i class="fa fa-angle-double-right mx-2 text-red-600"></i>
                <a href="url('/blog')" title="Visit category">{{$post->categories[0]->name}}</a>
            @endif
        </div>
        <div class="flex">
            <div class="w-full md:w-3/4 mx-auto text-justify">
                <a href="{{url('/articles', $post->slug)}}" class="transition duration-500 ease-in-out transform hover:-translate-y-1"><h2 class="font-bold text-4xl underlined my-4">{{$post->title}}</h2></a>
                <img src="{{$post->header}}" class="w-full my-3 mx-auto transition duration-500 ease-in-out hover:opacity-100" alt="{{$post->header_alt}}">
                <div >
                    {!! $post->body !!}
                </div>
            </div>
            <div class="md:w-1/4 mx-auto">
                <div class="sticky pl-4 top-0">
                    <h4 class="bg-black p-2 text-white font-bold px-2 p-1">People also read:</h4>
                    <h4 class="bg-black p-2 text-white font-bold px-2 p-1">Explore Tags:</h4>
                    <ul class="flex flex-wrap my-2">
                        @foreach($post->categories as $category)
                            <li class="px-2 mx-2 p-1 bg-blue-100 rounded-lg">{{$category->name}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

    </div>


@endsection