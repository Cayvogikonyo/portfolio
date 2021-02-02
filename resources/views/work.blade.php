@extends('layouts.applayout')

@section('content')

    <div id="content" class="w-full md:11/12 mx-auto py-6">
        <div class="flex flex-wrap">
            <div class="w-full md:w-5/6 mx-auto md:px-6 text-justify px-4">
                <a href="{{url('/work', $work->slug)}}" class="transition duration-500 ease-in-out transform hover:-translate-y-1"><h2 class="font-bold text-2xl underlined my-4">{{$work->title}}</h2></a>

                <img src="<?php if(!empty($work->header)){ echo $work->header; } else echo '/randoms/'.$work->randomHeader();  ?>" class="w-full opacity-100 my-6 mx-auto transition duration-500 ease-in-out hover:opacity-80 rounded-lg shadow-lg" alt="{{$work->header_alt}}">

                <div >
                    {!! $work->description !!}
                </div>
                @if($work->skills)
                    <div>
                        <h4>Skills</h4>
                        <ul class="flex flex-wrap my-2">
                            @foreach($work->skills as $skill)
                                <li class="px-2 mx-2 p-1 bg-blue-100 rounded-lg">{{$category->name}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(!empty($work->url))
                    <a href="{{$work->url}}" target="_blank" class="mt-6 text-lg text-green-400 dark:text-green-400 font-bold px-3 p-1 transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110">
                        <i class="fas fa-angle-double-right"></i> Visit Project
                    </a>
                @endif
            </div>
            <div class="w-full md:w-1/6">
                <div class="sticky top-0 py-2">
                    @if(!empty($work->url))
                        <a href="{{$work->url}}" target="_blank" class="text-lg text-green-400 dark:text-green-400 font-bold px-3 p-1 transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110">
                            <i class="fas fa-angle-double-right"></i> Visit Project
                        </a>
                    @endif
                    <a href="{{url('/work-portofolio')}}" class="transition duration-500 ease-in-out transform hover:-translate-y-1">
                        <h3 class="w-full bg-black text-white font-bold p-2 my-2">Other Projects</h3>
                    </a>    
                    <div class="w-full">
                        @foreach($works as $key => $work)
                            <div class="relative rounded-lg shadow-lg my-4 transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                                <a href="{{url('/work/'.$work->slug)}}">
                                    <img src="<?php if(!empty($work->header)){ echo $work->header; } else echo '/randoms/'.$work->randomHeader();  ?>" class="mx-auto opacity-100 h-40 rounded-lg transition duration-500 ease-in-out hover:opacity-50 object-cover" alt="{{$work->header_alt}}">
                                </a>
                                <div class="absolute shadow inset-0 py-4 px-2 rounded-lg flex flex-wrap justify-center items-center flex-col mx-auto opacity-100 md:opacity-0 hover:bg-white bg-opacity-100 transition duration-500 ease-in-out hover:bg-opacity-75 hover:opacity-100">
                                        <div class="text-black z-10">
                                            <a href="{{url('/work/'.$work->slug)}}" class="transition duration-500 ease-in-out transform hover:-translate-y-1"><h2 class="font-bold text-2xl underlined relative checked">{{$work->title}}</h2></a>
                                        </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                
            </div>
        </div>

    </div>


@endsection