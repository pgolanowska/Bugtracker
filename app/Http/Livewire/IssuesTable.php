<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Issue;
use Illuminate\Support\Facades\Auth;

class IssuesTable extends Component
{
    use WithPagination;

    public $sortField = "ID";
    public $sortOrder = "asc";
    public $search = "";
    public $activeProject = 0; // 0 = wszystkie projekty

    public function mount()
    {
        $this->activeProject = auth()->user()->ActiveProjectID;
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field)
        {
            $this->sortOrder = $this->sortOrder === "asc" ? "desc" : "asc";
        }
        else
        {
            $this->sortOrder = "asc";
        }

        $this->sortField = $field;
    }

    public function render()
    {     
        if ($this->sortField === "priority")
        {
            $issues = Issue::when($this->activeProject, function ($query)
                            {
                                return $query->where("projectid", $this->activeProject);
                            })
                            ->when($this->search, function ($query)
                            {
                                return $query->where("summary", "like", "%".$this->search."%");
                            })
                        ->where("issues.isactive", true)
                        ->join("priorities", "issues.priorityid", "=", "priorities.ID")
                        ->select("issues.*")
                        ->orderBy("priorities.name", $this->sortOrder)
                        ->paginate(10);
        }
        else if ($this->sortField === "key")
        {
            $issues = Issue::when($this->activeProject, function ($query)
                            {
                                return $query->where("projectid", $this->activeProject);
                            })
                            ->when($this->search, function ($query)
                            {
                                return $query->where("summary", "like", "%".$this->search."%");
                            })
                        ->where("issues.isactive", true)
                        ->join("projects", "issues.projectid", "=", "projects.ID")
                        ->select("issues.*")
                        ->orderBy("projects.pkey", $this->sortOrder)
                        ->orderBy("issues.ProjectIssueNumber", $this->sortOrder)
                        ->paginate(10);
        }
        else if ($this->sortField === "severity")
        {
            $issues = Issue::when($this->activeProject, function ($query)
                            {
                                return $query->where("projectid", $this->activeProject);
                            })
                            ->when($this->search, function ($query)
                            {
                                return $query->where("summary", "like", "%".$this->search."%");
                            })
                        ->where("issues.isactive", true)
                        ->join("severities", "issues.severityid", "=", "severities.ID")
                        ->select("issues.*")
                        ->orderBy("severities.name", $this->sortOrder)
                        ->paginate(10);
        }
        else if ($this->sortField === "createdby")
        {
            $issues = Issue::when($this->activeProject, function ($query)
                            {
                                return $query->where("projectid", $this->activeProject);
                            })
                            ->when($this->search, function ($query)
                            {
                                return $query->where("summary", "like", "%".$this->search."%");
                            })
                        ->where("issues.isactive", true)
                        ->join("users", "issues.createdby", "=", "users.ID")
                        ->select("issues.*")
                        ->orderBy("users.name", $this->sortOrder)
                        ->paginate(10);
        }
        else if ($this->sortField === "updatedby")
        {
            $issues = Issue::when($this->activeProject, function ($query)
                            {
                                return $query->where("projectid", $this->activeProject);
                            })
                            ->when($this->search, function ($query)
                            {
                                return $query->where("summary", "like", "%".$this->search."%");
                            })
                        ->where("issues.isactive", true)    
                        ->join("users", "issues.updatedby", "=", "users.ID")
                        ->select("issues.*")
                        ->orderBy("users.name", $this->sortOrder)
                        ->paginate(10);
        }
        else if ($this->sortField === "currentassignee")
        {
            $issues = Issue::when($this->activeProject, function ($query)
                            {
                                return $query->where("projectid", $this->activeProject);
                            })
                            ->when($this->search, function ($query)
                            {
                                return $query->where("summary", "like", "%".$this->search."%");
                            })
                        ->where("issues.isactive", true)
                        ->leftJoin("users", "issues.currentassignee", "=", "users.ID")
                        ->select("issues.*")
                        ->orderByRaw("ISNULL(users.name), users.name " . $this->sortOrder)
                        ->paginate(10);
        }     
        else
        {
            $issues = Issue::when($this->activeProject, function ($query)
                                {
                                    return $query->where("projectid", $this->activeProject);
                                })
                            ->when($this->search, function ($query)
                            {
                                return $query->where("summary", "like", "%".$this->search."%");
                            })  
                            ->where("issues.isactive", true)
                            ->orderBy($this->sortField, $this->sortOrder)
                            ->paginate(10);
        }
        return view("livewire.issues-table", ["model" => $issues]);
    }
    public function getListeners()
    {
        return ["issuesSearchUpdated" => "updateSearch", "activeProjectIdUpdated" => "updateActiveProjectId"];
    }
    public function updateSearch($search)
    {
        $this->search = $search;
    }
    public function updateActiveProjectId($id)
    {
        $this->activeProject = $id;
    }

}
