<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IssueWatchers extends Model
{
    use HasFactory;
    protected $table = "issuewatchers";
    protected $primaryKey = "ID";

    protected $fillable = [
        'UserID',
        'IssueID',
    ];

    public function setUpdatedAt($value)
    {
      return NULL;
    }

    public function setCreatedAt($value)
    {
      return NULL;
    }

    public function issue()
    {
        return $this->belongsTo(Issue::class, "IssueID");
    }

    public function user()
    {
        return $this->belongsTo(User::class, "UserID");
    }

}
