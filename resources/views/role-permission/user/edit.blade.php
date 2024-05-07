<x-app-layout>
    <div class="mt-20 ml-32">
        <div class="">
            <h3>Update User
                <a  class="p-2 text-white bg-blue-800" href="{{ url('users') }}">Retour</a>
            </h3>

            <div>
                <form action="{{ url('users/' . $user->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-6">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                        <input type="text" name="name" value="{{ $user->name }}">
                        @error('name')
                            <span>{{ $message }}</span>
                        @enderror

                    </div>

                    <div class="mb-6">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">email</label>
                        <input type="email" name="email" readonly   value="{{ $user->email }}">
                    </div>

                    <div class="mb-6">
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">password</label>
                        <input type="password" name="password"  value="{{ $user->name }}">
                        @error('password')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="roles" class="block mb-2 text-sm font-medium text-gray-900">Roles</label>
                        
                        <select name="roles[]" multiple>
                            @foreach ($roles as $role)
                                <option value="{{ $role }}"
                                    {{ in_array($role, $userRoles) ? 'selected' : ''}}
                                    style="{{ in_array($role, $userRoles) ? 'color: blue;' : '' }}"
                                >{{ $role }}</option>
                            @endforeach
                        </select>
                        @error('roles')
                            <span>{{ $message }}</span>
                        @enderror
                        
                    </div>

                    <div>
                        <button type="submit">Update</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</x-app-layout>





{{-- <x-app-layout>
    <div class="flex justify-end mt-4">
        <a  class="px-6 py-2 text-lg text-white bg-green-500 border-0 rounded focus:outline-none hover:bg-green-600" href="{{ url('users') }}">Liste utilisateur</a>
    </div>

    <form action="{{ url('users')}}" method="post">
        @csrf
        @method('post')
        <div class="mt-20">
            <div class="z-10 flex flex-col w-full p-8 m-auto bg-white rounded-lg shadow-md lg:w-1/3 md:w-1/2 md:mt-0">
                <h2 class="mb-1 text-lg font-medium text-center text-gray-900 title-font">Modifier un utilisateur</h2>

                
                <div class="relative mb-4">
                    <label for="name" class="text-sm leading-7 text-gray-600">Nom</label>
                    <input type="text" id="name" value="{{ $user->name }}" name="name" class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-white border border-gray-300 rounded outline-none focus:border-green-500 focus:ring-2 focus:ring-green-200">
                    @error('name')
                        <span>{{ $message }}</span>
                    @enderror
                </div>

                <div class="relative mb-4">
                    <label for="surname" class="text-sm leading-7 text-gray-600">Prenom</label>
                    <input type="text" id="surname" name="surname" value="{{ $user->surname }}" class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-white border border-gray-300 rounded outline-none focus:border-green-500 focus:ring-2 focus:ring-green-200">
                </div>

                <div class="relative mb-4">
                    <label for="profession" class="text-sm leading-7 text-gray-600">Profession</label>
                    <input type="text" id="profession" value="{{ $user->profession }}" name="profession" class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-white border border-gray-300 rounded outline-none focus:border-green-500 focus:ring-2 focus:ring-green-200">
                </div>

                <div class="relative mb-4">
                    <label for="email" class="text-sm leading-7 text-gray-600">Email</label>
                    <input type="text" id="email" name="email" value="{{ $user->email }}" class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-white border border-gray-300 rounded outline-none focus:border-green-500 focus:ring-2 focus:ring-green-200">
                </div>

                <div class="relative mb-4">
                    <label for="password" class="text-sm leading-7 text-gray-600">Password</label>
                    <input type="password" id="password" name="password" value="{{ $user->password }}" class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-white border border-gray-300 rounded outline-none focus:border-green-500 focus:ring-2 focus:ring-green-200">
                </div>

                <div class="relative mb-4">
                    <label for="password_confirmation" class="text-sm leading-7 text-gray-600">password_confirmation</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-white border border-gray-300 rounded outline-none focus:border-green-500 focus:ring-2 focus:ring-green-200">
                </div>

                <div class="relative mb-4">
                    <label for="telephone" class="text-sm leading-7 text-gray-600">Téléphone</label>
                    <input type="text" id="telephone" value="{{ $user->telephone }}"  name="telephone" class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-white border border-gray-300 rounded outline-none focus:border-green-500 focus:ring-2 focus:ring-green-200">
                </div>

                <div class="mt-4">
                    <label for="type" class="text-sm leading-7 text-gray-600">Type</label>
                    <select name="type" id="type" class="block w-full mt-1 text-white bg-transparent rounded-lg hover:text-white hover:bg-transparent">
                        <option  value="" selected disabled hidden> choisir votre type </option>
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

                <div class="mt-4">
                    <label for="roles" class="block mb-2 text-sm font-medium text-gray-900">Roles</label>
                    <select name="roles[]" multiple class="w-full">
                        @foreach ($roles as $role)
                            <option value="{{ $role }}"
                                {{ in_array($role, $userRoles) ? 'selected' : ''}}
                                style="{{ in_array($role, $userRoles) ? 'color: blue;' : '' }}"
                            >{{ $role }}</option>
                        @endforeach
                    </select>
                    @error('roles')
                        <span>{{ $message }}</span>
                    @enderror
                    
                </div>


                
                <button class="px-6 py-2 text-lg text-white bg-green-500 border-0 rounded focus:outline-none hover:bg-green-600">Enregistrer</button>
            </div>
        </div>
    </form>

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
</x-app-layout> --}}