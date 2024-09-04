<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Issue;
use Illuminate\Support\Facades\DB;

class IssueAssignment extends Component
{
    public $issue;
    public $users;
    public $selectedUser = null;
    public $modalVisible = false;

    public function mount(Issue $issue)
    {
        $this->issue = $issue;
        $this->users = User::all();
        $this->selectedUser = $issue->currentAssignee;
    }

    public function showModal()
    {
        $this->modalVisible = true;
    }

    public function closeModal()
    {
        $this->modalVisible = false;
    }

    public function assign()
    {
        $this->issue->currentAssignee = $this->selectedUser;
        $this->issue->save();
        $this->modalVisible = false;
        $this->emit('issueAssigned');
    }

    public function render()
    {
        return view('livewire.issue-assignment');
    }
}
