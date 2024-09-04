<select wire:model="activeProject" class="border-0 py-0 w-44 pr-10 text-center bg-transparent inline-flex items-center ml-0 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border-gray-700 transition duration-150 ease-in-out">
    @foreach (App\Models\Project::all() as $project)
    <option value="{{ $project->ID }}" @if(auth()->user()->ActiveProjectID == $project->ID) selected @endif>
        {{ $project->Name }}
    </option>
    @endforeach
    <option value="new" class="bg-gray-100">Add New...</option>
</select>