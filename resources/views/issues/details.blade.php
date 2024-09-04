<x-app-layout>
    @include('issues.header')
    <x-slot name="slot">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg px-4 py-4 grid grid-cols-4 gap-4">
                            <div class="col-span-3">
                                <div class="flex mb-4">
                                    <div class="w-1/2">
                                        <h2 class="text-2xl mb-2">{{ $model->project->PKey }}-{{ $model->ProjectIssueNumber }}: {{ $model->Summary }}</h2>
                                    </div>
                                </div>
                                <div class="border-t border-gray-200 py-6 flex flex-row">
                                    @if (auth()->user()->id == $model->createdBy->id)
                                    <a href="{{ route('issues.edit', ['issue' => $model->ID]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mx-2">Edit Issue</a>
                                    <a href="{{ route('issues.delete', ['issue' => $model->ID]) }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mx-2">Delete Issue</a>
                                    @endif

                                    <livewire:issue-assignment :issue="$model" />

                                    <livewire:issue-watching :issue="$model" />

                                </div>
                                <div class="border-t border-gray-200 py-8 grid grid-cols-2">
                                    <div class="col-span-1 mb-4">
                                        <p><span class="font-bold">Issue Type:</span> {{ $model->issuetype->Name }}</p>
                                    </div>
                                    <div class="col-span-1 mb-4">
                                        <p><span class="font-bold">Repro Rate:</span> {{ $model->reprorate->Name }}</p>
                                    </div>
                                    <div class="col-span-1">
                                        <p><span class="font-bold">Priority:</span> {{ $model->priority->Name }}</p>
                                    </div class="col-span-1">
                                    <div>
                                        <p><span class="font-bold">Severity:</span> {{ $model->severity->Name }}</p>
                                    </div>
                                </div>

                                <div class="border-t border-gray-200 py-12">
                                    <h3 class="text-xl mb-2">Steps To Reproduce</h3>
                                    <p>{{ $model->StepsToReproduce }}</p>
                                </div>

                                <div class="border-t border-gray-200 py-12">
                                    <h3 class="text-xl mb-2">Description</h3>
                                    <p>{{ $model->Description }}</p>
                                </div>
                            </div>
                            <div class="col-span-1 px-6">
                                <p><span class="font-bold">Reporter:</span><br/> {{ $model->createdBy->name }}</p><br/>
                                <p><span class="font-bold">Current Assignee:</span><br/> {{ optional($model->currentAssignee)->name ?? 'Unassigned' }}</p><br/>
                                <p><span class="font-bold">Created On:</span><br/> {{ $model->CreatedDate }}</p><br/>
                                <p><span class="font-bold">Last Updated:</span><br/> {{ $model->UpdatedDate }}</p><br/><br/>
                                <p><span class="font-bold">Watchers:</span>

                                    @if ($model->watchers->isEmpty())
                                        <p>No watchers for this issue</p>
                                    @else
                                        @foreach ($model->watchers as $watcher)
                                            <p>{{ $watcher->name }}</p>
                                        @endforeach
                                    @endif
                            
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>
<script>
    Livewire.on('issueAssigned', () => {
        alert('Issue has been successfully assigned!');
    });

    Livewire.on('issueWatched', () => {
        alert('You are now watching this issue!');
    });
</script>