<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-2">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mx-6 my-6">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                @livewire('issues-created-by-user')
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mx-6 my-6">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                @livewire('issues-assigned-to-user')
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mx-6 my-6">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                @livewire('issues-watched-by-user')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
