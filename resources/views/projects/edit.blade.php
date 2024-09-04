<x-app-layout>
    <x-slot name="header">
        <div class="flex space-x-10">
            <div class="flex-auto">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Edit Project') }}
                </h2>
            </div>
            <div class="flex-col-reverse">
                <button class="bg-green-600 hover:bg-green-700 text-base font-medium rounded-lg h-8 px-6 text-white">Create</button>
            </div>
        </div>
    </x-slot>

    <x-slot name="slot">
        <div class="py-12">
            <form method="POST" action="/projects/update/{{ $model->ID }}">
                @csrf
                <div class="max-w-6xl mx-auto sm:px-10 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg px-5 py-5 flex space-x-5">
                        <label class="block text-gray-700 text-sm font-bold self-center flex-none w-20">Name</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 flex-auto text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="Name" type="text" name="Name" value="{{ $model->Name }}">      
                            @error('Name')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                            @enderror
                    </div>
                </div>
                <br />
               
                <div class="max-w-6xl mx-auto sm:px-10 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg px-5 py-5 flex space-x-5">
                        <label class="block text-gray-700 text-sm font-bold self-center flex-none w-20">Key</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 flex-auto text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="PKey" type="text" name="PKey" value="{{ $model->PKey }}">
                            @error('PKey')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror         
                    </div>
                </div>
                <br />

                <div class="max-w-6xl mx-auto sm:px-10 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg px-5 py-5 flex space-x-5 h-96">
                        <label class="block text-gray-700 text-sm font-bold self-center flex-none w-20" for="Description">Description</label>
                        <textarea class="shadow appearance-none border rounded w-full py-2 px-3 min-h-min text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="Description" name="Description">{{ $model->Description }}</textarea>
                    </div>
                </div>
                <br />

                <div class="max-w-6xl mx-auto sm:px-10 lg:px-8 flex flex-row-reverse">

                    <button class="bg-green-600 hover:bg-green-700 text-base text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="Submit">
                        Submit
                    </button>
                    
                    <x-nav-link class="bg-red-600 hover:bg-red-700 text-base text-white font-bold px-4 mx-2 rounded focus:outline-none focus:shadow-outline" :href="route('projects')" >
                            Cancel
                    </x-nav-link>
                    
                </div>
            </form>
        </div>
    </x-slot>
</x-app-layout>