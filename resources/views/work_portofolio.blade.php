@extends('layouts.applayout')

@section('content')

    <div class="w-full text-black">
        <div class="clearfix">
            <div id="content" class="md:grid md:grid-cols-3 md:gap-3">
                @foreach($works as $key => $work)
                    <div class="bg-white shadow my-6 transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                        <a href="{{url('/work/'.$work->slug)}}">
                            <img src="<?php if(!empty($work->header)){ echo '/storage/'.$work->header; } else echo '/randoms/'.$work->randomHeader();  ?>" class="mx-auto opacity-100 transition duration-500 ease-in-out hover:opacity-50" alt="{{$work->header_alt}}">
                        </a>
                        <div class=" py-4 px-2 flex flex-wrap flex-col">
                                <a href="{{url('/work/'.$work->slug)}}" class="transition duration-500 ease-in-out transform hover:-translate-y-1"><h2 class="font-bold text-4xl underlined">{{$work->title}}</h2></a>
                                <div >
                                    {!! $work->excerpt !!}
                                </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection