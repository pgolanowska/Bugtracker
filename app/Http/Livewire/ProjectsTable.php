<?php

namespace App\Http\Livewire;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;

class ProjectsTable extends Component
{
    use WithPagination;

    public $sortField = "ID";
    public $sortOrder = "asc";
    public $search = "";

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
        if ($this->sortField === "key")
        {
            $projects = Project::where("projects.IsActive", true)->where("ID", ">", 0)
                            ->when($this->search, function ($query)
                            {
                                return $query->where("name", "like", "%".$this->search."%");
                            })
                        ->select("projects.*")
                        ->orderBy("projects.pkey", $this->sortOrder)
                        ->paginate(10);
        }
        else if ($this->sortField === "name")
        {
            $projects = Project::where("projects.IsActive", true)->where("ID", ">", 0)
                            ->when($this->search, function ($query)
                            {
                                return $query->where("name", "like", "%".$this->search."%");
                            })
                        ->select("projects.*")
                        ->orderBy("severities.name", $this->sortOrder)
                        ->paginate(10);
        }
        else if ($this->sortField === "createdby")
        {
            $projects = Project::where("projects.IsActive", true)->where("ID", ">", 0)
                            ->when($this->search, function ($query)
                            {
                                return $query->where("name", "like", "%".$this->search."%");
                            })
                        ->where("isactive", true)
                        ->join("users", "issues.createdby", "=", "users.ID")
                        ->select("issues.*")
                        ->orderBy("users.name", $this->sortOrder)
                        ->paginate(10);
        }
        else if ($this->sortField === "updatedby")
        {
            $projects = Project::where("projects.IsActive", true)->where("ID", ">", 0)
                            ->when($this->search, function ($query)
                            {
                                return $query->where("name", "like", "%".$this->search."%");
                            })
                        ->join("users", "issues.updatedby", "=", "users.ID")
                        ->select("issues.*")
                        ->orderBy("users.name", $this->sortOrder)
                        ->paginate(10);
        }  
        else
        {
            $projects = Project::where("IsActive", true)->where("ID", ">", 0)
                            ->when($this->search, function ($query)
                            {
                                return $query->where("name", "like", "%".$this->search."%");
                            })  
                            ->orderBy($this->sortField, $this->sortOrder)
                            ->paginate(10);
        }
        return view("livewire.projects-table", ["model" => $projects]);
    }
    public function getListeners()
    {
        return ['issuesSearchUpdated' => 'updateSearch'];
    }
    public function updateSearch($search)
    {
        $this->search = $search;
    }
    
    public function delete($id)
    {
        $model = Project::find($id);
        $model->IsActive = false;
        $model->save();

        return redirect("/projects");
    }
}
