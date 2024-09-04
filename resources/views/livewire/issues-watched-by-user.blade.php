<div>
    <h2 class="text-xl mb-4">Watched By Me</h2><br/>
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Issue Key
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-48">
                    Summary
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Last Updated
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($issues as $issue)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <a class="text-blue-500" href="{{ route('issues.details', ['issue' => $issue->ID]) }}">{{ $issue->project->PKey }}-{{ $issue->ProjectIssueNumber }}</a>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500">
                        {{ $issue->Summary }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500">
                        {{ $issue->UpdatedDate }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br/>
    {{ $issues->links() }}
</div>