<x-app-layout>


    <section class="border text-lg text-gray-600 fs-2 p-2 relative border-gray-200 mb-5 rounded-lg shadow">
        <h3>Toutes les réponses à mes questions</h3>

        @session('success')
            <div id="toast-success"
                class="flex items-center absolute top-0 right-0 w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800 float-right"
                role="alert">
                <div
                    class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                    </svg>
                    <span class="sr-only">Check icon</span>
                </div>
                <div class="ms-3 text-sm font-normal"> {{ $value }}</div>
                <button type="button"
                    class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                    data-dismiss-target="#toast-success" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        @endsession
    </section>

    <section class="border  p-2 border-gray-200 rounded-lg shadow">


        <div class="flex flex-col lg:flex-row" style="height: 100vh">

            <div class="lg:w-1/2">
                <!-- Première colonne avec le formulaire -->
                <div class="container">
                    <h1>Mes conseils !</h1>
                    <p>{{ $problem->context }}</p>
                    <div class="cloud-box">
                        <p class="message">{{ $problem->contenu }}</p>
                    </div>

                    <!-- Add more messages here -->
                </div>

            </div>
            <div class="lg:w-1/2 overflow-y-auto max-h-screen">
                <!-- Deuxième colonne avec des cartes -->
                <div class="p-4 border border-gray-200 rounded-lg shadow-md bg-white dark:bg-gray-400 "
                    style="height: 100vh">





                    <!-- Ajoutez d'autres cartes si nécessaire -->
                    @forelse ($problem->conseils as $conseil)
                        <div
                            class="p-6 bg-white border relative  border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 max-w-full rounded overflow-hidden shadow-lg mb-4">


                            <img class="w-24 h-24 mb-3 mt-5 rounded-full shadow-lg float-right"
                                src="https://images.unsplash.com/photo-1511367461989-f85a21fda167?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8cHJvZmlsZXxlbnwwfHwwfHx8MA%3D%3D"
                                alt="Bonnie image" />
                            <a href="#">
                                <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">
                                    Répondu
                                    par:
                                    {{ strtoupper($conseil->mentor->user->name) }}</h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">
                                Réponse: {{ $conseil->reponse }}</p>

                            <div x-data="{ open: false }">
                                <button @click="open = ! open"><a href="#"
                                        class="inline-flex font-medium items-center text-blue-600 hover:underline">
                                        Votre avis
                                        <svg class="w-3 h-3 ms-2.5 rtl:rotate-[270deg]" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778" />
                                        </svg>
                                    </a></button>

                                <div x-show="open">

                                    <form method="POST" action="{{ route('conseil.avis') }}">
                                        @csrf
                                        <label for="chat" class="sr-only">Your message</label>
                                        <input type="hidden" name="conseil_id" value="{{ $conseil->id }}">
                                        <div
                                            class="flex items-center px-3 py-2 mt-5 rounded-lg bg-gray-50 dark:bg-gray-700">


                                            <textarea id="chat" rows="1" name="message"
                                                class="block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Votre avis ..."></textarea>
                                            <button type="submit"
                                                class="inline-flex justify-center p-2 text-blue-600 rounded-full cursor-pointer hover:bg-blue-100 dark:text-blue-500 dark:hover:bg-gray-600">
                                                <svg class="w-5 h-5 rotate-90 rtl:-rotate-90" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    viewBox="0 0 18 20">
                                                    <path
                                                        d="m17.914 18.594-8-18a1 1 0 0 0-1.828 0l-8 18a1 1 0 0 0 1.157 1.376L8 18.281V9a1 1 0 0 1 2 0v9.281l6.758 1.689a1 1 0 0 0 1.156-1.376Z" />
                                                </svg>
                                                <span class="sr-only">Votre avis ...</span>
                                            </button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            @if ($conseil->avis != null)
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    data-popover-target="popover-bottom{{ $loop->index }}" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                    class="w-6 h-6 text-white absolute  right-4 top-2 ">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                            @endif


                        </div>
                        @if ($conseil->avis != null)
                            <div data-popover id="popover-bottom{{ $loop->index }}" role="tooltip"
                                class=" absolute top-0  invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800"
                                style="z-index: 10000000">

                                <div class="px-3 py-2 mb-5">
                                    <p>{{$conseil->avis}}</p>
                                </div>
                                <div data-popper-arrow></div>
                            </div>
                        @endif
                    @empty
                        <h4
                            class="text-center text-2xl font-semibold tracking-tight text-gray-900 dark:text-white mt-20">
                            La patience est la clé de la réussite. Merci !
                        </h4>
                    @endforelse




                    <!-- Ajoutez d'autres cartes si nécessaire -->


                </div>
            </div>
        </div>





</x-app-layout>
