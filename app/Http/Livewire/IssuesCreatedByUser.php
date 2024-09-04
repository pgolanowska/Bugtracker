<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Issue;
use Illuminate\Support\Facades\Auth;

class IssuesCreatedByUser extends Component
{
    use WithPagination;

    public function render()
    {
        $issues = Issue::where('createdBy', Auth::id())->orderBy('UpdatedDate', 'desc')->paginate(5);
        return view('livewire.issues-created-by-user', ['issues' => $issues]);
    }
}