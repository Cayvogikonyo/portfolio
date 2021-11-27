@extends('layouts.applayout')


@section('title')
{{ "Work Portofolio" }}
@endsection


@section('content')

    <div class="w-full text-black">
        <div class="clearfix">
            <div id="content" class="md:grid md:grid-cols-3 md:gap-3">
                @foreach($works as $key => $work)
                    <div data-uid="{{$work->id}}" class="my-6 px-3 pop-prop work-container transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                        <div class="rounded relative">
                            <a href="{{url('/work/'.$work->slug)}}">
                                <div class="mx-auto h-40 bg-cover bg-center bg-white opacity-100 transition duration-500 ease-in-out hover:opacity-50 rounded" style="background-image:url(<?php if(!empty($work->header)){ echo "'".$work->header."'"; } else { echo "'" .'/randoms/'.$work->randomHeader()."'"; } ?>)" alt="{{$work->header_alt}}">
                                </div>
                            </a>
                            <div class="bg-white -mt-4 relative shadow-lg py-4 px-2 flex flex-wrap z-10 flex-col rounded">
                                    <a href="{{url('/work/'.$work->slug)}}" class="transition duration-500 ease-in-out transform hover:-translate-y-1">
                                        <h2 class="font-bold text-2xl underlined">{{$work->title}}</h2>
                                        <h5 class="font-bold text-sm mt-3">{{$work->role}}</h5>
                                    </a>
                                    <!-- <div >
                                        {!! $work->excerpt !!}
                                    </div> -->
                            </div>
                        </div>
                    </div>
                    <div id="tooltip{{$work->id}}" class="hidden w-3/4 md:w-1/4 absolute popper px-2 py-3 rounded z-20 shadow-lg relative bg-gray-900 dark:bg-indigo-900 text-white" role="tooltip">
                        {{ $work->excerpt }}
                        <div class="arrow absolute h-4 w-4 text-yellow-600 arrow-light dark:arrow-dark text-white" data-popper-arrow></div>
                    </div>

                @endforeach
            </div>
        </div>
    </div>

@endsection