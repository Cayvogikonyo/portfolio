@extends('layouts.applayout')

@section('content')
    <div id="content" class="hidden w-full flex flex-wrap">
  
        <div class="w-full md:w-5/6 ">
            @if(!empty($category))
                <div class="w-full p-6">
                    <span class="font-bold text-sm underlined">Viewing category</span>

                    <h4 class="font-bold capitalize text-2xl">{{$category->name}}</h4>
                </div>
            @endif
            @if(sizeof($posts) > 0)
                @foreach($posts as $key => $post)
                    <div class="flex flex-wrap <?php if($key % 2 === 0) echo 'flex-row-reverse'; ?> my-6">
                        <a href="{{url('/articles', $post->slug)}}" class="w-full md:w-1/2 transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110">
                            <img src="/storage/{{$post->header}}" class="w-full md:w-5/6 mx-auto opacity-50 transition duration-500 ease-in-out hover:opacity-100" alt="{{$post->header_alt}}">
                        </a>
                        <div class="w-full md:w-1/2 py-4 px-2 flex flex-wrap flex-col">
                                <a href="{{url('/articles', $post->slug)}}" class="transition duration-500 ease-in-out transform hover:-translate-y-1"><h2 class="font-bold text-4xl underlined">{{$post->title}}</h2></a>
                                <div >
                                    {!! $post->excerpt !!}
                                </div>
                        </div>
                    </div>
                @endforeach

                {{$posts->links()}}
            @else
                <p class="w-full">No articles published.</p>
            @endif
        </div>
        <div class="w-full md:w-1/6">
            <div class="sticky top-0 py-4">
                <h4 class="text-center font-bold">
                    @if(!empty($category)) <span>Other</span> @endif Categories
                </h4>
                <ul>
                    @foreach($categories as $key => $category)
                        <li class="shadow-sm p-3 hover:bg-gray-200">
                            <i class="fa fa-angle-double-right"></i> {{$category->name}} 
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>
@endsection