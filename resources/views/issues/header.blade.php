<x-slot name="header">
        <div class="flex flex-row">
            <div class="flex-auto">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Issues') }}
            </h2>
            </div>
            <div class="flex-col-reverse">
                <div class="flex flex-row">
                    <x-nav-link 
                        class="{{ auth()->user()->ActiveProjectID != 0 ? 'bg-green-600 hover:bg-green-700 text-base font-medium rounded-lg h-8 px-6 text-white' : 'bg-gray-600 text-base font-medium rounded-lg h-8 px-6 text-white cursor-not-allowed' }}"
                        :href="auth()->user()->ActiveProjectID != 0 ? route('issues.create') : '#'"
                        :active="request()->routeIs('issues.create')"
                        :title="auth()->user()->ActiveProjectID == 0 ? 'Please select a project first' : ''"
                    >
                        {{ __('Create') }}
                    </x-nav-link>
                    @livewire('search-field')
                </div>      
            </div>
        </div>
    </x-slot>