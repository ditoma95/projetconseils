<x-app-layout>
    <div class="flex justify-end mt-4">
        <a  class="px-6 py-2 text-lg text-white bg-green-500 border-0 rounded focus:outline-none hover:bg-green-600" href="{{ url('permissions') }}">Liste des permissions</a>
    </div>

    <form action="{{ url('permissions')}}" method="post">
        @csrf
        @method('post')
        <div class="mt-20">
            <div class="z-10 flex flex-col w-full p-8 m-auto bg-white rounded-lg shadow-md lg:w-1/3 md:w-1/2 md:mt-0">
                <h2 class="mb-1 text-lg font-medium text-center text-gray-900 title-font">Créer une permission</h2>
                <div class="relative mb-4">
                    <label for="name" class="text-sm leading-7 text-gray-600">Permission</label>
                    <input type="text" id="name" name="name" class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-white border border-gray-300 rounded outline-none focus:border-green-500 focus:ring-2 focus:ring-green-200">
                </div>
                <button class="px-6 py-2 text-lg text-white bg-green-500 border-0 rounded focus:outline-none hover:bg-green-600">Enregistrer</button>
            </div>
        </div>
    </form>
</x-app-layout>