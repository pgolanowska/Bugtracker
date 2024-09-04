<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Issue extends Model
{
    use HasFactory;
    const CREATED_AT = "CreatedDate";
    const UPDATED_AT = "UpdatedDate";
    protected $table = "issues";
    protected $primaryKey = "ID";

    protected $fillable = [
        'CurrentAssignee',
    ];

    public function priority()
    {
        return $this->belongsTo(Priority::class, "PriorityID");
    }

    public function severity()
    {
        return $this->belongsTo(Severity::class, "SeverityID");
    }

    public function issueType()
    {
        return $this->belongsTo(IssueType::class, "IssueTypeID");
    }

    public function reproRate()
    {
        return $this->belongsTo(ReproRate::class, "ReproRateID");
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, "CreatedBy");
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, "UpdatedBy");
    }

    public function currentAssignee()
    {
        return $this->belongsTo(User::class, "CurrentAssignee");
    }

    public function project()
    {
        return $this->belongsTo(Project::class, "ProjectID");
    }
    
    public function watchers()
    {
        return $this->belongsToMany(User::class, 'IssueWatchers', 'IssueID', 'UserID');
    }
}
