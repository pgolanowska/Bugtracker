<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    const CREATED_AT = "CreatedDate";
    const UPDATED_AT = "UpdatedDate";
    protected $table = "Projects";
    protected $primaryKey = "ID";
    
    public function createdBy()
    {
        return $this->belongsTo(User::class, "CreatedBy");
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, "UpdatedBy");
    }
}
