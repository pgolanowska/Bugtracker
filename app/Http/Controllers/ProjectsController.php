<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Rules\Uppercase;

class ProjectsController extends Controller
{
    public function index()
    {
        return view("projects.index");
    }

    public function create()    
    {
        $model = new Project();
        return view("projects.create", ["model" => $model]);
    }

    public function addToDB(Request $request)
    {
        $request->validate([
            "PKey" => ["required", "max:5", new Uppercase],
            "Name" => "required|max:50",
            "Description" => "required"
        ], [
            "PKey.max" => "The key cannot exceed 5 characters.",
            "Name.max" => "The name cannot exceed 50 characters.",
        ]);

        $model = new Project();

        $model->Name = $request->input("Name");
        $model->PKey = $request->input("PKey");
        $model->Description = $request->input("Description");
        $model->IsActive = true;
        $model->CreatedBy = Auth::id();
        $model->UpdatedBy = Auth::id();

        $model->save();

        return redirect("/projects");
    }

    public function edit($id)
    {
        $model = Project::find($id);
        return view("projects.edit", ["model" => $model]);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            "PKey" => ["required", "max:5", new Uppercase],
            "Name" => "required|max:50",
            "Description" => "required"
        ], [
            "PKey.max" => "The key cannot exceed 5 characters.",
            "Name.max" => "The name cannot exceed 50 characters.",
        ]);

        $model = Project::find($id);

        $model->Name = $request->input("Name");
        $model->PKey = $request->input("PKey");
        $model->Description = $request->input("Description");
        $model->UpdatedBy = Auth::id();

        $model->save();

        return redirect("/projects");
    }

}
