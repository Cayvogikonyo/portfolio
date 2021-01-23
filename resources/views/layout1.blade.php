<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <title>Home ::. {{ config('app.name', 'My Portofolio') }}</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/all.css') }}" rel="stylesheet">
        <script src="{{ asset('js/theme.js') }}" type="text/javascript" defer></script>
        <script src="{{ asset('js/sidebar.js') }}" type="text/javascript" defer></script>
        <script src="{{ asset('js/layout1.js') }}" type="text/javascript" defer></script>

        <style>
            body {
                font-family: 'Nunito';
            }
        </style>

    </head>
    <body class="antialiased">
      
		<div id="loader-wrapper" class="fixed inset-0 z-20">
			<div id="loader" class="block border-t-3 -ml-20 -m-20 relative left-1/2 top-1/2 w-40 h-40 z-20 rounded-full"></div>

			<div class="loader-section section-left fixed top-0 w-1/2 h-screen z-10 bg-gray-900 left-0"></div>
            <div class="loader-section section-right fixed top-0 w-1/2 h-screen z-10 bg-gray-900 right-0"></div>

		</div>
         @include('includes.sidebar')
         <div id="content" class="min-h-screen hidden bg-gray-100 dark:bg-gray-900 text-black dark:text-white sm:items-center sm:pt-0 relative clearfix">
            @if (Route::has('login'))
                <div class="absolute flex flex-wrap top-0 z-10 px-6 py-2 h-16 clearfix">
                    <button title="Menu" class="menubtns text-lg text-gray-300 font-bold p-3 transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110"><i class="fas fa-bars"></i></button>
                </div>
            @endif
            <div class="h-screen bg-cover bg-center bg-no-repeat relative <?php echo $site->site_header; ?>">
                <div class="w-full h-full bg-gray-900 bg-opacity-50 flex justify-center items-center">
                    <div class="bg-black p-2 text-white flex flex-col justify-center animate-zoom transition duration-500 ease-in-out transform hover:-translate-y-1 hover:p-4 hover:scale-110">
                        <h3 class="font-bold text-xl">{{$site->title}}</h3>
                        <p class="text-sm">{{$site->subtitle}}....</p>
                    </div>
                </div>
                <div class="absolute bottom-0 left-1/2 right-1/2"><p class="bg-green-500 text-yellow-600 text-xl hover:bg-indigo rounded-full"> <i class="fas fa-arrow-down animate-bounce"></i></p></div>
            </div>
            <div class="w-full sm:mx-2 md:w-11/12 md:mx-auto py-4 flex flex-wrap overflow-hidden">
                <div class="w-full md:w-3/4">
                    <hr class="my-6">
                    @if(!empty($main))
                        <div id="featured" class="opacity-0 w-5/6 my-3 mx-auto relative">
                            <h4> <span class="font-bold bg-black text-white absolute top-0 left-0 p-3 z-10">Featured </span></h4>
                            <div class="relative transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                                <a href="{{url('/articles', $main->slug)}}" class="w-full md:w-1/2 transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110">
                                    <img src="/storage/{{$main->header}}" class="transition duration-500 ease-in-out transform hover:-translate-y-1 hover:opacity-75" alt="" />
                                    <div class="p-4 bg-white dark:bg-gray-900 bg-opacity-75 absolute bottom-0 left-0 right-0">
                                        <h3 class="font-bold text-lg underlined">{{$main->title}}</h3>
                                        <p>{{$main->excerpt}}</p>
                                    </div>
                                </a>                            
                            </div>
                        </div>
                        <hr class="my-6">
                    @endif
                    <a href="{{url('blog')}}">
                        <h4 class="font-bold bg-black text-white my-3 p-3 inline-block transition duration-500 ease-in-out transform hover:-translate-y-1"> <i class="fa fa-angle->double-right"></i> All posts </h4>
                    </a>
                    @if(!empty($posts))
                        <div id="posts" class="md:grid md:grid-cols-3 md:gap-2 pr-2 relative">
                            @foreach($posts as $key => $post)
                                <div class="my-2 blog-item shadow transition duration-500 ease-in-out transform hover:-translate-y-2 translate-x-1/2 opacity-0">
                                    <a href="{{url('/articles', $post->slug)}}" class="w-full transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110">
                                        <img src="/storage/{{$post->header}}" class="w-full mx-auto opacity-100 transition duration-500 ease-in-out hover:opacity-75" alt="{{$post->header_alt}}">
                                    </a>
                                    <div class="w-full py-4 px-2 flex flex-wrap flex-col">
                                            <a href="{{url('/articles', $post->slug)}}" class="transition duration-500 ease-in-out transform hover:-translate-y-1"><h2 class="font-bold text-4xl underlined">{{$post->title}}</h2></a>
                                            <div >
                                                {!! $post->excerpt !!}
                                            </div>
                                    </div>
                                </div>
                            @endforeach

                            {{$posts->links()}} 
                        </div>
                    @endif
                    @if(sizeof($works) > 0)
                        <hr class="my-6">
                        <div class="flex flex-col justify-center items-center py-6">
                            <h4 class="uppercase font-italic text-gray-600 font-bold">My Work</h4>
                            <p class="text-gray-700">Here are some of the projects i have handled.</p>
                            <div id="works" class="w-full md:w-5/6 md:grid md:grid-cols-4 md:gap-2">
                                @foreach($works as $key => $work)
                                    <div class="bg-white work-item dark:bg-gray-600 relative shadow my-6 transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                                        <a href="{{url('/work/'.$work->slug)}}">
                                            <img src="<?php if(!empty($work->header)){ echo '/storage/'.$work->header; } else echo '/randoms/'.$work->randomHeader();  ?>" class="mx-auto opacity-100 h-40 transition duration-500 ease-in-out hover:opacity-50" alt="{{$work->header_alt}}">
                                        </a>
                                        <div class="absolute inset-0 py-4 px-2 flex flex-wrap justify-center items-center flex-col mx-auto opacity-0 transition duration-500 ease-in-out hover:bg-opacity-75 hover:opacity-100 hover:bg-white">
                                                <div class="opacity-100 text-black z-10">
                                                    <a href="{{url('/work/'.$work->slug)}}" class="transition duration-500 ease-in-out transform hover:-translate-y-1"><h2 class="font-bold text-4xl underlined relative checked">{{$work->title}}</h2></a>
                                                </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <a href="{{url('/work-portofolio')}}">
                                <button class="uppercase p-2 shadow bg-gray-300">View More</button>
                            </a>
                        </div>
                    @endif
                </div>
                <div class="w-full md:w-1/4 px-2">
                    <div id="bio" class="opacity-0 transition duration-500 ease-in-out transform translate-x-full">
                        <div class="bg-logo bg-contain bg-center h-32 bg-no-repeat mx-auto w-full" ></div>
                        <h4 class="font-bold bg-black text-white p-3 relative checked">About me</h4>
                        <h5 class="font-bold bg-black text-white p-3">{{$site->name}}</h5>
                        <p class="bg-black text-white pt-0 p-2">{{$site->bio}}</p>
                    </div>
                    <div class="my-4">
                        <h4 class="font-bold bg-black text-white p-3">Popular posts</h4>
                        @foreach($popular as $post)
                            <a href="{{url('/articles', $post->slug)}}">
                                <h3 class="p-2 font-bold transition duration-500 ease-in-out transform hover:-translate-y-1"> <i class="fa fa-angle-double-right"></i> {{$post->title}}</h3>
                            </a>
                        @endforeach
                    </div>
                    <div class="my-4 sticky top-0">
                        <h4 class="font-bold bg-black text-white p-3">Categories</h4>
                        <div class="py-3 dark:text-black">
                            @foreach($categories as $category)
                                <a href="{{url('/articles', $post->slug)}}" class="inline-block p-2 m-1 bg-blue-100"> <span class="font-bold transition duration-500 ease-in-out transform hover:-translate-y-1"> {{$category->name}} </span> </a>
                            @endforeach                        
                        </div>

                    </div>
                </div>
            </div>
            <div id="contact" class="bg-site-bg bg-cover bg-fixed bg-no-repeat bg-opacity-25 opacity-0">
                <div class="bg-gray-900 py-6 text-white dark:text-white bg-opacity-75 h-full w-full flex flex-col justify-center items-center">
                    <h5 class="font-bold text-center text-xl">I would love to hear from you. </h5>
                    <h5 class="font-bold text-center py-2"> Leave me a message or find me on my socials.</h5>
                    <form class="rounded w-full md:w-3/4 my-3 px-3 md:mx-auto md:grid md:grid-cols-3 gap-3" id="contactForm" method="POST" action="{{url('contactus')}}">
                        @csrf
                        <div class="w-full">
                            <label for="name">Name</label>
                            <input type="text" class="w-full rounded my-2 p-1 py-2 text-black" placeholder="What can i call you" name="name" id="name">
                            <span id="nameError" class="hidden text-sm text-red-600">Name is required!</span>
                        </div>
                        <div class="w-full">
                            <label for="email">Email address</label>
                            <input type="email" class="w-full rounded my-2 p-1 py-2 text-black" name="email" id="email" placeholder="name@example.com">
                            <span id="emailError" class="hidden text-sm text-red-600">Email/Contact is required!</span>
                        </div>

                        <div class="w-full">
                            <label for="message">Message</label>
                            <textarea class="w-full rounded my-2 p-1 py-2 text-black" id="message" name="message" placeholder="Leave us a message" rows="2"></textarea>
                            <span id="messageError" class="hidden text-sm text-red-600">Message is required!</span>
                        </div>
                        <div class="col-span-2"></div>
                        <div class="w-full flex justify-end">
                            <button onclick="contactus()" type="button" id="contactBtn" class="mx-2 rounded-lg p-2 shadow bg-green-500 transition duration-500 ease-in-out transform hover:translate-x-1"> <i class="fas fa-send"></i> Send Message </button>
                        </div>
                    </form>                
                </div>
            </div>
            @include('includes.footer')
        </div>
    </body>
    <script defer>
            window.onload = function() {onLoad()};

            function onLoad(){ 
                console.log(window);
            	setTimeout(function(){
                    document.getElementsByTagName("BODY")[0].classList.add('loaded');
                    setTimeout(function(){
                        if(document.getElementById("content")){
                            document.getElementById("content").classList.add('animate-zoom');
                        }
                    }, 500);
                }, 1300);
            };

            function contactus(){
                if(document.getElementById('name').value === ''){
                    document.getElementById('nameError').classList.remove('hidden');
                }else{
                    document.getElementById('nameError').classList.add('hidden');
                } 
                
                if(document.getElementById('email').value === ''){
                    document.getElementById('emailError').classList.remove('hidden');
                }else{
                    document.getElementById('emailError').classList.add('hidden');
                } 
                
                if(document.getElementById('message').value === ''){
                    document.getElementById('messageError').classList.remove('hidden');
                }else{
                    document.getElementById('messageError').classList.add('hidden');
                }

                if(document.getElementById('name').value !== '' 
                && document.getElementById('email').value !== ''
                && document.getElementById('message').value !== ''){
                    document.getElementById("contactForm").submit();
                }
            }
        </script>
</html>
