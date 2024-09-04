<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row">
            <div class="flex-auto">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Projects') }}
            </h2>
            </div>
            <div class="flex-col-reverse">
                <div class="flex flex-row">
                    <x-nav-link class="bg-green-600 hover:bg-green-700 text-base font-medium rounded-lg h-8 px-6 text-white" :href="route('projects.create')" :active="request()->routeIs('projects.create')">
                            {{ __('Create') }}
                    </x-nav-link>
                    @livewire('search-field')
                </div>      
            </div>
        </div>
    </x-slot>

    <x-slot name="slot">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        @livewire('projects-table')
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>
