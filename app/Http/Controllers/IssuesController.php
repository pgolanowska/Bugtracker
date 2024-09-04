<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Issue;
use App\Models\IssueType;
use App\Models\ReproRate;

class IssuesController extends Controller
{
    public function index()
    {
        return view("issues.index");
    }

    public function create()    
    {
        $model = new Issue();
        $issueTypes = IssueType::all();
        $reproRates = ReproRate::all();
        return view("issues.create", ["model" => $model, "issueTypes" => $issueTypes, "reproRates" => $reproRates]);
    }
  
    public function addToDB(Request $request)
    {
        $request->validate([
            "Summary" => "required|max:100",
            "PriorityID" => "required",
            "SeverityID" => "required",
            "IssueTypeID" => "required",
            "ReproRateID" => "required",
            "Description" => "required",
            "StepsToReproduce" => "required",
        ], [
            "Summary.max" => "The summary cannot exceed 100 characters.",
        ]);

        $model = new Issue();

        $model->Summary = $request->input("Summary");
        $model->PriorityID = $request->input("PriorityID");
        $model->SeverityID = $request->input("SeverityID");
        $model->IssueTypeID = $request->input("IssueTypeID");
        $model->ReproRateID = $request->input("ReproRateID");
        $model->Description = $request->input("Description");
        $model->StepsToReproduce = $request->input("StepsToReproduce");
        $model->CreatedBy = Auth::id();
        $model->UpdatedBy = Auth::id();
        $model->ProjectID = Auth::user()->ActiveProjectID;
        $model->ProjectIssueNumber = Issue::where("ProjectID", $model->ProjectID)->max("ProjectIssueNumber") + 1;
        $model->IsActive = true;

        $model->save();

        return redirect("/issues");
    }

    public function details($id)
    {
        $model = Issue::find($id);
        return view("issues.details", ["model" => $model]);
    }
    
    public function edit($id)
    {
        $model = Issue::find($id);
        $issueTypes = IssueType::all();
        $reproRates = ReproRate::all();
        return view("issues.edit", ["model" => $model, "issueTypes" => $issueTypes, "reproRates" => $reproRates]);
    }

    public function update($issue, Request $request)
    {
        $request->validate([
            "Summary" => "required|max:100",
        ], [
            "Summary.max" => "The summary cannot exceed 100 characters.",
        ]);

        $model = Issue::find($issue);

        $model->Summary = $request->input("Summary");
        $model->PriorityID = $request->input("PriorityID");
        $model->SeverityID = $request->input("SeverityID");
        $model->IssueTypeID = $request->input("IssueTypeID");
        $model->ReproRateID = $request->input("ReproRateID");
        $model->Description = $request->input("Description");
        $model->StepsToReproduce = $request->input("StepsToReproduce");
        $model->UpdatedBy = Auth::id();

        $model->save();

        return redirect("/issues");
    }
    
    public function delete($id)
    {
        $model = Issue::find($id);
        $model->IsActive = false;
        $model->save();

        return redirect("/issues");
    }
}
