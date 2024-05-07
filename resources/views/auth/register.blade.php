<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />
        <div class="mt-4 mb-4 text-xl italic font-bold text-center text-white">Créer un compte</div>

        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="surname" value="{{ __('Surname') }}" />
                <x-input id="surname" class="block w-full mt-1" type="text" name="surname" :value="old('surname')" required autofocus autocomplete="surname" />
            </div>


            <div class="mt-4">
                <x-label for="profession" value="{{ __('profession') }}" />
                <x-input id="profession" class="block w-full mt-1" type="text" name="profession" :value="old('profession')" required autofocus autocomplete="profession" />
            </div>

            
            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block w-full mt-1" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block w-full mt-1" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="telephone" value="{{ __('Téléphone') }}" />
                <x-input id="telephone" class="block w-full mt-1" type="text" name="telephone" required autocomplete="telephone" />
            </div>

            <div class="mt-4">
                <x-label for="type" value="{{ __('User type') }}" />
                <select name="type" id="type" class="block w-full mt-1 text-white bg-transparent rounded-lg hover:text-white hover:bg-transparent">
                    <option  value="" selected disabled hidden> {{ __('choisir type utilisateur')  }} </option>
                    <option class="bg-black"  value="conducteur" id="conduc">Conducteur</option>
                    <option class="bg-black" value="passager" id="passa">Passager</option>
                </select>
            </div>


            <div class="grid items-center hidden mt-8 conductorio">
                <div>
                    <label for="uploadFile1"
                    class="flex bg-gray-800 hover:bg-gray-700 text-white text-base px-10 py-2 outline-none rounded w-max cursor-pointer mx-auto font-[sans-serif]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="inline w-6 mr-2 fill-white" viewBox="0 0 32 32">
                            <path  d="M23.75 11.044a7.99 7.99 0 0 0-15.5-.009A8 8 0 0 0 9 27h3a1 1 0 0 0 0-2H9a6 6 0 0 1-.035-12 1.038 1.038 0 0 0 1.1-.854 5.991 5.991 0 0 1 11.862 0A1.08 1.08 0 0 0 23 13a6 6 0 0 1 0 12h-3a1 1 0 0 0 0 2h3a8 8 0 0 0 .75-15.956z"  data-original="#000000" />
                            <path d="M20.293 19.707a1 1 0 0 0 1.414-1.414l-5-5a1 1 0 0 0-1.414 0l-5 5a1 1 0 0 0 1.414 1.414L15 16.414V29a1 1 0 0 0 2 0V16.414z" data-original="#000000" />
                        </svg>
                        Permis en format (.jpg, .png, .jpeg)
                        <input type="file" id='uploadFile1' class="hidden" name="permis_image" />
                    </label>
                </div>
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label class="text-white" for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-center mt-6">
                <x-button class="ms-4">
                    {{ __('Register') }}
                </x-button>
            </div>

            <div class="flex items-center justify-between gap-2 mt-6">
                <div>
                    <a href="jajvascript:void(0);" class="text-sm font-semibold text-green-600 ">
                      Already have an acoupt?
                    </a>
                </div>
                
                <div class="flex items-center">
                    <a href="{{ route('login') }}" class="text-sm text-green-600 rounded-md hover:text-green-800">
                        {{ __('login') }}
                    </a>
                </div>
                
            </div>
        </form>
    </x-authentication-card>

    <script>
        let selection = document.getElementById('type');
        let conducteur = document.getElementById('conduc');
        let passager = document.getElementById('passa');
        let conductorios = document.querySelector('.conductorio');

        selection.addEventListener('click', (e)=>{
            let response = e.target.value;
            if (response === 'conducteur') {
                
                conductorios.classList.remove('hidden');
            }else if (response === 'passager') {
                conductorios.classList.add('hidden');
            }
        })
        
    </script>
</x-guest-layout>
