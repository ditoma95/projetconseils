<div class="mt-10 ml-14">
    <div class="inline-flex overflow-hidden bg-white border divide-x rounded-lg dark:bg-gray-900 rtl:flex-row-reverse dark:border-gray-700 dark:divide-gray-700">
        @if(auth()->user()->hasRole('super-admin'))
            <a class="px-5 py-2 text-xs font-medium text-gray-600 transition-colors duration-200 bg-gray-100 sm:text-sm dark:bg-gray-800 dark:text-gray-300" href=" {{ url('roles') }} ">Roles</a>
        @endif
        
        @if(auth()->user()->hasRole('super-admin'))
            <a class="py-2 text-xs font-medium text-gray-600 transition-colors duration-200 x-5 sm:text-sm dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100" href=" {{ url('permissions') }} ">Permissions</a>
        @endif

        @if(auth()->user()->hasRole('super-admin'))
            <a class="px-5 py-2 text-xs font-medium text-gray-600 transition-colors duration-200 sm:text-sm dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100" href=" {{ url('users') }} ">Users</a>
        @endif
    </div>
</div>