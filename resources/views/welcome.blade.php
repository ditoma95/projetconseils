<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="stylesheet" href="/build/tailwind.css">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    @vite(['resources/css/app.css', 'resources/css/back.css', 'resources/js/app.js'])
    <title>Let's do some warm-up !</title>
</head>
{{-- bars dimitrios --}}

<body class="antialiased bg-gray-500 ">
    <aside class="header">
        <div class="fixed top-0 z-50 w-full text-white dark-mode:text-gray-200 dark-mode:bg-gray-800 ">
            <div x-data="{ open: false }"
                class="flex flex-col px-4 mx-auto bg-gray-800 max-w-screen-3xl md:items-center md:justify-between md:flex-row md:px-6 lg:items-center lg:justify-between lg:flex-row lg:px-6 xl:items-center xl:justify-between xl:flex-row xl:px-6 sm:items-center sm:justify-between sm:flex-row sm:px-6">
                <div class="flex flex-row items-center justify-between p-6">
                    <a href="#"
                        class="text-lg italic font-semibold tracking-widest text-white uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">GuidanceCønnłct</a>
                    <button class="rounded-lg md:hidden focus:outline-none focus:shadow-outline" @click="open = !open">
                        <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                            <path x-show="!open" fill-rule="evenodd"
                                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                                clip-rule="evenodd"></path>
                            <path x-show="open" fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <nav :class="{ 'flex': open, 'hidden': !open }"
                    class="flex-col flex-grow hidden pb-4 md:pb-0 md:flex md:justify-end md:flex-row">
                    {{-- <a class="px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-gray-200 rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">Accueil</a>

                    <div @click.away="open = false" class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex flex-row items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:w-auto md:inline md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                            <span>Autres design</span>
                            <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                        <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 z-30 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48">
                            <div class="px-2 py-2 bg-gray-700 rounded-md shadow dark-mode:bg-gray-700">
                                </div>
                        </div>
                    </div> --}}

                    @if (Route::has('login'))
                        <div class="flex justify-end space-x-6">
                            @auth
                                <a href="{{ url('/dashboard') }}">Tableau de Bord</a>
                            @else
                                <a class="px-4 py-2 mx-2 mt-2 text-sm font-semibold text-white bg-transparent rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white bt dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                    href="{{ route('login') }}">Connexion</a>

                                @if (Route::has('register'))
                                    <a class="px-4 py-2 mt-2 text-sm font-semibold text-white rounded-lg bg-transparent-200 dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white bt dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                        href="{{ route('register') }}">Inscription</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </nav>
            </div>

            {{-- --------------------------- --}}

            {{-- <h1 class="text-black ">
                    <div class="w-full">
                        <video src="../vd.mp4" autoplay muted></video>
                    </div> --}}

            <div>
                {{-- @yield('content') --}}

                <div class="gui-filter ">


                    <ul
                        class="w-48 text-sm font-medium mt-2 text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-800 dark:border-gray-500 dark:text-white ">
                        <li class="w-full px-4 py-2 border-b border-gray-200 rounded-t-lg dark:border-gray-600">Filtrer
                            par :
                        </li>


                        <div class="flex items-center p-2">
                            <input id="link-checkbox" type="checkbox" value=""
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="link-checkbox"
                                class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Santé
                            </label>
                        </div>


                        <div class="flex items-center p-2">
                            <input id="link-checkbox" type="checkbox" value=""
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="link-checkbox"
                                class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Infomatique</label>
                        </div>


                    </ul>
                </div>



                <div class="stars star1"></div>
                <div class="stars star2"></div>
                <div class="stars star3"></div>
                <div class="stars star4"></div>
                <div class="stars star5"></div>
                <div class="stars star6"></div>
                <div class="stars star7"></div>
                <div class="stars star8"></div>
                <div class="stars star9"></div>
                <div class="stars star10"></div>
                <div class="stars star11"></div>
                <div class="stars star12"></div>
                <div class="stars star13"></div>
                <div class="stars star14"></div>
                <div class="stars star15"></div>
                <img id="moon" class="round"></img>



                <div class="gui-container-welcome  overflow-y-auto max-h-screen">



                    <div class="column left">
                        @foreach ($articles as $article)
                            <div
                                class="relative max-w-sm bg-white border mt-10 border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">

                                <a href="" class="mt-1 mx-1 bg-gray-800 absolute top-0 right-0 rounded-lg p-1">
                                    <svg class=" w-[30px] h-[30px] text-gray-800 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z" />
                                    </svg>

                                </a>

                                <a href="#">
                                    <img class="rounded-t-lg"
                                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSOBXGVxP257QOtzY57IA9ak1CguBj9JfYIrbpQxg8ZeQ&s"
                                        alt="" />
                                </a>
                                <div class="p-5">
                                    <a href="#">
                                        <h5
                                            class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                            Domaine : {{ $article->titre}}</h5>
                                    </a>
                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ substr($article->contenu, 0, 50)}}
                                    </p>
                                    <a href="#"
                                        class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                       Lire plus
                                        <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        @endforeach



                    </div>


                    <div class="column right">

                        <div
                            class="max-w-sm bg-white border  border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                            <a href="#">
                                <img class="rounded-t-lg"
                                    src="https://static.remove.bg/sample-gallery/graphics/bird-thumbnail.jpg"
                                    alt="" />
                            </a>
                            <div class="p-5">
                                <a href="#">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                        Domaine de la Santé</h5>
                                </a>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest
                                    enterprise technology acquisitions of 2021 so far, in reverse chronological order.
                                </p>
                                <a href="#"
                                    class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Lire plus
                                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div
                            class="max-w-sm bg-white border border-gray-200 mt-10 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                            <a href="#">
                                <img class="rounded-t-lg"
                                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSOBXGVxP257QOtzY57IA9ak1CguBj9JfYIrbpQxg8ZeQ&s"
                                    alt="" />
                            </a>
                            <div class="p-5">
                                <a href="#">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                        Domaine de l'Inforamtique</h5>
                                </a>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest
                                    enterprise technology acquisitions of 2021 so far, in reverse chronological order.
                                </p>
                                <a href="#"
                                    class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Lire plus
                                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                    </svg>
                                </a>
                            </div>
                        </div>

                    </div>



                </div>


            </div>


            </h1>

            {{-- --------------------------- --}}
        </div>

    </aside>
</body>

</html>
