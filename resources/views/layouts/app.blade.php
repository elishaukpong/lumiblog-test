<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{$meta ?? ''}}

    <title>Laravel</title>

    <script>
        // updated flow
        // load the next page sequence
        // after loading, send a silent request to fingerprint and get identifier,
        // send identifier to backend to store and hold in session,
        // use this to decide what to show to the user


        // todo find a way to send visitor id to backend using prefetch and save data from session to db,
        // todo then a case where there is no session saved, use fingerprint and db to populate session again

        if(! localStorage.getItem('visitorId')){
            const fpPromise = import('https://fpcdn.io/v3/WLqGNZDUDGXO7nd94X4W')
                .then(FingerprintJS => FingerprintJS.load({
                    region: "eu"
                }));

            // Get the visitor identifier when you need it.
            fpPromise
                .then(fp => fp.get())
                .then(result => {
                    localStorage.setItem('visitorId', result.visitorId);
                })
        }


        // if(! localStorage.getItem(window.location.href)){ //switch this to use cookies and set the cookies to the lifetime of the session on the app - important

            let test = setInterval(function(){
                if(localStorage.getItem('visitorId')){
                    fetch(window.location.href, {
                        method: 'GET',
                        mode: 'cors',
                        headers: new Headers({
                            'Content-Type': 'application/json',
                            'Access-Control-Allow-Headers': 'Accept',
                            'X-Custom-Header': 'preflight',
                            'X-Fingerprint': localStorage.getItem('visitorId')
                        })
                    })
                        .then(response => {
                            localStorage.setItem(window.location.href,true); //remove at a later time
                        })
                        .catch(error => {
                            console.log(error)
                        });

                    clearInterval(test)
                }
            },500);
        // }

    </script>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">



    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/tooltip.js') }}"></script>
{{--    <script src="{{ asset('js/auto-complete.js') }}"></script>--}}
</head>

</head>

