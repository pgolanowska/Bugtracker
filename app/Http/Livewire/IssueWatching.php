<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Issue;
use App\Models\IssueWatchers;

class IssueWatching extends Component
{
    public $issue;

    public function mount(Issue $issue)
    {
        $this->issue = $issue;
    }

    public function watch()
    {
        IssueWatchers::create([
            'UserID' => auth()->id(),
            'IssueID' => $this->issue->ID,
        ]);

        $this->emit('issueWatched');
    }

    public function render()
    {
        return view('livewire.issue-watching');
    }
}
