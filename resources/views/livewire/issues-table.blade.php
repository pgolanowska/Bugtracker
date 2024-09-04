<table class="min-w-full divide-y divide-gray-200">
    <thead class="bg-gray-50">
        <tr>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer" wire:click="sortBy('key')">Key</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-48 cursor-pointer" wire:click="sortBy('summary')">Summary</th>
            <th scWope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer" wire:click="sortBy('priority')">Priority</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer" wire:click="sortBy('severity')">Severity</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer" wire:click="sortBy('createddate')">Created Date</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer" wire:click="sortBy('createdby')">Created By</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer" wire:click="sortBy('updateddate')">Updated Date</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer" wire:click="sortBy('updatedby')">Updated By</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer" wire:click="sortBy('currentassignee')">Current Assignee</th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach($model as $issue)
        <tr>
            <td class="px-6 py-4 whitespace-nowrap"><a class="text-blue-500" href="{{ route('issues.details', ['issue' => $issue->ID]) }}">{{ $issue->project->PKey }}-{{ $issue->ProjectIssueNumber }}</a></td>
            <td class="px-6 py-4">{{ $issue->Summary }}</td>
            <td class="px-6 py-4 whitespace-nowrap">{{ $issue->priority->Name }}</td>
            <td class="px-6 py-4 whitespace-nowrap">{{ $issue->severity->Name }}</td>
            <td class="px-6 py-4">{{ $issue->CreatedDate }}</td>
            <td class="px-6 py-4">{{ $issue->createdBy->name }}</td>
            <td class="px-6 py-4">{{ $issue->UpdatedDate }}</td>
            <td class="px-6 py-4">{{ $issue->updatedBy->name }}</td>
            <td class="px-6 py-4">{{ optional($issue->currentAssignee)->name ?? 'Unassigned' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>