<body>
<nav x-data="{showMenu : false}">
    <div class="bg-gray-900">

        <div class="px-4 py-5 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8">
            <div class="relative flex items-center justify-between">
                <div class="flex items-center">
                    <a href="/" aria-label="Company" title="Company" class="inline-flex items-center mr-8">
                        <svg class="w-8 text-teal-accent-400" viewBox="0 0 24 24" stroke-linejoin="round" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10" stroke="currentColor" fill="none">
                            <rect x="3" y="1" width="7" height="12"></rect>
                            <rect x="3" y="17" width="7" height="6"></rect>
                            <rect x="14" y="1" width="7" height="6"></rect>
                            <rect x="14" y="11" width="7" height="12"></rect>
                        </svg>
                        <span class="ml-2 text-xl font-bold tracking-wide text-gray-100 uppercase">LumiForm</span>
                    </a>
                    <ul class="flex items-center hidden space-x-8 lg:flex">
                        <li><a href="{{route('show.post.all')}}" aria-label="Our product" title="Our product" class="font-medium tracking-wide text-gray-100 transition-colors duration-200 hover:text-teal-accent-400">Blog</a></li>
                    </ul>
                </div>
                <ul class="flex items-center hidden space-x-8 lg:flex">
                    <li>
                        <input data-search="{{route('show.post.all')}}"
                            placeholder="Search"
                            id="autocomplete"
                            type="text"
                            class="flex-grow w-full h-12 px-4 mb-3 transition duration-200 bg-white border border-gray-300 rounded shadow-sm appearance-none md:mr-2 md:mb-0 focus:border-deep-purple-accent-400 focus:outline-none focus:shadow-outline"
                        />
                        <div id="result"></div>
                    </li>

                    @guest
                    <li><a href="{{route('login')}}" aria-label="Sign in" title="Sign in" class="font-medium tracking-wide text-gray-100 transition-colors duration-200 hover:text-teal-accent-400">Sign in</a></li>
                    <li>
                        <a
                            href="{{route('register')}}"
                            class="inline-flex items-center justify-center h-12 px-6 font-medium tracking-wide text-white transition duration-200 rounded shadow-md bg-deep-purple-accent-400 hover:bg-deep-purple-accent-700 focus:shadow-outline focus:outline-none"
                            aria-label="Sign up"
                            title="Sign up"
                        >
                            Sign up
                        </a>
                    </li>
                    @else
                        <li>
                            <a
                                href="{{auth()->user()->dashboardLink()}}"
                                class="inline-flex items-center justify-center h-12 px-6 font-medium tracking-wide text-white transition duration-200 rounded shadow-md bg-deep-purple-accent-400 hover:bg-deep-purple-accent-700 focus:shadow-outline focus:outline-none"
                                aria-label="Sign up"
                                title="Sign up"
                            >
                                Dashboard
                            </a>
                        </li>
                    @endguest
                </ul>

                <button @click="showMenu = ! showMenu " aria-label="Open Menu" title="Open Menu" class="lg:hidden p-2 -mr-1 transition duration-200 rounded focus:outline-none focus:shadow-outline">
                    <svg class="w-5 text-gray-600" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M23,13H1c-0.6,0-1-0.4-1-1s0.4-1,1-1h22c0.6,0,1,0.4,1,1S23.6,13,23,13z"></path>
                        <path fill="currentColor" d="M23,6H1C0.4,6,0,5.6,0,5s0.4-1,1-1h22c0.6,0,1,0.4,1,1S23.6,6,23,6z"></path>
                        <path fill="currentColor" d="M23,20H1c-0.6,0-1-0.4-1-1s0.4-1,1-1h22c0.6,0,1,0.4,1,1S23.6,20,23,20z"></path>
                    </svg>
                </button>

                <!-- Mobile menu -->
                <div x-show="showMenu">
                        <div class="absolute top-0 left-0 w-full z-10">
                            <div class="p-5 bg-white border rounded shadow-sm">
                                <div class="flex items-center justify-between mb-4">
                                    <div>
                                        <a href="/" aria-label="Company" title="Company" class="inline-flex items-center">
                                            <svg class="w-8 text-deep-purple-accent-400" viewBox="0 0 24 24" stroke-linejoin="round" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10" stroke="currentColor" fill="none">
                                                <rect x="3" y="1" width="7" height="12"></rect>
                                                <rect x="3" y="17" width="7" height="6"></rect>
                                                <rect x="14" y="1" width="7" height="6"></rect>
                                                <rect x="14" y="11" width="7" height="12"></rect>
                                            </svg>
                                            <span class="ml-2 text-xl font-bold tracking-wide text-gray-800 uppercase">Lumiform</span>
                                        </a>
                                    </div>
                                    <div>
                                        <button @click.prevent="showMenu = !showMenu " aria-label="Close Menu" title="Close Menu" class="p-2 -mt-2 -mr-2 transition duration-200 rounded hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                                            <svg class="w-5 text-gray-600" viewBox="0 0 24 24">
                                                <path
                                                    fill="currentColor"
                                                    d="M19.7,4.3c-0.4-0.4-1-0.4-1.4,0L12,10.6L5.7,4.3c-0.4-0.4-1-0.4-1.4,0s-0.4,1,0,1.4l6.3,6.3l-6.3,6.3 c-0.4,0.4-0.4,1,0,1.4C4.5,19.9,4.7,20,5,20s0.5-0.1,0.7-0.3l6.3-6.3l6.3,6.3c0.2,0.2,0.5,0.3,0.7,0.3s0.5-0.1,0.7-0.3 c0.4-0.4,0.4-1,0-1.4L13.4,12l6.3-6.3C20.1,5.3,20.1,4.7,19.7,4.3z"
                                                ></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <nav>
                                    <ul class="space-y-4">
                                        <li><a href="{{route('show.post.all')}}"  class="font-medium tracking-wide text-black transition-colors duration-200 hover:text-teal-accent-400">Blog</a></li>
                                        @guest
                                            <li><a href="{{route('login')}}" class="font-medium tracking-wide text-gray-100 transition-colors duration-200 hover:text-teal-accent-400">Sign in</a></li>
                                        @else
                                            <li>
                                                <a
                                                    href="{{auth()->user()->dashboardLink()}}"
                                                    class="inline-flex items-center justify-center h-12 px-6 font-medium tracking-wide text-white transition duration-200 rounded shadow-md bg-deep-purple-accent-400 hover:bg-deep-purple-accent-700 focus:shadow-outline focus:outline-none"
                                                    aria-label="Sign up"
                                                    title="Sign up"
                                                >
                                                    Dashboard
                                                </a>
                                            </li>
                                        @endguest
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>

            </div>
        </div>
    </div>
</nav>

<div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">

    <div class="mx-20">
        <x-auth-session-status class="mb-4 text-center py-4 mb-10 bg-green-100  mx-20" :status="session('status')" />
    </div>

    {{$slot}}
</div>

<x-footer />
</body>
</html>
