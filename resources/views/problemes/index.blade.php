<x-app-layout>


    <section>


        <form class="max-w-sm mx-auto" method="POST" action="{{ route('problem.store') }}">
            @csrf
            <div class="mb-5">
                <label for="context" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                    Context</label>
                <input type="context" name="context" id="context"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    placeholder="context" required />
            </div>


            <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                message</label>
            <textarea id="message" name="contenu" rows="4"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="le contenu..."></textarea>



            <div class="flex items-start mb-5">
                <div class="flex items-center h-5">
                    <input id="terms" type="checkbox" value=""
                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" />
                </div>
                <label for="terms" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">I agree with the
                    <a href="#" class="text-blue-600 hover:underline dark:text-blue-500">A tous les
                        mentors</a></label>
            </div>


            <label for="mentors" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Choisir les
                mentors</label>
            <select multiple id="countries_multiple" name="mentors[]"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach ($mentors as $mentor)
                    <option value="{{ $mentor->id }}">{{ $mentor->user->name }}</option>
                @endforeach
            </select>


            <button type="submit"
                class="text-white bg-blue-700 mt-10 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Envoyer</button>
        </form>

    </section>
    <main>
        <section class="cards">

            @foreach ($mes_problems as $problem)
                {{-- <a id="gui-card" href="#"
                    class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ strtoupper($problem->context) }}</h5>
                    <p class="font-normal text-gray-700 dark:text-gray-400">{{ $problem->contenu }}</p>
                        <span
                        class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded me-2 dark:bg-gray-700 dark:text-gray-400 border border-gray-500 ">
                        <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z" />
                        </svg>
                        {{ formatDateToWords($problem->created_at) }}
                    </span>
                    <div class="circle">{{ $loop->index }}</div>
                </a> --}}

                <div class="card">

                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">
                        {{ strtoupper($problem->context) }}</h5>

                    <p class="font-normal text-gray-700 dark:text-gray-400">{{ $problem->contenu }}</p>
                    <a href="{{ route('problem.show', $problem->id) }}">
                        <div class="circle">

                            <button type="button"
                                class="relative inline-flex items-center p-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 20 16">
                                    <path
                                        d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z" />
                                    <path
                                        d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z" />
                                </svg>
                                <span class="sr-only">Notifications</span>
                                <div
                                    class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-2 -end-2 dark:border-gray-900">
                                    {{ $loop->index }}</div>
                            </button>

                        </div>
                    </a>
                    <span
                        class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded me-2 dark:bg-gray-700 dark:text-gray-400 border border-gray-500 ">
                        <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z" />
                        </svg>
                        {{ formatDateToWords($problem->created_at) }}
                    </span>

                </div>
            @endforeach

            {{-- <div class="card">
                <h2>Card 2</h2>
                <p>Description de la card 2.</p>
                <div class="circle">1</div>
            </div>
            <div class="card">
                <h2>Card 3</h2>
                <p>Description de la card 3.</p>
            </div> --}}
        </section>

    </main>


</x-app-layout>
