<x-app-layout>
    <x-slot name="header">
        <div class="flex space-x-10">
            <div class="flex-auto">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Create New Issue') }}
                </h2>
            </div>
            <div class="flex-col-reverse">
                <button class="bg-green-600 hover:bg-green-700 text-base font-medium rounded-lg h-8 px-6 text-white">Create</button>
            </div>
        </div>
    </x-slot>

    <x-slot name="slot">
        <div class="py-12">
            <form method="POST" action="/issues">
                @csrf
                <div class="max-w-6xl mx-auto sm:px-10 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg px-5 py-5 flex space-x-5">
                        <label class="block text-gray-700 text-sm font-bold self-center flex-none w-20">Summary</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 flex-auto text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="Summary" type="text" placeholder="Summary" name="Summary">
                        @error('Summary')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <br />

                <div class="max-w-6xl mx-auto sm:px-10 lg:px-8 flex flex-wrap">

                    <div class="mx-auto pr-24 flex-1">
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg px-5 py-3 flex space-x-5">
                            <label class="block text-gray-700 text-sm font-bold self-center flex-none w-20">Issue Type</label>
                            <div class="py-2 flex-auto">
                                <div class="space-x-3 flex text-sm">
                                <select name="IssueTypeID" class="form-select validate">
                                    @foreach($issueTypes as $issueType)
                                    <option value="{{ $issueType->ID }}">{{ $issueType->Name }}</option>
                                    @endforeach
                                </select>
                                </div>
                                @error('IssueTypeID')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            </label>
                        </div>
                    </div>

                    <div class="mx-auto pl-24 flex-1">
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg px-5 py-3 flex space-x-5">
                            <label class="block text-gray-700 text-sm font-bold self-center flex-none w-20">Repro Rate</label>
                            <div class="py-2 flex-auto">
                                <div class="space-x-3 flex text-sm">
                                <select name="ReproRateID" class="form-select validate">
                                    @foreach($reproRates as $reproRate)
                                    <option value="{{ $reproRate->ID }}">{{ $reproRate->Name }}</option>
                                    @endforeach
                                </select>
                                </div>
                                @error('ReproRateID')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            </label>
                        </div>
                    </div>
                </div>
                <br />

                <div class="max-w-6xl mx-auto sm:px-10 lg:px-8 flex flex-wrap">

                    <div class="mx-auto pr-24 flex-auto">
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg px-5 py-3 flex space-x-5">
                            <label class="block text-gray-700 text-sm font-bold self-center flex-none w-20">Priority</label>
                            <div class="py-2 flex-auto">
                                <div class="space-x-3 flex text-sm">
                                    <label>
                                        <input class="sr-only peer form-check-input validate" name="PriorityID" type="radio" value="4" />
                                        <div class="w-9 h-9 rounded-lg flex items-center justify-center bg-red-200 text-slate-700 peer-checked:font-semibold peer-checked:bg-red-300 peer-checked:border border-red-800 peer-checked:text-white cursor-pointer">
                                            P4
                                        </div>
                                    </label>

                                    <label>
                                        <input class="sr-only peer form-check-input validate" name="PriorityID" type="radio" value="3" />
                                        <div class="w-9 h-9 rounded-lg flex items-center justify-center bg-red-300 text-slate-700 peer-checked:font-semibold peer-checked:bg-red-400 peer-checked:text-white  peer-checked:border border-red-800 cursor-pointer">
                                            P3
                                        </div>
                                    </label>

                                    <label>
                                        <input class="sr-only peer form-check-input validate" name="PriorityID" type="radio" value="2" />
                                        <div class="w-9 h-9 rounded-lg flex items-center justify-center bg-red-400 text-slate-700 peer-checked:font-semibold peer-checked:bg-red-500 peer-checked:text-white  peer-checked:border border-red-800 cursor-pointer">
                                            P2
                                        </div>
                                    </label>

                                    <label>
                                        <input class="sr-only peer form-check-input validate" name="PriorityID" type="radio" value="1" />
                                        <div class="w-9 h-9 rounded-lg flex items-center justify-center bg-red-500 text-slate-700 peer-checked:font-semibold peer-checked:bg-red-600 peer-checked:text-white  peer-checked:border border-red-800 cursor-pointer">
                                            P1
                                        </div>
                                    </label>
                                </div>
                                @error('PriorityID')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            </label>
                        </div>
                    </div>

                    <div class="mx-auto pl-24 flex-auto">
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg px-5 py-3 flex space-x-5">
                            <label class="block text-gray-700 text-sm font-bold self-center flex-none w-20">Severity</label>
                            <div class="py-2 flex-auto">
                                <div class="space-x-3 flex text-sm">

                                    <label>
                                        <input class="sr-only peer form-check-input validate" name="SeverityID" type="radio" value="1" />
                                        <div class="w-9 h-9 rounded-lg flex items-center justify-center bg-green-100 text-slate-700 peer-checked:font-semibold peer-checked:bg-green-300 peer-checked:border border-green-800 peer-checked:text-white cursor-pointer">
                                            <span class="material-icons-round">keyboard_arrow_down</span>
                                        </div>
                                    </label>

                                    <label>
                                        <input class="sr-only peer form-check-input validate" name="SeverityID" type="radio" value="2" />
                                        <div class="w-9 h-9 rounded-lg flex items-center justify-center bg-red-100 text-slate-700 peer-checked:font-semibold peer-checked:bg-red-200 peer-checked:text-white  peer-checked:border border-red-800 cursor-pointer">
                                            <span class="material-icons-round">keyboard_arrow_up</span>
                                        </div>
                                    </label>

                                    <label>
                                        <input class="sr-only peer form-check-input validate" name="SeverityID" type="radio" value="3" />
                                        <div class="w-9 h-9 rounded-lg flex items-center justify-center bg-red-200 text-slate-700 peer-checked:font-semibold peer-checked:bg-red-300 peer-checked:text-white  peer-checked:border border-red-800 cursor-pointer">
                                            <span class="material-icons-round">keyboard_double_arrow_up</span>
                                        </div>
                                    </label>

                                    <label>
                                        <input class="sr-only peer form-check-input validate" name="SeverityID" type="radio" value="4" />
                                        <div class="w-9 h-9 rounded-lg flex items-center justify-center bg-red-300 text-slate-700 peer-checked:font-semibold peer-checked:bg-red-400 peer-checked:text-white  peer-checked:border border-red-800 cursor-pointer">
                                            <span class="material-icons-round text-red-700">report</span>
                                        </div>
                                    </label>
                                </div>
                                @error('SeverityID')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            </label>
                        </div>
                    </div>
                </div>
                <br />

                <div class="max-w-6xl mx-auto sm:px-10 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg px-5 py-5 flex space-x-5 h-96">
                        <label class="block text-gray-700 text-sm font-bold self-center flex-none w-20" for="Description">Description</label>
                        <textarea class="shadow appearance-none border rounded w-full py-2 px-3 min-h-min text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="Description" placeholder="Description" name="Description"></textarea>
                        @error('Description')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <br />

                <div class="max-w-6xl mx-auto sm:px-10 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg px-5 py-5 flex space-x-5 h-48">
                        <label class="block text-gray-700 text-sm font-bold self-center flex-none w-20" for="StepsToReproduce">Steps to reproduce</label>
                        <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="StepsToReproduce" placeholder="Steps to reproduce" name="StepsToReproduce"></textarea>
                        @error('StepsToReproduce')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <br />

                <div class="max-w-6xl mx-auto sm:px-10 lg:px-8 flex flex-row-reverse">

                    <button class="bg-green-600 hover:bg-green-700 text-base text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="Submit">
                        Submit
                    </button>

                    
                <x-nav-link class="bg-red-600 hover:bg-red-700 text-base text-white font-bold px-4 mx-2 rounded focus:outline-none focus:shadow-outline" :href="route('issues')" >
                        Cancel
                </x-nav-link>
                    
                </div>
            </form>
        </div>
    </x-slot>
</x-app-layout>