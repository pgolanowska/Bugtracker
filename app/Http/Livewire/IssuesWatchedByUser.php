<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\IssueWatchers;
use Illuminate\Support\Facades\Auth;

class IssuesWatchedByUser extends Component
{
    use WithPagination;

    public function render()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $issues = $user->watchedissues()->orderBy('UpdatedDate', 'desc')->paginate(5);
        return view('livewire.issues-watched-by-user', ['issues' => $issues]);
    }
}
