<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Issue;
use Illuminate\Support\Facades\Auth;

class IssuesAssignedToUser extends Component
{
    use WithPagination;

    public function render()
    {
        $issues = Issue::where('CurrentAssignee', Auth::id())->orderBy('UpdatedDate', 'asc')->paginate(5);
        return view('livewire.issues-assigned-to-user', ['issues' => $issues]);
    }
}