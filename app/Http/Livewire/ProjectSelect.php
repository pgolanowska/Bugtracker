<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Auth;

use Livewire\Component;

class ProjectSelect extends Component
{
    public $activeProject = 0; // 0 = wszystkie projekty

    public function mount()
    {
        $this->activeProject = auth()->user()->ActiveProjectID;
    }

    public function updatedActiveProject($value)
    {
        $activeProject = $value;
        if ($value === 'new')
        {
            return redirect()->route('projects.create');
        }
        else
        {
            /** @var \App\Models\User $user */
            $user = Auth::user();
            if($user)
            {
                $user->ActiveProjectID = $value;
                $user->save();
            }
            $this->emit("activeProjectIdUpdated", $this->activeProject);
            return redirect("/issues");
        }
    }

    public function redirectToEdit($projectId)
    {
        return redirect()->route('projects.edit', $projectId);
    }

    public function render()
    {
        return view("livewire.project-select", ['projects' => \App\Models\Project::all()]);
    }
}
