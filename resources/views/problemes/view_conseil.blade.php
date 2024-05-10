<x-app-layout>


    <section class="border text-lg text-gray-600 fs-2 p-2 border-gray-200 mb-5 rounded-lg shadow">
      <h3>Toutes les réponses à mes questions</h3>
    </section>

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
            <div class="p-4 border border-gray-200 rounded-lg shadow-md bg-white dark:bg-gray-400 " style="height: 100vh">





                <!-- Ajoutez d'autres cartes si nécessaire -->
                @forelse ($problem->conseils as $conseil)
                    <div
                        class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 max-w-full rounded overflow-hidden shadow-lg mb-4">
                        <img class="w-24 h-24 mb-3 rounded-full shadow-lg float-right"
                            src="https://images.unsplash.com/photo-1511367461989-f85a21fda167?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8cHJvZmlsZXxlbnwwfHwwfHx8MA%3D%3D"
                            alt="Bonnie image" />
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Répondu
                                par:
                                {{ strtoupper($conseil->mentor->user->name) }}</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">
                            Réponse: {{ $conseil->reponse }}</p>
                        <a href="#" class="inline-flex font-medium items-center text-blue-600 hover:underline">
                            Votre avis
                            <svg class="w-3 h-3 ms-2.5 rtl:rotate-[270deg]" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778" />
                            </svg>
                        </a>
                    </div>

                @empty
                    <h4 class="text-center text-2xl font-semibold tracking-tight text-gray-900 dark:text-white mt-20"> La patience est la clé de la réussite. Merci !
                    </h4>
                @endforelse




                <!-- Ajoutez d'autres cartes si nécessaire -->


            </div>
        </div>
    </div>





</x-app-layout>
