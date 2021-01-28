@extends('layouts.applayout')

@section('content')

    <div class="max-w-8xl md:w-3/4 mx-auto p-3 py-4 text-justify clearfix">
        <div class="w-full md:w-1/3 flex flex-col sticky md:top-0 md:float-left py-3 pr-3">
            <div class="relative">
                <img class="w-32 my-4 rounded-full h-32" src="/storage/{{$portofolio->avatar}}" alt="{{$portofolio->name}} avatar">
            </div>
            <h4 class="py-2 font-bold text-2xl underlined">{{$portofolio->name}}</h4>

            <div class="text-black bg-opacity-50 relative px-2">
                @if(!empty($portofolio->title))
                    <h3 class="font-bold text-xl text-gray-700 text-left my-2">{{$portofolio->title}}</h3>
                @endif
            </div>

            <a class="p-2 hover:bg-gray-200 hover:text-gray-900" href="#bio">About</a>
            @if(sizeof($portofolio->experiences) > 0)
                <a class="p-2 hover:bg-gray-200 hover:text-gray-900" href="#experience">Experience</a>
            @endif
            @if(sizeof($portofolio->skills) > 0)
                <a class="p-2 hover:bg-gray-200 hover:text-gray-900" href="#skills">Skills</a>
            @endif
            @if(sizeof($portofolio->services) > 0)
                <a class="p-2 hover:bg-gray-200 hover:text-gray-900" href="#services">Services</a>
            @endif
            @if(sizeof($portofolio->clients) > 0)
                <a class="p-2 hover:bg-gray-200 hover:text-gray-900" href="#clients">Clients</a>
            @endif
        </div>
        <div class="w-full md:w-2/3 md:float-right p-2">
          
            <section id="bio">
                <h3 class="font-bold text-xl text-gray-700 my-2">About</h3>
                <div class="p-3">{{$portofolio->bio}}</div>
            </section>
            @if(sizeof($portofolio->experiences) > 0)
            <section id="experience">
                <h3 class="font-bold text-xl text-gray-700 my-2">Experience</h3>
                @foreach($portofolio->experiences as $experience)
                    <div class="px-3">
                        <h4 class="w-full py-2 text-green-600 dark:text-yellow-600 font-bold">
                                {{$experience->title}}
                        </h4>
                        @if(!empty($experience->from) || !empty($experience->from))
                                <div class="px-4 flex text-center text-green-600 dark:text-yellow-600">
                                    <p><i class="fa fa-calendar-alt mr-2"></i>{{$experience->from}}</p>
                                    @if(!empty($experience->to))
                                        <p class="mx-4">
                                            -
                                        </p>
                                        <p><i class="fa fa-calendar-alt mr-2"></i>{{$experience->from}}</p>
                                    @endif
                                </div>
                        @endif
                        <div class="">
                            {{$experience->description}}
                        </div>
                    </div>
                @endforeach
            </section>
            @endif
            @if(sizeof($portofolio->skills) > 0)
                <section id="skills">
                    <h3 class="font-bold text-xl text-gray-700 my-2">Skills</h3>
                    @foreach($portofolio->skills as $skill)
                        <div class="px-3">
                            <h4 class="w-full py-2 font-bold">
                                {{$skill->title}}
                            </h4>
                            <div class="skillbar">
                                <div class="m-0 border border-green-500 dark:border-yellow-500 rounded-full" >
                                    <p class="bg-green-500 dark:bg-yellow-500 h-3 rounded-full relative" style="width: <?php echo $skill->percentage.'%'; ?>">
                                        <span class="absolute left-1/2 right-1/2 text-black text-xs">{{$skill->percentage}}%</span>
                                    </p>
                                </div>
                                <div class="skillcontent justify-center">
                                    <div class="w-full md:w-1/2 p-3 rounded-lg border border-green-200 mx-auto">
                                        <h4>{{$skill->percentage}}</h4>
                                        <p>
                                            {{$skill->description}}
                                        </p>
                                        @if(!empty($skill->verifier_title))
                                            Obtained from <a href="{{$skill->verifier_url}}">{{$skill->verifier_title}}</a>
                                        @endif
                                        @if(!empty($skill->url))
                                            <a href="{{$skill->url}}">Learn more</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </section>
            @endif
            @if(sizeof($portofolio->services) > 0)
                <section id="services">
                    <h3 class="font-bold text-xl text-gray-700 my-2">Services</h3>
                    @foreach($portofolio->services as $service)
                        <div class="p-3 flex flex-wrap shadow dark:shadow-none my-2">
                            <div class="flex w-1/6 justify-center text-green-600 dark:text-yellow-600 items-center"> 
                                <i class="fas {{$service->icon}} text-6xl"></i>
                            </div>
                            <div class="w-5/6 mx-auto">
                                <h4 class="w-full py-2 text-green-600 dark:text-yellow-600 font-bold">
                                    {{$service->title}}
                                </h4>
                                <p class="pl-2">
                                    {{$service->description}}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </section>
            @endif
            @if(sizeof($portofolio->clients) > 0)
                <section id="clients">
                    <h3 class="font-bold text-xl text-gray-700 my-2">My Reputation</h3>
                    <div class="grid grid-cols-2 gap-3 px-3">
                        @foreach($portofolio->clients as $client)
                                <div class="px-3 flex items-center">
                                    <img src="/storage/{{$client->icon}}" class="w-16 h-16 rounded-full" :alt="client.title">
                                    <div class="px-3 font-bold capitalize underlined">
                                        {{$client->title}}
                                    </div>
                                </div>
                        @endforeach
                    </div>
                </section>
            @endif
        </div>
    </div>

@endsection